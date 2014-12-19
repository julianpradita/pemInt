<?php
	if(!isset($_POST['submit'])){
?>
	<div align="center" id="login-page">
	<form action="index.php?id=login" method="post">
		<table>
        	<tr>
            	<td colspan="3" align="center"><h3>LOG IN</h3></td>
            </tr>
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
                     </select>
                </td>
            </tr>
            <tr>
            	<td colspan="3" align="right"><input type="submit" name="submit" value="LOG IN" /> <input type="reset" name="batal" value="CANCEL" />
                </td>
            </tr>
        </table>
	</form>
    </div>
<?php
	}
	else{
		if($_POST['opsi']=='1'){
			$query = mysql_query("SELECT username,iduser from pencari where username = '".$_POST['usr']."' AND password = '".$_POST['pwd']."'");}
		else{
			$query = mysql_query("SELECT username,iduser from perusahaan where username = '".$_POST['usr']."' AND password = '".$_POST['pwd']."'");}
			while($row = mysql_fetch_array($query)){
				$username = $row['username'];
				$iduser = $row['iduser'];}
			if(mysql_num_rows($query)>0 ){
				$_SESSION['username'] = $username;
				$_SESSION['iduser'] = $iduser;
				$_SESSION['tipe'] = $_POST['opsi'];
			
				if($_POST['opsi']==1){
						echo "<script>alert('Terima Kasih telah login');window.location='index.php?id=pencari';</script>";
				}
				else{
					echo "<script>alert('Terima Kasih telah login');window.location='index.php?id=perusahaan';</script>";
				}
					}
			else{
				echo "<script>alert('Username atau Password salah');window.location='index.php?id=login';</script>";}
	}
?>
