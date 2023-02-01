	<?php 
	include 'db.php';
	session_start();
	//session_destroy();
	$id = $_GET['peserta'];
	// if($_SESSION['status-login-peserta'] != true){
	// 		echo '<script>window.location="auth-login.php"</script>';
	// 	}
	// $id = $_GET['peserta'];
	$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '".$_GET['peserta']."'");
	$p = mysqli_fetch_object($peserta);
	$getMaxB =  mysqli_query($conn, "SELECT *,tp.price FROM tb_pendaftaran tpb join tb_presale tp on tp.id_presale=tpb.id_presale WHERE id_pendaftaran = '".$id."'");
		$b = mysqli_fetch_object($getMaxB);
	

	if(isset($_POST['buyy'])){

		$voc = $_POST['voc'];
					if($voc != NULL){
						echo '<script>window.location="check.php?voc='.$voc.'&peserta='.$id.'"</script>';
					}else{
						echo '<script>alert("Gagal Pengecekan Harap Diisi Dengan Benar,Harap Hubungi Admin")</script>';
						echo '<script>window.location="auth-voc.php?peserta='.$p->id_pendaftaran.'"</script>';
					}
			// }else{
			// 	echo '<script>alert("Pembayaran error, File terlalu besar harap tidak melebihi 2MB")</script>';
			// }
		}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Konfirmasi Voucher</title>
	<link rel="stylesheet" type="text/css" href="css/style4.css">
	<link rel="stylesheet" type="text/css" href="css/ahihih.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<img class="myimage-1"src="img/genius.png" alt="my-genius">
		<img class="myimage"src="img/gabus.png" alt="my-gabus">
		<small class="myimage-1">SupportBy</small>
		<h1>Gabus 2023</h1>
	</header>
	<section class="main-login">
			<div class="box-login">
			<form action="" method="post">

				<div class="box">
					<h2>Konfirmasi Voucher</h2>
					<table>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input type="text" placeholder="Kode Voucher" name="voc" class="input-control" required>
							</td>
						</tr>
						<tr>
							<br>
							<td></td>
							<td></td>
							<td>
								<input align="center" type="submit" name="buyy" value="Cek Voucher" class="btn-login">
							</td>
						</tr>
					</table>
				</div>
			</form>
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