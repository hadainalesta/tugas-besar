<?php
	include '../tampilan/header.php';
?>
	<h3><span class="glyphicon "></span>Data Izin</h3>
		<table border="2px" class="table tab table-striped">
				<tr border="2">
    <td>No</td>
    <td>Tanggal</td>
    <td>Alasan Izin</td>
  </tr>
  <?php

  $query = "SELECT * FROM izin WHERE nikPgw='$nik'"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($connection, $query); // Eksekusi/Jalankan query dari variabel $query
  $no=1;
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$no."</td>";
     echo "<td>".$data['tanggal_izin']."</td>";
     echo "<td>".$data['alasan']."</td>";
    echo "</tr>";
    $no++;
  }
  ?>
</table>
		</div>
	</div>


</body>
</html>
