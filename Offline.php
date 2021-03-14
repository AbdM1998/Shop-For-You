<?php include'inc/header.php'; ?>
 
<?php

    $login = Session::get("cuslogin"); /*if custmer not login*/
        if($login == false){
            header('location:login.php');
        }

?>


<?php

    if(isset($_GET['orderID']) && $_GET['orderID'] == 'order'){

        $cmrID = Session::get("cmrId");
        $insertOrder = $ct->orderProduct($cmrID);
        $deldata =$ct->delcustmercart();
        echo "<meta http-equiv='refresh' content='0.01'/>";
        @header("Location:success.php");


           }




?>


<!-- offline payament -->
      <main id="main">
        <section class="section10 cart__area">
            <div class="container">
              <div class="row" style="display:inherit;">
                <div class="col-lg-12 table-user">
                   <?php 

        $id = Session::get('cmrId');
        $getData = $cmr->getCustmerData($id);
        if($getData){

            while ($result = $getData->fetch_assoc()) {
             ?>
                  <table class="table table offline-payament">
                    <tr>
                        
                        <td colspan="3"><h2>Your Profile Details</h2></td>
                        
                    </tr>
                    <tr>
                        <td width="20%">Name</td>
                        <td width="5%"> : </td>
                        <td><?php echo $result['name']; ?></td>
                    </tr>
                     <tr>
                        <td>Phone</td>
                        <td> : </td>
                        <td><?php echo $result['phone']; ?></td>
                    </tr>
                     <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td><?php echo $result['email']; ?></td>
                    </tr>
                     <tr>
                        <td>Address</td>
                        <td> : </td>
                        <td><?php echo $result['address']; ?></td>
                    </tr>
                     <tr>
                        <td>City</td>
                        <td> : </td>
                        <td><?php echo $result['city']; ?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td> : </td>
                        <td><?php echo $result['country']; ?></td>
                    </tr>
                    <tr>
                        <td>Zip Code</td>
                        <td> : </td>
                        <td><?php echo $result['zip']; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><a href="editprofile.php" style="background: #1F3548; float: right; padding: 6px;border-radius: 4px;color: #FFF;"> Update Details </a></td>
                    </tr>
    
               </table>
               <?php  } } ?> 
                </div>
              </div>
                <div class="row">
                <div class="col-lg-12 table-user">
                 
                    <?php 

              if(isset($UpdateQuantity)){
                echo $UpdateQuantity;
              }
              if(isset($DelPro_FromCart)){
                echo $DelPro_FromCart;
              }



            ?>
                 <table class="table table-striped " style="border: 1px solid #ddd;">
                  <thead>
                    <tr class="border_bottom">
                      <th scope="col" style="font-weight: bold;">SL</th>
                      <th scope="col" style="font-weight: bold;">Product Name</th>
                      <th scope="col" style="font-weight: bold;">Image</th>
                      <th scope="col" style="font-weight: bold;">Price</th>
                      <th scope="col" style="font-weight: bold;">Quantity</th>
                      <th scope="col" style="font-weight: bold;">Total Price  </th>
                      <th scope="col" style="font-weight: 900;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 

                        $getProd = $ct->getCartProduct($cmrID);

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
                            <td><?php echo $result['Quantity']; ?></td>
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
                      
                            
                    <?php } }?>
                  </tbody>
                  </table>
                  <?php 

                        $getData = $ct->checkCartTable($cmrID);
                          if($getData){
                    ?>
                  <div class="cart__totals" style="margin-bottom: 26px!important; padding: 9px!important; ">
                    <h3>Cart Totals</h3>
                    <ul>
                    
                        <li>
                          Sub Total :
                            <span class="new__price">$<?php echo $sum; ?></span>
                        </li>
                        <li>
                          VAT :
                            <span>10%</span>
                        </li>
                        <li>
                          Grand Total :
                            <span class="new__price">$<?php $vat = $sum * 0.1; $gtotal = $sum + $vat; echo $gtotal; ?></span>
                        </li>
                        
                    </ul>
                    
                    <div class="ordernow"><a href="?orderID=order" style="background: #1F3548; float: center; padding: 6px;border-radius: 4px;color: #FFF;">Order</a></div>
                </div>

                <?php 

                          }?>
                   
                </div>
              </div>
                </div>
              </div>
            </div>
        </section>
      </main>

      <?php include 'inc/footer.php' ?>