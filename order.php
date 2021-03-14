<?php include'inc/header.php'; ?>
 
<?php

    $login = Session::get("cuslogin"); /*if custmer not login*/
        if($login == false){
            
            header('location:login.php');
        }



        if (isset($_GET['orddel'])){
          $id =   $_GET['orddel'];
            
            $delord = $ct->delorderbyid($id);

        }

?>

 <main id="main">
        <section class="section10 cart__area">
            <div class="container">
              <form action=" " method="post" class="cart__form">
                <?php
                if(isset($delord)){
                    echo $delord;
                } 
                ?>

                <h2 style="text-align: center"><span>Your Order Details </span></h2>
                <div class="cart__table table-responsive">

                    <table class="table table-striped" >
                  <thead>
                    <tr class="border_bottom">
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <!-- <th>Status</th>
                                <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $cmrID = Session::get("cmrId");
                                $getOrder = $ct->getCartOrder($cmrID);
            
                                if($getOrder != null || $getOrder != 0){
                                    $i = 0;
                                    
                                    while ($result = $getOrder->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName']; ?></td>
                                <td><img src="admin/<?php echo $result['image']; ?>" width="47px" height="30px" alt=""/></td>
                                <td><?php echo $result['Quantity']; ?></td>
                                
                                <td>$
                                    <?php 
                                            $total = $result['Quantity'] * $result['price'];
                                                echo $total ; 
                                                ?>
                                                    
                                </td>
                                <td><?php echo $fm->formatDate($result['date']);?></td>
                                <td>

                                    <?php 
                                       // if($result['status'] == 0 )

                                         //   echo "Pending";
                                        // else{
                                       //     echo "Shifted";
                                       //  } ?>
                                             

                                </td>

                                <?php 
                                        // if($result['status'] == 1){?> 
                                            <!-- <td><a style="color: red" onclick="return confirm('Are you sure to Delete');" href="?orddel=<?php echo $result['id']; ?>">X</a></td> -->
                                <?php   //}else{ ?>

                                             <!-- <td>N/A</td> -->



                                <?php //} ?>
                            </tr>
                        <?php } } ?>
                            
                            
                            </tbody>
                        </table>


            </div>
        </div>



            
       
    </div>
 </div>
</div>
   <?php include'inc/footer.php' ?>
