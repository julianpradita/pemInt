<script language='javascript'>

function kabupaten()

{

<?php

// membaca semua propinsi


$query = "SELECT * FROM provinsi ORDER BY provinsi_id ASC";

$hasil = mysql_query($query);

// membuat if untuk masing-masing pilihan propinsi beserta isi option untuk combobox kedua

while ($data = mysql_fetch_array($hasil))

{

$prov = $data['id_provinsi'];

// membuat IF untuk masing-masing propinsi

echo "if (document.form.provinsi.value == \"".$prov."\")";

echo "{";

// membuat option kota untuk masing-masing propinsi

$query2 = "SELECT * FROM kabupaten WHERE provinsi_id = ".$prov." ORDER BY kota_id ASC";

$hasil2 = mysql_query($query2);

$content = "document.getElementById('kabupaten').innerHTML = \"";

while ($data2 = mysql_fetch_array($hasil2))

{

$content .= "<option value='".$data2['kota_id']."'>".$data2['kokab_nama']."</option>";

}

$content .= "\"";

echo $content;

echo "}\n";

}

?>

}

</script>