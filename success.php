<?php include'inc/header.php'; ?>
 
<?php

    $login = Session::get("cuslogin"); /*if custmer not login*/
        if($login == false){
            header('location:login.php');
        }

?>
<style>
.payment{text-align: center; min-height: 200px; width: 500px; border:1px solid #ddd; margin:0 auto; padding: 50px;}
.payment h2{ border-bottom: 2px solid #ddd; margin-bottom:40px; padding-bottom: 10px;  }

.payment p{line-height: 25px}


</style>
 <div class="main">
    <div class="content">
    	<div class="section">

            <div class="payment" style="    margin: 0 auto;">
                
                <h2>Payment Successful  </h2>
                <p>thanks for your purchase order receiving your Order Successfylly ,
                 we will contact you ASAP with deliverr details . Here Is your order Details : <a href="order.php">Visit Here </a> </p>

            </div>
            




        </div>
 </div>
</div>
   <?php include'inc/footer.php' ?>
