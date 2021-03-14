<?php include'inc/header.php'; ?>




<?php 

	if(isset($_GET['proid'])){

		$id = $_GET['proid'];
		
	}

?>


<?php 

	
	$pd = new product();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){


	$login = Session::get("cuslogin"); /*if custmer not login*/
        if($login == false){
            header('location:login.php');
        }else{
        $cmrid = Session::get("cmrId");
		$Quantity = $_POST['Quantity'];
		$AddCart = $ct->addToCart($Quantity , $id,$cmrid ); /*if product already add it will return masg it is already add but if not will diract you to cart page if product not inserted will direacted you to page 404.php*/

	}
	}
?>



<?php

		
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wish'])){
        	$login = Session::get("cuslogin"); /*if custmer not login*/
        if($login == false){
            header('location:login.php');
        }else{
				
				$SaveWish = $pd->SaveWishListData($id,$cmrID);/*add cmrid to add data for this customer id not other customer*/

              
			}
                 }




        if(isset($_POST['comment_user'])){
        	
        	$cmrid = Session::get("cmrId");
        	$comment = $cmr->Insertcomment($_POST,$cmrid);
        }


?>





<div class="min">
        <div class="container cont">
           	<div class="row">
				<div class="col-lg-10 col-md-12 col-sm-12">

					<div class="privew">
					<?php 

						$getpd = $pd->getSingleProduct($id);
							if ($getpd) {
								while ($result = $getpd->fetch_assoc()) {
									$id =$result['productID'];
									$catid_cat=$result["catID"];
					?>		
						<div class="img-privew" >
							<img src="admin/<?php echo $result['image']; ?>" height="350px" max-width="70%" width="70%">
						</div>


						<div class="detils-privew">
						<h2><?php echo $result['productName']; ?></h2>
						<p><?php echo $fm->TextShoten($result['body'],200); ?></p>					
						<div class="spans">
							<p>Price : <span>$<?php echo $result['price']; ?></span></p>
							<p>Category :  <span><?php echo $result['catName']; ?></span></p>
							
							<p>Number of times of sale : <span>

								<?php

									$numberoforderItem = $ct->NumberSellProById($id);
									if ($numberoforderItem !=null) {
										$numberoforderItem =$numberoforderItem->fetch_assoc();
										echo $numberoforderItem['count'];
									}else{
										echo "0";
										}
									?>
									


							</span></p>
						</div>
					


							<div >
								
							<span style="color: red ; font-size:18px;"><!--if alreade add product -->
							<?php 

								if(isset($AddCart)){

									echo $AddCart;
								}elseif(isset($SaveWish)){
									echo $SaveWish;
								}
							?>
							<?php 

								if(isset($insertcom)){

									echo $insertcom;
								}
							?>
						</span>
							<?php if($result['qunt']>0){ ?>
								<form class="forms" action=" " method="post">
								<input type="number" name="Quantity" value="1" min="1" max="<?php echo $result['qunt'] ?>"/>
									
								<abbr title="You Must Login Befor"><button  class="btn btn-primary btn-add" type="submit" name="submit" value="Add To Cart">
										
											<i class="fas fa-cart-arrow-down"></i>add to cart
										
									</button></abbr>
									<button style="display: inline" class="btn btn-primary btn-add" type="submit" name="wish" value="Add To Cart">
										
											<i class="far fa-heart"></i> Wish List
										
									</button>
									</form>
									<?php
									}else{

									echo "<p style='color:red;'>  COMMING SOON</p> ";
										?>
										<form class="forms" action=" " method="post">
								<button style="display: inline" class="btn btn-primary btn-add" type="submit" name="wish" value="Add To Cart">
										
											<i class="far fa-heart"></i> Wish List
										
									</button>
									</form>
									<?php }?>
									
							
									
									
							</div>

						</div>
					
					</div>


					<div class="product-detalis">
					<h2>Product Details</h2>
			<p><?php echo $result['body']; ?></p>
					</div>


			
<?php }} ?>
				</div>


				<div class="col-lg-2 col-md-12 col-sm-12">

					<div class="cat" style="background:white;">
						<h5 >CATEGORIES</h5>
						<ul>
						<?php 
						$getCatName = $cat->getAllcat();
						if($getCatName){
							while ($result = $getCatName->fetch_assoc()) {

								echo '<li><i class="fas fa-chevron-right fa-sm"></i><a href="productbycat.php?catID='.$result["catID"].'">'. $result['catName'].'</a></li>';
							
									}
								}
						?>

						</ul>
					</div>
				</div>
			</div>

          <!-- Similar product-->

             <section class="allproduct ">
  <div class="containertitle">
    <div class="titlelastproduct">
     <a><i class="fas fa-square fa-sm active"></i><span> Similar Product</span></a>
    </div>
  </div>
  <div class="container text-center">
    <div class="row">

          <?php 

          $getLpd = $pd->getsimilarProduct($catid_cat); 

          if ($getLpd) {
          while ($result = $getLpd->fetch_assoc()) {

          ?>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="product" data-aos="fade-up" data-aos-duration="1000">
              <div class="product_header">
                <a href="preview.php?proid=<?php echo $result['productID']; ?>"><img src="admin/<?php echo $result['image']; ?>"></a>
              </div>
              <div class="product_footer">
                <h3><?php echo $result['productName']; ?></h3>
                <div class="product_price">
                  <span><?php echo $fm->TextShoten($result['body'],50)."</br> Price:".$result['price']; ?></span>
                </div>
                <a href="preview.php?proid=<?php echo $result['productID']; ?>"><button> Add To Cart </button></a>
              </div>
              <!-- <div class="icon_product">
                <ul>
                  <li><i class="fas fa-eye"></i></li>
                  <li><i class="far fa-heart"></i></li>
                  <li><i class="fas fa-sync-alt"></i></li>
                </ul>
              </div> -->
            </div>
      </div>
   

   <?php } } ?>
    </div>
  </div>
</section>






 <!-- Similar product--> 















			<div class="row">
				
					<div style="border:1px solid #DDD" class="col-lg-12">
						
							<h1 style="text-align: center; margin-top: 30px" >Comments</h1>
								<form class="form-group">
										<?php 
											
												$getallcom= $cmr->getAllComment($id);
											if($getallcom){
												while ($result = $getallcom->fetch_assoc()) {
													

										?>
										 <hr style="background: black; margin-top: 30px">
						         <div class="form-group">

						   <label><?php echo $result['name']; ?> : </label>
						<textarea style="background: #FFF;" class="form-control" type="text"readonly><?php echo $result['comment']; ?></textarea><br>
						    <input style="background: #FFF;" class="form-control" type="text" value="<?php echo $result['comment_date']; ?>" readonly>
						  </div>
						  
						  <?php }}?>
										  </form>



			  <hr style="background: black; margin-top: 30px; margin-bottom: 30px">

			  <?php $login = Session::get("cuslogin"); /*if custmer not login*/
					 if($login == true){ ?>
						<form action=" " method="POST" enctype="multipart/form-data" >
						         <div class="form-group">
						            <input type="hidden" name="proid" value="<?php echo $id; ?>">
				                    <input type="text" name="name"  class="form-control" id="exampleFormControlInput1" placeholder="Your Name">
				                  </div>

				                

				                  
				                  <div class="form-group">
				                    
				                    <textarea name="comment" placeholder="write something " class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				                  </div>
				                  <div class="text-center"><input style="margin-bottom: 10px; width: 164px;background: #1F3548; color: #FFF; border-radius: 5px; height: 50px " type="submit" name="comment_user" value="Add Comment" ></div>
                </form>
            <?php  } ?>
										
					</div>


			</div>
		</div>
	</div>




<?php  include 'inc/footer.php';?>