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
    <title>Penjadwala Terpadu | Data Master - Mata Pelajaran</title>
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
                    <h1 class="mt-4">Tambah Data Mata Pelajaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Mata Pelajaran</li>
                        <li class="breadcrumb-item active">Tambah Data Mata Pelajaran</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            Data Mata Pelajaran
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="form-group row">
                                    <div class="btn-block disabled mx-4">
                                        <?php $subjects = mysqli_query($koneksi, "SELECT subjects.subject_id, subjects.name, users.username, subjects.created_at FROM subjects
                                        LEFT JOIN users ON subjects.user_id = users.user_id"); ?>
                                        <label>ID Mata Pelajaran</label>
                                        <input type="text" class="form-control text-center" name="subject_id" readonly>
                                    </div>
                                </div>
                                <form class="ml-4" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Mata Pelajaran</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>ID User</label>
                                            <select class="custom-select" name="user_id">
                                                <option value="pilih">Pilih User</option>
                                                <?php
                                                $subjects = $koneksi->query("SELECT * FROM users");
                                                $subject = $subjects->fetch_assoc();
                                                ?>

                                                <?php foreach ($subjects as $subject) :?>
                                                    <option value="<?php echo $subject['user_id']?>"><?php echo $subject['username']?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <button class="btn btn-success font-weight-bold px-3 mr-2" name="save"><i class="far fa-save"></i> Simpan</button>
                                        <a href="matpel.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>

                                <?php
                                if (isset($_POST['save'])) {
                                    if($_POST['user_id'] === "pilih"){
                                        echo "<script>alert('Pilih User dengan BENAR!');</script>";
                                    }else{
                                    $koneksi->query("INSERT INTO subjects (`name`, user_id) 
                                        VALUES ('$_POST[name]','$_POST[user_id]')");

                                    echo "<script>alert('Data Tersimpan!');</script>";
                                    echo "<script>location='matpel.php'</script>";
                                    }
                                }

                                ?>

                            </div>
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