<?php
  include '../tampilan/header-admin.php';
?>
  <h3><span class="glyphicon "></span>View Presensi</h3>
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
      <table border="2px">
        <tr>
          <td>Nomor</td>
          <td>TANGGAL MASUK</td>
          <td>JAM MASUK</td>
          <td>TANGGAL PULANG</td>
          <td>JAM PULANG</td>
          
        </tr>
        <?php
        if(isset($_POST['submit'])){
          $blth = $_POST['bulantahun'];
          $datapresensi=mysqli_query($connection,"SELECT * FROM presensidatang,presensipulang WHERE date_format(presensidatang.TanggalDatang, '%M %Y')='$blth' AND date_format(presensipulang.TanggalPulang, '%M %Y')='$blth' AND presensidatang.nikPgw=presensipulang.nikPgw AND TanggalDatang=TanggalPulang  AND presensidatang.nikPgw=$nik AND presensipulang.nikPgw=$nik ORDER BY CONCAT(date_format(TanggalDatang,'%d'))");
          $no=1;
          while($row_datapresensi = mysqli_fetch_array($datapresensi)){ 
          ?>
        <tr>
          <td><?php echo $no;?>&nbsp;</td>
          <td><?php echo $row_datapresensi['TanggalDatang'];?>&nbsp;</td>
          <td><?php echo $row_datapresensi['WaktuDatang'];?>&nbsp;</td>
          <td><?php echo $row_datapresensi['TanggalPulang'];?>&nbsp;</td>
          <td><?php echo $row_datapresensi['WaktuPulang'];?>&nbsp;</td>
          
        </tr>
        <?php 
        $no++;


    } 




  } 





        ?>
      </table>
    </div>
  </div>
</body>
</html>