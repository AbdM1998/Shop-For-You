<?php include 'inc/header.php';?>


<?php 


if(isset($_GET['delpro']) && $_GET['delpro'] != null){

	$DelProID = $_GET['delpro'];

	$DelPro_FromCart =$ct->DelPorBycart($DelProID);
}


?>


<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$cartID   = $_POST['cartID'];/*from hidden input */
	$Quantity = $_POST['Quantity'];
	$UpdateQuantity  = $ct->UpdateCartQuantity($Quantity ,$cartID); 
	if($Quantity <= 0 ){
		 $DelPro_FromCart =$ct->DelPorBycart($cartID);
	}

}


	if(!isset($_GET['id'])){/*show data like live no need to refresh page with your silf and wedont have $_GET['id'] and page will refresh dircted and in exicut this code the id will make value live */
		echo "<meta http-equiv='refresh' content='0;url=?id=live'/>";
	}
	


?>

 <main id="main">
        <section class="section10 cart__area">
            <div class="container">
              <form action=" " method="post" class="cart__form">
                <h2>Your Cart</h2>
                        <div class="cart__table table-responsive">
                        
			    	<?php 

			    		if(isset($UpdateQuantity)){
			    			echo $UpdateQuantity;
			    		}
			    		if(isset($DelPro_FromCart)){
			    			echo $DelPro_FromCart;
			    		}



			    	?>
                <table class="table table-striped" >
                  <thead>
                    <tr class="border_bottom">
                      <th scope="col" style="font-weight: bold;">SL</th>
                      <th scope="col" style="font-weight: bold;">Product Name</th>
                      <th scope="col" style="font-weight: bold;">Image</th>
                      <th scope="col" style="font-weight: bold;">Price</th>
                      <th scope="col" style="font-weight: bold;">Quantity</th>
                      <th scope="col" style="font-weight: bold;">Total Price	</th>
                      <th scope="col" style="font-weight: 900;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                        $cmrid = Session::get("cmrId");
                        $getProd = $ct->getCartProduct($cmrid);

                        if($getProd != null || $getProd != 0){
                          $i = 0;
                          $sum = 0;
                          $qty=0;
                          while ($result = $getProd->fetch_assoc()) {
                          $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td><img src="admin/<?php echo $result['image']; ?>" width="47px" height="30px" alt=""/></td>
                            <td>$<?php echo $result['price']; ?></td>
                            <td>
                              <form action=" " method="post"><!--this action/form for update i can Determined it by post method in line (88 & 19)-->
                                <!--hidden input to send cart id for this product for the update -->
                                <input type="hidden" name="cartID" value="<?php echo $result['cartID'] ?>"/>
                                <input type="number" name="Quantity" value="<?php echo $result['Quantity'] ?>"/>
                                <input type="submit" name="submit" value="Update"/>
                              </form>
                            </td>
                            <td>$
                              <?php 
                                  $total = $result['Quantity'] * $result['price'];
                                    echo $total ; 
                            ?>
                                                  
                              </td>
                              <td><a onclick="return confirm('Are you sure to Delete');" href="?delpro=<?php echo $result['cartID']; ?>">X</a></td>
                        </tr>
                        <?php 

                                $sum += $total;
                                $qty = $qty + $result['Quantity'];
                                Session::set('sum',$sum);
                                Session::set('qty',$qty);
                                ?>
                      
                            
                    <?php } }else{?>

                                  <tr>
                            <td colspan="7" style="color:red; text-align: center; font-size:20px; font-weight: bold; font-family: cursive; "> Cart empty</td>
                           
                        </tr>


                    <?php } ?>
                  </tbody>
                </table>
                </div>
                <div class="cart-btns">
                  <div class="continue__shopping">
                      <a href="index.php">Continue Shopping</a>
                  </div>
                </div>
                  <?php 
                        $cmrid = Session::get("cmrId");
                        $getData = $ct->checkCartTable($cmrid);
                          if($getData){
                    ?>
                  <div class="cart__totals" style="margin-bottom: 26px!important; padding: 9px!important;" >
                    <h3>Cart Totals</h3>
                    <ul>
                    
                        <li>
                          Sub Total :
                            <span class="new__price">$<?php echo $sum; ?></span>
                        </li>
                        <li>
                          Discount :
                            <span>10%</span>
                        </li>
                        <li>
                          Grand Total :
                            <span class="new__price">$<?php $dis = $sum * 0.1; $gtotal = $sum / $dis;
                             echo $gtotal; ?></span>
                        </li>
                        
                    </ul>
                    <a href="payment.php">PROCEED TO CHECKOUT</a>

                </div>
                <?php 

                          }else{ ?>

                         
                          <?php  } ?>
                </form>
            </div>
        </section>
      </main>


  <?php include 'inc/footer.php';?>
