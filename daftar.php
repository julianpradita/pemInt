<?php
	if(!isset($_POST['kirim'])){
?>
<script language="javascript" type="text/javascript" src="Source/jquery/external/jquery/jquery.js"></script>
<script> 

    $(function(){
      $("#includedContent").load("daftar-form.html"); 
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
		if(!isset($_POST['jekel'])){$jekel = 1;} else{$jekel = $_POST['jekel'];}
		if(!isset($_POST['alamat'])){$alamat = "";} else{$alamat = $_POST['alamat'];}
		if(!isset($_POST['agama'])){$agama = 1;} else{$agama = $_POST['agama'];}
		if(!isset($_POST['email'])){$email = "";} else{$email = $_POST['email'];}
		if(!isset($_POST['telepon'])){$telepon = "";} else{$telepon = $_POST['telepon'];}
		if(!isset($_POST['edu'])){$pendidikan = 1;} else{$pendidikan = $_POST['edu'];}
		if(!isset($_POST['keahlian'])){$keahlian = "";} else{$keahlian = $_POST['keahlian'];}
		if(!isset($_POST['wn'])){$wn = 1;} else{$wn = $_POST['wn'];}
		
		//mengambil data untuk membuat ID baru
		$query = mysql_query("SELECT Id");
		
		//membuat ID BARU
		
		//menambahkan ID baru
		
		}