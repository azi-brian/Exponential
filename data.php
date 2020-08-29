<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="fontawesome/css/all.css" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<body>
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
					<h3 class="card-header bg-transparent">Data Penjualan Properti</h3>
					<div class="card-body">
					<form method="post">
						<div class="form-row mb-4">
							<div class="col-md-8 mr-4">
							<label class="mr-sm-2" for="pilih">Pilih Provinsi</label>
							<select class="custom-select mr-sm-2" id="pilih" name="kota">

									<?php 


										include ("koneksi.php");
										$sql="SELECT * from tb_provinsi";
										$hasil=mysqli_query($koneksi, $sql) or exit("error query: <b>".$sql."</b>.");
										while ($data=mysqli_fetch_array($hasil)) {	
											$ket="";
											 if (isset($_POST['kota'])) {
								                $kota = trim($_POST ['kota']);

								                if ($kota==$data['id_kategori'])
								                {
								                    $ket="selected";
								                }
								            }
									?>

				            	<option <?php echo $ket; ?> value="<?php echo $data['id_kategori'];?>"><?php echo $data['kota'];?></option>
				            <?php } ?>
				            </select>
				       		</div>
					        	<div id="tengah" class="col-ml-2">
	   								<input formaction="data.php" valign="center" type="submit" class="btn btn-primary" value="Pilih">
	   							</div>
   						</div>
   						<input formaction="sebelum.php" valign="center" type="submit" class="btn btn-primary" value="Tambah">
					</form>

					

					<table class="table table-hover table-bordered table-sm mt-2">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Waktu</th>
							<th>Unit</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<?php 
					require_once __DIR__ . '/vendor/autoload.php';
					use Phpml\Preprocessing\Imputer;
					use Phpml\Preprocessing\Imputer\Strategy\MeanStrategy;
					
					$nourut=1;
					if (isset($_POST['kota'])) {
							$provinsi=trim($_POST['kota']);
							$sql="SELECT * from tb_data where id_kategori=$provinsi";
						} else {
							$sql="SELECT * from tb_data where id_kategori=1";
						}

					$hasil=mysqli_query($koneksi, $sql) or exit("error query: <b>".$sql."</b>.");
					while ($data=mysqli_fetch_assoc($hasil)) {
						$ini[]=$data['id'];
						$rows[]=$data['unit'];
						$waktu[]=$data['waktu'];
					}

					$saja = [$rows];

					$imputer=new Imputer('', new MeanStrategy(), Imputer::AXIS_ROW);
					$imputer->fit($saja);
					$imputer->transform($saja);
					?>

					<?php 
						for ($i=0; $i < count($rows); $i++) { 
															
					?>
						<tr>
							<td><?php echo $nourut++; ?></td>
							<td><?php echo $waktu[$i]; ?></td>
							<td><?php echo $saja[0][$i]; ?></td>
							<td>
					 		<a href="ubah.php?id=<?php echo $ini[$i]; ?>" class="btn btn-warning btn-sm" role="button"><i class="fas fa-edit"></i> ubah</a>
					 		<a href="hapus.php?id=<?php echo $ini[$i]; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger btn-sm" role="button"><i class="far fa-trash-alt"></i> hapus</a>
					 		</td>
						</tr>	
						<?php } ?>

					</table>
					</div>
				</div>
 			</div>
 			
 		</div>

 	</div>


	 
</body>
</html>