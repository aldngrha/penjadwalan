<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$classes = $koneksi->query("SELECT * FROM classes WHERE class_id='$_GET[class_id]'");
$class = $classes->fetch_assoc();

$koneksi->query("DELETE FROM classes WHERE class_id='$_GET[class_id]'");

echo "<script>alert('Data Kelas Terhapus!');</script>";
echo "<script>location='kelas.php'</script>";

?>