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
<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
<?php include ('koneksi.php');?>
</head>

<body>
<div class="main">
	<div class="main-header">
    	<div class="main-header-title">
        	<?php 
			if(isset($_SESSION['tipe'])){
				switch($_SESSION['tipe']){
					case '1' : 
						echo "<a href='index.php?id=pencari'>";break;
					case '2' :
						echo "<a href='index.php?id=perusahaan'>";break;
				}
			}
			else{ 
					echo "<a href='index.php'>";
			}
			?>
            <img src="Image/title.png" width="200px" height="auto" />
            <a>
        </div>
        <?php
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			}
		else {
			$id = "";
			}
		if(!$id){?>
        <div class="main-header-login">
        	<a href="index.php?id=daftar" id="login">REGISTER| </a> 
            <a href="index.php?id=login" id="login">LOGIN</a>
        </div>
        <?php
			}
		else if($id=='pencari'){
			?>
            <div>
                <div class="main-header-login" style="position:absolute; right:14%;width:20%;">
                	Welcome,<font color="#FFCC00" size="+1"><?php echo $_SESSION['username']?></font>   <a href="logout.php" id="login">| LOGOUT</a>
            </div>
                <div id="menu-atas">
                <ul>
                    <li><a href="index.php?id=pencari&sub=mine">MY ID</a></li> 
                    <li><a href="index.php?id=pencari&sub=hs">HISTORY</a></li>
                    <li><a href="index.php?id=pencari&sub=rs">RESUME</a></li>
                </ul>
            </div>
        </div>
        <?php
        	}
		else if($id=='perusahaan'){
			
		?>
     <div>
                <div class="main-header-login" style="position:absolute; right:14%;width:20%;">
                	Welcome,<font color="#FFCC00" size="+1"><?php echo $_SESSION['username']?></font>   <a href="logout.php" id="login">| LOGOUT</a>
            </div>
                <div id="menu-atas">
                <ul>
                    <li><a href="index.php?id=pencari&sub=mine">menu1</a></li> 
                    <li><a href="index.php?id=pencari&sub=hs">menu2</a></li>
                    <li><a href="index.php?id=pencari&sub=rs">menu3</a></li>
                </ul>
            </div>
        </div>
        <?php
        }
		?>   
    </div>
    <?php
		
		switch ($id){
			case 'pencari' : 
				include('pencari.php');
				break;
			case 'perusahaan' : 
				include('company.php');
				break;
			case 'guest' : 
				if($_GET['cari']=='true'){
					include('pencari.php');}
				else{
					}
				break;
			case 'login' : 
				include('login.php');
				break;
			case 'profile' :
				include('profile.php');
				break;
			case 'tips' :
				include('tips.php');
				break;
			case 'ask' :
				include('ask.php');
				break;
		    case 'daftar' : 
				if(!isset($_GET['set'])){
					include('daftar.php');
					}
				else{require('set_username.php');
					}
				break;
			default : 
	?>
        <div style="width:100%; height: 100%">
                <?php include ("image-slider.html"); ?>  	
        </div>
        <div class="main-menu" align="center">
	        <a href="index.php?id=guest&cari=true">
            <div id="img-float">
                <img src="Image/profile.png" />
                <div id="desc">FIND JOB</div>
            </div>
            </a>
            <a href="index.php?id=login">
            <div id="img-float">
                <img src="Image/config.png"/>
                <div id="desc">PROFILE</div>
            </div> 
            </a>
            <a href="index.php?id=tips">  
            <div id="img-float">
                <img src="Image/search.png" />
                <div id="desc">TIPS</div>
            </div>
            </a>        
        </div>
        <div class="main-company">
            <div style="margin-bottom:2%;">
                Featured Company
            </div>
            <div id="row">
                <?php
            $query = mysql_query("Select Nama,logo from perusahaan order by Nama");
			$num = 0;
			while($row = mysql_fetch_array($query)){
				echo"<img src='Image/logo/".$row['logo']."' style='margin: 0 10px 0 10px'>";
			}
				
			?>
            </div>
        </div>
    <?php
		break;
		}
	?>
    <div class="main-footer">
    	<div id="menu-list">
        	<div>
        	<div style="float:left;width: 30%;">
            	<font color="#CCCCCC" size="+2">OFFICE</font> <br /><br />
            	
                PT. Semarang Jobs<br>
                Jl Kenanga no. 45<br>
                Semarang<br>
                +6224 897583<br> 
                
            </div>
            
            <div style="float:left;width: 30%">
                <ul>
                    <li id="fb" style="margin-left:-6px"><a href="#" style="margin-left: 70px;padding-top: 27px">facebook.com/gudangloker</a></li>
                    <li id="tw"><a href="#" style="margin-left: 70px;padding-top: 27px">@gudangloker</a></li>
                </ul>
            </div>
            </div>
        </div>
        <div style="position:absolute; margin-top:150px; padding:0 30% 0 30%;color:#06C">
        Klop Team &copy; 2014
        </div>
    </div>
</div>
</body>
</html>
