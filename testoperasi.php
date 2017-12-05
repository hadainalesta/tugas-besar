<?php
 require_once "PHPUnit/Framework/TestCase.php";
 
 class testoperasi extends PHPUnit_Framework_TestCase
 {
 //test penambahan...
 public function testTambah()
 {
 	$result1=myclass::methodpenjumlahan(2464461,10000);
 $this->assertEquals(2474461,$result1);
 }
 //test pengurangan...
 public function testPengurangan()
 {
 	$result=myclass::methodpengurangan(2474461,98578);
 $this->assertEquals(2375883,$result);
 }
 }
 class myclass
 {
 	public static function methodpenjumlahan($gaji_pokok,$tunj_masa_kerja)
 	{return $gaji_pokok+$tunj_masa_kerja;}
 	public static function methodpengurangan($pend_kotor,$potongan)
 	{return $pend_kotor-$potongan;}
 }
?>