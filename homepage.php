<!DOCTYPE html>
<html>
	<head>
		<title>Keluarga Paduan Angklung | Homepage</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<!-- Navigation Bar -->
		<nav class="navbar navbar-inverse navbar-wrapper">
			<div class="container-fluid">
				<!-- Navbar Header -->
			    <div class="navbar-header">
					<!-- Button that toggles the navbar on and off on small screens -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
						<span class="sr-only"></span>
						<!-- Draws 3 bars in navbar button when in small mode -->
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Logo -->
					<a class="pull-left" href="homepage.php"><h3>KPA</h3></a>
			    </div>
			 
			    <div class="collapse navbar-collapse" id="navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="homepage.php">Home<span class="sr-only">(current)</span></a></li>
						<li><a href="pendaftaran.php">Pendaftaran</a></li>
						<li><a href="jadwal.php">Jadwal</a></li>
						<!-- Dropdown Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lomba<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Kategori Lomba</a></li>
								<li><a href="#">Keterangan Lomba</a></li>
							</ul>
						</li>
						<li><a href="#">Ticketing</a></li>
						<li><a href="#">Kontak Kami</a></li>
					</ul>
			    </div><!-- /.navbar-collapse -->
			</div>
		</nav><br>

		<!-- Carousel -->
		<div id="theCarousel" class="carousel slide" data-ride="carousel">
			<div class = "container-fluid">
				<!--Number of Slide -->
				<ol class="carousel-indicators">
				<li data-target="#theCarousel" data-slide-to="0" class="active"> </li >
				<li data-target="#theCarousel" data-slide-to="1"> </li>
				<li data-target ="#theCarousel" data-slide-to="2"> </li>
				</ol >

				<!-- Define the text to place over the image -->
				<div class="carousel-inner">
					<!-- Slide 1 -->
					<div class="item active">
						<div class ="slide1"></div>
						<!--
						<div class="carousel-caption">
							<h1>Amazing Backgrounds</h1>
							<p>Thousands of Backgrounds for Free</p>
							<p><a href="#" class="btn btn-primary btn-sm">Get them Now</a></p>
						</div> -->
					</div>
					<!-- Slide 2 -->
					<div class="item">
						<div class="slide2"></div>
						<!--
						<div class="carousel-caption">
							<h1>Thousands of Colors</h1>
							<p>Every Color you can Imagine</p>
						</div>
						-->
					</div>
					<!-- Slide 3 -->
					<div class="item">
						<div class="slide3"></div>
						<!--
						<div class="carousel-caption">
							<h1>Amazing Illustrations</h1>
							<p>And they are All Free</p>
						</div>
						-->
					</div>
				</div>

				<!-- Carousel Arrows -->
				<a class="left carousel-control" href="#theCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"> </span>
				</a>
				<a class="right carousel-control" href="#theCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div> 
		</div> <br>

		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>

