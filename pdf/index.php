<!DOCTYPE html>
<html>
<?php session_start(); ?>
<head>
	<title>Warungku</title>
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<style type="text/css">
		#jarak  {
			padding-right: 20px;
		}
	</style>
</head>
<body>

	<div class="container" style="margin-top: 50px ">

		
		<div class="row">
			<div class="col-sm-1">
				<img src="logo.jpg" height="100" alt="Logo" class="rounded">
			</div>
			<div class="col-sm-5" style="margin-bottom: 20px">
			<h1 class="m-5">Warungku</h1>
		</div>
		</div>
		<?php if(isset($_SESSION['sukses'])){
				
			?>
			<div class="alert alert-success" role="alert" id="success-alert">
			  <?php echo $_SESSION['sukses']; ?>
			</div>
			<?php } elseif (isset($_SESSION['error'])) {
					
			 ?>
			 <div class="alert alert-danger" role="alert" id="success-alert">
			 	<?php echo $_SESSION['error']; ?>
			 </div>
			 	<?php } ?>
			<form action="" method="get" class="form">
		<div class="row">
			
			<div class="col-sm-3">
				<input type="text" name="cari" class="form-control">
			</div>
			<div class="col-sm-2">
				<button type="submit" class="btn btn-primary">Cari Barang</button>
			</div>
			<h1>hallo</h1>			
			<div class="col">
				<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
				  Tambah Barang
				</button>
			</div>
			
		</div>
		</form>
		<div class="row" style="margin-top: 20px">
			<div class="col">
				<table class="table table-hover">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Kode</th>
					      <th scope="col">Nama Barang</th>
					      <th scope="col">Harga</th>					      
					      <th scope="col">Stok</th>
					      <th scope="col">Transaksi</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<tr>
					  	<?php

								include('koneksi.php');

								$sql = "SELECT * FROM barang";

								$query = mysqli_query($koneksi, $sql) or die('gagal tampil');

								while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){

									echo '<tr>';
									echo '<td>' . $row["kode_barang"] . '</td>';
									echo '<td>' . $row["nama_barang"] . '</td>';								
									echo '<td>' . $row["harga"] . '</td>';
									echo '<td>' . $row["stok"] . '</td>';							
								

								?>
					    
					     
					      
					      <td>					      	
					      	<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#jual">
							  Jual
							</button>					      

					      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#beli">
							  Beli
							</button></td>
					    </tr>
					    <?php } ?>
					  </tbody>
				</table>

			</div>
		</div>
	</div>

<?php session_destroy(); ?>
<script type="text/javascript" src="asset/js/jquery.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>

<!-- Modal Tambah Barang -->
<form action="proses_tambahbarang.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php include('tambah_barang.php'); ?>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal Beli -->
<form action="proses_pembelian.php" method="post">
<div class="modal fade" id="beli" tabindex="-1" role="dialog" aria-labelledby="beli" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="beli">Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php include('beli.php'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal Jual -->

<form action="proses_penjualan.php" method="post">
<div class="modal fade" id="jual" tabindex="-1" role="dialog" aria-labelledby="jual" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php include('jual.php'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>

	
</body>

</html>

