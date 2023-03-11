<?php
	//Conexão com BD
	$ROOT = dirname(__FILE__);
	//Conexão com BD
	include $ROOT."/assets/php/connection.php";

	//Sistema de datas em português
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	//Sistema de GET by ID
	if(isset($_GET['id_culto'])){
		$culto_id = $_GET['id_culto'];
		$sqlsp = "SELECT * FROM `".$culto_id."` ORDER BY nome ASC";
		$resultado = mysqli_query($conn_db_cultos,$sqlsp);
		$numero=1;

		$sql_p = "SELECT * FROM `posts` WHERE id_culto='" . $culto_id . "'";
		$sql_posts = mysqli_query($conn_db_posts,$sql_p);
		$culto_info = mysqli_fetch_assoc($sql_posts);
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
	<title>LISTA DE INSCRITOS | <?php echo strtoupper($culto_info['nome_culto']); ?> - <?php echo strftime('%d/%m/%Y', strtotime($culto_info['datac'])); ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name=”robots” content=”noindex,nofollow”>
		<link rel="stylesheet" href="assets\css\print_ins.css"/>
		<link rel="icon" href="images/favicon.png" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
<style>img[alt="www.000webhost.com"] { display: none;}</style>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	</head>

	<body class="is-preload">

		<!-- Wrapper -->
			

				<!-- Main -->
					<div id="main">

						<!-- Post -->
						
							<img id="logo" src="images\logo_footer.png">
							
							<div id="titulo">
								<center>
								<h5 style="margin-bottom: 0;margin-top: 5px;">LISTA DE INSCRITOS</h5>
								<h6><?php echo strtoupper($culto_info['nome_culto']); ?><br><?php echo strftime('%d/%m/%Y', strtotime($culto_info['data_culto'])); ?></h6>
								</center>
							</div>
								
								<div class="table-wrapper" style="margin-top:50px;">
									<table class="alt">
										<thead>
											<tr>
												<th><center>Número</center></th>
												<th><center>PRESENTE</center></th>
												<th>Nome</th>
												<th>Telefone</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody>
											
											<?php while($row=mysqli_fetch_assoc($resultado)){ ?>
											<tr>
												<td><center><?php echo $numero;  $numero = $numero+1; ?></center></th>
												<td><center><i style="" class="far fa-square"></i></center></th>
												<td><?php echo $row['nome']; ?></th>
												<td><?php echo $row['telefone']; ?></th>
												<td><?php echo $row['email']; ?></th>
											</tr>
											<?php } ?>
											
										</tbody>

									</table>

								</div>

								

							

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