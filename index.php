<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='login/index.php'</script>";
    exit();
}

// Ambil data jadwal
$sql = "SELECT 
    j.schedule_id, 
    j.subject_id, 
    COALESCE(s.name, 'Istirahat/Upacara') AS subject_name, 
    j.class_id, 
    c.name AS class_name, 
    j.major_id, 
    m.name AS major_name, 
    TIME_FORMAT(j.start_time, '%H:%i') AS start_time, 
    TIME_FORMAT(j.end_time, '%H:%i') AS end_time, 
    j.hari, 
    j.rest, 
    j.ceremony 
FROM schedules j
LEFT JOIN subjects s ON j.subject_id = s.subject_id
LEFT JOIN classes c ON j.class_id = c.class_id
LEFT JOIN majors m ON j.major_id = m.major_id
ORDER BY j.hari, j.start_time, j.class_id;";

$result = $koneksi->query($sql);

$jadwal = [];
$kelas = [];

$ceremonyList = ["upacara", "sholat dhuha", "time for reading", "senam", "ekstrakurikuler", "gotong royong"];

// Format data dalam array
while ($row = $result->fetch_assoc()) {
    $jam = $row['start_time'] . '-' . $row['end_time'];

    if ($row['rest'] == 1 || in_array($row['ceremony'], $ceremonyList)) {
        $jadwal[$row['hari']][$jam]['colspan'] = count($kelas);
        $jadwal[$row['hari']][$jam]['subject'] = $row['ceremony'] ?: 'Istirahat';
    } else {
        $jadwal[$row['hari']][$jam][$row['class_name']][$row['major_name']] = $row['subject_name'];
    }

    // Simpan daftar kelas + jurusan unik
    $kelas[$row['class_name']] = $row['major_name'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Penjadwalan Terpadu | Dashboard</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'includes/navbar.php'; ?>
    <div class="container" style="margin-top: 70px;">
        <div class="text-center">
            <h1>JADWAL BELAJAR 2024/2025 SEMESTER GENAP</h1>
            <h1>SMK FARMASI CENDIKIA FARMA HUSADA</h1>
        </div>
        <a href="/penjadwalan/cetak_penjadwalan.php" target="_blank" class="btn-success btn px-3 font-weight-bold"><i class="fas fa-print"></i> Cetak Data Penjadwalan</a>

        <table class="table table-hover">
            <thead>
                <?php 
                    $filtered_kelas = array_filter($kelas, function($jurusan) {
                        return !is_null($jurusan) && $jurusan !== ''; 
                    });
                    ?>
                <tr class="bg-primary">
                    <th>Hari</th>
                    <th>Pukul</th>
                    <?php foreach ($filtered_kelas as $kelas_name => $jurusan): ?>
                        <th><?= $kelas_name ?> (<?= $jurusan ?>)</th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
            <?php 
            $warnaAcara = [
                "upacara" => "#ff5722", // Oranye
                "sholat dhuha" => "#673ab7", // Ungu
                "time for reading" => "#009688", // Teal
                "senam" => "#3f51b5", // Biru
                "ekstrakurikuler" => "#e91e63", // Pink
                "gotong royong" => "#795548", // Coklat
                "Istirahat" => "#4caf50" // Hijau
            ];

            $urutanHari = ["senin", "selasa", "rabu", "kamis", "jumat"];

            // Urutkan array jadwal berdasarkan urutanHari
            uksort($jadwal, function ($a, $b) use ($urutanHari) {
                return array_search($a, $urutanHari) - array_search($b, $urutanHari);
            });

            foreach ($jadwal as $hari => $data_jam): ?>
                <?php $first = true; ?>
                <?php foreach ($data_jam as $jam => $kelas_data): ?>
                    <tr>
                        <?php if ($first): ?>
                            <td rowspan="<?= count($data_jam) ?>" style="text-align: center; font-weight: bold; vertical-align: middle;"><?= ucfirst($hari) ?></td>
                            <?php $first = false; ?>
                        <?php endif; ?>

                        <td><?= $jam ?></td>

                        <?php if (isset($kelas_data['colspan'])): ?>
                            <?php 
                            $subject = $kelas_data['subject'];
                            $bgColor = $warnaAcara[$subject] ?? "#ffc107"; // Default kuning kalau tidak ada di list
                            ?>
                            <td colspan="<?= count($kelas) ?>" style="text-align: center; font-weight: bold; background-color: <?= $bgColor ?>; color: #fff;">
                                <?= ucfirst($subject) ?>
                            </td>
                        <?php else: ?>
                            <?php foreach ($filtered_kelas as $kelas_name => $jurusan): ?>
                                <td><?= isset($kelas_data [$kelas_name][$jurusan]) ? $kelas_data[$kelas_name][$jurusan] : '-'?></td>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
    </tbody>

        </table>
    </div>

    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>