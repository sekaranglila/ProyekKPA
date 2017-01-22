<?php
	$namatim = $asaltim = $kategoritim = $alamatlembaga = $officialtim1 = $officialtim1_no = $officialtim2 = $officialtim2_no = "";
    $namatim_err = $asaltim_err = $kategoritim_err = $alamatlembaga_err = $officialtim1_err = $officialtim1_no_err = $officialtim2_err = $officialtim2_no_err = "";
    $namapeserta = [];
    $namapeserta_err = [];
    $fotopeserta_err = [];
    for ($i = 1; $i <= 40; $i++) {
    	$namapeserta[$i] = "";
    	$namapeserta_err[$i] = "";
    	$fotopeserta_err[$i] = "";
    }
    $jumlahanggota = 10;
    $valid = true;
    $valid_msg = "";
    $valid_clr = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('config/db.php');
        $namatim = $_POST['NamaTim'];
        $asaltim = $_POST['AsalTim'];
        $kategoritim = $_POST['Kategori'];
        $alamatlembaga = $_POST['Alamat'];
        $officialtim1 = $_POST['Off1'];
        $officialtim1_no = $_POST['HPOff1'];
        $officialtim2 = $_POST['Off2'];
        $officialtim2_no = $_POST['HPOff2'];
        $jumlahanggota = $_POST['count-member'];

        //Validation checking
        //Validation nama tim
        if ($namatim != "") {
        	$namatim_err = "";
        } else {
        	$namatim_err = "Nama tim tidak boleh kosong";
        	$valid = false;
        }

        //Validation asal tim
        if ($asaltim != "") {
        	$asaltim_err = "";
        } else {
        	$asaltim_err = "Asal tim tidak boleh kosong";
        	$valid = false;
        }

        //Validation kategori tim
        if (isset($kategoritim)) {
        	$kategoritim_err = "";
        } else {
        	$kategoritim_err = "Kategori tim tidak boleh kosong";
        	$valid = false;
        }

        //Validation alamat lembaga
        if ($alamatlembaga != "") {
        	$alamatlembaga_err = "";
        } else {
        	$alamatlembaga_err = "Alamat lembaga tidak boleh kosong";
        	$valid = false;
        }

        //Validation official tim 1
        if ($officialtim1 != "") {
        	$officialtim1_err = "";
        } else {
        	$officialtim1_err = "Official tim 1 tidak boleh kosong";
        	$valid = false;
        }

        //Validation HP official tim 1
        if ($officialtim1_no != "") {
        	if (preg_match('/^[0-9]*$/', $officialtim1_no)) {
        		$officialtim1_err = "";
        	} else {
        		$officialtim1_no_err = "No. HP harus berupa angka";
        		$valid = false;
        	}
        } else {
        	$officialtim1_no_err = "No. HP official tim 1 tidak boleh kosong";
        	$valid = false;
        }

        //Validation official tim 2
        if ($officialtim2 != "") {
        	$officialtim2_err = "";
        } else {
        	$officialtim2_err = "Official tim 2 tidak boleh kosong";
        	$valid = false;
        }

        //Validation HP official tim 2
        if ($officialtim2_no != "") {
        	if (preg_match('/^[0-9]*$/', $officialtim2_no)) {
        		$officialtim2_err = "";
        	} else {
        		$officialtim2_no_err = "No. HP harus berupa angka";
        		$valid = false;
        	}
        } else {
        	$officialtim2_no_err = "No. HP official tim 2 tidak boleh kosong";
        	$valid = false;
        }

        //Check validation each name and photo
        for ($i = 1; $i <= $jumlahanggota; $i++) {
        	//Validating namapeserta
    		$namapeserta[$i] = $_POST['name' . $i];
    		if ($namapeserta[$i] != "") {
    			$namapeserta_err[$i] = "";
    		} else {
    			$namapeserta_err[$i] = "Nama tidak boleh kosong";
    			$valid = false;
    		}

    		//Validating fotopeserta
    		$fotopeserta[$i] = $_FILES['photo' . $i]['name'];
    		$imagetype = strtolower(pathinfo($fotopeserta[$i], PATHINFO_EXTENSION));
    		if ($_FILES['photo' . $i]['size'] != 0 || $_FILES['photo' . $i]['error'] != 4) {
	    		if ($imagetype == 'gif' || $imagetype == 'jpg' || $imagetype == 'jpeg' || $imagetype == 'png') {
	    			if ($_FILES['photo' . $i]['size'] <= 2000000 && $_FILES['photo' . $i]['error'] != 1) {
	    				$fotopeserta_err[$i] = "";
		    		} else {
		    			$fotopeserta_err[$i] = "Ukuran foto tidak boleh melebihi 2Mb";
		    			$valid = false;
		    		}
	    		} else {
	    			$fotopeserta_err[$i] = "Hanya ekstensi GIF, JPG, JPEG, dan PNG yang dapat diterima";
	    			$valid = false;
	    		}
    		} else {
    			$fotopeserta_err[$i] = "Harus ada foto";
    			$valid = false;
    		}
        }

        if ($valid) {
	        $insert_query = $conn->query("
	            INSERT INTO tim(namatim, asaltim, kategoritim, alamatlembaga, officialtim1, officialtim1_no, officialtim2, officialtim2_no, jumlahanggota)
	            VALUES ('$namatim', '$asaltim', '$kategoritim', '$alamatlembaga', '$officialtim1', '$officialtim1_no', '$officialtim2', '$officialtim2_no', $jumlahanggota)
	        ");

        	$tim_id = $conn->query("
        		SELECT tim_id FROM tim WHERE namatim = '$namatim' AND asaltim = '$asaltim'
        		")->fetch_array(MYSQLI_ASSOC)['tim_id'];

        	for ($i = 1; $i <= $jumlahanggota; $i++) {
        		$namapeserta_input = $_POST['name' . $i];
        		$fotopeserta_input = $_FILES['photo' . $i]['name'];
        		$target = 'img/'.$fotopeserta_input;
        		move_uploaded_file($_FILES['photo' . $i]["tmp_name"], $target);
	        	$insert_query = $conn->query("
	            	INSERT INTO peserta(tim_id, namapeserta, fotopeserta)
	            	VALUES ($tim_id, '$namapeserta_input', '$target')
	        	");
	        }

	        $namatim = $asaltim = $kategoritim = $alamatlembaga = $officialtim1 = $officialtim1_no = $officialtim2 = $officialtim2_no = "";
	        $namapeserta = [];
		    $namapeserta_err = [];
		    $fotopeserta_err = [];
		    for ($i = 1; $i <= 40; $i++) {
		    	$namapeserta[$i] = "";
		    	$namapeserta_err[$i] = "";
		    	$fotopeserta_err[$i] = "";
		    }
		    $jumlahanggota = 10;
	        $valid_msg = "Pendaftaran berhasil";
	        $valid_clr = "green";
        } else {
        	$valid_msg = "Pendaftaran gagal";
        	$valid_clr = "red";
        }

    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Festival Paduan Angklung XV ITB | Pendaftaran</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<!-- Navigation Bar -->
		<nav class="navbar navbar-default navbar-wrapper">
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
					<a class="navbar-brand" href="/"><img src="img/LOGO.png" width="100px"></a>
			    </div>
			    <div class="collapse navbar-collapse" id="navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Beranda<span class="sr-only">(current)</span></a></li>
						<li><a href="pendaftaran.php">Pendaftaran</a></li>
						<li><a href="jadwal.php">Jadwal</a></li>
						<!-- Dropdown Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lomba<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="partitur.php">Partitur Lagu</a></li>
								<li><a href="peraturan.php">Peraturan Lomba</a></li>
							</ul>
						</li>
						<li><a href="tiket.php">Pemesanan Tiket</a></li>
						<li><a href="kontak.php">Kontak Kami</a></li>
					</ul>
			    </div><!-- /.navbar-collapse -->
			</div>
		</nav><br><br><br><br>

		<!-- Form Pendaftaran -->
		<div class = "container pendaftaran">
			<!-- Header -->
			<h1 class="text-center"> Form Pendaftaran </h1>

			<!-- Validation Message -->
			<h3 class="text-center" style="color:<?php echo $valid_clr; ?>"><?php echo $valid_msg; ?></h3>
			<br> <br>

			<!-- Form -->
			<form enctype="multipart/form-data" method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<div class="form-group">
					<!-- Nama Tim -->
					<label for="NamaTim" class="col-sm-2 control-label">Nama Tim</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="NamaTim" name="NamaTim" placeholder="Nama Tim" value="<?php echo $namatim; ?>">
						<span class='error'><?php echo $namatim_err; ?></span>
					</div>
				</div> <br>
				<!-- Asal Tim -->
				<div class="form-group">
					<label for="AsalTim" class="col-sm-2 control-label">Asal Tim</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="AsalTim" name="AsalTim" placeholder="Asal Tim (Nama Lembaga)" value="<?php echo $asaltim; ?>">
						<span class='error'><?php echo $asaltim_err; ?></span>
					</div>
				</div> <br>
				<!-- Kategori Tim -->
				<div class = "form-group">
					<label for="Kategori" class="col-sm-2 control-label">Kategori Tim</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input checked type="radio" name="Kategori" id="Kategori1" value="SD" <?php if (isset($kategoritim) && $kategoritim=="SD") echo "checked" ?>> SD/Sederajat
						</label>
						<label class="radio-inline">
							<input type="radio" name="Kategori" id="Kategori2" value="SMP" <?php if (isset($kategoritim) && $kategoritim=="SMP") echo "checked" ?>> SMP/Sederajat
						</label>
						<label class="radio-inline">
							<input type="radio" name="Kategori" id="Kategori3" value="SMA" <?php if (isset($kategoritim) && $kategoritim=="SMA") echo "checked" ?>> SMA/Sederajat
						</label>
						<label class="radio-inline">
							<input type="radio" name="Kategori" id="Kategori4" value="Perti" <?php if (isset($kategoritim) && $kategoritim=="Perti") echo "checked" ?>> Perguruan Tinggi/Umum
						</label> <br>
						<span class='error'><?php echo $kategoritim_err; ?></span>
					</div>
				</div> <br>
				<!-- Alamat Lembaga -->
				<div class="form-group">
					<label for="Alamat" class="col-sm-2 control-label">Alamat Lembaga</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="3" id="Alamat" name="Alamat"><?php echo $alamatlembaga; ?></textarea>
						<span class='error'><?php echo $alamatlembaga_err; ?></span>
					</div>
				</div> <br>
				<!-- Official Tim 1 dan 2 -->
				<div class="form-group">
					<label for="Off1" class="col-sm-2 control-label">Official Tim 1</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Off1" name="Off1" placeholder="Nama Official Tim 1" value="<?php echo $officialtim1; ?>">
						<span class='error'><?php echo $officialtim1_err; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="HPOff1" class="col-sm-2 control-label">No HP</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="HPOff1" name="HPOff1" placeholder="Nomor HP Official Tim 1" value="<?php echo $officialtim1_no; ?>">
						<span class='error'><?php echo $officialtim1_no_err; ?></span>
					</div>
				</div><br>
				<div class="form-group">
					<label for="Off2" class="col-sm-2 control-label">Official Tim 2</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Off2" name="Off2" placeholder="Nama Official Tim 2" value="<?php echo $officialtim2; ?>">
						<span class='error'><?php echo $officialtim2_err; ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="HPOff2" class="col-sm-2 control-label">No HP</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="HPOff2" name="HPOff2" placeholder="Nomor HP Official Tim 2" value="<?php echo $officialtim2_no; ?>">
						<span class='error'><?php echo $officialtim2_no_err; ?></span>
					</div>
				</div><br>
				<div class="form-group">
					<label for="count-member" class="col-sm-2 control-label">Jumlah Anggota</label>
					<div class="col-sm-10">
						<select id="count-member" name="count-member" class="form-control">
							<option value="1" <?php if (isset($jumlahanggota) && $jumlahanggota=="1") echo "selected" ?>>1</option>
							<option value="2" <?php if (isset($jumlahanggota) && $jumlahanggota=="2") echo "selected" ?>>2</option>
							<option value="3" <?php if (isset($jumlahanggota) && $jumlahanggota=="3") echo "selected" ?>>3</option>
							<option value="4" <?php if (isset($jumlahanggota) && $jumlahanggota=="4") echo "selected" ?>>4</option>
							<option value="5" <?php if (isset($jumlahanggota) && $jumlahanggota=="5") echo "selected" ?>>5</option>
							<option value="6" <?php if (isset($jumlahanggota) && $jumlahanggota=="6") echo "selected" ?>>6</option>
							<option value="7" <?php if (isset($jumlahanggota) && $jumlahanggota=="7") echo "selected" ?>>7</option>
							<option value="8" <?php if (isset($jumlahanggota) && $jumlahanggota=="8") echo "selected" ?>>8</option>
							<option value="9" <?php if (isset($jumlahanggota) && $jumlahanggota=="9") echo "selected" ?>>9</option>
							<option value="10" <?php if (isset($jumlahanggota) && $jumlahanggota=="10") echo "selected" ?>>10</option>
							<option value="11" <?php if (isset($jumlahanggota) && $jumlahanggota=="11") echo "selected" ?>>11</option>
							<option value="12" <?php if (isset($jumlahanggota) && $jumlahanggota=="12") echo "selected" ?>>12</option>
							<option value="13" <?php if (isset($jumlahanggota) && $jumlahanggota=="13") echo "selected" ?>>13</option>
							<option value="14" <?php if (isset($jumlahanggota) && $jumlahanggota=="14") echo "selected" ?>>14</option>
							<option value="15" <?php if (isset($jumlahanggota) && $jumlahanggota=="15") echo "selected" ?>>15</option>
							<option value="16" <?php if (isset($jumlahanggota) && $jumlahanggota=="16") echo "selected" ?>>16</option>
							<option value="17" <?php if (isset($jumlahanggota) && $jumlahanggota=="17") echo "selected" ?>>17</option>
							<option value="18" <?php if (isset($jumlahanggota) && $jumlahanggota=="18") echo "selected" ?>>18</option>
							<option value="19" <?php if (isset($jumlahanggota) && $jumlahanggota=="19") echo "selected" ?>>19</option>
							<option value="20" <?php if (isset($jumlahanggota) && $jumlahanggota=="20") echo "selected" ?>>20</option>
							<option value="21" <?php if (isset($jumlahanggota) && $jumlahanggota=="21") echo "selected" ?>>21</option>
							<option value="22" <?php if (isset($jumlahanggota) && $jumlahanggota=="22") echo "selected" ?>>22</option>
							<option value="23" <?php if (isset($jumlahanggota) && $jumlahanggota=="23") echo "selected" ?>>23</option>
							<option value="24" <?php if (isset($jumlahanggota) && $jumlahanggota=="24") echo "selected" ?>>24</option>
							<option value="25" <?php if (isset($jumlahanggota) && $jumlahanggota=="25") echo "selected" ?>>25</option>
							<option value="26" <?php if (isset($jumlahanggota) && $jumlahanggota=="26") echo "selected" ?>>26</option>
							<option value="27" <?php if (isset($jumlahanggota) && $jumlahanggota=="27") echo "selected" ?>>27</option>
							<option value="28" <?php if (isset($jumlahanggota) && $jumlahanggota=="28") echo "selected" ?>>28</option>
							<option value="29" <?php if (isset($jumlahanggota) && $jumlahanggota=="29") echo "selected" ?>>29</option>
							<option value="30" <?php if (isset($jumlahanggota) && $jumlahanggota=="30") echo "selected" ?>>30</option>
							<option value="31" <?php if (isset($jumlahanggota) && $jumlahanggota=="31") echo "selected" ?>>31</option>
							<option value="32" <?php if (isset($jumlahanggota) && $jumlahanggota=="32") echo "selected" ?>>32</option>
							<option value="33" <?php if (isset($jumlahanggota) && $jumlahanggota=="33") echo "selected" ?>>33</option>
							<option value="34" <?php if (isset($jumlahanggota) && $jumlahanggota=="34") echo "selected" ?>>34</option>
							<option value="35" <?php if (isset($jumlahanggota) && $jumlahanggota=="35") echo "selected" ?>>35</option>
							<option value="36" <?php if (isset($jumlahanggota) && $jumlahanggota=="36") echo "selected" ?>>36</option>
							<option value="37" <?php if (isset($jumlahanggota) && $jumlahanggota=="37") echo "selected" ?>>37</option>
							<option value="38" <?php if (isset($jumlahanggota) && $jumlahanggota=="38") echo "selected" ?>>38</option>
							<option value="39" <?php if (isset($jumlahanggota) && $jumlahanggota=="39") echo "selected" ?>>39</option>
							<option value="40" <?php if (isset($jumlahanggota) && $jumlahanggota=="40") echo "selected" ?>>40</option>
						</select>
					</div>
				</div>
				<!-- Anggota -->
				<div class = "form-group">
					<label for="Anggota" class="col-sm-2 control-label">Data Anggota</label><br><br>
					<div class="col-sm-offset-1 col-sm-10">
						<table class="table table-hover">
							<tbody id="anggota">

							</tbody>
						</table>
					</div>
				</div><br><br>

				<!-- Submit Button -->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</form>
		</div>

		<!-- Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			var valid = "<?php echo $valid ?>";
			var namapeserta = <?php echo json_encode($namapeserta) ?>;
			var namapeserta_err = <?php echo json_encode($namapeserta_err) ?>;
			var fotopeserta_err = <?php echo json_encode($fotopeserta_err) ?>;
		</script>
		<script src="js/script.js"></script>
	</body>
</html>
