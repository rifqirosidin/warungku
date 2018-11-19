<!DOCTYPE html>
<html>
<?php 
// session_start(); 

if (!isset($_SESSION['username']) && !isset($_SESSION['status'])){
	header("location:index.php");
	$_SESSION['login'] = 'gagal';

}

?>
<head>
	<title></title>
</head>
<body>
	
	<form action="" method="post">

		<input type="hidden" name="id">
		<div class="form-group">
		    <label for="kode_barang">Kode Barang</label>
		    <input type="text" class="form-control" name="kode_barang" maxlength="5" id="kode_barang" placeholder="Kode Barang" required="">
		  </div>

		  <div class="form-group">
		    <label for="nama_barang">Nama Barang</label>
		    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang">
		    
		  </div>

		  <div class="form-group">
		    <label for="qty">QTY</label>
		    <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukan jumlah barang" required="">
		    
		  </div>
		  <div class="form-group">
		    <label for="harga">Harga</label>
		    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan Harga Barang">
		    
		  </div>		  
	</form>

<!-- 	<?php

		// include('proses_tambahbarang.php');
	
?> -->
	
</body>
</html>