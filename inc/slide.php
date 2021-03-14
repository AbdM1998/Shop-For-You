<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">

 <?php 

                    $getAcer = $pd->latestDataAcer();
                    if ($getAcer) {
                        while ($result = $getAcer->fetch_assoc()) {
                    
                ?>
                <div class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                         <a href="preview.php?proid=<?php echo $result['productID'] ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2>Acer</h2>
                        <p><?php echo $result['productName']; ?></p>
                        <div class="button"><span><a href="preview.php?proid=<?php echo $result['productID'] ?>">Add to cart</a></span></div>
                   </div>
               </div>   
               <?php    
                        }
                    }
                    ?>
                    <?php 

                    $getSamsung = $pd->latestDataSamsung();
                    if ($getSamsung) {
                        while ($result = $getSamsung->fetch_assoc()) {
                    
                ?>      

                <div class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                         <a href="preview.php?proid=<?php echo $result['productID'] ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2>SAMSUNG</h2>
                        <p><?php echo $result['productName']; ?></p>
                        <div class="button"><span><a href="preview.php?proid=<?php echo $result['productID'] ?>">Add to cart</a></span></div>
                   </div>
               </div>   
                
             <?php  
                        }
                    }
                    ?>
            
			</div>
			<div class="section group">



				<?php 

                    $getZara = $pd->latestDataZara();
                    if ($getZara) {
                        while ($result = $getZara->fetch_assoc()) {
                    
                ?>  
            <div class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                         <a href="preview.php?proid=<?php echo $result['productID'] ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2>Zara</h2>
                        <p><?php echo $result['productName']; ?></p>
                        <div class="button"><span><a href="preview.php?proid=<?php echo $result['productID'] ?>">Add to cart</a></span></div>
                   </div>
               </div>   

				<?php   
                        }
                    }
                    ?>
               <?php 

                    $getIPhone = $pd->latestDataIPhone();
                    if ($getIPhone) {
                        while ($result = $getIPhone->fetch_assoc()) {
                    
                ?>              
                <div class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                         <a href="preview.php?proid=<?php echo $result['productID'] ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2>IPhone</h2>
                        <p><?php echo $result['productName']; ?></p>
                        <div class="button"><span><a href="preview.php?proid=<?php echo $result['productID'] ?>">Add to cart</a></span></div>
                   </div>
               </div>   
             <?php  
                        }
                    }
                    ?>
				
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
                        <?php 

                                $getAllsliderImage = $pd->getAllsliderImage();
                                $i=0;
                                if($getAllsliderImage != null || $getAllsliderImage != 0){
                                    
                                    while ($result = $getAllsliderImage->fetch_assoc()) {
                                        $i++;
                     ?>
						<li><img src="admin/<?php echo $result['image']; ?>" height='40px' width='60px'/></li>
						<?php } }?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	