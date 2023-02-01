<?php 
	include 'db.php';
	session_start();
	$id = $_GET['peserta'];
	if($_SESSION['status-bayar'] != true ){
		echo '<script>alert("Silahkan Bayar dahulu")</script>';
		echo '<script>window.location="auth-sdh-bayar.php?peserta='.$id.'"</script>';
		}
	$peserta = mysqli_query($conn, "SELECT *,tr.nm_ruang ruang FROM tb_pendaftaran tp join tb_ruang tr on tr.id_ruang=tp.id_ruang WHERE id_pendaftaran = '".$id."' ");
	$p = mysqli_fetch_object($peserta);
	$status = mysqli_query($conn, "SELECT ts.status  FROM tb_pendaftaran tp join tb_status ts 
	on tp.status_ver = ts.id_status WHERE id_pendaftaran = '".$id."' ");
	$s = mysqli_fetch_object($status);

	$pre = mysqli_query($conn, "SELECT ts.nm_presale  FROM tb_pendaftaran tp join tb_presale ts 
	on tp.id_presale = ts.id_presale WHERE id_pendaftaran = '".$id."' ");
	$pr = mysqli_fetch_object($pre);

	$tok = mysqli_query($conn, "SELECT ts.token FROM tb_pendaftaran tp join tb_token ts 
	on tp.id_pendaftaran = ts.id_pendaftaran WHERE id_pendaftaran = '".$id."' ");
	$t = mysqli_fetch_object($tok);

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukti Pendaftaran Gabus 2023</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/img.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script>
		 window.print();
	</script>
</head>
<body>
	
	<header><img class="myimage-1"src="img/genius.png" alt="my-genius">
		<img class="myimage"src="img/gabus.png" alt="my-gabus">
		<small class="myimage-1">SupportBy</small></header>
	
		<center><img class="myimage-2"src="img/primagama.png" alt="my-primagama "></center>
	<h2>Bukti Pendaftaran</h2>

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
		<tr>
			<td>Token</td>
			<td>:</td>
			<td><?php echo $t->token ?></td>
		</tr><br><br><br>
	</table>
	<footer>
		
	</footer>
</body>
	
</html>