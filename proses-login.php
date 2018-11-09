<?php
include('koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

// $result = mysqli_fetch_array($login);

// var_dump($result);

$cek = mysqli_num_rows($login);
 
if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";

	// echo "haloo";
	header("location:home.php");
}else{
	echo "<script>alert('anda harus login dulu')</script>";
	header("location:index.php");	
}
 
?>