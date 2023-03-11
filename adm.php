<?php
	//Conexão com BD
	$ROOT = dirname(__FILE__);
	include $ROOT."/assets/php/connection.php";
	require $ROOT.'/assets/php/functions.php';
	if(isset($_GET['logout'])){
		session_destroy();
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
	<title>LOGIN | CANAÃ JARDIM GUANABARA</title>
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
				<a style="border: none;" href="https://canaajdguanabara.ga/"><img id="login_logo" src="images\logo_footer.png"></a>
			</center>

			<form action="assets/php/login" method="POST" id="login_form" name="login_form" enctype="multipart/form-data">
				<div class="fields">
					<div class="field">
						<label for="user">USUÁRIO</label>
						<input type="text" name="user" id="user" />
					</div>
					<div class="field">
						<label for="pass">SENHA</label>
						<input type="password" name="pass" id="pass" />
					</div>
				</div>
				<ul class="actions">
					<li><input class="button primary" type="submit" value="LOGIN" id="login" name="login" /></li>
				</ul>
			</form>
												
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


			<script type="text/javascript">
				const form = document.getElementById('login_form');
				form.addEventListener('submit', function (e) {
				    
					e.preventDefault();
					var http = new XMLHttpRequest();
					var url = '/assets/php/login';
					var params = new FormData(form);
					http.open('POST', url, true);

					http.onreadystatechange = function () {
						console.log(http.responseText);
						if (http.readyState == 4 && http.status == 200) {
							if (http.responseText == 1) {
								window.location.href = "actions";
							}
							
							if(http.responseText == 2){
								vex.dialog.alert({
									message: 'Senha Incorreta',
									className: 'vex-theme-wireframe'
								})
							}

							if(http.responseText == 3){
								vex.dialog.alert({
									message: 'Usuário não existe',
									className: 'vex-theme-wireframe'
								})
							}
						}
					}
					http.send(params);
				});
			</script>
			
			<script type="text/javascript">
				$(document).ready(function(){
				    
				var url = window.location.href;		
				var logout = url.split('?').pop().split('=').pop();
				
				if(logout=='true'){
				    window.location.href = "adm";
				}
				
				});
			</script>

	</body>
</html>