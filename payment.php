<?php include'inc/header.php'; ?>
 
<?php

    $login = Session::get("cuslogin"); /*if custmer not login*/
        if($login == false){
            header('location:login.php');
        }

?>
<style>


</style>
 <div class="main">
    <div class="content">
    	<div class="section group">

            <div class="payment" style="margin: 0 auto;">
                
                <h2>Choose Payment Option</h2>
                <a href="Offline.php">Offline Payment</a>
                <a href="Online.php">Online Payment</a>

            </div>
            <div class="back">
                <a href="cart.php">Go Back</a>

            </div>




        </div>
 </div>
</div>
   <?php include'inc/footer.php' ?>
