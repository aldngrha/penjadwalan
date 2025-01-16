<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
}

$subjects = $koneksi->query("SELECT * FROM subjects WHERE subject_id='$_GET[subject_id]'");
$subject = $subjects->fetch_assoc();

$koneksi->query("DELETE FROM subjects WHERE subject_id='$_GET[subject_id]'");

echo "<script>alert('Data Mata Pelajaran Terhapus!');</script>";
echo "<script>location='poli.php'</script>";

?>