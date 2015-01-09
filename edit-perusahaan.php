<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Source/jquery/jquery-ui.css" rel="stylesheet">
<title>Untitled Document</title>
<?php include('koneksi.php'); ?>
</head>

<body>

<div id="tabs" style="margin: 0 10% 0 10%;">
	<div>
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
                        	<td colspan="3" align="center" style="padding-top:30px;"><input type="submit" name="kirim" value="UPDATE"> <input type="reset" name="reset" value="BATAL" /> </td>
                        </tr>
                     </table>
                </form>
                </pre>
          </div>
    </div>
    <div id="tabs-2">
<script src="Source/jquery/external/jquery/jquery.js"></script>
<script src="Source/jquery/jquery-ui.js"></script>
<script>
$( "#tabs" ).tabs();
</script>
</body>
</html>
