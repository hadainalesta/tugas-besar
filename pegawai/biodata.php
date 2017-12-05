<?php
	include '../tampilan/header.php';
?>
	<h3><span class="glyphicon "></span>Biodata</h3>
		<table>
			<?php 
			$biodata=mysqli_query($connection,"SELECT* FROM pegawai where nikPgw='$nik'");
			$row_biodata=mysqli_fetch_assoc($biodata);

			?>
			<tr>
				<td>NIK</td>
				<td><?php echo $row_biodata['nikPgw']; ?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><?php echo $row_biodata['namaPgw']; ?></td>
			</tr>
			<tr>
				<td>jenis kelamin</td>
				<td><?php echo $row_biodata['jkPgw']; ?></td>
			</tr>
			<tr>
				<td>Tanggal lahir</td>
				<td><?php echo $row_biodata['ttlPgw']; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?php echo $row_biodata['alamatPgw']; ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td><?php echo $row_biodata['jabatanPgw']; ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $row_biodata['usernamePgw']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="../pegawai/EditBiodata.php?nik=<?php echo $row_biodata['nikPgw'];?>"><input type="submit" value="EDIT"></a></td>
			</tr>


		</table>
		</div>
	</div>


</body>
</html>
