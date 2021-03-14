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



					$getmsg = $cmr->getuserMessags();
					if ($getmsg) {
						while ($result = $getmsg->fetch_assoc() ) {
							
				?>
				<div id="chat_data" >
					
					<span style=" padding: 8px; color:#FFF;background:red; border-radius:50%;width:100px; text-align:center"><?php $name= $result['name']; echo substr($name, 0,1); ?></span>  :
					<span style="color: green;"><?php echo $result['msg']; ?></span>
					<span style="float: right;"><?php echo $fm->formatDate($result['date']); ?></span>
				</div>
				<?php
						}
					}?>