<div style="margin:1% 17% 1% 13%;">
<?php
	if(isset($_GET['set'])){
		mysql_query("update files set status = '2' where iduser='".$_SESSION['iduser']."' and tipe ='".$_GET['t']."'");
		mysql_query("update files set status = '1' where iduser='".$_SESSION['iduser']."' and file = '".$_GET['f']."' and tipe ='".$_GET['t']."'");
		}

	$jam = date("His");
	if(isset($_POST['kirim'])){
		$date=date("Y-m-d H:i:s");
			mysql_query("update files set status ='2' where iduser='".$_SESSION['iduser']."' and tipe='cv'");
			//upload file
			$uploaddir = 'files/cv/';
			$uploadfile = $uploaddir .$_SESSION['iduser'].$jam.$_FILES['cv']['name'];
			$namafile = $_SESSION['iduser'].$jam.$_FILES['cv']['name'];
			if (move_uploaded_file($_FILES['cv']['tmp_name'],$uploadfile))
			{
				$cv = $namafile;
				} 
			else {
				 echo "<script>alert('File gagal diupload');</script>";
			}
			echo $date;
			mysql_query("insert into files values('".$_SESSION['iduser']."','$date','1','$cv','1')");
		}
	
	if(isset($_POST['kirim2'])){
		$date=date("Y-m-d H:i:s");
			mysql_query("update files set status ='2' where iduser='".$_SESSION['iduser']."' and tipe='lamaran'");
			//upload file
			$uploaddir = 'files/lamaran/';
			$uploadfile = $uploaddir .$_SESSION['iduser'].$jam.$_FILES['lamaran']['name'];
			$namafile = $_SESSION['iduser'].$jam.$_FILES['lamaran']['name'];
			if (move_uploaded_file($_FILES['lamaran']['tmp_name'],$uploadfile))
			{
				$lamaran = $namafile;
				} 
			else {
				 echo "<script>alert('File gagal diupload');</script>";
			}

			mysql_query("insert into files values('".$_SESSION['iduser']."','$date','2','$lamaran','1')");
		}
	
	if(isset($_POST['kirim3'])){
		$date=date("Y-m-d H:i:s");
			mysql_query("update files set status ='2' where iduser='".$_SESSION['iduser']."' and tipe='zip'");
			//upload file
			$uploaddir = 'files/zip/';
			$uploadfile = $uploaddir .$_SESSION['iduser'].$jam.$_FILES['zip']['name'];
			$nama =  $_SESSION['iduser'].$jam.$_FILES['zip']['name'];
			if (move_uploaded_file($_FILES['zip']['tmp_name'],$uploadfile))
			{
				$zip = $nama;
				} 
			else {
				 echo "<script>alert('File gagal diupload');</script>";
			}
			mysql_query("insert into files values('".$_SESSION['iduser']."','$date','3','$zip','1')");
		}
	$query = mysql_query("select * from files f  where iduser = '".$_SESSION['iduser']."' and tipe ='cv' order by date desc");
	
	echo "
	<h3>CV</h3>
	<table border=1>
	<tr>
		<th>No</th>
		<th>Nama CV</th>
		<th>Tanggal Upload</th>
		<th>Status</th>
	</tr>";
	$i=0;
	while($row=mysql_fetch_array($query)){
		$i++;
		echo "<tr>
		<td>$i</td>
		<td><a href ='files/CV/".$row['file']."'  style='color: #008040' target='_blank'>".$row['file']."</a></td>
		<td>".$row['date']."</td>
		<td>";
		if($row['status']=='enabled'){
			echo"<a href='index.php?id=pencari&sub=rs&t=cv&f=".$row['file']."&set=2' style='color: blue'>".$row['status']."</a>";
		}
		else{
			echo"<a href='index.php?id=pencari&sub=rs&t=cv&f=".$row['file']."&set=1'  style='color: #008040'>".$row['status']."</a>";
			}
		echo"</td></tr>
		";}
	echo "<tr><td colspan='4'>
		<form method='post' action='' enctype='multipart/form-data'>
			Upload  File : <input type='file' name='cv'><input type='submit' name='kirim' value='UPLOAD'>
		</form></td></tr></table>";
	
	
	$query = mysql_query("select * from files f  where iduser = '".$_SESSION['iduser']."' and tipe ='lamaran' order by date desc");
	
	echo "
	<h3>LAMARAN</h3>
	<table border=1>
	<tr>
		<th>No</th>
		<th>Nama Resume</th>
		<th>Tanggal Upload</th>
		<th>Status</th>
	</tr>";
	$i=0;
	while($row=mysql_fetch_array($query)){
		$i++;
		echo "<tr>
		<td>$i</td>
		<td><a href ='files/lamaran/".$row['file']."' style='color: #008040' target='_blank'>".$row['file']."</a></td>
		<td>".$row['date']."</td>
		<td>";
		if($row['status']=='enabled'){
			echo"<a href='index.php?id=pencari&sub=rs&t=lamaran&f=".$row['file']."&set=2' style='color: blue'>".$row['status']."</a>";
		}
		else{
			echo"<a href='index.php?id=pencari&sub=rs&t=lamaran&f=".$row['file']."&set=1' style='color: #008040'>".$row['status']."</a>";
			}
		echo"</td></tr>
		";}
	echo "<tr><td colspan='4'>
		<form method='post' action='' enctype='multipart/form-data'>
			Upload  File : <input type='file' name='lamaran'><input type='submit' name='kirim2' value='UPLOAD'>
		</form></td></tr></table>";
	
	
	$query = mysql_query("select * from files f  where iduser = '".$_SESSION['iduser']."' and tipe ='zip' order by date desc");
	
	echo "
	<h3>File Tambahan</h3>
	<table border=1>
	<tr>
		<th>No</th>
		<th>File </th>
		<th>Tanggal Upload</th>
		<th>Status</th>
	</tr>";
	$i=0;
	while($row=mysql_fetch_array($query)){
		$i++;
		echo "<tr>
		<td>$i</td>
		<td><a href ='files/zip/".$row['file']."' style='color: #008040' target='_blank'>".$row['file']."</a></td>
		<td>".$row['date']."</td>
		<td>";
		if($row['status']=='enabled'){
			echo"<a href='index.php?id=pencari&sub=rs&t=zip&f=".$row['file']."&set=2' style='color: blue'>".$row['status']."</a>";
		}
		else{
			echo"<a href='index.php?id=pencari&sub=rs&t=zip&f=".$row['file']."&set=1' style='color: #008040'>".$row['status']."</a>";
			}
		echo"</td></tr>
		";}
	echo "<tr><td colspan='4'>
		<form method='post' action='' enctype='multipart/form-data'>
			Upload  File : <input type='file' name='zip'><input type='submit' name='kirim3' value='UPLOAD'>
		</form></td></tr></table>
	<i>catatan : file zip / rar";
?>
</div>