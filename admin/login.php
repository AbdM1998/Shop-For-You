<?php



 include '../classes/adminlogin.php';
 /*
			** check admin login first 
			** if login will dircted to dashbord page if not will stil in page login 
			** to can creat objict
			**than will inserted to this page all method for adminlogin class when i creat objict
			**than i check the data i inserted it if it true or not in select statment 
			if not will stll in login page and return  Username or Password Not Match
			if true will inserted data to session by

						Session::set('adminlogin',true);
						Session::set('adminID',$value['adminID']);
						Session::set('adminUser',$value['adminUser']);
						Session::set('adminName',$value['adminName']); 
			and than directed to dashbord page  
*/
			?>
 


<?php 
 

 	$al= new adminlogin();
 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
 		$adminUser=$_POST['adminUser'];
 		$adminPass=sha1($_POST['adminPass']);

 		
 		$loginChk = $al->adminlogin($adminUser ,$adminPass);
 		/*
			** if not login will 
 		*/
 	}



?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<h1>Admin Login</h1>

			<!--we have to get our all return message we take this with $loginmsg; variable from Adminlogin.php page to login.php page  to show this message like-->

				<span style="color: red; font-size:18px;">
					<?php 

						if(isset($loginChk)){
							echo $loginChk;
						}


					?>
				</span>


			<div>
				<input type="text" placeholder="Username" required="" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>