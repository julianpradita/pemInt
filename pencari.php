<?php 
	if(!isset($_GET['sub'])){
		?>
<div class="cari-kerja">
   	<font size="+2" face="Arial Black, Gadget, sans-serif" color="#CC9900">
    	SEARCH
    </font>
    <div id="search">
    	<form action="" method="post" name="form">
            <pre>
            	<table border="0">
                	<tr>
                    	<td>lowongan</td>
                        <td> : </td>
                        <td><input type="text" name="lowongan" /></td>
                    </tr>
                    <tr>
                    	<td>lokasi</td>
                        <td> : </td>
                        <td><select name="provinsi" id="provinsi"><?php
								$query = mysql_query("select * from provinsi order by provinsi_id");
								while($row = mysql_fetch_array($query)){
									echo "<option value=".$row['provinsi_id'].">".$row['provinsi_nama']."</option>";
									}
							?></select>
                        </td>
                    </tr>
                 	<tr align="right">
                    	<td colspan="3"><input  type="submit" name="kirim" value="SEARCH"></td>
                    </tr>
               </table>
            </pre>
        </form>
    </div>
</div>
<div class="main-center">
	<div style="margin : 0 10% 0 10%;">
   
		<?php
		$query = mysql_query("Select l.judul, pr.logo,l.idLowongan from lowongan l, perusahaan pr where l.idperusahaan = pr.iduser order by l.tanggal");
		
		$i=0;
		while($row = mysql_fetch_array($query)){
			if($i==0){
				echo "<div id='lowongan' align='center'>";
				}
				echo "
					<a href='lowongan.php?low=".$row['idLowongan']."' target='_blank'>
						<div id='low-set'>
							<img src='Image/profpic/test.jpg' />
							<div id='desc'>
								".$row['judul']."
							</div>
						</div>
					</a>" ;
			if($i==0){
				echo "</div>";
				$i=0;
			}
			$i++;
		}
        ?>
        	<?php
				
					if(isset($_POST['kirim'])){
							$query = mysql_query("Select l.judul, pr.logo from lowongan l, perusahaan pr where l.idperusahaan = pr.iduser and (l.judul like '%".$_POST['lowongan']."%' or l.deskripsi like '%".$_POST['lowongan']."%') and pr.provinsi ='".$_POST['provinsi']."' order by l.tanggal");
						$i=0;
					
						if(mysql_num_rows($query)<1){
								echo "<script>alert('Tidak Ada Lowongan tersedia');window.location='index.php?id=pencari'</script>";break;}
						else{
							while($row = mysql_fetch_array($query)){
									if($i==0){
									echo "<div id='lowongan'>";
									}
									echo "
										<a href='lowongan.php?low=".$row['idLowongan']."'>
											<div id='low-set'>
												<img src='Image/profpic/test.jpg' />
												<div id='desc'>
													".$row['judul']."
												</div>
											</div>
										</a>" ;
								if($i==0){
									echo "</div>";
									$i=0;
								}
								$i++;
							}
						}	
					}
	}
				else{
					switch($_GET['sub']){
						case 'apply' : include('apply.php');break;
						case 'mine' : include('pencari-profile.php');break;
						case 'hs' : include('pencari-history.php');break;
						case 'rs' : include('pencari-rs.php');break;
 					}
					}
            ?>
          	 
    	
	</div>
</div>