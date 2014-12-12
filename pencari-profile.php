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
	}
	else{
		if(!isset($_POST['kirim'])){
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
                            <td><input type="password" name="password"></td>
                        </tr>
                    	<tr>
                        	<td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="nama"></td>
                        </tr>
                        <tr style="vertical-align:top;">
                        	<td>Alamat</td>
                            <td>:</td>
                            <td><textarea name="alamat" rows="4" cols="40"></textarea></td>
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
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                        	<td>Telepon</td>
                            <td>:</td>
                            <td><input type="text" name="telepon"></td>
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
                            <td><input type="text" name="keahlian"> *) pisahkan dengan tanda koma</td>
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
			
			}
	}
?>

</div>