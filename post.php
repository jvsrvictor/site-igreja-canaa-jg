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

	//Sistema de GET by ID
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sqlsp = "SELECT * FROM `posts` WHERE id='" . $id . "'";

		$sql = mysqli_query($conn_db_posts,$sqlsp);
		$postsp = mysqli_fetch_assoc($sql);
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
	<title><?php echo $postsp['titulo']; ?> | CANAÃ JARDIM GUANABARA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<link rel="icon" href="images/favicon.png" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css"/></noscript>
		
		<link rel="stylesheet" href="assets\css\vex.css"/>
		<link rel="stylesheet" href="assets\css\vex-theme-wireframe.css"/>
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
									<span class="date"><?php echo strftime('%d de %B de %Y', strtotime($postsp['datac'])); ?></span>
									<h1><?php echo $postsp['titulo']; ?></h1>
									
								</header>
								<div class="image main"><img src="<?php echo "postsDB/images/" . $postsp['foto']; ?>" alt="" /></div>
								<p><?php echo $postsp['conteudo']; ?></p>
								
								<?php
								if($postsp['culto_com_capacidade']){
									echo '
									<section>

										
									
									<ul class="actions fit small">
										<li>
											<center><h2 style="margin-bottom:0px;">Vagas restantes</h2></center>
										</li></ul>
										
										<ul class="actions fit small"><li>
											<div class="progress"></div>
										</li>
									</ul><br>
											
											
									<div class="containerTimer">
                                      <h2 id="headline">INSCRIÇÕES SE ENCERRAM EM</h2>
                                      <div id="countdown">
                                        <ul>
                                          <li class="timer"><h1><span id="days"></span></h1><h3>DIAS</h3></li>
                                          <li class="timer"><h1><span id="hours"></span></h1><h3>HORAS</h3></li>
                                          <li class="timer"><h1><span id="minutes"></span></h1><h3>MINUTOS</h3></li>
                                          <li class="timer"><h1><span id="seconds"></span></h1><h3>SEGUNDOS</h3></li>
                                        </ul>
                                      </div>
                                      <div class="message">
                                        <div id="content">
                                          
                                        </div>
                                      </div>
                                    </div><br>

										
										<form action="/assets/php/cadastro_culto" method="POST" id="cadastro_culto_form">
											<ul class="actions fit small">
												<li>
												<center><h2>Formulário de inscrição para o culto</h2></center>
												</li>
											</ul>
											<input type="hidden" value="'.$id.'" name="id_postagem" id="id_postagem" />
											<ul class="actions fit small">
												<li>
													<div class="field">
														<label for="nome_cadastro">NOME COMPLETO</label>
														<input type="text" name="nome_cadastro" id="nome_cadastro" placeholder="OBRIGATÓRIO"/>
													</div>
												</li>

												<li>
													<div class="field">
														<label for="email_cadastro">EMAIL</label>
														<input type="text" name="email_cadastro" id="email_cadastro" placeholder="OPCIONAL"/>
													</div>
												</li>

												<li>
													<div class="field">
														<label for="telefone_cadastro">TELEFONE</label>
														<input type="text" name="telefone_cadastro" id="telefone_cadastro" placeholder="OPCIONAL"/>
													</div>
												</li>
											</ul>

											<ul class="actions fit small">
												<li>
													<div class="field">
														<input type="checkbox" id="enviar_email" name="enviar_email" value="1">
														<label for="enviar_email">Enviar email de confirmação</label>
													</div>
												</li>
											</ul>

											<ul class="actions fit small">
												<li><input id="cadastrar" type="submit" value="CADASTRAR" name="cadastro" /></li>
											</ul>
										</form>
										
										
										
										
										
									
									</section>
									';
								}

								?>
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
			<script src="assets/js/circle-progress.js"></script>
			<script src="assets/js/vex.combined.min.js"></script>
			<?php
				if($postsp['culto_com_capacidade']){
					echo "
					<script>
					$(document).ready(function(){
                        data_limite_cadastro='a';
					
						const circleProgress = new CircleProgress('.progress');
						circleProgress.attr({
							indeterminateText: '0',
							max: 1,
	                        value: 0,
							textFormat: function(value, max) {
                    		    return value;
                    	    },
						});
					
						var url = window.location.href;
						var id = url.split('?').pop().split('=').pop();
						var restante=1;
						var capacidade;
						var desabilitado = 0;
					
						function get_vagas(id){
							if(desabilitado==0){
								$.ajax({
								url: 'assets/php/get_culto_vagas_restantes',
								dataType: 'json',
								method: 'post',
								data:{id: id},
					
								success:function(data){
									restante = data.restante;
									capacidade = data.capacidade;
									desabilitado = parseInt(data.disable,10);
					
									
									data_limite_cadastro = data.tlimite + 'T' + data.hlimite;
									//console.log(data_limite_cadastro);
					
									if(desabilitado==1){
										circleProgress.max = capacidade;
										circleProgress.value = restante;
										$(".
										'"#nome_cadastro").attr("disabled", true);
										$("#email_cadastro").attr("disabled", true);
										$("#telefone_cadastro").attr("disabled", true);
										$("#enviar_email").attr("disabled", true);
										$("#cadastrar").attr("disabled", true);'."
										
									}else{
										
										circleProgress.max = capacidade;
										circleProgress.value = restante;
									}
								}
							});
							}
						}
					
						setInterval(function(){get_vagas(id);}, 1000);
						
						" . '
						function timer (data_limite_cadastro) {
                          const second = 1000,
                                minute = second * 60,
                                hour = minute * 60,
                                day = hour * 24;
                                
                                //console.log(data_limite_cadastro);
                        
                          let countDown = new Date(data_limite_cadastro).getTime(),
                              x = setInterval(function() {    
                        
                                let now = new Date().getTime(),
                                    distance = countDown - now;
                                    
                        
                                document.getElementById("days").innerText = Math.floor(distance / (day)),
                                  document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                                  document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                                  document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
                        
                                //do something later when date is reached
                                if (distance < 0) {
                                  let headline = document.getElementById("headline"),
                                      countdown = document.getElementById("countdown"),
                                      content = document.getElementById("content");
                        
                                  headline.innerText = "INSCRIÇÕES ENCERRADAS";
                                  countdown.style.display = "none";
                                  content.style.display = "block";
                        
                                  clearInterval(x);
                                }
                                //seconds
                              }, 0)
                          }
                          
                          setInterval(function(){timer(data_limite_cadastro);}, 2000);
                          
						' . "
						
					});
					</script>
					" ;
				}
			?>



			<?php
				if($postsp['culto_com_capacidade']){
					echo "
                <script>
					const form = document.getElementById('cadastro_culto_form');
					form.addEventListener('submit', function (e) {
					e.preventDefault();
					var http = new XMLHttpRequest();
					var url = 'assets/php/cadastro_culto';
					var params = new FormData(form);
					if($('#nome_cadastro').val()==''){
						vex.dialog.alert({
							message: 'Preencha com seu nome completo!',
							className: 'vex-theme-wireframe'
						})
					}else{
						
						http.open('POST', url, true);

						http.onreadystatechange = function () {
							console.log(http.responseText);
							if (http.readyState == 4 && http.status == 200) {
								if (http.responseText == '1') {
									vex.dialog.alert({
										message: 'Cadastro realizado com sucesso!',
										className: 'vex-theme-wireframe'
									})
								}
								
								if(http.responseText == '0'){
									vex.dialog.alert({
										message: 'Impossível Cadastrar, vagas insuficientes!',
										className: 'vex-theme-wireframe'
									})
								}

								if(http.responseText == '4'){
									vex.dialog.alert({
										message: 'Nome já cadastrado!',
										className: 'vex-theme-wireframe'
									})
								}
							}
						}
						http.send(params);
					}
					
				});
				</script>
					";}
			?>

			
			<style>
				.circle-progress {
					width: 300px;
					height: auto;
					margin-left: auto;
					margin-right: auto;
					display: block;
				}
				.circle-progress-value {
					stroke-width: 6px;
					stroke: white;
					stroke-linecap: round;
				}
				.circle-progress-circle {
					stroke-width: 8px;
					stroke: #212931;
				}
				.circle-progress-text {
					fill: #212931;
					font-family: "Source Sans Pro", Helvetica, sans-serif;
					font-weight: 900;
					letter-spacing: 0.075em;
					text-transform: uppercase;

				}
				
				/* Timer */

                .containerTimer {
                  color: #333;
                  margin: 0 auto;
                  text-align: center;
                }
                
                .timer {
                  display: inline-block;
                  font-size: 1.5em;
                  list-style-type: none;
                  padding: 0em 1em;
                  text-transform: uppercase;
                }
                
                .timer span {
                  display: block;
                  
                  height: 1em;
                }
                
                .timer h1, h2, h3{
                    margin-bottom: 0;
                }
                
                .message {
                  font-size: 4rem;
                  display: none;
                  padding: 1rem;
                }
                
                #headline {
                    margin-bottom: 0.25em;
                }

			</style>


	</body>
</html>