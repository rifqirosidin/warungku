<?php 
session_start();

$nama_barang = $_POST['nama_barang'];
$qty = $_POST['qty'];

$tgl = date("Y-m-d");
$jenis_transaksi = "Pembelian";

$kode_barang = 

include('koneksi.php');

$id = $_POST['id'];
$tgl = date("Y/m/d");
// $jenis_transaksi = "Penjualan";


$sql_data = "SELECT * FROM barang WHERE id = '$id'";

$query_data = mysqli_query($koneksi, $sql_data);

$data = mysqli_fetch_array($query_data);
// var_dump($data);

$total = $qty * $data['harga'];
$kode_barang = $data['kode_barang'];
$harga = $data['harga'];

$sql_report = "INSERT INTO report(tanggal,jenis_transaksi,kode_barang, nama_barang,qty, harga, total) VALUES('$tgl', 'Pembelian', '$kode_barang', '$nama_barang', '$qty', '$harga', '$total')";

$quey_report = mysqli_query($koneksi, $sql_report);

$sql = "UPDATE barang SET stok= (stok + '$qty') WHERE nama_barang = '$nama_barang'";


$report = mysqli_query($koneksi, "INSERT INTO report (tgl,jenis_transaksi,kode_barang, nama_barang,qty, harga, total)" VALUES())

$result = mysqli_query($koneksi, $sql);


$_SESSION['sukses'] = 'Barang Berhasil Dibeli';


mysqli_close($koneksi);

header('Location: ' . $_SERVER['HTTP_REFERER']);

echo $qty;
?>