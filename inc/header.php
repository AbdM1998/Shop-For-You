<?php
ob_start();/*1- befour session_start();
         2- to output buffering start
         3- resolve all problem of Headers Sent 
         4- can give parameter like ob_start('ob_gzhandler') and the  (ob_gzhandler) => The content presses the server and speeds up the content / or without parameter ob_start();            */
 include 'lb/session.php';   // include Session file
 Session::init();   // Start our session with init method
 include 'lb/database.php'; // include Database file
 include 'helper/format.php'; // include Format file
 
  spl_autoload_register(function($class){
   include_once "classes/".$class.".php";
  });
 
  $db  = new Database();   // Create Database Class Object 
  $fm  = new format();  // Create Format Class Object 
  $pd  = new product(); // Create Product Class Object 
  $cat = new category();// Create category Class Object 
  $ct  = new cart(); // Create Cart Class Object 
  $cmr = new user(); // Create user Class Object 

 
 ?>



 <?php 
    if(isset($_GET['cID'])){
      
    

    Session::destroy();/*to logout and destroy session*/
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shop</title>
  

 
  <!-- add for fonts -->
  <link rel="stylesheet" href="Design/fonts/icofont.min.css"><!---->
  <link rel="stylesheet" href="Design/css/swiper.min.css"><!---->
  <link rel="stylesheet" href="Design/css/aos.css"><!---->
  <link rel="stylesheet" href="Design/css/fontawesome.min.css"><!---->
  <link rel="stylesheet" href="Design/css/all.min.css"><!---->
  <link rel="stylesheet" href="Design/css/bootstrap.min.css"><!---->
  
  <!-- <link rel="stylesheet" href="Design/css/backend.css"> -->
   <link rel="stylesheet" href="Designs/css/backend.css">



  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Design/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!---->
  <link href="Design/icofont/icofont.min.css" rel="stylesheet"><!---->
  <link href="Design/boxicons/css/boxicons.min.css" rel="stylesheet"><!---->
  <link href="Design/animate.css/animate.min.css" rel="stylesheet"><!---->
  <link href="Design/venobox/venobox.css" rel="stylesheet"><!---->
  <link href="Design/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet"><!---->
  <link href="Design/aos/aos.css" rel="stylesheet"><!---->

  <!-- Template Main CSS File -->
  <link href="style/css/styleas.css" rel="stylesheet"><!---->
  

</head>

<body>

  <!-- ======= Top Bar ======= -->
 
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix" style="margin: 0 auto; ">
      <div class="contact-info float-left" style=" padding-top: 12px;">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">Shop_For_You@Gmail.com</a>
        <i class="icofont-phone"></i> +962 788 456 446
       
      </div>
      <form action="search.php" method="GET" class="form-inline my-2 my-lg-0 mr-auto" style="justify-content: flex-end;">
        <input  style="
                       margin-right: 0!important;
                       padding-right: 0!important;
                       border-bottom-right-radius: 0px!important;
                       border-top-right-radius: 0px!important;
                       box-shadow: none!important;
                       border:1px solid #D44053;
                       "  
                class="form-control mr-sm-1 search" 
                name="search" 
                type="search" 
                placeholder="Search" 
                aria-label="Search">


        <input id="btn-search" 
        style=" font-size: 12px;
                position: relative;
                border-bottom-left-radius: 0!important;
                border-top-left-radius: 0!important;
                border: 0!important;
                height: 38px!important;
                background: #D44053;
                box-shadow: none!important;
                border:1px solid #D44053;" 
        type="submit" 
        value="SEARCH"
        class="btn btn-outline-primary my-0 my-sm-1">

        </form>


    </div>
  </section>
  

  <!-- ======= Header ======= -->
  <header id="header" >    <div class="container" style="margin: 0 auto; ">

       <div class="logo float-left">
        <h5 style="padding-top: 9px;" class="text-light"><a href="index.php"><span style="color: black">Shop</span><span style="color: #D44053">For/You</span></a></h5>
      </div>
      

        <nav class="nav-menu float-right d-none d-lg-block">

        <ul>

          <!------ Home ------>
           <?php 
              $login = Session::get("cuslogin"); /*if custmer login*/
              if($login == true) {  ?>
                 <li style="padding-top: 10px; font-weight: 500; font-family: cursive; " >Hi ( <?php  $a = explode(" ", Session::get('cmrName')); echo $a[0];  ?> )</li>
                   
              <?php } ?>  

          <li class="active"><a href="index.php">Home</a></li>
          
          
          

          <!------ Category ------>

          <li class="drop-down">
            <a href="">Category</a>
            <ul>
                <?php

                $getallcat = $cat->getAllcat();
                if($getallcat){
                while ($result = $getallcat->fetch_assoc()) {?>

              <li>
                <a class="dropdown-item" href="productbycat.php?catID=<?php echo $result["catID"]; ?>"><?php echo $result['catName']; ?></a>
              </li>


                <?php   }}?>
            </ul>

          </li>

          <!------------ My Order ---------------->

              

          
          <!------------  Cart ---------------->
              <?php 
              $login = Session::get("cuslogin"); /*if custmer login*/
              if($login == true) { 
                $cmrid = Session::get("cmrId");
                $getData = $ct->checkCartTable($cmrid);?>

          <li class=""><a href="cart.php"><i class="fas fa-shopping-cart"></i>

              <?php    if($getData){
              $sum = Session::get("sum");
              $qty = Session::get("qty");
              ?>
          <span class="badge badge-danger" style="font-size: 12px; width: 18px"><?php echo $qty; ?></span></a></li>

              <?php }?>

          <span class="badge badge-danger" style="font-size: 12px; width: 18px"></span></a></li>

            <?php}else{  ?>


              <?php

              $login = Session::get("cuslogin"); /*if custmer login*/
              if($login == false) { 

              ?>
          <li class=""><a href="login.php"><i class="fas fa-shopping-cart"></i>
          </a></li> 

              <?php }  }?>


          <!------------ User Login ---------------->

          <li class="drop-down">
            <a href=""><i class="fas fa-user"></i></a>
            <ul>
                <?php
                $login = Session::get("cuslogin"); /*if custmer login*/
                if($login == true) { ?>
                <li class=""><a href="chat.php">Chat With User</a></li>
                <li> <a class="dropdown-item" href="Profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="?cID=<?php echo Session::get('cmrId') ?>">Logout</a></li>
                <?php   }else{ ?>

              <li><a class="dropdown-item" href="login.php">Login/Register</a></li>

                <?php   } ?>
            </ul>
          </li>

          <!------------ User Profile ---------------->
            <?php

            $login = Session::get("cuslogin");/*if custmer is login will display profail */
            if($login == true){ ?>
          <li class="drop-down">
            <a href=""><i class="fas fa-bars"></i></a>
            <ul>

              
                <?php } ?>

                <?php 
              $cmrID = Session::get("cmrId");/*custmer login and have id will display the order */
              $chkOrder = $ct->checkOrder($cmrID);
              if($chkOrder){ ?>

          <li ><a href="order.php">My Order</a></li>
              <?php } ?>
                <?php 


                $getPd = $pd->getWishData($cmrID);

                if($getPd != null || $getPd != 0){?>

              <li><a class="dropdown-item" href="wishlist.php">WishList</a></li>


            </ul>

          </li>

          <!------------ Back to admain page ---------------->
            
            <?php }?>
                  


 


            <?php
            if (Session::get('adminlogin') == true) { ?>
              
          <li><a href="admin/dashbord.php">Admin Page</a></li>
            <?php
            }
            ?>
           

          


           

     </ul>
            


        

      </nav><!-- .nav-menu -->

     
    </div>
  </header><!-- End Header -->
