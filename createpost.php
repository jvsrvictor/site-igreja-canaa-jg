<?php
	$ROOT = dirname(__FILE__);
	//Sistema de emails
	include $ROOT."/ssets/php/contato.php";

	//Sistema de datas em português
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	//Conexão com o BD
	include $ROOT."/assets/php/connection.php";

	//Sistema de GET by ID para edição
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sqlsp = "SELECT * FROM `posts` WHERE id='" . $id . "'";
		$sql = mysqli_query($conn_db_posts,$sqlsp);
		$postsp = mysqli_fetch_assoc($sql);
		$flag=true;
	}else{
		$flag=false;
	}

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
	<title>CRIAR POSTS | CANAÃ JARDIM GUANABARA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name=”robots” content=”noindex,nofollow”>
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/favicon.png" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
<style>img[alt="www.000webhost.com"] { display: none;}</style>
		<script src="https://cdn.tiny.cloud/1/b1v0pc6nti305j5z9k0efi905931ov1k91sf0pq2lwu7rhct/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
			tinymce.init({
			selector: '#conteudo'
			});
  		</script>

		  <link rel="stylesheet" href="assets\css\vex.css"/>
		<link rel="stylesheet" href="assets\css\vex-theme-wireframe.css"/>
	</head>
	<body class="is-preload">
	<video class="BGV" autoplay muted loop playsinline id="BGVIDEO"><source src="assets/videos/BGVIDEO.mp4" type="video/mp4"></video>
		<script language="JavaScript">

		function toggleVisibility(eventsender, idOfObjectToToggle){
			var myNewState = "hidden";
			if (eventsender.checked === true){
				myNewState = "visible";
			}

			document.getElementById(idOfObjectToToggle).style.visibility = myNewState;
		}       
		</script>
		<style type="text/css">
            #culto_com_capacidade{visibility:hidden;}
        </style>
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
									
									<h3>ADMINISTRAÇÃO - CRIAR POSTAGEM</h3>
									<a href="<?php if($flag){echo'postmanager';}else{echo'actions';};?>" class="button small"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;VOLTAR</a>

								</header>
								
							<form action="/assets/php/criar_post" method="POST" enctype="multipart/form-data" id="criar_post" name="criar_post" >
								<div class="fields">

									<?php if($flag)echo '<input type="hidden" value="'.$id.'" name="id_postagem" id="id_postagem" />';?>
									<input type="hidden" value="<?php echo $_SESSION['user'];?>" name="autor" id="autor" />
								

									<div class="field">
										<label for="titulo">Título</label>
										<input type="text" name="titulo" id="titulo" value="<?php if($flag)echo $postsp['titulo'];?>" />
									</div>

									<div class="field">
										<label>Imagem</label>
										<label for="image" class="tfile">ENVIAR ARQUIVO</label>
										<input name="image" id="image" type="file">
										<div id="img_preview"><img <?php if($flag)echo 'src="postsDB\\images\\'. $postsp['foto'] .'"';?> ></div>
									</div>
									<input type="hidden" id="culto_com_contagem" name="culto_com_contagem" value="<?php if($flag&&$postsp['culto_com_capacidade']==1){echo 1;}else{echo 0;};?>" />
									<div class="field">
											
											<input type="checkbox" id="culto_com_contagem_check"  name="culto_com_contagem_check"  value="1" onClick = "JavaScript:toggleVisibility(this,'culto_com_capacidade');" <?php if($flag&&$postsp['culto_com_capacidade']==1)echo 'checked="checked"';?>>
											<label for="culto_com_contagem_check">Culto com capacidade limitada</label><br><br>
										<ul class="actions fit small" id="culto_com_capacidade" <?php if($flag&&$postsp['culto_com_capacidade']==1){echo 'style="visibility: visible;"';}else{echo 'style="visibility: hidden;"';};?>>
											<li>
												<label for="nome_culto">Nome do Culto</label>
												<input type="text" name="nome_culto" id="nome_culto" value="<?php if($flag)echo $postsp['nome_culto'];?>" />	
											</li>
											<li>
												<label for="capacidade_culto">Capacidade</label>
												<input type="number" name="capacidade_culto" id="capacidade_culto" value="<?php if($flag)echo $postsp['capacidade'];?>" />
											</li>

											<li>
												<label for="data_culto">Data do Culto</label>
												<input type="date" name="data_culto" id="data_culto" value="<?php if($flag)echo $postsp['data_culto'];?>" />
											</li>
											
											<li>
												<label for="data_culto">Horário Limite de Cadastro</label>
												<input type="time" name="h_limite" id="h_limite" value="<?php if($flag)echo $postsp['h_limite'];?>" />
											</li>
										</ul>
									</div>

									<div class="field">
										<label for="conteudo">Conteúdo</label>
										<textarea name="conteudo" id="conteudo" rows="10" ><?php if($flag)echo $postsp['conteudo'];?></textarea>
									</div>

								</div>
								<ul class="actions">
									<li><input class="primary" type="submit" value="<?php if($flag){echo'EDITAR POSTAGEM';}else{echo'CRIAR POSTAGEM';}?>" name="new_post" /></li>
								</ul>
							</form>

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
			<script src="assets/js/vex.combined.min.js"></script>

			<script>
				$('input[type="checkbox"]').on('change', function(e){
						if($(this).prop('checked'))
						{
							$("#culto_com_contagem").val(1);
						} else {
							$("#culto_com_contagem").val(0);
						}
				});
			</script>

			<script>
				function filePreview(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();

						reader.onload = function (e) {
							$('#img_preview + img').remove();
							$('#img_preview').html('<img src="'+e.target.result+'" />');
						};
						reader.readAsDataURL(input.files[0]);
					}
				}

				$("#image").change(function () {
					filePreview(this);
				});
			</script>

			<script type="text/javascript">
				const form = document.getElementById('criar_post');

				form.addEventListener('submit', function (e) {
					tinyMCE.triggerSave('conteudo');
					e.preventDefault();
					var http = new XMLHttpRequest();
					var url = 'assets/php/criar_post';
					var params = new FormData(form);
					
					//SQL
					http.open('POST', url, true);
					http.onreadystatechange = function () {
						console.log(http.responseText);
						if (http.readyState == 4 && http.status == 200) {
							if (http.responseText == '1') {
								setTimeout(function () {
									window.location.href = "postmanager";
								}, 500);
							}else{
								vex.dialog.alert({
									message: 'Falha na alteração!'+http.responseText,
									className: 'vex-theme-wireframe'
								});
							}
						}
					}
					http.send(params);
				});
			</script>


	</body>
</html>