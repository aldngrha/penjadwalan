<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='login/index.php'</script>";
    exit();
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
        <table class="table table-hover">
            <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-center">Hari</th>
                    <th scope="col" class="text-center">Pukul</th>
                    <th scope="col" class="text-center">X-A</th>
                    <th scope="col" class="text-center">X-B</th>
                    <th scope="col" class="text-center">X-B</th>
                    <th scope="col" class="text-center">XI-A</th>
                    <th scope="col" class="text-center">X-B</th>
                    <th scope="col" class="text-center">X-B</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="14" class="text-center align-middle">Senin</td>
                    <td>07.10 - 08.00</td>
                    <td colspan="7" class="bg-success text-center text-light">UPACARA HARI SENIN</td>
                </tr>
                <tr>
                    <td>08.00 - 08.45</td>
                    <td>Pendidikan Agama Islam</td>
                    <td>Matematika</td>
                    <td>Matematika</td>
                    <td>Pelayanan Farmasi</td>
                    <td>Belajar Mandiri</td>
                    <td>Basis Data</td>
                </tr>
                <tr>
                    <td>08.45 - 09.30</td>
                    <td>Pendidikan Agama Islam</td>
                    <td>Matematika</td>
                    <td>Matematika</td>
                    <td>Pelayanan Farmasi</td>
                    <td>Produk Kreatif & Kewirausahaan</td>
                    <td>Basis Data</td>
                </tr>
                <tr>
                    <td>09.30 - 09.45</td>
                    <td colspan="7" class="bg-success text-center text-light">ISTIRAHAT KE-1</td>
                </tr>
                <tr>
                    <td>09.45 - 10.30</td>
                    <td>Seni Budaya</td>
                    <td>Pendidikan Agama</td>
                    <td>Pendidikan Agama</td>
                    <td>Praktikum Pelayanan Farmasi</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Pendidikan Pancasila</td>
                </tr>
                <tr>
                    <td>10.30 - 11.15</td>
                    <td>Dasar Teknologi Farmasi</td>
                    <td>Pendidikan Agama</td>
                    <td>Pendidikan Agama</td>
                    <td>Praktikum Pelayanan Farmasi</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Pendidikan Pancasila</td>
                </tr>
                <tr>
                    <td>11.15 - 12.00</td>
                    <td>Dasar Teknologi Farmasi</td>
                    <td>Seni Budaya</td>
                    <td>Seni Budaya</td>
                    <td>Praktikum Pelayanan Farmasi</td>
                    <td>Belajar Mandiri</td>
                    <td>Pemrograman Web & Perangkat Bergerak</td>
                </tr>
                <tr>
                    <td>12.00 - 13.00</td>
                    <td colspan="7" class="bg-success text-center text-light">SHOLAT DZUHUR & ISTIRAHAT KE-2</td>
                </tr>
                <tr>
                    <td>13.00 - 13.45</td>
                    <td>Bahasa Indonesia</td>
                    <td>Dasar Teknologi Farmasi</td>
                    <td>Komputer dan Jaringan</td>
                    <td>Produk Kreatif & Kewirausahaan</td>
                    <td>Pelayanan Farmasi</td>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <td>13.45 - 14.30</td>
                    <td>Bahasa Indonesia</td>
                    <td>Dasar Teknologi Farmasi</td>
                    <td>Komputer dan Jaringan</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Pelayanan Farmasi</td>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <td>14.30 - 15.15</td>
                    <td class="bg-secondary"></td>
                    <td class="bg-secondary"></td>
                    <td>Dasar Design Grafis</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Praktikum Pelayanan Farmasi</td>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <td>15.15 - 15.45</td>
                    <td colspan="7" class="bg-success text-center text-light">SHOLAT ASHAR & ISTIRAHAT KE-2</td>
                </tr>
                <tr>
                    <td>15.45 - 16.30</td>
                    <td class="bg-secondary"></td>
                    <td class="bg-secondary"></td>
                    <td>Dasar Design Grafis</td>
                    <td class="bg-secondary"></td>
                    <td>Praktikum Pelayanan Farmasi</td>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <td>15.45 - 16.30</td>
                    <td class="bg-secondary"></td>
                    <td class="bg-secondary"></td>
                    <td class="bg-secondary"></td>
                    <td class="bg-secondary"></td>
                    <td>Praktikum Pelayanan Farmasi</td>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <td rowspan="12" class="text-center align-middle">Selasa</td>
                    <td>07.10 - 07.30</td>
                    <td colspan="7" class="bg-success text-center text-light">SHOLAT DHUHA</td>
                </tr>
                <tr>
                    <td>07.30 - 07.45</td>
                    <td colspan="7" class="bg-warning text-center">TIME FOR READING</td>
                </tr>
                <tr>
                    <td>07.45 - 08.30</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Praktikum DTF</td>
                    <td>Sistem Komputer</td>
                    <td>PenjasOrkes</td>
                    <td>PenjasOrkes</td>
                    <td>PenjasOrkes</td>
                </tr>
                <tr>
                    <td>08.30 - 09.15</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Praktikum DTF</td>
                    <td>Sistem Komputer</td>
                    <td>PenjasOrkes</td>
                    <td>PenjasOrkes</td>
                    <td>PenjasOrkes</td>
                </tr>
                <tr>
                    <td>09.15 - 10.00</td>
                    <td>Pendidikan Antikorupsi</td>
                    <td>Praktikum DTF</td>
                    <td>Praktik Mandiri Komjar</td>
                    <td>Matematika</td>
                    <td>Administrasi Farmasi</td>
                    <td>Pemodelan Perangkat Lunak</td>
                </tr>
                <tr>
                    <td>10.00 - 10.15</td>
                    <td colspan="7" class="bg-success text-center text-light">ISTIRAHAT KE-1</td>
                </tr>
                <tr>
                    <td>10.15 - 11.00</td>
                    <td>Praktikum DTF</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Matematika</td>
                    <td>Bahasa Indonesia</td>
                    <td>Bahasa Indonesia</td>
                </tr>
                <tr>
                    <td>11.00 - 11.45</td>
                    <td>Praktikum DTF</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Pendidikan Pancasila</td>
                    <td>Administrasi Farmasi</td>
                    <td>Bahasa Indonesia</td>
                    <td>Bahasa Indonesia</td>
                </tr>
                <tr>
                    <td>11.45 - 12.30</td>
                    <td>Praktikum DTF</td>
                    <td>Pendidikan Antikorupsi</td>
                    <td>Pendidikan Antikorupsi</td>
                    <td>Bahasa Inggris</td>
                    <td>Matematika</td>
                    <td>Matematika</td>
                </tr>
                <tr>
                    <td>12.30 - 13.00</td>
                    <td colspan="7" class="bg-success text-center text-light">SHOLAT DZUHUR & ISTIRAHAT KE-2</td>
                </tr>
                <tr>
                    <td>13.00 - 13.45</td>
                    <td>Farmakognosi Dasar</td>
                    <td>Pengantar Farmasi</td>
                    <td>Pemrograman Dasar</td>
                    <td>Bahasa Inggris</td>
                    <td>Matematika</td>
                    <td>Matematika</td>
                </tr>
                <tr>
                    <td>13.45 - 14.30</td>
                    <td>Pengantar Farmasi</td>
                    <td>Farmakognosi Dasar</td>
                    <td>Pemrograman Dasar</td>
                    <td class="bg-secondary"></td>
                    <td class="bg-secondary"></td>
                    <td class="bg-secondary"></td>
                </tr>
                <tr>
                    <td rowspan="12" class="text-center align-middle">Rabu</td>
                    <td>07.10 - 07.30</td>
                    <td colspan="7" class="bg-success text-center text-light">SHOLAT DHUHA</td>
                </tr>
                <tr>
                    <td>07.30 - 07.45</td>
                    <td colspan="7" class="bg-warning text-center text-light">TIME FOR READING</td>
                </tr>
                <tr>
                    <td>07.45 - 08.30</td>
                    <td>Matematika</td>
                    <td>Bahasa Inggris</td>
                    <td>Bahasa Inggris</td>
                    <td>Farmakognosi</td>
                    <td>Pendidikan Agama</td>
                    <td>Pendidikan Agama</td>
                </tr>
                <tr>
                    <td>08.30 - 09.15</td>
                    <td>Matematika</td>
                    <td>Bahasa Inggris</td>
                    <td>Bahasa Inggris</td>
                    <td>Farmakognosi</td>
                    <td>Pendidikan Agama</td>
                    <td>Pendidikan Agama</td>
                </tr>
                <tr>
                    <td>09.15 - 10.00</td>
                    <td>Informatika</td>
                    <td>Sejarah Indonesia</td>
                    <td>Sejarah Indonesia</td>
                    <td>Pendidikan Agama</td>
                    <td>Matematika</td>
                    <td>Matematika</td>
                </tr>
                <tr>
                    <td>10.00 - 10.15</td>
                    <td colspan="7" class="bg-success text-center text-light">ISTIRAHAT KE-1</td>
                </tr>
                <tr>
                    <td>10.15 - 11.00</td>
                    <td>Bahasa Inggris</td>
                    <td>IPAS</td>
                    <td>IPAS</td>
                    <td>Pendidikan Agama</td>
                    <td>Matematika</td>
                    <td>Matematika</td>
                </tr>
                <tr>
                    <td>11.00 - 11.45</td>
                    <td>Bahasa Inggris</td>
                    <td>IPAS</td>
                    <td>IPAS</td>
                    <td>Bahasa Indonesia</td>
                    <td>Farmakognosi</td>
                    <td>Pemrograman Web & Perangkat Bergerak</td>
                </tr>
                <tr>
                    <td>11.45 - 12.30</td>
                    <td>Sejarah Indoensia</td>
                    <td>Informatika</td>
                    <td>Informatika</td>
                    <td>Bahasa Indonesia</td>
                    <td>Farmakognosi</td>
                    <td>Pemrograman Web & Perangkat Bergerak</td>
                </tr>
                <tr>
                    <td>12.30 - 13.00</td>
                    <td colspan="7" class="bg-success text-center text-light">SHOLAT DZUHUR & ISTIRAHAT KE-2</td>
                </tr>
                <tr>
                    <td>13.00 - 13.45</td>
                    <td>IPAS</td>
                    <td>Matematika</td>
                    <td>Matematika</td>
                    <td colspan="3" rowspan="2" class="bg-warning text-center align-middle">ESQ</td>
                </tr>
                <tr>
                    <td>13.45 - 14.30</td>
                    <td>IPAS</td>
                    <td>Matematika</td>
                    <td>Matematika</td>
                </tr>
                <tr>
                    <td rowspan="12" class="text-center align-middle">Kamis</td>
                    <td>07.10 - 07.30</td>
                    <td colspan="7" class="bg-success text-center text-light">SHOLAT DHUHA</td>
                </tr>
                <tr>
                    <td>07.30 - 07.45</td>
                    <td colspan="7" class="bg-warning text-center text-light">TIME FOR READING</td>
                </tr>
                <tr>
                    <td>07.45 - 08.30</td>
                    <td>PenjasOrkes</td>
                    <td>PenjasOrkes</td>
                    <td>PenjasOrkes</td>
                    <td>Matematika</td>
                    <td>Kimia Farmasi</td>
                    <td>Project Kewirausahaan</td>
                </tr>
                <tr>
                    <td>08.30 - 09.15</td>
                    <td>PenjasOrkes</td>
                    <td>PenjasOrkes</td>
                    <td>PenjasOrkes</td>
                    <td>Matematika</td>
                    <td>Farmakognosi</td>
                    <td>Pemrograman Berorentasi Objek</td>
                </tr>
                <tr>
                    <td>09.15 - 10.00</td>
                    <td>Matematika</td>
                    <td>Bahasa Indonesia</td>
                    <td>Bahasa Indonesia</td>
                    <td>Kimia Farmasi</td>
                    <td>Farmakognosi</td>
                    <td>Pemrograman Berorentasi Objek</td>
                </tr>
                <tr>
                    <td>10.00 - 10.15</td>
                    <td colspan="7" class="bg-success text-center text-light">ISTIRAHAT KE-1</td>
                </tr>
                <tr>
                    <td>10.15 - 11.00</td>
                    <td>Matematika</td>
                    <td>Bahasa Indonesia</td>
                    <td>Bahasa Indonesia</td>
                    <td>Farmakognosi</td>
                    <td>Bahasa Inggris</td>
                    <td>Bahasa Inggris</td>
                </tr>
                <tr>
                    <td>11.00 - 11.45</td>
                    <td colspan="3" rowspan="2" class="bg-primary text-center align-middle text-light">Bimbingan Konseling</td>
                    <td>Farmakognosi</td>
                    <td>Bahasa Inggris</td>
                    <td>Bahasa Inggris</td>
                </tr>
                <tr>
                    <td>11.45 - 14.30</td>
                    <td colspan="3" class="bg-secondary text-center text-light"></td>
                </tr>
                <tr>
                    <td>12.30 - 13.00</td>
                    <td colspan="7" class="bg-success text-center align-middle text-light">SHOLAT DZUHUR & ISTIRAHAT KE-2</td>
                </tr>
                <tr>
                    <td>13.00 - 13.45</td>
                    <td colspan="3" rowspan="2" class="bg-success text-center align-middle text-light">ESQ</td>
                    <td colspan="3" rowspan="2" class="bg-primary text-center align-middle text-light">Bimbingan KONSELING</td>
                </tr>
                <tr>
                    <td>13.45 - 14.30</td>
                </tr>
                <tr>
                    <td rowspan="5" class="text-center align-middle">Kamis</td>
                    <td>07.10 - 07.30</td>
                    <td colspan="7" class="bg-success text-center text-light">SHOLAT DHUHA</td>
                </tr>
                <tr>
                    <td>07.10 - 08.00</td>
                    <td colspan="7" class="bg-primary text-center align-middle text-light">SENAM/GEMAJI</td>
                </tr>
                <tr>
                    <td>08.00 - 08.30</td>
                    <td colspan="7" class="bg-success text-center align-middle text-light">ISTIRAHAT KE-1</td>
                </tr>
                <tr>
                    <td>08.30 - 11.30</td>
                    <td colspan="7" class="text-center align-middle">Ekstrakurikuler</td>
                </tr>
                <tr>
                    <td>11.30 - 12.30</td>
                    <td colspan="7" class="bg-secondary text-center align-middle text-light">GOTONG ROYONG</td>
                </tr>
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