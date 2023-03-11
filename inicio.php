<?php
	//Conexão com BD
	$ROOT = dirname(__FILE__);
	//Conexão com BD
	include $ROOT."/assets/php/connection.php";
	//Sistema de emails
	include $ROOT."/assets/php/contato.php";

	//Sistema de datas em português
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>CANAÃ JARDIM GUANABARA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/favicon.png" />
		<noscript><link rel="stylesheet" href="images\logo_main.png" /></noscript>
		<style>img[alt="www.000webhost.com"] { display: none;}</style>
	</head>
	<body class="is-preload">
	<video class="BGV" autoplay muted loop playsinline id="BGVIDEO"><source src="assets/videos/BGVIDEO.mp4" type="video/mp4"></video>

		
		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
						<h1>BEM-VINDO</h1>

						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="https://canaajdguanabara.ga/" class="logo"><img id="logoimg" src="images\logo_main.png"></a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li class="active"><a href="https://canaajdguanabara.ga/">INÍCIO</a></li>
							<li><a href="ministerio">MINISTÉRIO</a></li>
							<li><a href="programacao">PROGRAMAÇÃO</a></li>
							<li><a href="mensagens">MENSAGENS</a></li>
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
						<ul class="actions fit small" style="padding: 32px; margin: auto; width: 100%;">
							<li>
								<input type="text" name="pesquisa" id="pesquisa" value="" placeholder="PESQUISAR">
							</li>
						</ul>
						<div id="post_container" style="padding:0px;"></div>

						<ul class="actions" style="padding-top: 32px;">
							<input style="display: block; margin: auto;" id="carregar_mais" type="button" value="CARREGAR MAIS" name="carregar_mais" />
						</ul>

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
								
									<input type="submit" value="MANDAR MENSAGEM" name="mensagem_contato" />
								
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

			<script type="text/javascript">
				$(document).ready(function(){
					var search='';
					var limit = 5;

					load_data(search, limit);

					$("#pesquisa").keyup(function(){
						search = $(this).val();
						limit = 5;

						load_data(search, limit);

						$.ajax({
							url: 'assets/php/infintyScroll_liveSearch_inicio',
							method: 'post',
							data: {query: search, limit: limit},
							success:function(response){

								if(response.trim()==''){
									$('#post_container').html("");
									$("#carregar_mais").val("Sem mais resultados");
									$("#carregar_mais").attr("disabled", true);
								}else{
									$('#post_container').html(response);
									$("#carregar_mais").val("Carregar mais");
									$("#carregar_mais").attr("disabled", false);					
								}

							}
						});
						
					});

					function load_data(search, limit){
						$.ajax({
							url: 'assets/php/infintyScroll_liveSearch_inicio',
							method: 'post',
							data:{query: search, limit: limit},

							success:function(data){
								console.log("A2 " + search + ' ' + limit);
								
								if(data.trim()==''){
									$("#carregar_mais").val("Sem mais resultados");
									$("#carregar_mais").attr("disabled", true);
								}else{
									$('#post_container').html(data);
									$("#carregar_mais").val("Carregar mais");
									$("#carregar_mais").attr("disabled", false);					
								}
							}
						});
					}

					$("#carregar_mais").on('click', function () {
						limit = limit + 4;
						load_data(search, limit);
						
					});

				});
			</script>

	</body>
</html>