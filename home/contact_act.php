<?php 
	include 'koneksi.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$result = mysqli_query($conn, "INSERT INTO cu VALUES(null,'$name','$email','$phone','$message')");
	if ($result) {
		echo "<script>alert(Terima Kasih Telah Menghubungi Kami);</script>";
		header('location:contact.php');
	}else{
		echo "<script>alert(Maaf Gagal Coba Cara Lain);</script>";
		header('location:contact.php');
	}


 ?>
