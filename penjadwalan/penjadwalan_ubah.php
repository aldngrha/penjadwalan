<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../login/index.php'</script>";
    exit();
}

$schedules = $koneksi->query("SELECT * FROM schedules WHERE schedule_id='$_GET[schedule_id]'");
$schedule = $schedules->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Penjadwalan Terpadu | Data Master - Penjadwalan</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include '../includes/navbar.php';?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
           <?php include '../includes/sidebar.php';?>
        </div>
        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Ubah Data Kelas</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data Kelas</li>
                        <li class="breadcrumb-item active">Ubah Data Penjadwalan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            Data Mata Penjadwalan
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form class="ml-4" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>ID Penjadwalan</label>
                                            <input type="number" class="form-control" name="schedule_id" value="<?php echo $schedule['schedule_id'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Kategori</label>
                                            <select class="custom-select" name="category_id" value="<?php echo $subject['category_id']?>">
                                                <option value="pilih">Pilih Kategori</option>
                                                <?php
                                                $schedules = $koneksi->query("SELECT * FROM categories");
                                                $schedule = $schedules->fetch_assoc();
                                                ?>

                                                <?php foreach ($schedules as $schedule) :?>
                                                    <option value="<?php echo $schedule['category_id']?>"><?php echo $schedule['name']?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Mata Pelajaran</label>
                                            <select class="custom-select" name="subject_id" value="<?php echo $schedule['subject_id']?>">
                                                <option value="pilih">Pilih Mata Pelajaran</option>
                                                <?php
                                                $schedules = $koneksi->query("SELECT * FROM subjects");
                                                $schedule = $schedules->fetch_assoc();
                                                ?>

                                                <?php foreach ($schedules as $schedule) :?>
                                                    <option value="<?php echo $schedule['subject_id']?>"><?php echo $schedule['name']?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Kelas</label>
                                            <select class="custom-select" name="class_id" value="<?php echo $schedule['class_id']?>">
                                                <option value="pilih">Pilih Kelas</option>
                                                <?php
                                                $schedules = $koneksi->query("SELECT * FROM classes");
                                                $schedule = $schedules->fetch_assoc();
                                                ?>

                                                <?php foreach ($schedules as $schedule) :?>
                                                    <option value="<?php echo $schedule['class_id']?>"><?php echo $schedule['name']?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Jurusan</label>
                                            <select class="custom-select" name="major_id" value="<?php echo $schedule['major_id']?>">
                                                <option value="pilih">Pilih Jurusan </option>
                                                <?php
                                                $schedules = $koneksi->query("SELECT * FROM majors");
                                                $schedule = $schedules->fetch_assoc();
                                                ?>

                                                <?php foreach ($schedules as $schedule) :?>
                                                    <option value="<?php echo $schedule['major_id']?>"><?php echo $schedule['name']?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success font-weight-bold px-3 mr-2" name="ubah"><i class="fas fa-save"></i> Simpan</button>
                                        <a href="penjadwalan.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>
                                <?php
                             if (isset($_POST['ubah'])) {
                                $schedule_id = $koneksi->real_escape_string($_POST['schedule_id']);
                                $category_id = $koneksi->real_escape_string($_GET['category_id']);
                                $subject_id = $koneksi->real_escape_string($_GET['subject_id']);
                                $class_id = $koneksi->real_escape_string($_GET['class_id']);
                                $major_id = $koneksi->real_escape_string($_GET['major_id']);
                            
                                $koneksi->query("UPDATE schedules SET category_id = '$category_id', subject_id = '$subject_id', class_id = '$class_id', major_id = '$major_id' WHERE schedule_id = '$schedule_id'");
                                echo "<script>alert('Data Jadwal Telah Diubah!');</script>";
                                echo "<script>location='penjadwalan.php'</script>";
                            }
                            
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include '../includes/footer.php';?>
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