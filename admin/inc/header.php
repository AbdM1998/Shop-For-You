<?php
ob_start();
    include '../classes/user.php';
    include '../lb/session.php';

    Session::checkSession();


    ?>
<?php 

          /*can logout the user in another page or you can logout her like =>
          */
              if(isset($_GET['action']) && $_GET['action'] == 'logout' ){
                /*  session_start();
                  session_unset();
                  session_destroy();
                  header('location:index.php');*/
                 
                 /*OR */

                  Session::destroy();


              }

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    

    <title>Admin Page</title>
    <link href="libar/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="libar/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="libar/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="dashbord.php">Admin Page</a>

      

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
         <li style="color: white;">Hello <?php echo /* $_SESSION['adminName']; OR  */ Session::get('adminName');?></li>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">

          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <span class="badge badge-danger">

                <?php

                  $user = new user();
                  $getmember = $user->getCountNewCustmer()->fetch_assoc();
                  if($getmember){
                    echo "+".$getmember['count'];
                  }else{
                    echo "0";
                  }



                ?>


             </span>

            <i class="fas fa-bell fa-fw"></i>


            

          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="newcustmer.php">New Member</a>

          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="inbox.php" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <span class="badge badge-danger">

                <?php

                  $user = new user();
                  $getmassage = $user->getCountMeassage()->fetch_assoc();
                  if($getmassage){
                    echo "+".$getmassage['count'];
                  }else{
                    echo "0";
                  }



                ?>


             </span>
            <i class="fas fa-envelope fa-fw"></i>

            
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="UnreadMessages.php">Go massage</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>


          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="editadmin.php">Edit Profile</a>
            <!-- <a class="dropdown-item" href="addAdmin.php">Add New Admin</a> -->
            <a class="dropdown-item" href="../index.php">Vist Web Site</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?action=logout" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">
