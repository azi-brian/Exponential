<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  	<script src="jquery.min.js"></script>
  	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="fontawesome/css/all.css" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<body>

	<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:login.php');
	} else {
		$username=$_SESSION['username'];
	}
	?>

	<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #42a5f5">
		<a class="navbar-brand" href="index.php">
			<span class="menu-collapse">Prediksi Penjualan Properti</span>
		</a>

	</nav>


	<div class="row" id="body-row">
		<div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
			<ul class="list-group sticky-top sticky-offset">

				<a href="index.php" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-home fa-fw mr-3"></i>
						<span class="menu-collapse">Beranda</span>
					</div>	
				</a>

				<a href="data.php" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-database fa-fw mr-3"></i>
						<span class="menu-collapse">Data</span>
					</div>	
				</a>

				<a href="prediksi.php" class="bg-dark list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-table fa-fw mr-3"></i>
						<span class="menu-collapse">Prediksi</span>
					</div>
				</a>

				<a href="grafik.php" class="bg-dark list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-chart-line fa-fw mr-3"></i> 
						<span class="menu-collapse">Grafik</span>
					</div>
				</a>

				<a href="logout.php" class="bg-dark list-group-item list-group-item-action">
					<div class="d-flex w-100 justify-content-start align-items-center">
						<i class="fas fa-sign-out-alt fa-fw mr-3"></i>
						<span class="menu-collapse">Logout</span>
					</div>
				</a>

			</ul>
			
		</div>

			<div class="col-md-10 p-4" style="background-color: #e3e6e8">
				<div class="card border-0">
					<h3 class="card-header bg-transparent">Aplikasi Prediksi Penjualan Properti</h3>
					<div class="card-body">
						<p>Aplikasi ini dibuat bertujuan untuk memprediksi properti yang terjual dimasa yang akan datang. Dibuatnya aplikasi ini dengan maksud memudahkan para pengembang dalam menentukan kapan pembangunan perumahan dan perkiraan jumlah yang dibangun. Proses prediksi menggunakan data time series yang dikeluarkan oleh Bank Indonesia (BI). Metode prediksi (forecasting) yang digunakan adalah Exponential Smoothing, sementara Exponential Smoothing dibagi menjadi tiga kategori yaitu Single, Double dan Triple. Pada aplikasi ini akan menerapkan metode Triple Exponential Smoothing yang sesuai dengan data yang ada.</p>
						<h5>Tentang Algoritma Triple Exponential Smoothing</h5>
						<p>Metode ini merupakan metode forecasting dengan menggunakan persamaan kuadrat. Metode ini lebih cocok digunakan untuk membuat prediksi (forecasting) hal yang berfluktuasi atau mengalami gelombang pasang surut maksudnya kenaikan atau penurunan jumlah dari data tersebut biasanya terjadi secara tiba-tiba dan sukar diprediksi. </p>
					</div>
				</div>
			</div>


		<script>
			$('#body-row .collapse').collapse('hide');

			$('#collapse-icon').addClass('fa-angle-double-left');

			$('[data-toggle=sidebar-collapse]').click(function(){
				SidebarCollapse();
			});

			function SidebarCollapse(){
				$('.menu-collapse').toggleClass('d-none');
				$('.sidebar-submenu').toggleClass('d-none');
				$('.submenu-icon').toggleClass('d-none');
				$('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapse');

				var SeparatorTitle = $('.sidebar-separator-title');
				if (SeparatorTitle.hasClass ('d-flex')) {
					SeparatorTitle.removeClass('d-flex');
				} else {
					SeparatorTitle.addClass('d-flex');
				}

				$('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
			}
		</script>




</body>
</html>