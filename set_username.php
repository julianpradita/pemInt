<?php
if(!isset($_POST['submit'])){
?>
<div align="center" id="login-page">
	<form action="index.php?id=daftar&set=true" method="post">
		<table>
        	<tr>
            	<td colspan="3" align="left"><h3>SET ACCOUNT</h3></td>
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
            	<td>Confirm Password</td>
                <td> : </td>
                <td><input type="password" name="konf" /></td>
            </tr>
            <tr>
            	<td colspan="3" align="right"><input type="submit" name="submit" value="APPLY" /> <input type="reset" name="batal" value="CANCEL" />
                </td>
            </tr>
        </table>
        <input type="hidden" name="tp" value="<?php echo $_GET['tp']?>" />
        <input type="hidden" name="iu" value="<?php echo $_GET['iu']?>" />
	</form>
    </div>
<?php
}
else{
	//check password
	if($_POST['pwd']!=$_POST['konf']){
		echo "<script>alert('Password tidak sama');window.location='index.php?id=daftar&set=true'</script>";}
	if($_POST['tp']=='1'){
			$query = mysql_query("SELECT iduser from pencari where username = '".$_POST['usr']."' AND password = '".$_POST['pwd']."'");}
	else{
			$query = mysql_query("SELECT iduser from perusahaan where username = '".$_POST['usr']."' AND password = '".$_POST['pwd']."'");}
			//cek ketersediaan
	if(mysql_num_rows($query)>0){
		echo "<script>alert('Username sudah digunakan');window.location='index.php?id=daftar&set=true'</script>";
	}
			
	//insert into database
	if($_POST['tp']=='1' ){
		mysql_query("UPDATE pencari set username='".$_POST['usr']."',password='".$_POST['pwd']."' where iduser='".$_POST['iu']."'");
	}
	else{
		mysql_query("UPDATE perusahaan set username='".$_POST['usr']."',password='".$_POST['pwd']."' where iduser='".$_POST['iu']."'");
	}
	echo "<script>alert('Terima Kasih atas registrasi anda. silakan login ');window.location='index.php?id=login'</script>";
				
	}

?>