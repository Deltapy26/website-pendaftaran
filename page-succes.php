<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status-daftar'] != true){
		echo '<script>window.location="auth-login.php"</script>';
	}
	$id = $_GET['id'];
	$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '".$_GET['id']."'");
	$p = mysqli_fetch_object($peserta);
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gabus GENIUS 2023</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<section class="box-formulir">
		<h2>Pendaftaran Peserta Berhasil !</h2>
			<div class="box">
			<br>
			<!-- <small>*harap simpan data ini dengan baik baik!</small> -->
			<!-- <h4> Usernama Anda : <?php echo $p->email?> </h4>
			<h4> Password Anda  : <?php echo $id?> </h4><br> -->
			<a href="auth-login.php" class="btn-cetak"> Lanjut Login</a>
			
			<!-- <a href="auth-login.php" class="btn-kembali">Lanjut Login</a> -->
			<p><br>*Harap Login untuk mencetak bukti pendaftaran karena untuk 
			melakukan registrasi ulang pada saat berlangsungnya TryOut GABUS 2023</p>
			<br><br><br><br>
			<!-- <p>Setelah mendaftar harap untuk bergabung pada grup Peserta TryOut GABUS 2023 !!</p> 
			<a href="https://api.whatsapp.com/send/?phone=085742770972&text&type=phone_number&app_absent=0" class="btn-grup" target="_blank" >Gabung</a> -->
		</div>
	</section>
	<link rel="stylesheet" type="text/css" href="css/img.css">
	<center><img class="myimage-2"src="img/primagama.png" alt="my-primagama "></center>
	<footer>
		<div class="container">
			<small>Copright &copy; 2023 - Gabus Genius 2023.</small>
		</div>
	</footer>

</body>
</html>