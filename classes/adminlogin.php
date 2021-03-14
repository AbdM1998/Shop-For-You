<?php
	/*
		 first of all i want to include our Session.php / Database.php and Format.php in our Adminlogin.php class which i created in our previous video.
	*/
	 $filepath = realpath(dirname(__FILE__));/*FOR THIS URL http://localhost/shop 
	 ////// update our all url in our site*/
	 include_once($filepath.'/../lb/session.php');
	

	/* we have to Include this Session method checkLogin() in our Adminlogin.php Class page and i also make our other two class and include with include_once*/

	Session::checklogin();//if it login or not and  if system get inappropriate user name and pw then where its will be transfer
	

	
	include_once($filepath.'/../lb/database.php');
	include_once($filepath.'/../helper/format.php');



	//This is a behavior similar to the include statement, with the only difference being that if the code from a file has already been included, it will not be included again

	//and include_once returns TRUE. As the name suggests, the file will be included just once.

	

 ?>



<?php


/**
 * adminlogin class to admin login just 
 */
class adminlogin{
		/*
		 i create two property for this Database and Format class in our Adminlogin.php page
		*/
	private $db;
	private $fm;





	public function __construct(){

		$this->db = new Database();/*to check connection / to accses to the class connectDB and all of class and more important the methode or function not static becuase the ststic we don't need to creat class to access to static function*/
		$this->fm = new format();/*to check data / to accses to the class validation and validation the data */
		
	}
	public function adminlogin($adminUser,$adminPass){

		/*
			 i want to add some validation for two login filed which we already created in our Format Class and i add this on our method adminLogin($adminUser,$adminPass)  which in Adminlogin.php page

		*/

		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);

			/*
				 i want to insert data with mysqli_real_escape_string method for our two login filed adminUser and adminPass

			*/


		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
		/*Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection 
		
		link to check if connection or not and adminUser have special characters like Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z. and will escapes it 

		($this->db proparity / link database area / $adminUser cleare filed)
		*/
		$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);




		/*

			 i just put some of the if condition for validation of the filed empty. like if this login two of this filed when empty then he will show some of the message User name or Password must not be empty Then else system will check the filed with select query :

		*/

		if(empty($adminUser) || empty($adminPass)){

			$loginmsg = "User Name or Password Must Not Be Empty";

				return $loginmsg;
			}else{

					/*
							i just added our select query in our Adminlogin class and also assign our Session for fileds

					*/
				$query = "SELECT * FROM tbl_admin WHERE adminUser ='$adminUser' AND adminPass ='$adminPass'";
				$result = $this->db->select($query);

					if($result !=false){
						$value = $result->fetch_assoc();
						Session::set('adminlogin',true);
						Session::set('adminID',$value['adminID']);
						Session::set('adminUser',$value['adminUser']);
						Session::set('adminName',$value['adminName']);
						/* i we did like if you put appropriate user and pw then system will check and its will be transfer to dashboar.php that we set header("Location:dashbord.php");*/
						header('location:dashbord.php');
						exit();
						
					}else{

						$loginmsg = "Username or Password Not Match";
						return $loginmsg;
					}
			}
	}

}

?>