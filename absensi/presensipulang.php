<?php
	include '../tampilan/header.php';
?>
	<h3><span class="glyphicon "></span>Presensi Pulang</h3>
			<form method="post">
			<table>
				<tr>
					<td><input type="submit" name="jamPulang" value="TEKAN UNTUK JAM PULANG KERJA">
					</td>
				</tr>
				
			</table>
		</form>
		<?php
				date_default_timezone_set('Asia/Jakarta');
				$date=date('Y-m-d');
				date_default_timezone_set('Asia/Jakarta');
				$time=date('H:i:s');
				$nik = $_GET['nik'];
				$pulang=mysqli_query($connection,"SELECT TanggalPulang FROM presensipulang where TanggalPulang='$date' AND nikPgw='$nik'");

				if(isset($_POST['jamPulang'])) 
				{
					if(mysqli_num_rows($pulang) > 0){
						header('location:../pegawai/peringatan.php?nik=' .$nik);
					}

					else{

							
								$a=mysqli_query($connection,"INSERT INTO presensipulang VALUES ('$nik','$date','$time')");
								$query=mysqli_query($connection,"SELECT WaktuPulang FROM presensipulang where TanggalPulang='$date' AND nikPgw='$nik'");
							$data=mysqli_fetch_array($query);

								$lembur=$data['WaktuPulang'];
								$array=explode(":",$lembur);
								$jam=$array[0];
							
								$date1="15:00:00";
								$date2="16:00:00";
								$date3="17:00:00";
								$array1=explode(":",$date1);
								$jam1=$array1[0];
							
								$array2=explode(":",$date2);
								$jam2=$array2[0];
							
								$array3=explode(":",$date3);
								$jam3=$array3[0];
							
								
								if($jamutama===$jam_1)
								{
									$jam_lembur=0;
									$total_bayar=0;
									
										mysqli_query($connection,"INSERT INTO lembur VALUES('$date','$time','$nik','$jam_lembur','$total_bayar')");
									
								}
								else if($jamutama>=$jam_2)
								{
									$jam_lembur=1;
									$total_bayar=10000*$jam_lembur;
									
										mysqli_query($connection,"INSERT INTO lembur VALUES('$date','$time','$nik','$jam_lembur','$total_bayar')");
									
								}
								else if($jamutama>=$jam_3)
								{
									$jam_lembur=2;
									$total_bayar=10000*$jam_lembur;
									
									mysqli_query($connection,"INSERT INTO lembur VALUES('$date','$time','$nik','$jam_lembur','$total_bayar')");
								
									
								}
							


				}
								
				header('location:../pegawai/index.php?nik=' .$nik);}		

		?>

		</div>
	</div>


</body>
</html>
