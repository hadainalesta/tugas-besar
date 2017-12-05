<?php
	include '../tampilan/header.php';
?>
<h3><span class="glyphicon "></span>Home</h3>
			<?php

			include '../tampilan/jamdigital.php';
			?>

			<div class="col-sm-4 col-sm-offset-4 form">
			<div class="outter-form ">
			<form method="post" >
			
				<div class="form-group tengah"><input type="submit" name="presensi" value="PRESENSI" class="btn btn-primary ukurbtn"></div>
				
			
				<div class="form-group tengah"><input type="submit" name="izin" value="IZIN" class="btn btn-success ukurbtn"></div>
				
			
				<div class="form-group tengah"><input type="submit" name="sakit" value="SAKIT" class="btn btn-warning ukurbtn"></div>
				
			
		</form>
	</div>
</div>
		<?php 
			date_default_timezone_set('Asia/Jakarta');
				$date=date('Y-m-d');
				date_default_timezone_set('Asia/Jakarta');
				$time=date('H:i:s');
			$masuk=mysqli_query($connection,"SELECT TanggalDatang FROM presensidatang where TanggalDatang='$date' AND nikPgw='$nik'");
			$pulang=mysqli_query($connection,"SELECT TanggalPulang FROM presensipulang where TanggalPulang='$date' AND nikPgw='$nik'");




		if(isset($_POST['presensi'])) 
		
				{
					if(mysqli_num_rows($masuk) > 0 && mysqli_num_rows($pulang)>0){
						header('location:peringatan.php?='.$nik);
					}
					else if(mysqli_num_rows($masuk)>0){
						header('location:../absensi/presensipulang.php?nik='.$nik);
					}
					else{
							header('location:../absensi/presensidatang.php?nik=' .$nik);
					}
				}
				else if(isset($_POST['izin'])) 
				{
					header('location:../absensi/izin.php?nik=' .$nik);
				}
				else if(isset($_POST['sakit'])) 
				{header('location:../pegawai/sakit.php?nik=' .$nik);}

		?>


	</div>
</div>


</body>
</html>
