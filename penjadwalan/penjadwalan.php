<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../login/index.php'</script>";
    exit();
}
$categories = $koneksi->query("SELECT * FROM categories");
$subjects = $koneksi->query("SELECT * FROM subjects");
$majors = $koneksi->query("SELECT * FROM majors");
$classes = $koneksi->query("SELECT * FROM classes");
$categoryFilter = isset($_GET['category_id']) ? $_GET['category_id'] : '';
$subjectFilter = isset($_GET['subject_id']) ? $_GET['subject_id'] : '';
$majorFilter = isset($_GET['major_id']) ? $_GET['major_id'] : '';
$classFilter = isset($_GET['class_id']) ? $_GET['class_id'] : '';

$query = "SELECT schedules.schedule_id, schedules.priority, schedules.hari, schedules.start_time, schedules.end_time, schedules.ceremony, categories.name AS category_name, subjects.name AS subject_name, 
            classes.name AS class_name, majors.name AS major_name, schedules.created_at, schedules.updated_at FROM schedules
            LEFT JOIN categories ON schedules.category_id = categories.category_id
            LEFT JOIN subjects ON schedules.subject_id = subjects.subject_id
            LEFT JOIN classes ON schedules.class_id = classes.class_id
            LEFT JOIN majors ON schedules.major_id = majors.major_id"; 

if ($categoryFilter) {
    $query .= " WHERE schedules.category_id = '$categoryFilter'";
} elseif ($subjectFilter) {
    $query .= " WHERE schedules.subject_id = '$subjectFilter'";
} elseif ($majorFilter) {
    $query .= " WHERE schedules.major_id = '$majorFilter'";
} elseif ($classFilter) {
    $query .= " WHERE schedules.class_id = '$classFilter'";
}
$schedules = $koneksi->query($query);
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
    <?php include '../includes/navbar.php' ?>

    <div id="layoutSidenav">
        <?php include '../includes/sidebar.php' ?>
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
                            <form method="GET" class="mb-3">
                                <label for="category">Filter Kategori</label>
                                <select name="category_id" id="category" class="form-control" onchange="this.form.submit()">
                                    <option value="">Semua Kategori </option>
                                    <?php while ($category = $categories->fetch_assoc()) { ?>
                                        <option value="<?php echo $category['category_id']; ?>" <?php echo $categoryFilter == $category['category_id'] ? 'selected' : "" ?>>
                                            <?php echo $category['name']; ?>
                                        </option>
                                  <?php  } ?>
                                </select>
                            </form>
                            <form method="GET" class="mb-3">
                                <label for="subject">Filter Mata Pelajaran</label>
                                <select name="subject_id" id="subject" class="form-control" onchange="this.form.submit()">
                                    <option value="">Semua Mata Pelajaran</option>
                                    <?php while ($subject = $subjects->fetch_assoc()) { ?>
                                        <option value="<?php echo $subject['subject_id']; ?>" <?php echo $subjectFilter == $subject['subject_id'] ? 'selected' : "" ?>>
                                            <?php echo $subject['name']; ?>
                                        </option>
                                  <?php  } ?>
                                </select>
                            </form>
                            <form method="GET" class="mb-3">
                                <label for="major">Filter Jurusan</label>
                                <select name="major_id" id="major" class="form-control" onchange="this.form.submit()">
                                    <option value="">Semua Jurusan </option>
                                    <?php while ($major = $majors->fetch_assoc()) { ?>
                                        <option value="<?php echo $major['major_id']; ?>" <?php echo $majorFilter == $major['major_id'] ? 'selected' : "" ?>>
                                            <?php echo $major['name']; ?>
                                        </option>
                                  <?php  } ?>
                                </select>
                            </form>
                            <form method="GET" class="mb-3">
                                <label for="class">Filter Kelas</label>
                                <select name="class_id" id="class" class="form-control" onchange="this.form.submit()">
                                    <option value="">Semua Kelas </option>
                                    <?php while ($class = $classes->fetch_assoc()) { ?>
                                        <option value="<?php echo $class['class_id']; ?>" <?php echo $classFilter == $class['class_id'] ? 'selected' : "" ?>>
                                            <?php echo $class['name']; ?>
                                        </option>
                                  <?php  } ?>
                                </select>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Penjadwalan</th>
                                            <th>Hari</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th>Jadwal</th>
                                            <th>Kategori</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Prioritas</th>
                                            <th>created_at</th>
                                            <th>updated_at</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>

                                        <?php while ($schedule = $schedules->fetch_assoc()) { ?>

                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo $schedule['schedule_id']; ?></td>
                                                <td><?php echo $schedule['hari']; ?></td>
                                                <td><?php echo date('H:i', strtotime($schedule['start_time'])); ?> </td>
                                                <td><?php echo date('H:i', strtotime($schedule['end_time'])); ?> </td>
                                                <td><?php echo $schedule['ceremony']; ?></td>
                                                <td><?php echo $schedule['category_name']; ?></td>
                                                <td><?php echo $schedule['subject_name']; ?></td>
                                                <td><?php echo $schedule['class_name']; ?></td>
                                                <td><?php echo $schedule['major_name']; ?></td>
                                                <td><?php if ($schedule['priority'] == 1) { ?>
                                                        <span class="badge badge-primary">Ya</span>
                                                    <?php } elseif ($schedule['priority'] == 0) { ?>
                                                        <span class="badge badge-secondary">Tidak</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-warning">Tidak di setting</span>

                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $schedule['created_at']; ?></td>
                                                <td><?php echo $schedule['updated_at']; ?></td>
                                                <td>
                                                    <a href="penjadwlan_view.php?&schedule_id=<?php echo $schedule['schedule_id']; ?>" class="btn-primary btn-sm btn">
                                                        <i class="fas fa-eye"></i></i>
                                                    </a>
                                                    <a href="penjadwalan_ubah.php?&schedule_id=<?php echo $schedule['schedule_id']; ?>" class="btn-warning btn-sm btn">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="penjadwlan_hapus.php?&schedule_id=<?php echo $schedule['schedule_id']; ?>" class="btn-danger btn-sm btn">
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
                            <a href="cetak_penjadwalan.php" target="_blank" class="btn-success btn px-3 font-weight-bold"><i class="fas fa-print"></i> Cetak Data Penjadwalan</a>
                        </div>
                    </div>
                </div>
            </main>
            <?php include '../includes/footer.php' ?>
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