<?php
	include '../tampilan/header.php';
?>
	<h3><span class="glyphicon "></span>Data Absen</h3>
			<?php 
			$hasil=mysqli_query($connection,"SELECT DISTINCT date_format(TanggalDatang, '%M %Y') as bulantahun FROM presensidatang WHERE nikPgw='$nik'");
			?>
			<form method="post">
			<select name="bulantahun">
			<?php 
			while ($data = mysqli_fetch_array($hasil))
			{
			 ?>
			   <option value="<?php echo $data['bulantahun']?>"><?php echo $data['bulantahun'];?></option>
			<?php  } ?>
			<input type="submit" name="submit" value="submit">
			</select>
				
			</form>
			<table border="2px" class="table tab table-striped">
				<tr border="2">
					<td>Nomor</td>
					<td>TANGGAL ABSEN</td>				
				</tr>
				<?php
				if(isset($_POST['submit'])) {

					
					$blth = $_POST['bulantahun'];
					$query=mysqli_query($connection,"SELECT TanggalDatang FROM presensidatang WHERE date_format(TanggalDatang, '%M %Y')='$blth' AND nikPgw=$nik ORDER BY CONCAT(date_format(TanggalDatang,'%d'))");
					
					$jumlah=mysqli_num_rows($query);

					
					$query_tanggal=mysqli_query($connection,"SELECT date_format(tgl,'%d')as tnggal FROM tanggal");
					
					$jumlahtgl=mysqli_num_rows($query_tanggal);
					$query_bulan=mysqli_query($connection,"SELECT DISTINCT date_format(TanggalDatang, '%m') as bulan FROM presensidatang where nikPgw='$nik' AND date_format(TanggalDatang, '%M %Y')='$blth'");
					$data_bulan=mysqli_fetch_array($query_bulan);
					$bulan=$data_bulan['bulan'];
					$query_year=mysqli_query($connection,"SELECT DISTINCT date_format(TanggalDatang, '%Y') as tahun FROM presensidatang where nikPgw='$nik' AND date_format(TanggalDatang, '%M %Y')='$blth'");
					$data_year=mysqli_fetch_array($query_year);
					$year=$data_year['tahun'];
					$arr1 = array();
					$arr2 = array();
					$arr3 = array();
					$i=0;
					$j=0;
					$k=0;
					$l=0;
					
					

					while ($dat=mysqli_fetch_array($query)) { $arr1[$i]=$dat['TanggalDatang'];  
					$array4=explode("-",$arr1[$i]);
					$tahun=$array4[0];
					
					$bulan=$array4[1];
					
					$sisa4=$array4[2];
					
					$array5=explode(" ",$sisa4);
					$tgldtg=$array5[0];
					$jumlahtgldtg[$i]=intval($tgldtg);
					$i++; 
					 }
					 $a=0;
					 $jlh=0;
					 while($jumlahtgldtg[$a]<10)
					 {
					 	$jlh=$jlh+1;
					 	$a++;
					 }

					$array1=explode("-",$arr1[count($arr1)-1]);
					$tahun=$array1[0];
					$bulan=$array1[1];
					$sisa1=$array1[2];
					$array2=explode(" ",$sisa1);
					$tgl=$array2[0];
					$jumlahtgl=intval($tgl);
					$j=0;
					 while ($j<$jumlahtgl) {
					 	if ($j<=10-$jlh)
					 	{$arr2[$j]=$data_year['tahun']."-".$data_bulan['bulan']."-0".strval($j+1);  $j++;}
					 	  
					 	  else{
					 	  	$arr2[$j]=$data_year['tahun']."-".$data_bulan['bulan']."-".strval($j+1);   $j++;
					 	  }
					 	 }
					 $j=0;
					 $b=1;
					 $jml=0;
					for($i=0;$i<count($arr1);$i++){
						for($j=0;$j<$jumlahtgl;$j++){
							if($arr1[$i]!=$arr2[$j]){ $jml=$jml+1;
								?>
									<tr> 
										<td><center><?php echo $b;?>&nbsp;</center></td>
										<td><center><?php echo $arr2[$j];?>&nbsp;</center></td>
									</tr><?php $b++;
							}
							else{
								$i++; 
							}

						}
					}		echo $_SESSION['baris']=$jml;
						
					
				}
					?>
					
			</table>
		</div>
	</div>
</body>
</html>