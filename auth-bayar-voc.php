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
		// date_default_timezone_set("Asia/Bangkok");
		// $dt = date("H:i:s");

		$dir = "berkas/";
		$tmp_file = $_FILES['nmFile']['tmp_name'];
		$file_name = $_FILES['nmFile']['name'];

		$getMaxId =  mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 3)) AS id FROM tb_pembayaran");
		$d = mysqli_fetch_object($getMaxId);

		
		$generateId = $b->id_teller .date('Y').sprintf("%03s", $d->id + 1);
		$insert = mysqli_query($conn, "INSERT INTO tb_pembayaran VALUES (
				'".$_POST['tell']."',
				NOW(),
				'".$_POST['daftar']."',
				'".$_POST['pem']."',
				'".$generateId ."',
				0,'".$file_name."')");
		// $file = mysqli_query($conn, "INSERT INTO dokumen VALUES (
		// 	,'".$file_name."'
		// 	0,
		// 	'".$file_name."',
		// 	'".$p->id_pendaftaran."')");
		$upp = move_uploaded_file($tmp_file, $dir.$file_name);

		if($insert){
			if($upp){
				mysqli_query($conn, "UPDATE tb_pendaftaran SET status_ver = 2 WHERE id_pendaftaran = '".$id."'");
				echo '<script>alert("Pembayaran Sukses !")</script>';
				echo '<script>window.location="auth-sdh-bayar.php?peserta='.$p->id_pendaftaran.'"</script>';
			}else{
				echo '<script>alert("Pembayaran error, File terlalu besar harap tidak melebihi 2MB")</script>';
			}
		}else{
			mysqli_error_list($conn);
			echo '<script>alert("Pembayaran gagal pastikan jaringan anda stabil, Hubungi Admin")</script>';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="css/button.css">
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
		<ul>
			<li><a href="auth.php?peserta=<?php echo $id ?>" onclick="return false" class="pilih">Beranda</a></li>
			<li><a href="auth-bayar.php?peserta=<?php echo $id ?>"class="pilih">Pembayaran</a></li>
			<li><a href="" onclick="return confirm('Harap melakukan pembayaran terlebih dahulu')" class="pilih">Cetak Bukti</a></li>
			<li><a href="exit.php"class="exit">Keluar</a></li>
		</ul>
	</header>
	<section class="content">
			<h2>Konfirmasi Pembayaran</h2>
			<div class="box">
				<br>
				<h2 align="center">Tagihan anda sebesar Rp<?php echo number_format($b->price-4000); ?>.-</h2>
				<h4 align="center">Pastikan anda sudah membayar sebelum melakukan konfirmasi pembayaran</h4><br>
				<center><h5>Status Voucher Anda <a class="det" href="" onclick="return false">Terpakai</a></h5></center>
				<br>
			</div>
		<form action="" method="POST" enctype="multipart/form-data">
		<div class="box">
		<h4>*List Merchant</h4>
		 <p>1. Shoppepay (085713532502) 
			a.n auliacahayaramadhani <br>
			2. DANA (085713532502)
			a.n Aulia Cahaya Ramadhani<br>
			3. BNI (1438905926)
			a.n sdri Aulia Cahaya Ramadhani<br>
			4. BRI : 688301023479537 a.n Mutiara Shonata<br>
			5. BCA : 0770846439 a.n Marcella Bertha <br>
			6. OVO : 082329517488 an Sagita Nur Fitriana<br>
<br>
			CP : 085713532502 (Aulia Cahaya)<br><br>
				
			</p>
			<table class="table-form">
				<tr>
					<td>No Pendaftaran</td>
					<td>:</td>
					<td>
						<input type="text" name="daftar" class="input-control" readonly value="<?php echo $p->id_pendaftaran ?>">
					</td>
				</tr>
				<tr>
					<td>Metode Pembayaran</td>
					<td>:</td>
					<td>
						<select class="input-control" name="pem" required>
							<option value="">--Pilih--</option>
							<option value="1">COD</option>
							<option value="2">Transfer BRI</option>
							<option value="3">Transfer BNI</option>
							<option value="4">Transfer BCA</option>
							<option value="5">ShoppePay</option>
							<option value="6">DANA</option>
							<option value="7">OVO</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Nama Penerima</td>
					<td>:</td>
					<td>
						<select class="input-control" name="tell" required>
							<option value="">--Pilih--</option>
							<option value="1">Aulia Cahaya</option>
							<option value="2">Marcella Bertha</option>
							<option value="3">Mutiara Shonata</option>
							<option value="4">Sagita Nur</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Bukti Pembayaran</td>
					<td>:</td>
					<td>
						<h6>[MAX FILE SIZE = 2MB]</h6>
						<input type="file" name="nmFile" class="input-control"/>
					</td>
				</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<br>
							<input type="submit" name="buyy" value="Konfirmasi" class="btn-login">
						</td>
					</tr>
			</table>
		</div>
	</form>
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