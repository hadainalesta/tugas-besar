<?php
session_start();
include '../koneksi/connection.php';
$nik=$_GET['nik'];
?>
<!DOCTYPE html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=2">
		<meta charset="utf-8">
		<title>Home</title>
		<link rel="stylesheet" href="../style/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../style/style.css" >
		
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		  <script src="../style/js/bootstrap.min.js"></script>


</head>
<body >
	<div class="navbar-default hitam">
		<div class="container-fluid hitam">
			<div class="navbar-header hitam">
				<a href="#"  class="navbar-brand">ADMIN</a>
				
			</div>
			<div class="collapse navbar-collapse hitam">				
					<ul class="nav navbar-nav navbar-right">
						
						<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#"><?php echo $_SESSION['nama']  ?><span class="glyphicon glyphicon-user"></span></a></li>
					</ul>
			</div>
		</div>
	</div>
	
	<div class="col-sm-2 menuver">
		<div class="row tinggi">
			<?php 
			$nik=$_GET['nik'];
			$foto=mysqli_query($connection,"SELECT foto_admin FROM admin where nikAdmin='$nik'");
			while($f=mysqli_fetch_array($foto)){
				?>				
				<div class="col-md-2"></div>
				<div class="col-xs-6 col-md-8">
					<a class="thumbnail">
						<center><img class="img-responsive" src="../image/<?php echo $f['foto_admin']; ?>"></center>
					</a>
				</div>
				<div class="col-md-2"></div>
				<?php 
			}
			?>	
		</div>
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked kuning tulisanmenvar">
				<li class="aktiv"><a href="../admin/data-pegawai.php?nik=<?php echo $nik;?>">Data Pegawai</a></li>
				<li><a href="../admin/data-presensi.php?nik=<?php echo $nik;?>">Data Presensi pegawai</a></li>
				<li><a href="../admin/data-sakit.php?nik=<?php echo $nik;?>">Data sakit pegawai</a></li>
				<li><a href="../admin/data-izin.php?nik=<?php echo $nik;?>">Data izin pegawai</a></li>
				<li><a href="../admin/data-gaji.php?nik=<?php echo $nik;?>">Data gaji pegawai </a></li>
				<li><a href="../penggajian/penggajian.php?nik=<?php echo $nik;?>">Data Kelola Gaji</a></li>
				
			</ul>
		</ul>
	</div>
	<div class="kanan">
	<div class="col-md-10">