<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
} else if ($_SESSION["role_id"] !== "admin"){
    echo "<script>location='/data-master/data-user/user.php'</script>";
    exit();
}

$users = $koneksi->query("SELECT * FROM users WHERE user_id = '$_GET[user_id]'");
$user = $users->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Penjadwalan Terpadu | Data Master - User</title>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../../assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include '../../includes/navbar.php';?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
           <?php include '../../includes/sidebar.php';?>
        </div>
        <div id="layoutSidenav_content" class="bg-white text-dark">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Ubah Data User</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Master</li>
                        <li class="breadcrumb-item active">Data User</li>
                        <li class="breadcrumb-item active">Ubah Data User</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header font-weight-bold">
                            Data User : <?php echo $user['username']; ?>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form class="ml-4" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>ID User</label>
                                            <input type="number" class="form-control" name="user_id" value="<?php echo $user['user_id'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" value="<?php echo $user['username'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="<?php echo $user['password'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $user['email'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Photo</label>
                                            <input type="file" class="form-control" name="photo" value="<?php echo $user['photo'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Role Pengguna</label>
                                            <select class="custom-select" name="role_id" value="<?php echo $user['role_id']?>">
                                                <option value="pilih">Pilih Role Pengguna</option>
                                                <?php
                                                $users = $koneksi->query("SELECT * FROM role");
                                                $user = $users->fetch_assoc();
                                                ?>

                                                <?php foreach ($users as $user) :?>
                                                    <option value="<?php echo $user['role_id']?>"><?php echo $user['name']?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success font-weight-bold px-3 mr-2" name="ubah"><i class="fas fa-save"></i> Simpan</button>
                                        <a href="user.php" class="btn btn-danger font-weight-bold px-3 mr-2"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                                    </div>
                                </form>
                                <?php
                             if (isset($_POST['ubah'])) {
                                $username = $koneksi->real_escape_string($_POST['username']);
                                $password = $koneksi->real_escape_string($_POST['password']);
                                $email = $koneksi->real_escape_string($_POST['email']);
                                $photo = $koneksi->real_escape_string($_POST['photo']);
                                $role_id = $koneksi->real_escape_string($_POST['role_id']);
                                $user_id = $koneksi->real_escape_string($_GET['user_id']);
                            
                                $koneksi->query("UPDATE users SET username = '$username', password = '$password', email = '$email', photo = '$photo',
                                                role_id = '$role_id', updated_at = NOW() WHERE user_id = '$user_id'");
                                echo "<script>alert('Data User Telah Diubah!');</script>";
                                echo "<script>location='user.php'</script>";
                            }
                            
                                ?>
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