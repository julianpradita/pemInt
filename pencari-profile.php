<?php include('koneksi.php'); ?>
<script>
function createRequestObject() {
	var ro;
	var browser = navigator.appName;
	if(browser == "Microsoft Internet Explorer"){
		ro = new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		ro = new XMLHttpRequest();
	}
	return ro;
}
var xmlhttp = createRequestObject();
function rubah2(combobox)
{
	var kode = combobox.value;
	if (!kode) return;
	xmlhttp.open('get', 'ambildata.php?kode='+kode, true);
	xmlhttp.onreadystatechange = function() {
		if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
		{
			 document.getElementById("tampilkabupaten").innerHTML = xmlhttp.responseText;
		}
		return false;
	}
	xmlhttp.send(null);
}
</script>
<div style="margin:1% 17% 1% 13%; ">
  <div style="width:100%;background-color:#008040;position:relative;height:30px;padding : 5px;">
   	<div style="font-size: 24px; color: #C2F5CF;font-weight:bold;">PROFILE</div>
      <?php
        if(!isset($_GET['act'])){
			?>
      <div align="center" style="position: absolute; right: 10px; top : 6px; width: 70px; background-color: #00CC00; padding: 3px 10px 3px 10px; font-size: 18px;">
          <a href="index.php?id=pencari&sub=mine&act=edit" style="color:#C2F5CF;">EDIT</a>
      </div>
      <?php
        }
		?>
        
    </div>
<?php
	if(!isset($_GET['act'])){
	$query = mysql_query("SELECT pn.*, pr.provinsi_nama, kb.kokab_nama FROM pencari pn, provinsi pr, kabupaten kb WHERE pn.provinsi = pr.provinsi_id AND pn.kabupaten = kb.kota_id AND pn.iduser = '".$_SESSION['iduser']."'");
	
	while($row = mysql_fetch_array($query)){
		echo "<table style='margin-top:3%;' border=0>
			<tr>
			<td rowspan=9 valign=top style='padding-right:40px;'>";
				if(!isset($row['foto'])){$foto = 'none.jpg';} else {$foto = $row['foto'];}
					echo "<img src='Image/profpic/$foto' width=120px></td>
				<td><b>Username</b></td>
				<td> : </td>
				<td>".$row['Username']."</td>
			</tr>
			<tr>
				
				<td><b>Nama</b></td>
				<td> : </td>
				<td> ".$row['Nama']."</td>
				
			</tr>
			
			<tr>
				<td><b>Jenis Kelamin</b></td>
				<td> : </td>
				<td>".$row['Jekel']."</td>
			</tr>
			<tr>
				<td><b>Tgl Lahir</b></td>
				<td> : </td>
				<td> ".$row['tglLahir']."</td>
			</tr>
			<tr>
				<td><b>Alamat</b></td>
				<td> : </td>
				<td> ".$row['Alamat'].", ".$row['kokab_nama'].", ".$row['provinsi_nama']."</td>
			</tr>
			<tr>
				<td><b>Email</b></td>
				<td> : </td>
				<td> ".$row['Email']."</td>
			</tr>
			<tr>
				<td><b>Telepon</b></td>
				<td> : </td>
				<td> ".$row['Telepon']."</td>
			</tr>
			<tr>
				<td><b>Pendidikan Terakhir</b></td>
				<td> : </td>
				<td>".$row['Didik']."</td>
			</tr>
		</table>
		
		
		<p>	<b>KEAHLIAN</b></p>
		<table border='1' >
			<tr>
				<td>No</td><td>Keahlian</td>
			</tr>
			";
		
		$exp_ahli = explode(",",$row['keahlian']);
		$total = count($exp_ahli);
		for($i=0;$i<=$total-1;$i++){
			$num=$i+1;
			echo "<tr><td>".$num."</td><td>".$exp_ahli[$i]."</td></tr>";
		}
		echo"</table>";
		}
	}
	else{
		if(!isset($_POST['kirim'])){
			$query = mysql_query("SELECT pn.*, pr.provinsi_nama, kb.kokab_nama FROM pencari pn, provinsi pr, kabupaten kb WHERE pn.provinsi = pr.provinsi_id AND pn.kabupaten = kb.kota_id AND pn.iduser = '".$_SESSION['iduser']."'");
			$row = mysql_fetch_array($query);
			
			?>
            <form action="" method="post" >
                	<table  border="0">
                    <tr>
                        	<td>IdNumber</td>
                            <td>:</td>
                            <td><?php echo $_SESSION['iduser'];?></td>
                        </tr>
                        <tr>
                        	<td>Password</td>
                            <td>:</td>
                            <td><input type="password" name="password" value="<?php echo $row['Password']?>"></td>
                        </tr>
                    	<tr>
                        	<td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="nama" value="<?php echo $row['Nama']?>"></td>
                        </tr>
                        <tr style="vertical-align:top;">
                        	<td>Alamat</td>
                            <td>:</td>
                            <td><textarea name="alamat" rows="4" cols="40"><?php echo $row['Alamat']?></textarea></td>
                        </tr>
                        <tr>
                        	<td>Provinsi</td>
                            <td>:</td>
                            <td><select name="provinsi" id="prov" onchange="javascript:rubah2(this)">
                            	<option value="" selected>-- Pilih Povinsi --</option>
                        	<?php
                            	$query2= mysql_query("SELECT * FROM provinsi ORDER BY provinsi_id");
								while($row2=mysql_fetch_array($query2)){
									echo "<option value=".$row2['provinsi_id'].">".$row2['provinsi_nama']."</option>";}
                            ?>	</select></td>
                        </tr>
                        <tr>
                        	<td>Kabupaten</td>
                            <td>:</td>
                            <td><div id="tampilkabupaten"></div></td>
                        </tr>
                        <tr>
                        	<td>Agama</td>
                            <td>:</td>
                            <td><select name="agama" >
                                	<option value="1">ISLAM</option>
                                    <option value="2">KRISTEN</option>
                                    <option value="3">KATOLIK</option>
                                    <option value="4">HINDU</option>
                                    <option value="5">BUDHA</option>
                                    <option value="6">KONGHUCHU</option>
                            	</select></td>
                        </tr>
                        <tr>
                        	<td>Email</td>
                            <td>:</td>
                            <td><input type="text" name="email" value="<?php echo $row['Email']?>"></td>
                        </tr>
                        <tr>
                        	<td>Telepon</td>
                            <td>:</td>
                            <td><input type="text" name="telepon" value="<?php echo $row['Telepon']?>"></td>
                        </tr>
                        <tr>
                        	<td>Pendidikan Terakhir</td>
                            <td>:</td>
                            <td><select name="edu">
                                	<option value="1">SD</option>
                                    <option value="2">SMP</option>
                                    <option value="3">SMA</option>
                                    <option value="4">D3</option>
                                    <option value="5">S1</option>
                                    <option value="6">S2</option>
                                    <option value="7">S3</option>
                                </select></td>
                        </tr>
                        <tr>
                        	<td>Keahlian</td>
                            <td>:</td>
                            <td><input type="text" name="keahlian" value="<?php echo $row['keahlian']?>"> *) pisahkan dengan tanda koma</td>
                        </tr>
                        <tr>
                        	<td>Kewarganegaraan</td>
                            <td>:</td>
                            <td><select name="wn">
                                	<option value="1">WNI</option>
                                    <option value="2">WNA</option>
                                </select></td>
                        </tr>
                        <tr>
                        	<td>Foto</td>
                            <td>:</td>
                            <td><input type="file" name="foto"></td>
                        </tr>
                        <tr>
                        	<td colspan="3" align="center" style="padding-top:30px;"><input type="submit" name="kirim" value="UPDATE"> <input type="reset" name="reset" value="BATAL" /> </td>
                        </tr>
                     </table>
                </form>
			<?php
			}
		else{
			if(!isset($_POST['nama'])){$nama = "";} else{$nama = $_POST['nama'];}
			if(!isset($_POST['password'])){$password = "";} else{$password = $_POST['password'];}
			if(!isset($_POST['jekel'])){$jekel = 1;} else{$jekel = $_POST['jekel'];}
			if(!isset($_POST['alamat'])){$alamat = "";} else{$alamat = $_POST['alamat'];}
			if(!isset($_POST['provinsi'])){$provinsi = "1";} else{$provinsi = $_POST['provinsi'];}
			if(!isset($_POST['kabupaten'])){$kabupaten = "1";} else{$kabupaten = $_POST['kabupaten'];}
			if(!isset($_POST['agama'])){$agama = 1;} else{$agama = $_POST['agama'];}
			if(!isset($_POST['email'])){$email = "";} else{$email = $_POST['email'];}
			if(!isset($_POST['telepon'])){$telepon = "";} else{$telepon = $_POST['telepon'];}
			if(!isset($_POST['edu'])){$pendidikan = 1;} else{$pendidikan = $_POST['edu'];}
			if(!isset($_POST['keahlian'])){$keahlian = "";} else{$keahlian = $_POST['keahlian'];}
			if(!isset($_POST['wn'])){$wn = 1;} else{$wn = $_POST['wn'];}
			
			//mengambil data untuk membuat ID baru
			$query = mysql_query("SELECT iduser FROM pencari order by iduser ");
			if(mysql_num_rows($query)<1){
				$newid="L-1";}
			else{
				while($row = mysql_fetch_array($query)){
					$iduser=$row['iduser'];}
				$getid = explode("-",$iduser);
				$setid =$getid[1]+1;
				$newid = "L-".$setid;
			}
			
			if(isset($_FILES['foto']['name'])){
			
			//upload file
			$uploaddir = 'Image/profpic/';
			$uploadfile = $uploaddir .$newid. $_FILES['foto']['name'];
			if (move_uploaded_file($_FILES['foto']['tmp_name'],$uploadfile))
			{
				$foto = $_FILES['foto']['name'];
				} 
			else {
				 echo "<script>alert('File gagal diupload');window.location='index.php?target=daftar'</script>";
			};
			} 
			else{
				$foto='none';
			}
			
			//insert into DataBase
			mysql_query("UPDATE pencari set Password = '".$password."', nama = '".$nama."',jekel = '".$jekel."', alamat = '".$alamat."', kabupaten = '".$kabupaten."', provinsi = '".$provinsi."', agama = '".$agama."', email = '".$email."', telepon = '".$telepon."',didik = '".$pendidikan."', keahlian = '".$keahlian."', warganegara = '".$wn."', foto = '".$foto."' where idUser='".$_SESSION['iduser']."'");
			echo "<script>alert('data sudah di update');window.location='index.php?id=pencari&sub=mine';</script>";
			}
	}
?>

</div>