<?php
include '../tampilan/header.php';

?>
<h3><span class="glyphicon glyphicon-briefcase"></span>Presensi datang</h3>
				<div class="col-sm-4 col-sm-offset-4 form ">
			<div class="outter-form ">
				<form method="post">
					<div class="form-group"><input type="submit" name="jamMasuk" value="TEKAN UNTUK JAM MASUK KERJA" class="btn btn-danger btn-large">
				
		</div></form>
	</div></div>
		<?php
				date_default_timezone_set('Asia/Jakarta');
				$date=date('Y-m-d');
				date_default_timezone_set('Asia/Jakarta');
				$time=date('H:i:s');

				$masuk=mysqli_query($connection,"SELECT TanggalDatang FROM presensidatang where TanggalDatang='$date' AND nikPgw='$nik'");

				if(isset($_POST['jamMasuk'])) 
				{
					if(mysqli_num_rows($masuk) > 0){
						header('location:../pegawai/peringatan.php?nik='. $nik);
					}

					else{
								
								$a=mysqli_query($connection,"INSERT INTO presensidatang VALUES ('$nik','$date','$time')");
								header('location:../pegawai/index.php?nik=' .$nik);
					}
								
				}		

		?>

		</div>
	</div>


</body>
</html>
