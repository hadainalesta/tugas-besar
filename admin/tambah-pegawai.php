<?php
  include '../tampilan/header-admin.php';
?>
  <h3><span class="glyphicon "></span>tambah pegawai</h3>
			<form method="post" enctype="multipart/form-data" >
		<table>
						<tr>
				<td>NIK</td>
				<td><input type="text" name="nik" value=""></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><input type="text" name="nama" value=""></td>
			</tr>
			<tr>
				<td>jenis kelamin</td>
				<td><input type="radio" name="jenis_kelamin" value="L" checked> L
					<input type="radio" name="jenis_kelamin" value="P"  checked> P
				</td>
			</tr>
			<tr>
				<td>Tanggal lahir</td>
				<td><input type="date" name="ttl" value=""></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value=""></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td><input type="text" name="jabatan" value=""></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value=""></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" value=""></td>
			</tr>
			<tr>
				<td>Upload foto : </td>
				<td>
					<input type="file" name="gambar" >
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

		$nik=$_POST['nik'];
		$nama = $_POST['nama'];
		$jenis_kelamin=$_POST['jenis_kelamin'];
		$ttl = $_POST['ttl'];
		$alamat = $_POST['alamat'];
		$jabatan = $_POST['jabatan'];
		$username = $_POST['username'];
		$password=$_POST['password'];
		$foto = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
 
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmY').$foto;
// Set path folder tempat menyimpan fotonya
 $path = "../image/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO pegawai VALUES('$username','$password','$nama', '$nik', '$jenis_kelamin','$ttl','$alamat','$jabatan','$fotobaru')";
  $sql = mysqli_query($connection, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: berhasil.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
}
		
		
?>

</body>
</html>
