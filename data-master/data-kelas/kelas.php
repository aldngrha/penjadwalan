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
    <title>Penjadwalan Terpadu | Data Master - kelas</title>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
   <?php include '../../includes/navbar.php'?>
    <div id="layoutSidenav">
<?php include '../../includes/sidebar.php'?>

        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Data Kelas</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Kelas</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Tabel Data Kelas
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php $classes = $koneksi->query("SELECT * FROM classes"); ?>
                                        <?php while ($class = $classes->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo $class['name']; ?></td>
                                                <td>
                                                    <?php if ($_SESSION["role_id"]) : ?>
                                                        <a href="kelas_view.php?&class_id=<?php echo $class['class_id']; ?>" class="btn-primary btn-sm btn">
                                                            <i class="fas fa-eye"></i></i>
                                                        </a>
                                                        <a href="kelas_ubah.php?&class_id=<?php echo $class['class_id']; ?>" class="btn-warning btn-sm btn">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="kelas_hapus.php?&class_id=<?php echo $class['class_id']; ?>" class="btn-danger btn-sm btn">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    <?php elseif ($_SESSION["role"] == 'penjadwalan') : ?>
                                                        <a href="kelas_view.php?&class_id=<?php echo $class['class_id']; ?>" class="btn-primary btn-sm btn">
                                                            <i class="fas fa-eye"></i></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="kelas_tambah.php" class="btn-success btn px-3 font-weight-bold"><i class="fas fa-plus "></i> Tambah Data Pasien</a>
                        </div>
                    </div>
                </div>
            </main>
          <?php include '../../includes/footer.php'?>

            
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