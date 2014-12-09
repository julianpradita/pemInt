<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>
</head>

<body>
<?php
	if(!isset($_POST['submit'])){
?>
	<form>
		<table>
        	<tr>
            	<td>Username</td>
                <td> : </td>
                <td><input type="text" name="usr" /></td>
            </tr>
            <tr>
            	<td>Password</td>
                <td> : </td>
                <td><input type="password" name="pwd" /></td>
            </tr>
            <tr>
            	<td>Level</td>
                <td> : </td>
                <td><select name="opsi">
                		<option value="1">Pelamar</option>
                        <option value="2">Perusahaan</option>
                </td>
            </tr>
            <tr>
            	<td colspan="3" align="right"><input type="submit" name="submit" /><input type="reset" name="batal" />
                </td>
            </tr>
        </table>
	</form>
<?php
	}
	else{
		if($_POST['opsi']=='1'){
			$query = mysql_query("SELECT username,status,iduser from pencari where username = '".$_POST['usr']."' AND password = '".$_POST['pwd']."'");}
		else{
			$query = mysql_query("SELECT username,status,iduser from perusahaan where username = '".$_POST['usr']."' AND password = '".$_POST['pwd']."'");}
			while($row = mysql_fetch_array($query)){
				$status = $row['status'];
				$username = $row['username'];
				$iduser = $row['iduser'];}
			if(mysql_num_rows($query)>0 and $status == 'approved'){
				$_SESSION['username'] = $username;
				$_SESSION['iduser'] = $iduser;
				if($_POST['opsi']==1){
					echo "<script>alert('Terima Kasih telah login');window.open('index.php?id=pencari');</script>";
				}
				else{
					echo "<script>alert('Terima Kasih telah login');window.open('index.php?id=perusahaan');</script>";
					}
				}
			else{
				echo "<script>alert('Username atau Password salah');window.open('index.php?id=login');</script>";}
	}
?>
</body>
</html>