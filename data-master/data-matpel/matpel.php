<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
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
    <title>Penjadwalan Terpadu | Data Master - Mata Pelajaran</title>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include "../../includes/navbar.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
        <?php include "../../includes/sidebar.php"?>
        </div>

        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Data Mata Pelajaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data PMata Pelajaran</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Tabel Data Mata Pelajaran
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Guru</th>
                                            <th>created_at</th>
                                            <th>updated_at</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php $subjects = $koneksi->query("SELECT subjects.subject_id, subjects.name, 
                                        users.username, subjects.created_at, subjects.updated_at FROM subjects
                                        LEFT JOIN users ON subjects.user_id = users.user_id"); ?>
                                        <?php while ($subject = $subjects->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo $subject['name']; ?></td>
                                                <td><?php echo $subject['username']; ?></td>
                                                <td><?php echo $subject['created_at']; ?></td>
                                                <td><?php echo $subject['updated_at']; ?></td>
                                                <td>
                                                        <a href="matpel_ubah.php?&subject_id=<?php echo $subject['subject_id']; ?>" class="btn-warning btn-sm btn">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="matpel_hapus.php?&subject_id=<?php echo $subject['subject_id']; ?>" class="btn-danger btn-sm btn">
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
                            <a href="matpel_tambah.php" class="btn-success btn px-3 font-weight-bold"><i class="fas fa-plus"></i> Tambah Data Mata Pelajaran</a>                        </div>
                    </div>
                </div>
            </main>
            <?php include '../../includes/footer.php'; ?>
        </div>
    </div>
    <script src="../../assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/Chart.min.js"></script>
    <script src="../../assets/demo/chart-area-demo.js"></script>
    <script src="../../assets/demo/chart-bar-demo.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../assets/demo/datatables-demo.js"></script>
</body>

</html>