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
<html>
	<head>
		<title>MINISTÉRIO | CANAÃ JARDIM GUANABARA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/favicon.png" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style>img[alt="www.000webhost.com"] { display: none;}</style>
	</head>
	<body class="is-preload">
	<video class="BGV" autoplay muted loop playsinline id="BGVIDEO"><source src="assets/videos/BGVIDEO.mp4" type="video/mp4"></video>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="https://canaajdguanabara.ga/" class="logo"><img id="logoimg" src="images\logo_main.png"></a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="https://canaajdguanabara.ga/">INÍCIO</a></li>
							<li class="active"><a href="ministerio">MINISTÉRIO</a></li>
							<li><a href="programacao">PROGRAMAÇÃO</a></li>
							<li><a href="mensagens">MENSAGENS</a></li>
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
									<h1>Uma promessa de Deus</h1>
									<br>
									<p>Fundado em 14 de Fevereiro de 2000, pelo o Pastor Jecer Goes, o Ministério Canaã possui congregações espalhadas em todo o Ceará.</p>
									<br>
									<h3>Ministério Canaã - Sede Nacional</h3>
									<img style="width: 60%; margin-left: auto; margin-right: auto; border: 2px #cecece solid;" src="images\mins\sede.png">
									<h5><a target="_blank" href="https://goo.gl/maps/RrAiT5hhnHKY3SG87"><i class="fas fa-map-marker-alt"></i>   Av. Dr. Silas Munguba, 5454<br>Passaré, Fortaleza - CE, 60741-575</a></h5>
									<br><br>
									<h3>Ministério Canaã - Congregação Jardim Guanabara</h3>
									<img style="width: 60%; margin-left: auto; margin-right: auto; border: 2px #cecece solid;" src="images\mins\cjg.png">
									<h5><a target="_blank" href="https://goo.gl/maps/mJ2iwYfw2PmnsrJR7"><i class="fas fa-map-marker-alt"></i>   Av. Godolfredo Pimentel, 12<br>Quintino Cunha, Fortaleza - CE, 60351-060</a></h5>

								
								

							</section>

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