<?php
	include '../tampilan/header.php';
?>
	<h3><span class="glyphicon "></span>Edit Biodata</h3>
			
			<form action="prosesupdatebio.php?nik=<?php echo $nik;?>" method="post" enctype="multipart/form-data">
		<table><?php 
			$query_mysql = mysqli_query($connection,"SELECT * FROM pegawai WHERE nikPgw='$nik'");
						while ($data = mysqli_fetch_array($query_mysql)){
			?>
			<?php echo "<img src='../image/".$data['foto_pegawai']."' width='100' height='100'>";?>
			<tr>
				<td>Upload Foto :</td>
				<td>
					<input type="file" name="foto" value="<?php echo $data['foto_pegawai']; ?>">
					
				</td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><input type="text" name="nama" value="<?php echo $data['namaPgw']; ?>">
					<input type="hidden" name="nik" value="<?php echo $data['nikPgw']; ?>">
				</td>
			</tr>
			<tr>
				<td>jenis kelamin</td>
				<td><input type="radio" name="jenis_kelamin" value="L"<?php if($data['jkPgw'] == 'L'){ echo 'checked';} ?> />L
					<input type="radio" name="jenis_kelamin" value="P"<?php if($data['jkPgw'] == 'P'){ echo 'checked';}  ?> />P
				</td>
			</tr>
			<tr>
				<td>Tanggal lahir</td>
				<td><input type="date" name="ttl" value="<?php echo $data['ttlPgw']; ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="" name="alamat" value="<?php echo $data['alamatPgw']; ?>"></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td><input type="text" name="jabatan" value="<?php echo $data['jabatanPgw']; ?>"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $data['usernamePgw']; ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" value="<?php echo $data['passwordPgw']; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="edit" value="Edit"></td>
			</tr> 
			<?php } ?>
		</table>
	</form>
	
	</div>
</div>


</body>
</html>
