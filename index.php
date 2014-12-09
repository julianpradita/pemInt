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

<body>
<div class="main">
	<div class="main-header">
    	<div class="main-header-title">
        	<img src="Image/title.png" width="200px" height="auto" />
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
        	<a href="#" id="login">REGISTER| </a> 
            <a href="daftar.php" id="login">LOGIN</a>
        </div>
        <?php
			}
		else if($id=='pencari'){
			?>
            <div id="menu-atas">
        	<ul>
            	<li><a href="#">HEADER</a></li> 
                <li><a href="#">tst</a></li>
                <li><a href="#">HEADER</a></li>
                <li><a href="#">HEADER</a></li>
            </ul>
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
			case 'coompany' : break;
			case 'daftar' : 
				include ('daftar.php');break;
			default : 
	?>
        <div style="width:100%; height: 100%">
                <?php include ("image-slider.html"); ?>  	
        </div>
        <div class="main-menu">
            <div id="img-float">
                <img src="Image/profile.png" />
                <div id="desc">user</div>
            </div>
            <div id="img-float">
                <img src="Image/config.png"/>
                <div id="desc">user</div>
            </div>   
            <div id="img-float">
                <img src="Image/search.png" />
                <div id="desc">user</div>
            </div>
            <div id="img-float">
                <img src="Image/ask2.png" />
                <div id="desc">user</div>
            </div>
            
            
        </div>
        <div class="main-company">
            <div style="margin-bottom:2%;">
                Featured Company
            </div>
            <div id="row">
                <img src="Image/p1.jpg">
                <img src="Image/p5.jpg">
            </div>
            <div id="row">
                <img src="Image/p1.jpg">
                <img src="Image/p5.jpg">
                <img src="Image/p4.jpg" />
                <img src="Image/p2.jpg" />
            </div>
            <div id="row">
                <img src="Image/p1.jpg">
                <img src="Image/p5.jpg">
            </div>
        </div>
    <?php
		break;
		}
	?>
    <div class="main-footer">
    
    	<div align="center" id="menu-list">
            <ul >
                <li id="fb"><a href="#"></a></li>
                <li id="tw"><a href="#"></a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
