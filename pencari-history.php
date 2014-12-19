<div style="margin:1% 17% 1% 13%;" align="center">
<div align="left" style="width:100%;background-color:#008040;position:relative;height:30px;padding: 5px; margin-bottom:2%">
	<div style="font-size: 24px; color: #C2F5CF;font-weight:bold;">
    	HISTORY
    </div>
</div>

<?php
	$query = mysql_query("Select l.date,pr.Nama,lw.judul,l.status from lowongan lw  inner join lamaran l on lw.idlowongan = l.idlowongan left join perusahaan pr on lw.idperusahaan =  pr.iduser where l.iduser = '".$_SESSION['iduser']."' order by l.date desc");
	
	echo "<table border=0>
	<tr bgcolor=#999999 style='color:#008040'>
		<th>No</th>
		<th>Lowongan</th>
		<th>Perusahaan</th>
		<th>Tanggal</th>
		<th>Status</th>
	</tr>";
	$i=0;
	while($row=mysql_fetch_array($query)){
		$i++;
		echo "<tr>
		<td>$i</td>
		<td>".$row['judul']."</td>
		<td>".$row['Nama']."</td>
		<td>".$row['date']."</td>
		<td>".$row['status']."</td>
		</tr>
		";}
	echo "</table>";
?>
</div>