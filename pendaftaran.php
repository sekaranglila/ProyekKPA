<!DOCTYPE html>
<html>
	<head>
		<title>Keluarga Paduan Angklung | Pendaftaran</title>
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
						<li><a href="homepage.php">Home<span class="sr-only">(current)</span></a></li>
						<li  class="active"><a href="pendaftaran.php">Pendaftaran</a></li>
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
		</nav> <br> <br> <br> <br> <br> <br> 

		<!-- Form Pendaftaran -->
		<div class = "container">
			<!-- Header -->
			<h1 class="text-center"> Form Pendaftaran </h1>
			<br> <br> <br>

			<!-- Form -->
			<form class="form-horizontal">
				<div class="form-group">
					<!-- Nama Tim -->
					<label for="NamaTim" class="col-sm-2 control-label">Nama Tim</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="NamaTim" placeholder="Nama Tim">
					</div>
				</div> <br><br>
				<!-- Asal Tim -->
				<div class="form-group">
					<label for="AsalTim" class="col-sm-2 control-label">Asal Tim</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="AsalTim" placeholder="Asal Tim (Nama Lembaga)">
					</div>
				</div> <br><br>
				<!-- Kategori Tim -->
				<div class = "form-group">
					<label for="Kategori" class="col-sm-2 control-label">Kategori Tim</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" name="Kategori" id="Kategori1" value="SD"> SD
						</label>
						<label class="radio-inline">
							<input type="radio" name="Kategori" id="Kategori2" value="SMP"> SMP
						</label>
						<label class="radio-inline">
							<input type="radio" name="Kategori" id="Kategori3" value="SMA"> SMA
						</label>
						<label class="radio-inline">
							<input type="radio" name="Kategori" id="Kategori4" value="Perti"> Perguruan Tinggi
						</label>
						<label class="radio-inline">
							<input type="radio" name="Kategori" id="Kategori5" value="Umum"> Umum
						</label>
					</div>
				</div> <br> <br>
				<!-- Alamat Lembaga -->
				<div class="form-group">
					<label for="Alamat" class="col-sm-2 control-label">Alamat Lembaga</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="3" id="Alamat"> </textarea>
					</div>
				</div> <br> <br>
				<!-- Detail Pembina -->
				<div class="form-group">
					<label for="Pembina" class="col-sm-2 control-label">Pembina Tim</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Pembina" placeholder="Nama Pembina Tim">
					</div>
				</div>
				<div class="form-group">
					<label for="HPPembina" class="col-sm-2 control-label">No HP</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="HPPembina" placeholder="Nomer HP Pembina">
					</div>
				</div> <br> <br>
				<!-- Perwakilan Tim -->
				<div class="form-group">
					<label for="Perwakilan" class="col-sm-2 control-label">Perwakilan Tim</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Perwakilan" placeholder="Nama Perwakilan Anggota Tim">
					</div>
				</div> 
				<div class="form-group">
					<label for="HPPerwakilan" class="col-sm-2 control-label">No HP</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="HPPerwaklan" placeholder="Nomer HP Perwakilan Anggota Tim">
					</div>
				</div> <br> <br>
				<!-- Official Tim 1 dan 2 -->
				<div class="form-group">
					<label for="Off1" class="col-sm-2 control-label">Official Tim 1</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Off1" placeholder="Nama Official Tim 1">
					</div>
				</div> 
				<div class="form-group">
					<label for="HPOff1" class="col-sm-2 control-label">No HP</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="HPOff1" placeholder="Nomer HP Official Tim 1">
					</div>
				</div> <br>
				<div class="form-group">
					<label for="Off2" class="col-sm-2 control-label">Official Tim 2</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Off2" placeholder="Nama Official Tim 2">
					</div>
				</div> 
				<div class="form-group">
					<label for="HPOff2" class="col-sm-2 control-label">No HP</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="HPOff2" placeholder="Nomer HP Official Tim 2">
					</div>
				</div> <br> <br>
				<!-- Anggota -->
				<div class = "form-group">
					<label for="Anggota" class="col-sm-2 control-label">Data Anggota</label> <br>
					<div class="col-sm-12">
						<table class="table table-hover">
							<tbody>
								<tr>
									<th>No</th>
									<th>Nama Pemain</th>
									<th>Foto</th>
								</tr>
								<tr>
									<th>1</th>
									<td id="A1" contenteditable></td>
									<td id="B1" contenteditable>
										<input type="file">
									</td>
								</tr>
								<tr>
									<th>2</th>
									<td id="A2" contenteditable></td>
									<td id="B2" contenteditable>
										<input type="file">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div> <br> <br>

				<!-- Submit Button -->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</form>
		</div>

		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
