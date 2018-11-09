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
	<title>Warungku</title>
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<style type="text/css">
		th, td  {
			text-align: center;
		}

		td button{

		}
	</style>
</head>
<body>

	<div class="container" style="margin-top: 50px ">

		
		<div class="row">
			<div class="col-sm-1">
				<a href="index.php"><img src="logo.jpg" height="100" alt="Logo" class="rounded"></a>
			</div>
			<div class="col-sm-5" style="margin-bottom: 20px">
			<a href="index.php"><h1 class="m-5">Warungku</h1></a>
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
			 	
		<div class="row">
			
			<div class="col-sm-12 ">				
				<a href="report.php" class="btn btn-primary float-right" style="margin-bottom: 20px">Report Barang</a>
			</div>
		</div>
			 	
			<form action="" method="get" class="form">
		<div class="row">
			
			<div class="col-sm-3">
				<input type="text" name="search" placeholder="Masukan Nama Barang" class="form-control" required="">
			</div>
			<div class="col-sm-2">
				<button type="submit" class="btn btn-primary">Cari Barang</button>
			</div>
			
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
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<tr>
					  	<?php

					  			
					  			$sql = "";
								include('koneksi.php');

								if(isset($_GET['search'])){
									$cari = $_GET['search'];
									$sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$cari%'";

								} else{
									$sql = "SELECT * FROM barang";
								}


								$query = mysqli_query($koneksi, $sql) or die('gagal tampil');

								if(mysqli_num_rows($query) > 0){

								while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){

									echo '<tr>';
									echo '<td>' . $row["kode_barang"] . '</td>';
									echo '<td>' . $row["nama_barang"] . '</td>';								
									echo '<td>' . $row["harga"] . '</td>';
									echo '<td>' . $row["stok"] . '</td>';							
								

								?>

					      
					      <td>					      	
					      	<button type="button"  class="btn btn-primary" data-toggle="modal" data-nama="<?= $row['nama_barang'] ?>" data-id = "<?= $row['id'] ?>" data-target="#jual">
							  Jual
							</button>					      

					      <button type="button" class="btn btn-primary" data-toggle="modal" data-nama="<?= $row['nama_barang'] ?>" data-target="#beli">
							  Beli
							</button></td>

							<td>

							<button type="button"  class="btn btn-primary" data-toggle="modal" data-kode="<?= $row['kode_barang'] ?>"  data-nama="<?= $row['nama_barang'] ?>" data-id = "<?= $row['id'] ?>" data-harga="<?= $row['harga'] ?>" data-stok ="<?= $row['stok'] ?>" data-target="#read">
							  Read
							</button>

					      	<button type="button"  class="btn btn-dark" data-toggle="modal" data-kode="<?= $row['kode_barang'] ?>"  data-nama="<?= $row['nama_barang'] ?>" data-id = "<?= $row['id'] ?>" data-harga="<?= $row['harga'] ?>" data-stok ="<?= $row['stok'] ?>" data-id = "<?= $row['id'] ?>" data-target="#edit">
							  Edit
							</button>					      

					       <?php echo "<a class='btn btn-danger' href='delete-barang.php?id=$row[id]'>Delete</a>" ; ?>

					    </tr>
					    <?php } ?>

					    <?php } else {
					    	echo '<tr>';
					    	echo '<td colspan="5">';
					    	echo '<h2 align="center"
					    	>'. 'Barang Tidak Tersedia' . '</h2>';
					    	echo '</td>';
					    	echo '</tr>';
					    } ?>
					  </tbody>
				</table>

			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="index.php" style="margin: 50px 50%" class="btn btn-dark">Logout</a>
			</div>
		</div>
	</div>

<?php
	
	unset($_SESSION['sukses']); 
	unset($_SESSION['error']); 
?>

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



<script type="text/javascript">
	$('#jual').on('show.bs.modal', function(e) {
		let btn = $(e.relatedTarget);

		let nama = btn.data('nama');
		$('[name="nama_barang"]').val(nama);

		let id = btn.data('id');
		$('[name="id"]').val(id);
	});



		$('#beli').on('show.bs.modal', function(e) {
		let btn = $(e.relatedTarget);

		let nama = btn.data('nama');
		$('[name="nama_barang"]').val(nama);
	});
</script>


<div class="modal fade" id="read" tabindex="-1" role="dialog" aria-labelledby="read" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Kode Barang :<p id='kode_barang' class="kode_barang" style="display: inline; margin-left: 10px"> </p><br><br>
       Nama Barang :<p id='nama_barang' style="display: inline; margin-left: 10px"> </p><br><br>
       Harga :<p id="harga" style="display: inline; margin-left: 10px"></p><br><br>
       Stock :<p id="stok" style="display: inline; margin-left: 10px"></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
	

<form action="edit-barang.php" method="post">
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
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


	<script type="text/javascript">
		
		$('#read').on('show.bs.modal', function(e) {
		let btn = $(e.relatedTarget);

		 kode = btn.data('kode');		 		
	     $(' #kode_barang').html(kode);

	     nama = btn.data('nama');		 		
	     $(' #nama_barang').html(nama);

	     harga = btn.data('harga');		 		
	     $(' #harga').html(harga);

	     stok = btn.data('stok');		 		
	     $(' #stok').html(stok);

		
	});

		$('#edit').on('show.bs.modal', function(e) {
		let btn = $(e.relatedTarget);

		 let id = btn.data('id');		 		
		$('[name="id"]').val(id);

		 let kode = btn.data('kode');		 		
		$('[name="kode_barang"]').val(kode);

		let nama = btn.data('nama');		 		
		$('[name="nama_barang"]').val(nama);

		let harga = btn.data('harga');		 		
		$('[name="harga"]').val(harga);

		let stok = btn.data('stok');		 		
		$('[name="qty"]').val(stok);
		
	});



		function switch(){
		swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    swal("Poof! Your imaginary file has been deleted!", {
			      icon: "success",
			    });
			  } else {
			    swal("Your imaginary file is safe!");
			  }
			});
		}

	</script>

</body>

</html>

