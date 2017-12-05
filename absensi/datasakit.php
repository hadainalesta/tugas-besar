<?php
	include '../tampilan/header.php';
?>
	<h3><span class="glyphicon "></span>Data Sakit</h3>
			<table>
		 <tr>
    <td>No</td>
    <td>Tanggal</td>
    <td>jenis penyakit</td>
    <td>foto</td>
  </tr>
  <?php

  $query = "SELECT * FROM sakit WHERE nikPgw='$nik'"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($connection, $query); // Eksekusi/Jalankan query dari variabel $query
  $no=1;
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$data['tanggalSakit']."</td>";
    echo "<td>".$data['jenisPenyakit']."</td>";
    echo "<td><img src='../image/".$data['fotoKetDokter']."' width='100' height='100'></td>";
    echo "</tr>";
    $no++;
  }
  ?>
</table>
		</div>
	</div>


</body>
</html>
