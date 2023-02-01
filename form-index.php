 <?php 
	include 'db.php';
	session_start();
	$t = date("d");
	$jml_pes = mysqli_query($conn, "SELECT COUNT(tp.id_pendaftaran) pes  FROM tb_pendaftaran tp ");
		$p = mysqli_fetch_object($jml_pes);

	$cek = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE email = '".htmlspecialchars($_POST['email'])."'");

	if($t >= date("25")){
		echo'<script>alert("Pendaftaran Sudah ditutup, Sampai Jumpa di Gabus Selanjutnya, untuk informasi selanjutnya, Admin : wa.me/6285876204872 ")</script>';
		echo '<script>window.location="index.php"</script>';
	}else{
		if ($p->pes >= 349) {
			echo'<script>alert("Pendaftaran Presale 3 sudah penuh ,harap hubungi admin untuk informasi selanjutnya, Admin : wa.me/6285876204872 ")</script>';
			echo '<script>window.location="pesan-ku.php"</script>';
		}
	}
	if(isset($_POST['submit'])){

		if(mysqli_num_rows($cek) > 0){
			echo'<script>alert("Anda sudah pernah mendaftar, Hubungi Admin Gabus untuk informasi lebih lanjut, Admin : wa.me/6285876204872 ")</script>';
		}else{

			$rg = $p->pes;
			switch ($rg) {
				case $rg+1 <= 30: //start 62
					$id_ruang=1;
					break;
				case $rg+1 <= 60:
					$id_ruang=2;
					break;
				case $rg+1 <= 90:
					$id_ruang=3;
					break;
				case $rg+1 <= 120:
					$id_ruang=4;
					break;
				case $rg+1 <= 150:
					$id_ruang=5;
					break;
				case $rg+1 <= 180:
					$id_ruang=6;
					break;
				case $rg+1 <= 210:
					$id_ruang=7;
					break;
				case $rg+1 <= 240:
					$id_ruang=8;
					break;
				case $rg+1 <= 270:
					$id_ruang=9;
					break;
				case $rg+1 <= 300:
					$id_ruang=10;
					break;
				case $rg+1 <= 330:
					$id_ruang=11;
					break;	
				default:
					$id_ruang=0;
					break;
			}
			

			date_default_timezone_set("Asia/Bangkok");
			$dt = date("d M Y / H:i:s");

			$_SESSION['status-daftar'] = true;
			$getMaxId =  mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 4)) AS id FROM tb_pendaftaran");
			$d = mysqli_fetch_object($getMaxId);
			$generate = 'TOGAB'.date('Y').sprintf("%04s",$d->id + 1);

			$insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES (
					'".$generate."',
					'".$dt."',
					'".$_POST['email']."',
					'".$_POST['tlpn']."',
					'".$_POST['nm']."',
					'".$_POST['asal-skh']."',
					'".$_POST['almt']."',
					0,
					'".$_POST['pilihan1']."',
					'".$_POST['jp']."',
					'".$_POST['pilihan2']."',
					1,'".$id_ruang."')");
			
			if($insert){
				//echo 'Jaringan ke DB gagal cuyyy';
				//echo'<script>alert("Data Berhasil Disimpan")</script>';
				$_SESSION['status-daftar'] != true;
				echo '<script>window.location="pesan-peserta.php?id='.$generate.'"</script>';
			}else{
				echo 'Jaringan ke DB gagal cuyyy' . mysql_error($conn);
			}
		}

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Gabus GENIUS 2023</title>
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/style4.css">
	<link rel="stylesheet" type="text/css" href="css/button.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<section class="box-formulir">
		<h2>Formulir Pendaftaran Peserta Tryout SNBT GABUS 2023</h2>
		<form action="" method="POST">
		<div class="box">
			<table class="table-form">
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>
						<input type="email" placeholder="example@gmail.com" name="email" class="input-control" required>
					</td>
				</tr>
				<tr>
					<td>No Whatsapp</td>
					<td>:</td>
					<td>
						<input type="text" placeholder="08xxxxxxxxxx" minlength="11" maxlength="13" name="tlpn" class="input-control" title="Jangan Menggunakan +62xxx" required>
					</td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>
						<input type="text" placeholder="Budi Setiawan" name="nm" class="input-control" required>
					</td>
				</tr>
				<tr>
					<td>Asal Sekolah</td>
					<td>:</td>
					<td>
						<input type="text" placeholder="SMAN 1 Sragen" name="asal-skh"  pattern="S?MA?K?N?.+" title="Harus MAN, SMA, SMK, SMAN atau SMKN" class="input-control" required>
					</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>
						<textarea class="input-control" placeholder="Desa Bahagia RT 02 RW 01, Sepat, Mojo, Sragen" name="almt" required></textarea>
					</td>
				</tr>
				<tr>
					<td>Pilihan 1</td>
					<td>:</td>
					<td>
						<input type="text" placeholder="S1 Kedokteran - UGM" name="pilihan1" class="input-control" required>
					</td>
				</tr>
				<tr>
					<td>Pilihan 2</td>
					<td>:</td>
					<td>
						<input type="text" placeholder="S1 Informatika - UNS" name="pilihan2" class="input-control" required>
					</td>
				</tr>
				<tr>
					<td>Jenis Pembayaran</td>
					<td>:</td>
					<td>
						<form action="" method="POST">
							<input type="radio" id="prs1" name="jp" value="1" onclick="return false">
							<label for="prs1"><s>Presale 1</s></label>
							<input type="radio" id="prs2" name="jp" value="2" onclick="return false">
							<label for="prs2"><s>Presale 2</s></label> 
							<input type="radio" id="prs3" name="jp" value="3" required>
							<label for="prs3">Presale 3</label>
						</form> 
						<script type="text/javascript">
							
							<?php echo '<script>alert("Data Berhasil Disimpan")</script>'?>
						</script>
												
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<br>
						<input type="submit" name="submit" onclick="return confirm('Pastikan Datamu Diisi Dengan Benar')" value="Daftar Sekarang" class="btn">
					</td>
				</tr>
			</table>
			<center><h5>Sudah Punya Akun<a href="index.php"> Lanjut Login</a></h5></center>
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