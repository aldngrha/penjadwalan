<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$majors = $koneksi->query("SELECT * FROM majors WHERE major_id = '$_GET[major_id]'");
$major = $majors->fetch_assoc();

$koneksi->query("DELETE FROM majors WHERE major_id = '$_GET[major_id]'");

echo "<script>alert('Data Jurusan Terhapus!');</script>";
echo "<script>location='jurusan.php'</script>";

?>