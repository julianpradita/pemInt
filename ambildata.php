<?php
include ("koneksi.php");
$kode=$_GET['kode'];
echo"<select name='kabupaten'>";
$sql=mysql_query("select kota_id,kokab_nama from kabupaten where provinsi_id='1'");

while ($sql2=mysql_fetch_array($sql)){
	echo "<option value=".$sql2['kota_id'].">".$sql2['kokab_nama']."</option>";
	}
	echo"</select>";
?>
