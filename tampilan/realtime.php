<script type="text/javascript" >    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function tampilkanwaktu(){
        //buat object date berdasarkan waktu saat ini
        var waktu = new Date();
        //ambil nilai jam, 
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = waktu.getHours() + ""; 
        //ambil nilai menit
        var sm = waktu.getMinutes() + "";
        //ambil nilai detik
        var ss = waktu.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("jum").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">								
<span id="clock"></span> 
<?php
$hari = date('l');
/*$new = date('l, F d, Y', strtotime($Today));*/
if ($hari=="Sunday") {
	$hr= "Minggu";
}elseif ($hari=="Monday") {
	$hr= "Senin";
}elseif ($hari=="Tuesday") {
	$hr= "Selasa";
}elseif ($hari=="Wednesday") {
	$hr= "Rabu";
}elseif ($hari=="Thursday") {
	$hr="Kamis";
}elseif ($hari=="Friday") {
	$hr= "Jum'at";
}elseif ($hari=="Saturday") {
	$hr= "Sabtu";
}
?>
<?php
$tgl =date('d');

$bulan =date('F');
if ($bulan=="January") {
	$bln="Januari";
}elseif ($bulan=="February") {
	$bln=" Februari ";
}elseif ($bulan=="March") {
	$bln=" Maret ";
}elseif ($bulan=="April") {
	$bln=" April ";
}elseif ($bulan=="May") {
	$bln=" Mei ";
}elseif ($bulan=="June") {
	$bln=" Juni ";
}elseif ($bulan=="July") {
	$bln=" Juli ";
}elseif ($bulan=="August") {
	$bln=" Agustus ";
}elseif ($bulan=="September") {
	$bln=" September ";
}elseif ($bulan=="October") {
	$bln=" Oktober ";
}elseif ($bulan=="November") {
	$bln=" November ";
}elseif ($bulan=="December") {
	$bln=" Desember ";
}
$tahun=date('Y');

?>
<?php echo "<div class="jum">.$hari.$tgl.$bln.$tahun.</div>";?>
<h1 style="font-size: 100px; font-family: arial; color:#000; background:red" id="jum"></h1>