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
				<a href="#"  class="navbar-brand">Absensi dan Penggajian</a>
				
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
			$foto=mysqli_query($connection,"SELECT foto_pegawai FROM pegawai where nikPgw='$nik'");
			while($f=mysqli_fetch_array($foto)){
				?>				
				<div class="col-md-2"></div>
				<div class="col-xs-6 col-md-8">
					<a class="thumbnail">
						<center><img class="img-responsive" src="../image/<?php echo $f['foto_pegawai']; ?>"></center>
					</a>
				</div>
				<div class="col-md-2"></div>
				<?php 
			}
			?>	
		</div>
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked kuning tulisanmenvar">
			<li class="aktiv
			"><a href="../pegawai/index.php?nik=<?php echo $nik;?>" ><span class="glyphicon glyphicon-home"></span>Home</a></li>
			<li ><a href="../absensi/datapresensi.php?nik=<?php echo $nik;?>"><span class="glyphicon glyphicon-file"></span>Data Presensi</a></li>
			<li><a href="../absensi/dataabsen.php?nik=<?php echo $nik;?>" ><span class="glyphicon glyphicon-file"></span>Data Absen</a></li>
			<li><a href="../absensi/datasakit.php?nik=<?php echo $nik;?>"><span class="glyphicon glyphicon-file"></span>Data Sakit</a></li>
			<li><a href="../absensi/dataizin.php?nik=<?php echo $nik;?>"><span class="glyphicon glyphicon-file"></span>Data Izin</a></li>
			<li><a href="../penggajian/gajikaryawan.php?nik=<?php echo $nik;?>" ><span class="glyphicon glyphicons-file"></span>Data Gaji</a></li>
		</ul>
	</div>
	<div class="kanan">
	<div class="col-md-10">