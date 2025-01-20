<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../login/index.php'</script>";
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
    <title>Penjadwalan Terpadu | Data Penjadwalan</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
<?php include '../includes/navbar.php'?> 

    <div id="layoutSidenav">
    <?php include '../includes/sidebar.php'?> 
        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Data Penjadwalan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Penjadwalan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Tabel Penjadwalan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Penjadwalan</th>
                                            <th>Kategori</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php $schedules = $koneksi->query("SELECT schedules.schedule_id, categories.name AS category_name, subjects.name AS subject_name, 
                                                                        classes.name AS class_name, majors.name AS major_name, schedules.created_at FROM schedules
                                                                        LEFT JOIN categories ON schedules.category_id = categories.category_id
                                                                        LEFT JOIN subjects ON schedules.subject_id = subjects.subject_id
                                                                        LEFT JOIN classes ON schedules.class_id = classes.class_id
                                                                        LEFT JOIN majors ON schedules.major_id = majors.major_id"); ?>
                                        <?php while ($schedule = $schedules->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo $schedule['schedule_id']; ?></td>
                                                <td><?php echo $schedule['category_name']; ?></td>
                                                <td><?php echo $schedule['subject_name']; ?></td>
                                                <td><?php echo $schedule['class_name']; ?></td>
                                                <td><?php echo $schedule['major_name']; ?></td>
                                                <td><?php echo $schedule['created_at']; ?></td>
                                                <td>
                                                    <a href="penjadwalan_hapus.php?&schedule_id=<?php echo $schedule['schedule_id']; ?>" class="btn-danger btn-sm btn">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="penjadwalan_tambah.php" class="btn-success btn px-3 font-weight-bold"><i class="fas fa-plus"></i> Tambah Data Penjadwalan</a>
                        </div>
                    </div>
                </div>
            </main>
            <?php include '../includes/footer.php'?> 
        </div>
    </div>
    <script src="../assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/Chart.min.js"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
</body>

</html>