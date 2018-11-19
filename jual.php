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

	

		 <input type="hidden" name="id" value="">
		  <div class="form-group">
		    <label for="nama_barang">Nama Barang</label>
		    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukan Nama Barang" readonly="">
		    
		  </div>


		  <div class="form-group">
		    <label for="qty">QTY</label>
		    <input type="number" min="1" class="form-control" name="qty" id="qty" placeholder="Masukan jumlah barang" required="">
		    
		  </div>
		  
	</form>



</body>
</html>