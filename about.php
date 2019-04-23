<?php
include 'header.php';
?>
	
	
	<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Tentang Kami</h2>    			    				    				
					<div class="contact-map">
                        <p><?php
						$tampil_about = mysqli_query($conn,"SELECT * FROM web WHERE bagian = 'about'");
                        $data_about = mysqli_fetch_object($tampil_about);
                        echo $data_about->keterangan1;
						?></p>
					</div>
				</div>			 		
			</div>
    	</div>	
    </div><!--/#contact-page-->
	
<?php
include 'footer.php';
?>