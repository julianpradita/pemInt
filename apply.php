<div style="margin:1% 17% 1% 13%; ">
<?php
if(!isset($_POST['kirim'])){
$query = mysql_query("SELECT * from files where iduser = '".$_SESSION['iduser']."' and status ='enabled'");
echo "
	<h3>ACTIVE</h3>
	<form method='post' action=''>
	<table border=1>
	<tr>
		<th width=100px>Tipe</th>
		<th>Nama</th>
		<th></th>
	</tr>";
	while($row=mysql_fetch_array($query)){
		echo "<tr>
				<td>".$row['tipe']."</td>
				<td>".$row['file']."</td>
				<th><input name=".$row['tipe']." type='checkbox' value=".$row['file']."></th>
			</tr>";}
	echo "
	<tr><td colspan=3 align=right><input type=submit name='kirim' value='APPLY'></td></tr></table>";
	echo"
	<input type=hidden name=idlow value='".$_GET['low']."'>
	</form>";
}
else{
	$date = date("Y-m-d H:i:s");
	if(isset($_POST['CV'])){$cv = $_POST['CV'];} else{$cv ="";}
	if(isset($_POST['lamaran'])){$lamaran = $_POST['lamaran'];} else{$lamaran ="";}
	if(isset($_POST['zip'])){$zip = $_POST['zip'];} else{$zip ="";}
	mysql_query("insert into lamaran values('".$_POST['idlow']."','".$_SESSION['iduser']."','$cv','$lamaran','$zip','$date','1')");
	echo"<script>alert('Lamaran sudah dikirim');window.location='index.php?id=pencari';</script>";
	}
?>
</div>