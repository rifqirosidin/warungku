<?php

session_start();

include('koneksi.php');

$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$id = $_POST['id'];



$sql= "UPDATE barang SET kode_barang = '$kode_barang', nama_barang='$nama_barang', harga='$harga', stok='$qty' WHERE id='$id'";

$result = mysqli_query($koneksi, $sql);


$_SESSION['sukses'] = 'Barang Berhasil diupdate';
   
   

mysqli_close($koneksi);

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>