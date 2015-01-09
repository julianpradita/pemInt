<?php 
	if(!isset($_GET['sub'])){
		?>
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
						if(!isset($_POST['lowongan'])){
							$query = mysql_query("Select l.judul, pr.logo,l.idLowongan from lowongan l, perusahaan pr where l.idperusahaan = pr.iduser order by l.tanggal");
							}
						else{$query = mysql_query("Select l.judul, pr.logo from lowongan l, perusahaan pr where l.idperusahaan = pr.idperusahaan and (l.judul like '%".$_POST['lowongan']."%' or l.deskripsi like '%".$_POST['lowongan']."%') and pr.provinsi ='".$_POST['provinsi']."' order by l.tanggal");
						}
						$i=0;
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