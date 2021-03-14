<?php include'inc/header.php'; ?>


<?php 

	if(isset($_GET['delproWhisID']) && $_GET['delproWhisID'] != null){
		$id = $_GET['delproWhisID'];
		$DelWishData = $pd->deleteWishBYid($cmrID,$id);
		/*OR 
			if i send id for this product just creat function have id for this whis product not productID and delete it like =>
				$DelCompById = $pd->deletecomparBYid($id);

		*/
	}



?>

<style >

	.shopping{float: none;width: 100%;text-align: center;}
</style>

 <main id="main">
        <section class="section10 cart__area">
            <div class="container">
              <form class="cart__form">
			    	<h2>WishList Product</h2>
			    	<div class="cart__table table-responsive">
			    	<?php 

			    		if(isset($DelWishData)){
			    			echo $DelWishData;
			    		}

			    	?>
			    	
			    	
						 <table class="table table-borderless" >
                  			<thead>
								<tr>
									<th width="5%">SL</th>
									<th width="30%">Product Name</th>
									<th width="10%">Image</th>
									<th width="15%">Price</th>
									
									<th width="10%">Action</th>
								</tr>
							</thead>
                 			<tbody>

							<?php 
								$cmrID = Session::get("cmrId");
								$getPd = $pd->getWishData($cmrID);
			
								if($getPd != null || $getPd != 0){
									$i = 0;
									
									while ($result = $getPd->fetch_assoc()) {
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>"  width="47px" height="30px" alt=""/></td>
								<td>$<?php echo $result['price']; ?></td>


								<td><a href="preview.php?proid=<?php echo $result['productID']; ?>"> View </a>||
								<a href="?delproWhisID=<?php echo $result['productID']; ?>"> Remove </a> 
								<!-- <a href="?delprocomID=<?php/* echo $result['id']; */?>"> Remove </a>	 -->
							    </td>
							</tr>
						
				
							
							<?php } } ?>
						</tbody>
                </table>
                </div>
                <div class="cart-btns">
                  <div class="continue__shopping">
                      <a href="index.php">Continue Shopping</a>
                  </div>
                </div>

                </form>
            </div>
        </section>
      </main>
   <?php include'inc/footer.php' ?>