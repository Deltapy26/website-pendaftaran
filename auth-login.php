<?php 
	include 'db.php';
	session_destroy();
	session_start();
		if(isset($_POST['masuk'])){

			$cek = mysqli_query($conn, "SELECT * FROM tb_pendaftaran 
				WHERE email = '".htmlspecialchars($_POST['user'])."' AND id_pendaftaran = '".htmlspecialchars($_POST['pass'])."' ");
			$cek1= mysqli_query($conn, "SELECT * FROM tb_pendaftaran 
				WHERE status_ver = 2");
			

			if(mysqli_num_rows($cek) > 0){
				$a = mysqli_fetch_object($cek);
				if($a->status_ver == 1){
					$_SESSION['status-login-peserta'] = true;
					$_SESSION['id_pendaftaran'] = $a->id_pendaftaran;
					$_SESSION['nama']= $a->nm_peserta;
					echo '<script>window.location="auth.php?peserta='.$a->id_pendaftaran.'"</script>';
				}elseif ($a->status_ver == 3) {
					$_SESSION['id_pendaftaran'] = $a->id_pendaftaran;
					$_SESSION['nama']= $a->nm_peserta;
					echo '<script>window.location="auth-bayar-voc.php?peserta='.$a->id_pendaftaran.'"</script>';
				}
				else{
					echo '<script>window.location="auth-sdh-bayar.php?peserta='.$a->id_pendaftaran.'"</script>';
				}
			}else{
				echo '<script>alert("user atau pass salah")</script>';
				echo '<script>window.location="index.php"</script>';
			}
			
		}
	
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>login Peserta GABUS 2023</title>
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/style4.css">

	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<section class="main-login">

		<div class="box-login">
			<h2>Login Peserta</h2>
			
			<form action="" method="post">
				<div class="box">
					<table>
						<small>*Gunakan Email dan No Pendaftaran sebagai password</small>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td>
								<input type="text" placeholder="Username" name="user" class="input-control" required>
							</td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td>
								<input type="password" placeholder="Your Password" name="pass" class="input-control" required>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<br>
								<input type="submit" name="masuk" value="Login" class="btn-login">
								<a href="index.php" class="btn-cetak">Beranda</a>
							</td>
						</tr>
						
						
					</table>

				</div>
			</form>
			<!-- <center><h5>Tutorial Pendaftaran <a target="_blank" href="tutorial/GABUS.pdf">Klik Disini</a> Untuk Info Lebih Lanjut</h5></center> -->
		</div>

	</section>
	<footer>
		<div class="container">
			<small>Copright &copy; 2023 - Gabus Genius 2023.</small>
		</div>
	</footer>
</body>
</html> 