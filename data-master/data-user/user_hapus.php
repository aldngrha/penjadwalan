<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$users = $koneksi->query("SELECT * FROM users WHERE user_id = '$_GET[user_id]'");
$user = $users->fetch_assoc();

$koneksi->query("DELETE FROM users WHERE user_id = '$_GET[user_id]'");

echo "<script>alert('Data User Terhapus!');</script>";
echo "<script>location='user.php'</script>";

?>