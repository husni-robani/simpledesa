<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	

    <title><?php echo judul(); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/image/<?php echo logo(); ?>">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' /> 

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>

	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":[ "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands" ], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
	<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="../assets/css/select2.min.css">
	<link rel="stylesheet" href="../assets/css/sweetalert2.css"> 
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>  
	
	<script src="../assets/js/ajax_jquery.js"></script> 
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script> 
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="../assets/js/typeahead.js"></script> 

	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script> 
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script> 

	<!-- CSS MOD -->
	<link rel="stylesheet" type="text/css" href="../assets/css/modaldy.css"> 
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.php" class="logo">
					<center><h2 class="white navbar-brand"><?php echo singkatan(); ?></center>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fas fa-tasks"></i>
					</span>
				</button>
				<button class="topbar-toggler more">
					<i class="fas fa-angle-double-right"></i>
				</button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="fas fa-angle-double-right"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
			 <div class="collapse" id="search-nav">
						<form method="POST" action="?page=administrasi_surat" class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" name="cari" autocomplete="off" value="<?php echo @$cari ?>" placeholder="Cari Menu Surat..." class="form-control">
							</div>
						</form>
					</div>


					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					 	 <li class="nav-item dropdown hidden-caret"> 
							<div class="white animated fadeIn" style="text-transform: capitalize;">
								Welcome <strong><?php echo $_SESSION["nama_pegawai"]; ?></strong>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret"> 
							<a   href="logout.php" class="btn btn-toggle  "  ><i class="fas fa-power-off"></i> <p style="    margin-bottom: 0px;">Logout</p></a> 
						 
						</li>
					</ul>

				</div>

			</nav>
			<!-- End Navbar -->

		</div>