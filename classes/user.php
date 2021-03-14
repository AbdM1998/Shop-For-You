<?php

	$filepath = realpath(dirname(__FILE__));/*FOR THIS URL http://localhost/shop*/
	include_once($filepath.'/../lb/database.php');
	include_once($filepath.'/../helper/format.php');

 ?>

<?php


/**
 * user
 */



class user{


		private $db;
		private $fm;
	
	function __construct()
	{
		$this->db = new database();
		$this->fm = new format();
	}

	public function CustomerRegistration($data){
		
 		$name 		 = mysqli_real_escape_string($this->db->link,$data['name']);
 		$pass		 = $data['password'];
 		$email		 = mysqli_real_escape_string($this->db->link,$data['email']);
 		$phone 		 = mysqli_real_escape_string($this->db->link,$data['phone']);
 		$country 	 = mysqli_real_escape_string($this->db->link,$data['country']);
 		$city 		 = mysqli_real_escape_string($this->db->link,$data['city']);
 		$address 	 = mysqli_real_escape_string($this->db->link,$data['address']);
 		$zip 		 = mysqli_real_escape_string($this->db->link,$data['zip']);

 		$name 		 = $this->fm->validation(filter_var( $name,FILTER_SANITIZE_STRING));
 		$pass 	 = $this->fm->validation(filter_var($pass,FILTER_SANITIZE_STRING));
 		$email 		 = $this->fm->validation(filter_var($email,FILTER_SANITIZE_EMAIL));
 		$phone 		 = $this->fm->validation(filter_var($phone,FILTER_SANITIZE_NUMBER_INT));
 		$country 	 = $this->fm->validation(filter_var($country,FILTER_SANITIZE_STRING));
 		$city 		 = $this->fm->validation(filter_var($city,FILTER_SANITIZE_STRING));
 		$address 	 = $this->fm->validation($address);
 		$zip 		 = $this->fm->validation(filter_var($zip,FILTER_SANITIZE_NUMBER_INT));


 		


 			if($name == "" || $pass == "" || $email == "" || $phone == "" || $country == "" || $city == "" || $address == "" || $zip == "" ){

	 					$themsg = "<span style='color:red;'>Field Must Not Empty .</span>";
						return $themsg;

	 			 }elseif( $this->fm->validapass($pass)==0){
	 					
	 			 	return 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
	 			 
	 			 }elseif ( $this->fm->validateZipCode($zip)==0) {
	 			 	return 'ZipCode should be 5 number or more .';
	 			 }elseif ($this->fm->validateCounrty($country)==0) {
	 			 	return 'Country should be name .';
	 			 }elseif ($this->fm->validateCounrty($city)==0) {
	 			 	return 'City should be name .';
	 			 }elseif ($this->fm->validateAddress($address)==0) {
	 			 	return 'Address should be number first and must end name of street .';
	 			 }else{
	 			 	
	 			 	
	 			 
	 			// }elseif($this->fm->validationEmail($email)){
	 			// 	$msg= '<span style="color:red;">the Email does not meet the requirements!</span>';
	 			// 	return $msg;
	 			
	 			$pass		 = mysqli_real_escape_string($this->db->link,md5($data['password']));
	 			$mailquery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1 ";
	 			$mailcheck = $this->db->select($mailquery);
	 			if($mailcheck !=false){

	 				$themsg = "<span style='color:red;'>Email already exists .</span>";
						return $themsg;

	 			}else{

	 					$query = "INSERT INTO 
 											 tbl_customer(name,pass,email,phone,country,city,address,zip)
 								  VALUES
 											('$name','$pass','$email','$phone','$country','$city','$address','$zip')";

			 			$insert_row=$this->db->insert($query);
			 			if($insert_row !=false){
							$themsg = "<span style='color:green;'>Customer Data Inserted Successfully .</span>";
							return $themsg;
						}else{
							$themsg = "<span style='color:red;'>Customer Data Not Inserted .</span>";
							return $themsg;
						}

	 			}

	 		}
	}
	public function customerLogin($data){
	    $email       =  mysqli_real_escape_string($this->db->link, $data['email'] );
	 	$pass        =  $data['password'];
	     if ($email == ""  || $pass == "" ) {
	     	
	     	$msg = "<span class='error'>Field Must Not be empty .</span> ";
	    			return $msg; // return message 
	     }
	 	 $pass        =  mysqli_real_escape_string($this->db->link, md5($data['password']));
	     $query = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass' ";
	     $result = $this->db->select($query);
	     if ($result != false) {
	      $value = $result->fetch_assoc();
	      Session::set("cuslogin", true);
	      Session::set("cmrId", $value['id']);
	      Session::set("cmrName", $value['name']);
	      header("Location:index.php");// redirect to cart.php page after login 
	      }else {
	      	$msg = "<span class='error'>Email Or Password Not Matched</span> ";
	    			return $msg;// return message 
	      }
	 
    }
    public function getAllCustmerData(){


		$query  = "SELECT * FROM tbl_customer";
		$result = $this->db->select($query);
		return $result; 

    }
     public function getNewCustmerData(){

     	$date = date('y-m-d');

		$query  = "SELECT * FROM tbl_customer WHERE date = '$date '";
		$result = $this->db->select($query);
		return $result; 

    }
     public function getCountNewCustmer(){

     	$date = date('y-m-d');

		$query  = "SELECT count(id) as count FROM tbl_customer WHERE date = '$date '";
		$result = $this->db->select($query);
		return $result; 

    }

    public function delCustmerBYid($ID){


		$query  = "DELETE FROM tbl_customer WHERE id ='$ID' ";
		$result = $this->db->delete($query);
		if($result !=false){
							$themsg = "<span style='color:green;'>Customer Data Delete Successfully .</span>";
							return $themsg;
						}else{
							$themsg = "<span style='color:red;'>Customer Data Not Delete .</span>";
							return $themsg;
						} 

    }

    public function getCustmerData($id){


		$query  = "SELECT * FROM tbl_customer WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result; 

    }

    public function UpdateCustomerData($data,$cmrid){



 		$name 		 = mysqli_real_escape_string($this->db->link,$data['name']);
 		$password    = $data['Password'];
 		$email		 = mysqli_real_escape_string($this->db->link,$data['email']);
 		$phone 		 = mysqli_real_escape_string($this->db->link,$data['phone']);
 		$country 	 = mysqli_real_escape_string($this->db->link,$data['country']);
 		$city 		 = mysqli_real_escape_string($this->db->link,$data['city']);
 		$address 	 = mysqli_real_escape_string($this->db->link,$data['address']);
 		$zip 		 = mysqli_real_escape_string($this->db->link,$data['zip']);

 		$name 		 = $this->fm->validation(filter_var( $name,FILTER_SANITIZE_STRING));
 		$password 		 = $this->fm->validation(filter_var($password,FILTER_SANITIZE_STRING));
 		$email 		 = $this->fm->validation($email);
 		$phone 		 = $this->fm->validation($phone);
 		$country 	 = $this->fm->validation(filter_var($country,FILTER_SANITIZE_STRING));
 		$city 		 = $this->fm->validation(filter_var($city,FILTER_SANITIZE_STRING));
 		$address 	 = $this->fm->validation($address);
 		$zip 		 = $this->fm->validation($zip);

 		$datacmr = self::getCustmerData($cmrid)->fetch_assoc();
 		if ($datacmr) {
 			
 				$passwordOld = $datacmr['pass'];
 		
 		}

 			if($name == "" ||  $email == "" || $phone == "" || $country == "" || $city == "" || $address == "" || $zip == "" ){


	 					$themsg = "<span style='color:red;'>Field Must Not Empty .</span>";
						return $themsg;

	 			}elseif( $this->fm->validapass($password)==0){
	 					
	 			 	return 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
	 			 
	 			 }elseif ( $this->fm->validateZipCode($zip)==0) {
	 			 	return 'ZipCode should be 5 number or more .';
	 			 }elseif ($this->fm->validateCounrty($country)==0) {
	 			 	return 'Country should be name .';
	 			 }elseif ($this->fm->validateCounrty($city)==0) {
	 			 	return 'City should be name .';
	 			 }elseif ($this->fm->validateAddress($address)==0) {
	 			 	return 'Address should be number first and must end name of street .';
	 			 }elseif($password == "" || md5($password) == $passwordOld ){

	 				$query = "UPDATE 
	 								tbl_customer 
	 						  SET
									name = '$name',
									email = '$email',
									phone = '$phone',
									country = '$country',
									city = '$city',
									address = '$address',
									zip = '$zip'
							  WHERE 
							  		id = '$cmrid'";

					$update_row = $this->db->update($query);
					if($update_row){
						$themsg = "<span style='color:green;'>Customer Data Updated Successfully .</span>";
						return $themsg;
					}else{
						$themsg = "<span style='color:red;'>Customer Data Not Updated  .</span>";
						return $themsg;
					}
	 			}else{
	 				$password =  mysqli_real_escape_string($this->db->link, md5($data['Password']));
	 				$query = "UPDATE 
	 								tbl_customer 
	 						  SET
									name = '$name',
									email = '$email',
									phone = '$phone',
									pass ='$password',
									country = '$country',
									city = '$city',
									address = '$address',
									zip = '$zip'
							  WHERE 
							  		id = '$cmrid'";

					$update_row = $this->db->update($query);
					if($update_row){
						$themsg = "<span style='color:green;'>Customer Data Updated Successfully .</span>";
						return $themsg;
					}else{
						$themsg = "<span style='color:red;'>Customer Data Not Updated  .</span>";
						return $themsg;
					}
	 			}
	 			
	 		

    }

/*--------------------Messags--------------------*/
    public function InsertMessags($data,$id){

    	$name = mysqli_real_escape_string($this->db->link,$data['name']) ;
    	$email = mysqli_real_escape_string($this->db->link,$data['email']) ;
    	$subject = mysqli_real_escape_string($this->db->link,$data['subject']) ;
    	$message = mysqli_real_escape_string($this->db->link,$data['message']) ;

    	$name = $this->fm->validation($name) ;
    	$email = $this->fm->validation($email) ;
    	$subject = $this->fm->validation($subject) ;
    	$message =$this->fm->validation($message) ;
    	
    	if($name == "" || $email == "" || $subject == "" || $message == ""){
    		$themsg = "<span style='color:red;'>FiledMust Not Be Empty .</span>";
			return $themsg;
    	}else{

    		$query = "INSERT INTO tbl_contact(cmrId,name,email,subject,message) 
    					VALUES('$id','$name','$email','$subject','$message')";
    		$insert_row=$this->db->insert($query);
			 			if($insert_row !=false){
							$themsg = "<span style='color:green;'>Customer Message Inserted Successfully .</span>";
							return $themsg;
						}else{
							$themsg = "<span style='color:red;'>Customer Message Not Inserted .</span>";
							return $themsg;
						}
    	}

    }public function InsertuserMessags($data,$cmrid)
    {
    	$name = mysqli_real_escape_string($this->db->link,$data['name']) ;
    	$message = mysqli_real_escape_string($this->db->link,$data['message']) ;
    	$name = $this->fm->validation($name) ;
    	$message =$this->fm->validation($message) ;
    	if($name == "" || $message == ""){
    		$themsg = "<span style='color:red;'>Filed Must Not Be Empty .</span>";
			return $themsg;
    	}else{

    		$query = "INSERT INTO chat(cmr_Id,name,msg) 
    					VALUES('$cmrid','$name','$message')";
    		$insert_row=$this->db->insert($query);
			 			if($insert_row){
							$themsg = "<embed loop='false' src='chat.wav hidden='true' autoplay='true'/>";
							return $themsg;
						}
    	}
    }
     public function getuserMessags()
    {
    	$query = "SELECT * FROM chat ORDER BY id DESC";
    	$result = $this->db->select($query);
    	return $result;
    }
    public function getAllMeassage(){
    	$query = "SELECT * FROM tbl_contact ORDER BY id DESC";
    	$result = $this->db->select($query);
    	return $result;
    }
     public function getReadMeassage(){
    	$query = "SELECT * FROM tbl_contact WHERE status = 1 ORDER BY id DESC";
    	$result = $this->db->select($query);
    	return $result;
    }
     public function getUnreadMeassage(){
    	$query = "SELECT * FROM tbl_contact WHERE status = 0 ORDER BY id DESC";
    	$result = $this->db->select($query);
    	return $result;
    }

     public function getCountMeassage(){
    	$query = "SELECT count(id) as count FROM tbl_contact WHERE status = 0 ";
    	$result = $this->db->select($query);
    	return $result;
    }
    public function UpdateStatusMeassage($id){

    	$query = "UPDATE 
	 								tbl_contact 
	 						  SET
									status = 1
							  WHERE 
							  		id = '$id'";

					$update_row = $this->db->update($query);
					if($update_row){
						$themsg = "<span style='color:green;'>Status Message Updated Successfully .</span>";
						return $themsg;
					}else{
						$themsg = "<span style='color:red;'>Status Message  Data Not Updated  .</span>";
						return $themsg;
					}
    }




    public function deleteMeassage($delMeassage){
   		$query  = "DELETE FROM tbl_contact WHERE id ='$delMeassage' ";
		$result = $this->db->delete($query);
		if($result !=false){
							$themsg = "<span style='color:green;'>Meassage Data Delete Successfully .</span>";
							return $themsg;
						}else{
							$themsg = "<span style='color:red;'>Meassage Data Not Delete .</span>";
							return $themsg;
						} 
   	}

   	
/*--------------------comment--------------------*/
   	public function getAllComment($id){
   		$query = "SELECT * FROM tbl_com WHERE productID='$id' ORDER BY id DESC";
    	$result = $this->db->select($query);
    	return $result;
   	}

   	public function  getAllCommentforadmin(){
   			$query = "SELECT * FROM tbl_com  ORDER BY id DESC";
    	$result = $this->db->select($query);
    	return $result;
   	}
   	
   	public function Insertcomment($data,$cmrid){
   		$name = mysqli_real_escape_string($this->db->link,$data['name']) ;
    	$my_comment = mysqli_real_escape_string($this->db->link,$data['comment']) ;
    	$productID = $data['proid'];

    	$name = $this->fm->validation($name) ;
    	$my_comment = $this->fm->validation($my_comment) ;
    	if($name == "" || $my_comment == "" ){
    		$themsg = "<span style='color:red;'>Filed Must Not Be Empty .</span>";
			return $themsg;
    	}else{

    		$query = "INSERT INTO tbl_com(productID,cmrId,name,comment) 
    					VALUES('$productID','$cmrid','$name','$my_comment')";
    		$insert_row=$this->db->insert($query);
			 			if($insert_row !=false){
							$themsg = "<span style='color:green;'> Comment Sent Successfully .</span>";
							return $themsg;
						}else{
							$themsg = "<span style='color:red;'>Comment Sent Not Inserted .</span>";
							return $themsg;
						}

   	}
}


	

   	public function deleteComment($delcomment){
   		$query  = "DELETE FROM tbl_com WHERE id ='$delcomment' ";
		$result = $this->db->delete($query);
		if($result !=false){
							$themsg = "<span style='color:green;'>Comment Data Delete Successfully .</span>";
							return $themsg;
						}else{
							$themsg = "<span style='color:red;'>Comment Data Not Delete .</span>";
							return $themsg;
						} 
   	}
   	public function getCommentByid($id){
   		$query = "SELECT *,tbl_product.productName 
   					FROM tbl_com

   					INNER JOIN 
 						tbl_product
 						ON
 						tbl_com.productID = tbl_product.productID
   					AND
   					 id = '$id'";
    	$result = $this->db->select($query);
    	return $result;
   	}

}

?>