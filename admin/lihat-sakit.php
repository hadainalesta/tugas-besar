<?php
  include '../tampilan/header-admin.php';
?>
  <h3><span class="glyphicon "></span>View Sakit</h3>
      <?php 
      $hasil=mysqli_query($connection,"SELECT DISTINCT date_format(TanggalDatang, '%M %Y') as bulantahun FROM presensidatang WHERE nikPgw='$nik' ORDER BY CONCAT(date_format(TanggalDatang,'%m %Y'))");
      $pgw=mysqli_query($connection,"SELECT * from pegawai where nikPgw='$nik'");

      ?>
      <table border="1">
        <tr>
          <td>Foto Profil</td>
          <td>Nama Pegawai</td>
          <td>NIK</td>
          <td>Jabatan</td>
          
        </tr>
         <?php while ($d = mysqli_fetch_array($pgw))
      {?>
        <tr>
          <td><?php echo "<img src='../image/".$d['foto_pegawai']."' width='100' height='100'>"; ?></td>
          <td><?php echo $d['namaPgw']?></td>
          <td><?php echo $d['nikPgw']?></td>
          <td><?php echo $d['jabatanPgw']?></td>
        </tr>
       <?php } ?>
      </table>
      <form method="post">
      <select name="bulantahun">
      <?php 
      while ($data = mysqli_fetch_array($hasil))
      {
       ?>
         <option value="<?php echo $data['bulantahun'];?>"><?php echo $data['bulantahun'];?></option>
      <?php  } ?>
      <input type="submit" name="submit" value="submit">
      </select>
        
      </form>
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