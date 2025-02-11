<?php
include "../koneksi.php";

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
<html>

<head>
    <title>Cetak Laporan Penjadwalan</title>
    <style>
        .content img {
            width: 105px;
            height: 105px;
            float: left;
            margin-right: 10px;
        }

        .content p {
            text-align: left;
            margin-left: 20px;
        }

        .content h2 {
            text-align: left;
            margin-left: 5px;
        }

        .content h4 {
            text-align: left;
            margin-left: 5px;
        }
        
        @media print{
            *{
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <table border="0" width="100%" align="center">
            <tr>
                <td>
                    <img src="../assets/img/logo.png">
                    <p>
                        <span style="font-size: 16px; font-weight: bold;">Penjadwalan Terpadu</span><br>
                        <span style="font-size: 13px;">SMK Cendikia Farma Husada</span><br>
                        <span style="font-size: 12px;">E-mail: smk_cefada@gmail.com</span>
                    </p>
                </td>
            </tr>
        </table>
    </div>


    <table class="tabel" colspan="11" border="1" width="950" style="border: 1px solid black; border-collapse: collapse;">
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>