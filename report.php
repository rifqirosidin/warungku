	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	</head>
	<body>
			<h1 align="center">Report Barang</h1>

			<div class="container">
				
				<div class="row">
				<div class="col-sm-1">
					<a href="index.php"><img src="logo.jpg" height="100" alt="Logo" class="rounded"></a>
				</div>
				<div class="col-sm-5" style="margin-bottom: 20px">
				<a href="index.php"><h1 class="m-5">Warungku</h1></a>
			</div>
			</div>
			
				<form action="generate_pdf.php" method="post">
				<div class="row">
					
				<div class="col-sm-12">				
					<button type="submit" class="btn btn-primary float-right" style="margin-bottom: 10px">Download PDF</button>			
				</div>
				
				</div>
					</form>
			<form action="" method="get">
			<div class="row">

				<div class="col-sm-3">
					<input type="date" name="search" class="form-control" required="">
				</div>
				
				<div class="col-sm-2">
					<button type="submit" class="btn btn-primary col">Cari</button>
				</div>
						
				
				</div>
				</form>	

				



			
				<div class="row" style="margin-top: 20px">
				<div class="col">
					<table class="table table-hover">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="">Tanggal</th>
						      <th scope="col">Jenis Transaksi</th>
						      <th scope="col">kode barang</th>					      
						      <th scope="col">Nama Barang</th>
						      <th scope="col">QTY</th>
						      <th scope="col">Harga</th>
						      <th scope="col">Total</th>
						      <th scope="col">Aksi</th>
						    </tr>
						  </thead>
						  <tbody>

						  <?php
						  	$sql = "";
									include('koneksi.php');

									if(isset($_GET['search'])){
										$cari = $_GET['search'];
										

										$sql = "SELECT * FROM report WHERE tanggal LIKE '%$cari%'";

									} else{
										$sql = "SELECT * FROM report";
									}


									$query = mysqli_query($koneksi, $sql) or die('gagal tampil');

									if(mysqli_num_rows($query) > 0){

									while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){

										echo '<tr>';
										echo '<td>' . $row["tanggal"] . '</td>';
										echo '<td>' . $row["jenis_transaksi"] . '</td>';
										echo '<td>' . $row["kode_barang"] . '</td>';
										echo '<td>' . $row["nama_barang"] . '</td>';
										echo '<td>' . $row["qty"] . '</td>';								
										echo '<td>' . $row["harga"] . '</td>';
										echo '<td>' . $row["total"] . '</td>';							
										

										?>
										<td>					      	
						      	<button type="button"  class="btn btn-primary" data-toggle="modal" name="edit">
								  Edit
								</button>					      

						      <button type="button" class="btn btn-primary" name="delete">
								  Delete
								</button></td>

								<?php	}
								} else {
									echo '</td>'. 'Data Tidak Ada' . '</td>';
								}
								echo '<tr>';
							?>

						</tbody>
						  
						  </tbody>
					</table>


				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p class="text-right">Jumlah: </p> 
				</div>
			</div>
			</div>
			
			

	<script type="text/javascript" src="asset/js/jquery.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	</body>


	</html>