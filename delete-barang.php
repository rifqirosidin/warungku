<?php
include('koneksi.php');
session_start();


$id = $_GET['id'];

$sql = "DELETE FROM barang WHERE id='$id'";

$result = mysqli_query($koneksi, $sql);

$_SESSION['error'] = 'Barang Berhasil dihapus';

mysqli_close($koneksi);

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>