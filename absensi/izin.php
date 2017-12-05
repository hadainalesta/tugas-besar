<?php
	include '../tampilan/header.php';
?>
	<h3><span class="glyphicon "></span>Form Izin</h3>
			<form method="post" enctype="multipart/form-data">
				<?php 
				 $nik=$_GET['nik'];
			$izin=mysqli_query($connection,"SELECT* FROM pegawai where nikPgw='$nik'");
			$row_izin=mysqli_fetch_assoc($izin);

			?>
		<table>
			<tr>
				<td>Tanggal : </td>
				<td><?php 
				date_default_timezone_set('Asia/Jakarta');
				$date=date('Y-m-d');?>
					<input type="date" name="tanggal" value="<?php echo $date;?>" disabled>
				</td>
			</tr>
			<tr>
				<td>Nama Lengkap : </td>
				<td>
					<?php $nik=$_GET['nik'];?>
					<input type="text" name="nama" value="<?php echo $row_izin['namaPgw'];?>" disabled>
				</td>
			</tr>
			<tr>
				<td>NIK : </td>
				<td>
					<?php $nik=$_GET['nik'];?>
					<input type="text" name="nik" value="<?php echo $nik;?>" disabled>
				</td>
			</tr>
			<tr>
				<td>Alasan</td>
				<td>
					<input type="text" name="alasan">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="upload"></td>
			</tr> 
			
		</table>
	</form>
	</div>
</div>
	<?php
if (isset($_POST['submit']))
{

		$nikpgw=$_POST['nik'];
			$tanggal=$_POST['tanggal'];
		$alasan = $_POST['alasan'];
		mysqli_query($connection,"INSERT INTO izin VALUES ('$nik','$date','$alasan')");
								header('location:../pegawai/berhasilp?nik=' .$nik);
		


 }
		
		
?>

</body>
</html>
