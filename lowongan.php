<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="Source/jquery/jquery-ui.js"></script>
<script language="javascript" type="text/javascript" src="Source/jquery/external/jquery/jquery.js"></script>


<link href="Source/jquery/jquery-ui.css" rel="stylesheet" />

<link href="style.css" rel="stylesheet" />



<title>Untitled Document</title>


<!--JAVASCRIPT -->
<script>
	$( "#tabs" ).tabs();
</script>

</head>
<?php
	include('koneksi.php');
	if(!isset($_GET['ap'])){
	if(isset($_POST['kirim'])){
		$date = date("Y-m-d H:i:s");
		mysql_query("Insert into komentar values('".$_POST['low']."','".$_POST['iduser']."','$date','".$_POST['judul']."','".$_POST['isi']."')");
		echo "<script>window.location='lowongan.php?low=".$_POST['low']."'</script>";}
	
	$query = mysql_query("Select l.*, c.nama,c.email,c.telepon,c.bidang,c.logo as logo from lowongan l left join perusahaan c on l.idperusahaan = c.iduser where l.idlowongan = '".$_GET['low']."' ");
	$row = mysql_fetch_array($query);
	
?>
<body style="margin:0;padding:0;background-color:#CCCCCC">
<div class="main">
	<div class="main-center" style="margin:0 13vw 0 13vw">
    	<div style="margin-top:10px;height:5vh;">
            <div style="float:left;width:70%; background-color:#0080FF;">
                ID Lowongan : <?php echo $_GET['low'];?>
            </div>
            <div style="float:left;width:30%;background-color:#0FF;" align="right">
                Tanggal : <?php echo $row['tanggal'];?>
            </div>
    	</div>
   
    <div>
    	<h2 style="color:#0080FF" align="center"><?php echo strtoupper($row['Judul']);?></h2>
        <pre style="padding:1vw 2vw 1vw 4vw;"><?php echo $row['Deskripsi'];?></pre>
        
    </div>
    <div style="background-color:#999; padding:1vw 2vw 1vw 4vw;">
    	<table>
        	<tr>
            	<td><b>Klasifikasi</b></td>
                <td>:</td>
                <td><?php echo $row['Klasifikasi']?></td>
             </tr>
             <tr>
            	<td><b>Jenis Lowongan</b></td>
                <td>:</td>
                <td><?php echo $row['JenisLowongan']?></td>
             </tr>
             <tr>
            	<td><b>Perusahaan</b></td>
                <td>:</td>
                <td><?php echo $row['nama']?></td>
             </tr>
        	<tr>
            	<td><b>Bidang</b></td>
                <td>:</td>
                <td><?php echo $row['bidang']?></td>
             </tr>  
        	<tr>
            	<td><b>Email</b></td>
                <td>:</td>
                <td><?php echo $row['email']?></td>
             </tr>
        	 <tr>
            	<td><b>Status</b></td>
                <td>:</td>
                <td style="color:#FF0"><?php echo $row['Status']?></td>
             </tr>              
        </table>
        <?php if(isset($_SESSION['iduser'])){echo"<div align=center><a href='index.php?id=pencari&low=".$_GET['low']."&sub=apply'>APPLY</a></div>";} ?>
    </div>
    <div style="margin-top:3%;">
    <h3>KOMENTAR</h3><?php
		$query = mysql_query("SELECT * from komentar k left join pencari p on  k.idUser = p.idUser where k.idLowongan = '".$_GET['low']."'  order by date desc");
		echo "<table border=0>";
		while($row = mysql_fetch_array($query)){
			if($row['Foto'] != 'none'){$foto = $row['Foto'];}else{$foto = "pic.jpg";}
			echo "
				<tr>
					<td style='padding: 0 15px 0 10px' valign=top>
						<img src='Image/profpic/$foto' width = '80vw' height='auto' />
					</td>
					<td valign=top>
						<font color=#0000FF size=+2><b>".$row['judul']."</b></font><br />
						<font size=-1><i>".$row['Nama']." - ".$row['date']."</i></font>
						<p>".$row['Komentar']."</p>
					</td>
				</tr>";}
			echo "</table>";
    ?></div>
    <div style="background-color:#FEDE94;padding-left:5px">
    <h3>Tambah Komentar</h3>
    <form action="" method="post">
    <table>
    	<tr>
        	<td>Judul</td>
            <td>:</td>
            <td><input type="text" name="judul"></td>
        </tr>
    	<tr>
        	<td>Komentar</td>
            <td>:</td>
            <td><textarea name="isi" rows="8" cols="40"></textarea></td>
        </tr>
        <tr>
        	<td colspan="3" align="right"><input type="submit" name="kirim" value="SEND"></td>
        </tr>
    </table>
    <input type="hidden" name="iduser" value="<?php echo $_SESSION['iduser']; ?>">
    <input type="hidden" name="low" value="<?php echo $_GET['low']; ?>">
    </form>
    </div>
    
	</div>
    
    </div>
    <?php
	}
	echo "test";
	?>
</div>
</body>
</html>
