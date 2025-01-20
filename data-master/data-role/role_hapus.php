<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$roles = $koneksi->query("SELECT * FROM `role` WHERE role_id = '$_GET[role_id]'");
$role = $roles->fetch_assoc();

$koneksi->query("DELETE FROM `role` WHERE role_id = '$_GET[role_id]'");

echo "<script>alert('Data Role Pengguna Terhapus!');</script>";
echo "<script>location='role.php'</script>";

?>