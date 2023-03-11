<?php
	//Conexão com BD
	$ROOT = dirname(__FILE__);
	//Conexão com BD
	include $ROOT."/assets/php/connection.php";
	require $ROOT.'/assets/php/functions.php';

	if(!isset($_SESSION['user'])){
		header('Location: adm');
	}else{
		//Sistema de GET by ID
		$id = $_SESSION['user'];
		$sqlsp = "SELECT * FROM `usuarios` WHERE id='" . $id . "'";

		$sqlu = mysqli_query($conn_db_posts,$sqlsp);
		$usuario = mysqli_fetch_assoc($sqlu);

		$user_name=$usuario['nome'];
	}

?>
<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<title>ADMINISTRAÇÃO | CANAÃ JARDIM GUANABARA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name=”robots” content=”noindex,nofollow”>
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/favicon.png" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script src="https://cdnjs.com/libraries/izimodal"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

		<link rel="stylesheet" href="assets\css\vex.css"/>
		<link rel="stylesheet" href="assets\css\vex-theme-wireframe.css"/>
<style>img[alt="www.000webhost.com"] { display: none;}</style>
	</head>
	<body class="is-preload">
	<video class="BGV" autoplay muted loop playsinline id="BGVIDEO"><source src="assets/videos/BGVIDEO.mp4" type="video/mp4"></video>
		
					


		<div id="login_box">
		<center>
			<img id="login_logo2" src="images\logo_footer.png">
			<h2 style="margin-bottom: 0px;margin-top: 0px;">Bem vindo</h2>
			<h3 style="margin-top: 0px;"><?php echo$user_name; ?></h3>
		</center>

			<ul class="actions fit small">	
				<li><a href="createpost" class="button small"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;NOVA POSTAGEM</a></li>
			</ul>

			<ul class="actions fit small">
				<li><a href="postmanager" class="button small"><i class="fas fa-sort-amount-up-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;GERENCIAR POSTAGENS</a></li>
			</ul>

			<ul class="actions fit small">
				<li><a href="cultosmanager" class="button small"><i class="fas fa-pray"></i>&nbsp;&nbsp;&nbsp;&nbsp;GERENCIAR CULTOS</a></li>
			</ul>

			<ul class="actions fit small">
				<li><a href="adm?logout=true" class="button small"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;SAIR</a></li>
			</ul>
												
		</div>
								
							

				

				

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>