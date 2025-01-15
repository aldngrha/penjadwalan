<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["jabatan"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$ambil = $koneksi->query("SELECT * FROM tb_dokter JOIN tb_poli ON tb_dokter.id_poli = tb_poli.id_poli
            WHERE id_dokter='$_GET[id_dokter]'");
$pecah = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Poli Klinik | Data Master - Dokter</title>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
<?php include '../../includes/navbar.php'?>  

    <div id="layoutSidenav">
    <?php include '../../includes/sidebar.php';?>
        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Informasi Dokter</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Dokter</li>
                        <li class="breadcrumb-item active">Info Dokter</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            Data Dokter : <?php echo $pecah['nm_dokter']; ?>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form class="ml-4" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>ID Dokter</label>
                                            <input type="text" class="form-control" name="id_dokter" value="<?php echo $pecah['id_dokter'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Kode Dokter</label>
                                            <input type="text" class="form-control" name="kd_dokter" value="<?php echo $pecah['kd_dokter'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Nama Dokter</label>
                                            <input type="text" class="form-control" name="nm_dokter" value="<?php echo $pecah['nm_dokter'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Spesialis</label>
                                            <input type="text" class="form-control" name="spesialis_dokter" value="<?php echo $pecah['spesialis_dokter'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Bagian Poli</label>
                                            <input type="text" class="form-control" name="spesialis_dokter" value="<?php echo $pecah['nm_poli'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Tarif</label>
                                            <input type="text" class="form-control" name="tarif_dokter" value="<?php echo $pecah['tarif_dokter'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <a href="dokter_ubah.php?&id_dokter=<?php echo $pecah['id_dokter']; ?>" class="btn-warning btn font-weight-bold px-3 mr-2 text-white"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="dokter.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include '../../includes/footer.php';?>
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