<?php
	$ROOT = dirname(__FILE__);

	//Conexão com BD
	include $ROOT."/assets/php/connection.php";
	//Sistema de emails
	include $ROOT."/assets/php/contato.php";

	//Sistema de datas em português
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	require $ROOT.'/assets/php/functions.php';

	if(!isset($_SESSION['user'])){
		header('Location: adm');
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
	<title>GERENCIADOR DE CULTOS | CANAÃ JARDIM GUANABARA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name=”robots” content=”noindex,nofollow”>
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/favicon.png" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
									
									<h3>ADMINISTRAÇÃO - GERENCIAR CULTOS</h3>
									
									<a href="actions" class="button small"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;VOLTAR</a>
									<a href="adm?logout=true" class="button small"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;SAIR</a>
									<br><br>
									
										<ul class="actions fit small">
											<li>
												<input type="text" name="pesquisa" id="pesquisa" value="" placeholder="PESQUISAR">
											</li>
										</ul>			
									
								</header>
								<h3>CULTOS</h3>

								<div class="table-wrapper">
									<table class="alt">
										<thead>
											<tr>
												<th>Nome do Culto</th>
												<th>Data do culto</th>
												<th>inscritos</th>
											</tr>
										</thead>
										<tbody id="table-data">
										
										</tbody>

									</table>
									<center>
									<div id="aviso"></div>
									</center>
								</div>

								

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

			<script type="text/javascript">
				$(document).ready(function(){
					var search='';
					var limit = 10;
					var action = 'inactive';
					var bool = false;

					$("#pesquisa").keyup(function(){
						search = $(this).val();
						$("#aviso").html("");
						limit = 10;
						$.ajax({
							url: 'assets/php/infintyScroll_liveSearch_adm_cultos',
							method: 'post',
							data: {query: search, limit: limit},
							success:function(response){
								$("#table-data").html(response);
								console.log("A1 "+ search + ' ' + limit);
								action = 'inactive';
								bool = true;
							}
						});
					});

					function load_data(search, limit){
						$.ajax({
							url: 'assets/php/infintyScroll_liveSearch_adm_cultos',
							method: 'post',
							data:{query: search, limit: limit},

							success:function(data){
								console.log("A2 " + search + ' ' + limit);
								
								if(data.trim()==''){
									$("#aviso").html("<h4>Sem mais resultados</h4>");
									action = 'active';
								}else{
									$('#table-data').html(data);
									$("#aviso").html("<h4>Carregando, aguarde</h4>");								
									action = 'inactive';
								}
							}
						});
					}

					if(action =='active'){
						action = 'inactive';
					}

					$(window).scroll(function(){
						if($(window).scrollTop() + $(window).height() > $("#table-data").height() && action =='inactive'){
							if(bool){
								limit=20;
								bool=false;
							}
							action = 'active';
							setTimeout(function(){
								load_data(search, limit);
								limit = limit + 10;
							}, 1000);
						}
					});
				});
			</script>
	</body>
</html>