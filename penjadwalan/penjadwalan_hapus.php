<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../login/index.php'</script>";
    exit();
}

$schedules = $koneksi->query("SELECT * FROM schedules WHERE schedule_id='$_GET[schedule_id]'");
$schedule = $schedules->fetch_assoc();

$koneksi->query("DELETE FROM schedules WHERE schedule_id='$_GET[schedule_id]'");

echo "<script>alert('Data Penjadwalan Terhapus!');</script>";
echo "<script>location='penjadwalan.php'</script>";

?>