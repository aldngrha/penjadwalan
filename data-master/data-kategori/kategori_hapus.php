<?php
session_start();
include '../../koneksi.php';

if (!isset($_SESSION["role_id"])) {
    echo "<script>location='../../login/index.php'</script>";
    exit();
} else if ($_SESSION["role_id"] == "siswa"){
    echo "<script>location='/data-master/data-kategori/kategori.php'</script>";
    exit();
}

$categories = $koneksi->query("SELECT * FROM categories WHERE category_id = '$_GET[category_id]'");
$category = $categories->fetch_assoc();

$koneksi->query("DELETE FROM categories WHERE category_id = '$_GET[category_id]'");

echo "<script>alert('Data Kategori Terhapus!');</script>";
echo "<script>location='kategori.php'</script>";

?>