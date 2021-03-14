<?php
 $filepath = realpath(dirname(__FILE__));/*FOR THIS URL http://localhost/shop 
	 ////// update our all url in our site*/
	 

	include_once($filepath.'/../lb/database.php');
	include_once($filepath.'/../helper/format.php');
/**
 * create admin class
 */
class admin{
	
	private $db;
	private $fm;





	public function __construct(){

		$this->db = new Database();/*to check connection / to accses to the class connectDB and all of class and more important the methode or function not static becuase the ststic we don't need to creat class to access to static function*/
		$this->fm = new format();/*to check data / to accses to the class validation and validation the data */
		
	}


	public function getAdminData($id){

		$query = "SELECT * FROM tbl_admin WHERE adminID ='$id'";
		$result = $this->db->select($query);
		return $result;

	}



	public function UpdateAdminData($data,$id){

		$name 		 = mysqli_real_escape_string($this->db->link,$data['name']);
 		$password    = $data['Password'];
 		$email		 = mysqli_real_escape_string($this->db->link,$data['email']);
 		$user 		 = mysqli_real_escape_string($this->db->link,$data['user']);

 		$name = $this->fm->validation($name);
		
		$email = $this->fm->validation($email);
		$user = $this->fm->validation($user);

 		$dataAdmin = self::getAdminData($id)->fetch_assoc();
 		if ($dataAdmin) {
 			
 				$passwordOld = $dataAdmin['adminPass'];
 		
 		}

 			if($name == "" ||  $email == "" || $user == "" ){


	 					$themsg = "<span style='color:red;'>Field Must Not Empty .</span>";
						return $themsg;

	 			}elseif($password == "" || sha1($password) == $passwordOld ){

	 				$query = "UPDATE 
	 								tbl_admin 
	 						  SET
									adminName = '$name',
									adminUser = '$user',
									adminEmail = '$email'
									
							  WHERE 
							  		adminID ='$id'";

					$update_row = $this->db->update($query);
					if($update_row){
						$themsg = "<span style='color:green;'>Admin Data Updated Successfully .</span>";
						return $themsg;
					}else{
						$themsg = "<span style='color:red;'>Admin Data Not Updated  .</span>";
						return $themsg;
					}
	 			}else{
	 				$password =  mysqli_real_escape_string($this->db->link, sha1($data['Password']));
	 				$password = $this->fm->validation($password);
	 				$query = "UPDATE 
	 								tbl_admin 
	 						  SET
									adminName = '$name',
									adminUser = '$user',
									adminEmail = '$email',
									adminPass ='$password'
									
							  WHERE 
							  		adminID ='$id'";

					$update_row = $this->db->update($query);
					if($update_row){
						$themsg = "<span style='color:green;'>Admin Data Updated Successfully .</span>";
						return $themsg;
					}else{
						$themsg = "<span style='color:red;'>Admin Data Not Updated  .</span>";
						return $themsg;
					}
	 			

	}


	}




	public function addAdmin($data){
		$name 		 = mysqli_real_escape_string($this->db->link,$data['name']);
 		$password    = $data['Password'];
 		$email		 = mysqli_real_escape_string($this->db->link,$data['email']);
 		$user 		 = mysqli_real_escape_string($this->db->link,$data['user']);

 		$name = $this->fm->validation($name);
		
		$email = $this->fm->validation($email);
		$user = $this->fm->validation($user);

		if($name == "" ||  $email == "" || $user == "" || $password == "" ){


	 					$themsg = "<span style='color:red;'>Field Must Not Empty .</span>";
						return $themsg;
	}else{
			$password =  mysqli_real_escape_string($this->db->link, sha1($data['Password']));
	 		$password = $this->fm->validation($password);

		$query = "INSERT INTO tbl_admin(adminName ,adminUser,adminEmail,adminPass)VALUES('$name','$user','$email','$password') ";
		$result = $this->db->insert($query);
		if($result !=false){
			$themsg = "<span style='color:green;'>Admin Data Inserted Successfully .</span>";
			return $themsg;
		}else{
			$themsg = "<span style='color:red;'>Admin Data Not Inserted  .</span>";
			return $themsg;
		}
	 			
	}

}
/* For Copyright*/



	public function getCopyright(){
		$query = "SELECT * FROM tbl_copy ";
		$result = $this->db->select($query);
		
			return $result;

	}


	public function copyrightUpdate($Copyright){
		$Copyright = $this->fm->validation($Copyright);
		$Copyright = mysqli_real_escape_string($this->db->link,$Copyright);
		if(empty($Copyright)){

			$themsg = "<span class='error'>Copyright Field Must Not Be Empty .</span>";
				return $themsg;

		}
		
		$query = "UPDATE tbl_copy SET copyright ='$Copyright' ";
		$update_row = $this->db->update($query);
		if($update_row >0){
				$themsg = "<span class='success'>Copyright Updated Successfully .</span>";
				return $themsg;
			}else{
				$themsg = "<span class='error'>Copyright Not Updated .</span>";
				return $themsg;
			}
	
}



	/*For Social*/
	public function getSocial(){
		$query = "SELECT * FROM tbl_social ";
		$result = $this->db->select($query);
		
			return $result;
	}

	public function SocialUpdate($fb,$tw,$li,$gm){
		$fb = $this->fm->validation($fb);
		$tw = $this->fm->validation($tw);
		$li = $this->fm->validation($li);
		$gm = $this->fm->validation($gm);

		$fb = mysqli_real_escape_string($this->db->link,$fb);
		$tw = mysqli_real_escape_string($this->db->link,$tw);
		$li = mysqli_real_escape_string($this->db->link,$li);
		$gm = mysqli_real_escape_string($this->db->link,$gm);


		if($fb == "" || $tw == "" || $li == "" || $gm == ""){

			$themsg = "<span class='error'>Soical Field Must Not Be Empty .</span>";
				return $themsg;

		}
		
		$query = "UPDATE tbl_social SET fb='$fb' , tw='$tw' , li='$li' , gm='$gm' WHERE id = '1'";
		$update_row = $this->db->update($query);
		if($update_row >0){
				$themsg = "<span class='success'>Social Media Updated Successfully .</span>";
				return $themsg;
			}else{
				$themsg = "<span class='error'>Social Media Not Updated .</span>";
				return $themsg;
			}
	
}
}


?>