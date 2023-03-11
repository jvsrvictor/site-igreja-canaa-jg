<?php
	//Conexão com BD
	$ROOT = dirname(__FILE__);
	//Sistema de emails
	include $ROOT."/assets/php/contato.php";

?>
<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php
	setcookie('cookie2', 'value2', ['samesite' => 'None', 'secure' => true]);
?>

<html>
	<head>
	<title>MENSAGENS  | CANAÃ JARDIM GUANABARA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?v=1" />
		<link rel="icon" href="images/favicon.png" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

	</head>
	<body class="is-preload">
	<video class="BGV" autoplay muted loop playsinline id="BGVIDEO"><source src="assets/videos/BGVIDEO.mp4" type="video/mp4"></video>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="https://canaajdguanabara.ga/" class="logo"><img id="logoimg" src="images\logo_main.png"></a>
						<style>img[alt="www.000webhost.com"] { display: none;}</style>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="https://canaajdguanabara.ga/">INÍCIO</a></li>
							<li><a href="ministerio">MINISTÉRIO</a></li>
							<li><a href="programacao">PROGRAMAÇÃO</a></li>
							<li class="active"><a href="mensagens">MENSAGENS</a></li>
							<!-- <li><a href="participe">PARTICIPE</a></li> -->
							<li><a href="discipulado">DISCIPULADO</a></li>
							<li><a href="contribuir">CONTRIBUIR</a></li>
						</ul>
						<ul class="icons">
							<li><a target="_blank" href="https:\\www.youtube.com/canaajdguanabara" class="icon brands fa-youtube"><span class="label">Youtube</span></a></li>
							<li><a target="_blank" href="https:\\www.instagram.com/canaajdguanabara" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a target="_blank" href="https:\\www.facebook.com/canaajdguanabara" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>							
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>MENSAGENS</h1>
									<h3>Assista a últimas mensagens transmitidas<br>
									no nosso canal oficial no youtube</h3>
									


								</header>
								<section style="display: flex; flex-wrap: wrap;	box-sizing: border-box;	align-items: stretch;" id="results">
									<script src="assets\js\fetchYoutubeVideos.js?v=1"></script>
								</section>
								<div  style="display: flex; flex-wrap: wrap;	box-sizing: border-box;	align-items: stretch;">
								<button class="button primary fit" type="button" id="prevPage" onclick="previousPage()"><i class="fas fa-chevron-left"></i>   ANTERIOR</button>
								<button class="button primary fit" type="button" id="nextPage" onclick="nextPage()">PRÓXIMO   <i class="fas fa-chevron-right"></i></button></div>
								
								
								

					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							<form method="post">
								<div class="fields">
									<div class="field">
										<label for="name">NOME</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field">
										<label for="email">EMAIL</label>
										<input type="text" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">MENSAGEM</label>
										<textarea name="message" id="message" rows="3"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="MANDAR MENSAGEM" name="mensagem_contato" /></li>
								</ul>
							</form>
						</section>
						<section class="split contact">
							<section class="alt">
								<img id="logo_footer" src="images\logo_footer.png">
							</section>
							<section>
								<h3>ENDEREÇO</h3>
								<p>Av. Godolfredo Pimentel, 12 Quintino Cunha<br>
									Fortaleza - CE, 60351-060
								</p>
							</section>
							
							<section>
								<h3>MÍDIAS SOCIAIS</h3>
								<ul class="icons alt">
									<li><a target="_blank" href="https:\\www.youtube.com/canaajdguanabara" class="icon brands alt fa-youtube"><span class="label">Youtube</span></a></li>
									<li><a target="_blank" href="https:\\www.instagram.com/canaajdguanabara" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a target="_blank" href="https:\\www.facebook.com/canaajdguanabara" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
								</ul>
							</section>
						</section>
					</footer>

				

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