<!DOCTYPE html>
<!-- Prpa Marijana 442/13  -->
<html lang="en">
<?php session_start(); ?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>By Okovani pakat</title>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo 'http://localhost/psipro/css/bootstrap.css'; ?>" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo 'http://localhost/psipro/css/full-slider.css'; ?>" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

<!-- Navigation -->
<div class="container">
	<div id="sidebarL">
		<div class="sidebar_box" id="glavni">
			<div class="top"></div>
			<div class="inside">
				<class="row">
				<form id="menu" name="menu" action="" enctype="application/x-www-form-urlencoded" onsubmit="showLoadingScreen()">
					<input type="hidden" name="menu" value="menu">

					<img src="<?php echo 'http://localhost/psipro/images/logo.png'; ?>" alt="Servis za Demonstraturu">
					<div id="loadingScreen" style="display: none;">
						<div></div>
					</div>
					<ul id="menu:nav1">
						<li>
							<a href="<?php echo base_url('index.php'); ?>">Pocetna</a>
						</li>
						<li>
							<a href="<?php echo base_url('index.php');?>">Logovanje za studente</a>
						</li>
						<li>
							<a href="<?php echo base_url('index.php/Welcome/logInProfesor')?>">Logovanje za zaposlene</a>
						</li>
						<li>
							<a href="<?php echo base_url('index.php')?>">Registracija studenta</a>
						</li>
					</ul><input type="hidden" name="javax.faces.ViewState" value="j_id2">
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.container -->
</nav>

<br><br><br><br><br><br>
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
			width: 40%;
			margin: auto;
		}
	</style>
</head>

<div class="container">
	<div class="row">

		<div class="col-lg-9 col-md-9 col-sm-12 relative">
			<div id="carousel-slider" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner">
					<div class="item active">

						<img src="<?php echo 'http://localhost/psipro/images/1.png';?>" alt="">
					</div>
					<div class="item">
						<img src="<?php echo 'http://localhost/psipro/images/2.png';?>" alt="">
					</div>
					<div class="item">
						<img src="<?php echo 'http://localhost/psipro/images/3.png'?>" alt="">
					</div>
				</div>
				<!--INDICATORS-->
				<ol class="carousel-indicators">
					<li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-slider" data-slide-to="1"></li>
					<li data-target="#carousel-slider" data-slide-to="2"></li>
				</ol>
				<!--PREVIUS-NEXT BUTTONS-->
				<a class="left carousel-control" href="#carousel-example" data-slide="prev">
					<i class="fa fa-angle-left fa-2x control-icon main-color"></i>
				</a>
				<a class="right carousel-control" href="#carousel-example" data-slide="next">
					<i class="fa fa-angle-right fa-2x control-icon main-color"></i>
				</a>
			</div>
		</div>
	</div>
</div>

</body>

</html>
