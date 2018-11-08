<?php

session_start();

$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];


include('koneksi.php');

$sql = "INSERT INTO barang (kode_barang,nama_barang,stok,harga) VALUES ('$kode_barang', '$nama_barang', '$qty', '$harga')";

$query = mysqli_query($koneksi, $sql);


	$_SESSION['sukses'] = 'Barang Berhasil Disimpan';


mysqli_close($koneksi);

header('Location: ' . $_SERVER['HTTP_REFERER']);


?>