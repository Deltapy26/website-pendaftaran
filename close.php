 <?php 
	include 'db.php';
	session_destroy();
	session_start();
		if(isset($_POST['masuk'])){

					echo '<script>window.location="auth-login.php"</script>';
			
		}
	
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta   name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
	<title>login Peserta GABUS 2023</title>
	<link rel="icon" type="image/x-icon" href="img/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<style type="text/css">
		
		.container{
			color: #fff;
			background-color: #78390e;
			text-align: center;
			align-items: center;
			width: 100%;
			left: 0;
		   bottom: 0;
			position: fixed;
			background-size: cover;
		}
		.main-login{
			height: 100vh;
			justify-content: center;
			align-items: center;
		}
		.btn-login{
			padding: 5px 20px;
			background-color: #c70039;
			color: #fff;
			border: none;
			font-size: 16px;
		}
		.btn-login:hover{
			cursor: pointer;
			background-color: #900c3f;
		}
		.box-login{
			width: auto;
			text-align: center;
			align-items: center;
			padding: 30vh 0 0 0;
			color: #fff;
		}
		.hero-image {
		  /*background-image: url("https://i.ibb.co/2qCqCcw/IMG-1343.jpg");*/
		  background-image: url("https://i.ibb.co/Y31TfYG/IMG-5414.jpg");
		  background-color: black;
		  height: 100%;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
		  position: relative;
		  opacity: 0.7;
		   filter: grayscale(70%);
		   margin: 0;
		}
		body{
			background-image: url();
		}
		@media screen and (max-width: 650px) {
	  body, .container {
	    width: 100%;
	    background-size: auto; /* The width is 100%, when the viewport is 800px or smaller */
	  }
	  .content-table{
			width: 90%;
			padding: 10px;
			box-sizing: border-box;
			margin: 50px auto;
			}

		.table-data-adm{
			width: 100%;
			border-collapse: collapse;
			background-color: #fff;
			
		}
		.table-data-adm tr{
			height: 30px;
			text-align: center;


		}
		.table-data-adm tr td{
			background-color: #fff;
			padding: 5px 10px;
			text-align: LEFT;

		}
		.table-data-adm tr td:nth-child(1){
			text-align: center;
		}
		.box{
			background-color: #fff;
			padding: 10px;
			box-sizing: border-box;
			margin: 5px 0px 25px;
		}

	  @media screen and (max-width: 650px) {
	 .container {
	    padding: 10px;

	    font-size: 80%;
	  }
	  
	</style>
</head>
<body >
	
	<section class="main-login">
<div class="hero-image">
		<div class="box-login">
			<h1 style=" font-size:30px">Pendaftaran Sudah Ditutup</h1>

			<form action="" method="POST">
				<input type="submit" name="masuk" value="Masuk" class="btn-login">
			</form>
		
		</div>
	</div>
	
	</section>
	<footer>
		<div class="container">
			<small>Copright &copy; 2023 - Gabus Genius 2023.</small>
		</div>
	</footer>
</body>
</html> 