<div style="float:left; width:80%">PROFILE</div><div style="float:left; background-color:"><a href="index.php?id=pencari&act=edit">EDIT</a></div>
<?php
$query = mysql_query("SELECT pn.nama, pn.alamat, pr.provinsi_nama, kb.kabupaten_nama, pn.keahlian FROM pencari pn, provinsi pr, kabupaten kb WHERE pn.idprovinsi = pr.provinsi_id AND pn.idkabupaten = kb.kabupaten_id AND pn.iduser = '".$_SESSION['iduser']."'");

while($row = mysql_fetch_array('$query')){
	echo "<table>
    	<tr>
        	<td>Nama</td>
            <td> : </td>
            <td> ".$row['nama']."</td>
        </tr>
    </table>
	
	<table border='1'>
		<tr>
			<td>No</td><td>Keahlian</td>
		</tr>
		<tr>";
	
	$exp_ahli = explode(",",$row['keahlian']);
	$total = count($exp_ahli);
	for($i=0;$i<$total-1;$i++){
		echo "<td>".$i."</td><td>".$exp_ahli[$i]."</td>";
	}
	echo"</tr></table>";
	}
?>