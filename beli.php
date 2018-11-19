<!DOCTYPE html>
<html>
<?php 
session_start(); 

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

		  <div class="form-group">
		    <label for="nama_barang">Nama Barang</label>
		    <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Masukan Nama Barang" readonly="">
		    
		  </div>

		  <div class="form-group">
		    <label for="qty">QTY</label>
		    <input type="number" min="1" name="qty" class="form-control" id="qty" placeholder="Masukan jumlah barang" required="">
		    
		  </div>
		  
	</form>

</body>
</html>