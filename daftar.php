<script language="javascript" type="text/javascript" src="Source/jquery/external/jquery/jquery.js"></script>
<?php
	include('koneksi.php');
	if(!isset($_POST['kirim'])){
?>

<script> 
    $(function(){
      $("#includedContent").load("daftar-form.php"); 
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
		if($_POST['tipe']==1){
			if(!isset($_POST['nama'])){$nama = "";} else{$nama = $_POST['nama'];}
			if(!isset($_POST['tgllahir'])){$tgllahir = "";} else{$tgllahir = $_POST['tgllahir'];}
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
			mysql_query("INSERT INTO pencari values('$newid','','','$nama','$jekel','$tgllahir','$alamat','$kabupaten','$provinsi','$agama','$email','$telepon','$pendidikan','$keahlian','$wn','$foto')");
		}
		else{
			if(!isset($_POST['nama'])){$nama = "";} else{$nama = $_POST['nama'];}
			if(!isset($_POST['alamat'])){$alamat = "";} else{$alamat = $_POST['alamat'];}
			if(!isset($_POST['deskripsi'])){$deskripsi = 1;} else{$deskripsi = $_POST['deskripsi'];}
			if(!isset($_POST['provinsi'])){$provinsi = "";} else{$provinsi = $_POST['provinsi'];}
			if(!isset($_POST['telepon'])){$telepon = "";} else{$telepon = $_POST['telepon'];}
			if(!isset($_POST['email'])){$email = "";} else{$email = $_POST['email'];}
			
			//mengambil data untuk membuat ID baru
			$query = mysql_query("SELECT iduser FROM perusahaan order by iduser ");
			if(mysql_num_rows($query)<1){
				$newid="L-1";}
			else{
				while($row = mysql_fetch_array($query)){
					$iduser=$row['iduser'];}
				$getid = explode("-",$iduser);
				$setid =$getid[1]+1;
				$newid = "C-".$setid;
			}
			
			if(isset($_FILES['logo']['name'])){
				
				//upload file
				$uploaddir = 'Image/logo/';
				$uploadfile = $uploaddir .$newid. $_FILES['logo']['name'];
				if (move_uploaded_file($_FILES['logo']['tmp_name'],$uploadfile))
				{
					$logo = $_FILES['logo']['name'];
					} 
				else {
					 echo "<script>alert('File gagal diupload');window.location='index.php?target=daftar'</script>";
				};
			}
			mysql_query("INSERT INTO perusahaan values('$newid','','','$nama','$alamat','$provinsi','$email','$telepon','$deskripsi','$logo')");
			
		}
		
		echo"<script>window.location='index.php?id=daftar&set=true&tp=".$_POST['tipe']."&iu=$newid';</script>";
	
	}
		
		