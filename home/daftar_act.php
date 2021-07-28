<?php 
	include 'koneksi.php';

	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$nohp = $_POST['nohp'];
	$ttl= $_POST['ttl'];
	$alamat = $_POST['alamat'];
	$password = md5($_POST['password']);
	$level = 'orangtua';
	$status = 'validasi';
	$today = date("j F Y, g:i a");

	$resulttt = mysqli_query($conn, "INSERT INTO user VALUES(null,'$nama','$email','$nohp','$password',
		'$ttl','$alamat','$level','$today')");
	
	if ($resulttt == true) {
	 	header('location:login.php?daftar=sukses');
	 }else{
	 	header('location:login.php?daftar=gagal');
	 }


 ?>
