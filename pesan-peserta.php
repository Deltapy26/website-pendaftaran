<?php
include 'db.php';
session_start();
$id = $_GET['id'];
$peserta = mysqli_query($conn, "SELECT *,ts.status,tpp.nm_presale FROM tb_pendaftaran tp join tb_status ts on tp.status_ver = ts.id_status join tb_presale tpp on tpp.id_presale=tp.id_presale WHERE id_pendaftaran = '".$_GET['id']."'");
$p = mysqli_fetch_object($peserta);
$harga = mysqli_query($conn, "SELECT *,ts.status,tpp.nm_presale,tpp.price FROM tb_pendaftaran tp join tb_status ts on tp.status_ver = ts.id_status join tb_presale tpp on tpp.id_presale=tp.id_presale WHERE id_pendaftaran = '".$_GET['id']."'");
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.fonnte.com/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
'target' => ''.$p->no_tlpn.'||admin',
'message' => 
'-------- Pendaftaran GABUS 2023 -------- 

Hello '.$p->nm_peserta.'

Terimakasih telah mendaftar di TryOut GABUS 2023.

========== Account ==========

Username: '.$p->email.'
Password: *'.$p->id_pendaftaran.'*

Invoice: Rp'.$p->price.',-
Tiket  : '.$p->nm_presale.'

==============================
Silahkan untuk login peserta dengan link dibawah
http://gabus2023.my.id

Salam Hangat Dari Kami',

'delay' => '2', 
'countryCode' => '62', //optional7UJW3JQ+eI8LzxDRvukD
),
  CURLOPT_HTTPHEADER => array(
    'Authorization: 7UJW3JQ+eI8LzxDRvukD' //change TOKEN to your actual token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo '<script>window.location="page-succes.php?id='.$p->id_pendaftaran.'"</script>';
