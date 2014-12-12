<?php
	if(!isset($_POST['kirim'])){
?>
<script language="javascript" type="text/javascript" src="Source/jquery/external/jquery/jquery.js"></script>
<script> 

    $(function(){
      $("#includedContent").load("test.php"); 
    });
    </script> 
<div class="main-center">
	<div ">
		<div id="includedContent"></div>
	</div>
</div>
<?php
	}
	else{
		if(!isset($_POST['nama'])){$nama = "";} else{$nama = $_POST['nama'];}
		if(!isset($_POST['username'])){$username = "";} else{$username = $_POST['username'];}
		if(!isset($_POST['tgllahir'])){$tgllahir = "";} else{$tgllahir = $_POST['tgllahir'];}
		if(!isset($_POST['password'])){$password = "";} else{$nama = $_POST['password'];}
		if(!isset($_POST['jekel'])){$jekel = 1;} else{$jekel = $_POST['jekel'];}
		if(!isset($_POST['alamat'])){$alamat = "";} else{$alamat = $_POST['alamat'];}
		if(!isset($_POST['provinsi'])){$provinsi = "";} else{$provinsi = $_POST['provinsi'];}
		if(!isset($_POST['kabupaten'])){$kabupaten = "";} else{$kabupaten = $_POST['kabupaten'];}
		if(!isset($_POST['agama'])){$agama = 1;} else{$agama = $_POST['agama'];}
		if(!isset($_POST['email'])){$email = "";} else{$email = $_POST['email'];}
		if(!isset($_POST['telepon'])){$telepon = "";} else{$telepon = $_POST['telepon'];}
		if(!isset($_POST['edu'])){$pendidikan = 1;} else{$pendidikan = $_POST['edu'];}
		if(!isset($_POST['keahlian'])){$keahlian = "";} else{$keahlian = $_POST['keahlian'];}
		if(!isset($_POST['wn'])){$wn = 1;} else{$wn = $_POST['wn'];}
		
		//mengambil data untuk membuat ID baru
		
		$query = mysql_query("SELECT iduser FROM pencari order by iduser desc");
		if(mysql_num_rows($query)<1){
			$newid="L-1";}
		else{
			while($row = mysql_fetch_array($query)){
				$iduser=$row['iduser'];}
			$getid = explode("-",$iduser);
			$newid = "L-".($getid[1]+1);
		}
		if(isset($_FILES['foto']['name'])){
		
		//upload file
		$uploaddir = 'image/profpic/';
		$uploadfile = $uploaddir . $_FILES['foto']['name'];
		if (move_uploaded_file($_FILES['foto']['tmp_name'],$uploadfile)) 
			{$foto = $_FILES['foto']['name'];} else { echo "<script>alert('File gagal diupload');window.location='index.php?target=daftar'</script>";};} else{$foto='none';};
		
		echo $tgllahir;
		//insert into DataBase
		//mysql_query("INSERT INTO pencari values('$newid','$username','$password','$nama','$jekel','$tgllahir','$alamat','$kabupaten','$provinsi','$agama','$email','$telepon','$pendidikan','$keahlian','$wn','$foto')");
		//echo"<script>alert('login menggunakan username dan password setelah diaktifasi admin');window.location='index.php';</script>";
		}
		
		