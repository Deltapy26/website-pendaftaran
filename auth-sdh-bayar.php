<?php 
	include 'db.php';
	session_start();
	$id = $_GET['peserta'];
	// if($_SESSION['status-login-peserta'] != true){
	// 		echo '<script>window.location="auth-login.php"</script>';
	// 	}
	$_SESSION['status-bayar']=true;
	$peserta = mysqli_query($conn, "SELECT *,tr.nm_ruang ruang FROM tb_pendaftaran tp join tb_ruang tr on tr.id_ruang=tp.id_ruang WHERE id_pendaftaran = '".$id."' ");
	$status = mysqli_query($conn, "SELECT ts.status  FROM tb_pendaftaran tp join tb_status ts 
	on tp.status_ver = ts.id_status WHERE id_pendaftaran = '".$id."' ");
	$s = mysqli_fetch_object($status);
	$p = mysqli_fetch_object($peserta);

	$pre = mysqli_query($conn, "SELECT ts.nm_presale  FROM tb_pendaftaran tp join tb_presale ts 
	on tp.id_presale = ts.id_presale WHERE id_pendaftaran = '".$id."' ");
	$pr = mysqli_fetch_object($pre);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
	<title>GABUS 2023</title>
	<link rel="stylesheet" type="text/css" href="css/ahihih.css">	
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="auth">
	<header>

		<img class="myimage-1"src="img/genius.png" alt="my-genius">
		<img class="myimage"src="img/gabus.png" alt="my-gabus">
		<small class="myimage-1">SupportBy</small>
		<h1>Gabus 2023</h1>
		<ul>
			<li><a href="auth-sdh-bayar.php?peserta=<?php echo $id ?>" class="pilih">Beranda</a></li>
			<li><a href="cetak-bukti-peserta.php?peserta=<?php echo $id?>" target="_blank" class="pilih">Cetak Bukti</a></li>
			<!-- <li><a href="" target="_blank" onclick="return confirm('Cetak Bukti Pendaftaran Akan Dibuka H-5 Sebelum Acara Tryout')" class="pilih">Cetak Bukti</a></li> -->
			<li><a href="exit.php"class="exit">Keluar</a></li>
			
		</ul>
	</header>
	<section class="content">
		<img class="myimage-msk"src="img/maskot-1.png" alt="my-maskot">
		<h2>Haii... <?php echo $p->nm_peserta ?></h2>
		<div class="box">
			<h3>Selamat Datang di Dashboard Peserta Gabus.</h3>
			<p><br>*Harap Menunggu Info selanjutnya ,nanti akan diinfokan melalui Grup GABUS ,Dimohon untuk gabung grub</p>
			<a href="https://chat.whatsapp.com/FsiJfb0thFpDjQfTHcYSBn" class="btn-grup" target="_blank" >Gabung Grup</a>
			
		</div>
		<h2>Data Peserta</h2>
		<div class="box">
			<table class="table-bukti">
				<tr>
					<td>Kode Pendaftaran</td>
					<td>:</td>
					<td><?php echo $p->id_pendaftaran ?></td>
				</tr>
				<tr>
					<td>Tanggal Pendaftaran</td>
					<td>:</td>
					<td><?php echo $p->tgl_daftar ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $p->email ?></td>
				</tr>
				<tr>
					<td>No Handphone</td>
					<td>:</td>
					<td><?php echo $p->no_tlpn ?></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td><?php echo $p->nm_peserta ?></td>
				</tr>
				<tr>
					<td>Asal Sekolah</td>
					<td>:</td>
					<td><?php echo $p->asal_sklh ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $p->almt_peserta ?></td>
				</tr>
				<tr>
					<td>Ruang Ujian</td>
					<td>:</td>
					<td><?php echo $p->ruang ?></td>
				</tr>
				<tr>
					<td>Pilihan 1</td>
					<td>:</td>
					<td><?php echo $p->pil1 ?></td>
				</tr>
				<tr>
					<td>Pilihan 2</td>
					<td>:</td>
					<td><?php echo $p->pil2 ?></td>
				</tr>
				<tr>
					<td>Presale</td>
					<td>:</td>
					<td><?php echo $pr->nm_presale ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td class="status-sdh"><?php echo $s->status ?></td>
				</tr>
		</table>
		<!-- <form action="" method="POST">
			<input type="submit" name="rubah" value="Ubah" class="btn-login">
			 <input type="submit" name="simpan" value="Simpan" class="btn-cetak">
		</form> -->
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