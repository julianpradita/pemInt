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
<div id="tabs" style="margin: 0 10% 0 10%;">
	<ul>
		<li><a href="#tabs-1">PENCARI</a></li>
		<li><a href="#tabs-2">PERUSAHAAN</a></li>
	</ul>
	<div id="tabs-1" >
                <pre>
                <form action="" method="post" >
                	<table  border="0">
                    	<tr>
                        	<td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="nama"></td>
                        </tr>
                        <tr>
                        	<td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><input name="jekel" type="radio" value="1" checked /> Pria     <input name="jekel" type="radio" value="2" />Wanita </td>
                        </tr>
                        <tr>
                        	<td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><input id="datepicker" name="tgllahir"></td>
                        </tr>
                        <tr style="vertical-align:top;">
                        	<td>Alamat</td>
                            <td>:</td>
                            <td><textarea name="alamat" rows="4" cols="40"></textarea></td>
                        </tr>
                        <tr>
                        	<td>Provinsi</td>
                            <td>:</td>
                            <td><select name="provinsi" id="prov" onchange="javascript:rubah2(this)">
                            	<option value="" selected>-- Pilih Povinsi --</option>
                        	<?php
                            	$query = mysql_query("SELECT * FROM provinsi ORDER BY provinsi_id");
								while($row=mysql_fetch_array($query)){
									echo "<option value=".$row['provinsi_id'].">".$row['provinsi_nama']."</option>";}
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
                        	<td colspan="3" align="center" style="padding-top:30px;"><input type="submit" name="kirim" value="DAFTAR"> <input type="reset" name="reset" value="BATAL" /> </td>
                        </tr>
                     </table>
                     <input type="hidden" name="tipe" value="1">
                </form>
                </pre>
    </div>
    <div id="tabs-2">
    <pre>
                <form action="" method="post" >
                	<table  border="0">
                    	<tr>
                        	<td>Nama Perusahaan</td>
                            <td>:</td>
                            <td><input type="text" name="nama"></td>
                        </tr>
                        <tr style="vertical-align:top;">
                        	<td>Alamat</td>
                            <td>:</td>
                            <td><textarea name="alamat" rows="4" cols="40"></textarea></td>
                        </tr>
                        <tr>
                        	<td>Deskripsi</td>
                            <td>:</td>
                            <td><textarea name="deskripsi" rows="4" cols="40"></textarea></td>
                        </tr>
                        <tr>
                        	<td>Telepon</td>
                            <td>:</td>
                            <td><input type="text" name="telepon"></td>
                        </tr>
                        <tr>
                        	<td>Email</td>
                            <td>:</td>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                        	<td>Logo</td>
                            <td>:</td>
                            <td><input type="file" name="logo"></td>
                        </tr>
                        <tr>
                        	<td colspan="3" align="center" style="padding-top:30px;"><input type="submit" name="kirim" value="DAFTAR"> <input type="reset" name="reset" value="BATAL" /> </td>
                        </tr>
                     </table>
                     <input type="hidden" name="tipe" value="2">
                </form>
                </pre>
          </div>
<script src="Source/jquery/external/jquery/jquery.js"></script>
<script src="Source/jquery/jquery-ui.js"></script>
<script>
$( "#tabs" ).tabs();
$( "#datepicker" ).datepicker({
	dateFormat : "yy-mm-dd"
});
</script>