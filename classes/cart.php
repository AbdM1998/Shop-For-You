<?php

	$filepath = realpath(dirname(__FILE__));/*FOR THIS URL http://localhost/shop*/
	include_once($filepath.'/../lb/database.php');
	include_once($filepath.'/../helper/format.php');

 ?>

<?php

/**
 * cart
 */
class cart{
	
	 	private $db;
	 	private $fm;
	function __construct()
	{

		$this->db =   new database();
		$this->fm =   new format();
	}



	public function addToCart($Quantity , $id,$cmrid){
		$Quantity = $this->fm->validation($Quantity);
		$Quantity = mysqli_real_escape_string($this->db->link ,$Quantity);
		$proid = mysqli_real_escape_string($this->db->link ,$id);
		$sid = session_id();
		
		$squery = "SELECT * from tbl_product WHERE productID ='$proid'";
		$result = $this->db->select($squery)->fetch_assoc();/*to return and show element for product from tbl_product in table cart */


		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];


		$chquery = "SELECT * from tbl_cart WHERE productID ='$proid' AND sessionID = '$sid' AND cmrid = '$cmrid'";
		$GetProCart = $this->db->select($chquery); /* if iserted this product to cart i cant add it another one */

		if($GetProCart){

			$msg = "This Product Alerdy Added!";

			return $msg ; 

		}else{

		$query = "INSERT INTO 
 							tbl_cart(sessionID,productID,productName,price,Quantity,image,cmrid)
 					VALUES
 							('$sid','$proid','$productName','$price','$Quantity','$image','$cmrid')
 					
 							";

 			$insert_row=$this->db->insert($query);
 			if($insert_row !=false){
				header('location:cart.php');
			}else{
				header('location:404.php');
			}
	}
}
	public function getCartProduct($cmrid){

			$sID = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sessionID = '$sID' AND cmrid = '$cmrid'";
			$result = $this->db->select($query);
		
			return $result;


			}

	public function UpdateCartQuantity($Quantity ,$cartID){

		$Quantity   = mysqli_real_escape_string($this->db->link,$Quantity);
		$cartID     = mysqli_real_escape_string($this->db->link,$cartID);

		$query      = "UPDATE 
							tbl_cart 
				 	   SET 
				 		 	Quantity = '$Quantity'
				 	   WHERE 
				 	 		cartID   =  '$cartID' " ;

		$update_row = $this->db->update($query);

		if($update_row > 0 ){
			
			header('location:cart.php');
			
		}else{

			$msg = "<span class='error'>Quantity Not Updated.</span>";
			return $msg;

		}
	}


	public function DelPorBycart($DelProID){

		$DelProID = mysqli_real_escape_string($this->db->link,$DelProID);

		$query    =  "DELETE FROM tbl_cart WHERE cartID ='$DelProID'";
		$del_row  = $this->db->delete($query);

		if($del_row > 0 ){

			echo  "<script>window.location='cart.php';</script>";
		

		}else{

			$msg = "<span class='error'>Product Not Deleted.</span>";
			return $msg;

		}
	}


	public function checkCartTable($cmrid){
		$sessionID =session_id();
		$query     = "SELECT * FROM tbl_cart WHERE sessionID = '$sessionID' AND cmrid = '$cmrid'";
		$result    = $this->db->select($query);
		return $result; 
	}

	public function delcustmercart(){
		$sdi 	= session_id();
		$query  = "DELETE FROM tbl_cart WHERE sessionID ='$sdi' ";
		$this->db->delete($query);
		
	}
		/*-----------Order Table ------------------*/

	public function orderProduct($cmrId){
		$sessionID =session_id();
		/*for retrev data for this session on this browser if you logout will delete all data for this session and session destroy but if you buy will data realtion with this session and session will add data to the user id */
		$query  = "SELECT * FROM tbl_cart WHERE sessionID = '$sessionID'";
		$getPRO = $this->db->select($query);
		if($getPRO){
			while ($result = $getPRO->fetch_assoc()) {
				
				$productID 		= $result['productID'];
				$productName 	= $result['productName'];
				$Quantity 		= $result['Quantity'];
				$price 			= $result['price'];
				$image 			= $result['image'];

				$query = "  INSERT INTO 
 								tbl_order(cmrId,productID,productName,Quantity,price,image)
 							VALUES
 								('$cmrId','$productID','$productName','$Quantity','$price','$image')
 					
 							";
 				$result_row = $this->db->insert($query);
 				$query_subtract="UPDATE tbl_product SET qunt =(qunt-'$Quantity') WHERE productid = '$productID'";
 				$result = $this->db->update($query_subtract);
			}


		}


		/*For Best Sellary*/
		$query = "SELECT * FROM tbl_bestsell WHERE productid = '$productID'";
		$result = $this->db->select($query);
		if($result != null){
			$query = "UPDATE tbl_bestsell SET count  = ('$Quantity' + count ) WHERE productid = '$productID' ";
			$result = $this->db->update($query);
			
		}else{
			$query = "INSERT INTO tbl_bestsell(productid,count) VALUES('$productID','$Quantity') ";
			$result = $this->db->insert($query);
		}
	}

	public function getCartOrder($cmrID){

		$query  = "SELECT * FROM tbl_order WHERE cmrId = '$cmrID' ORDER BY productID DESC";
		$result = $this->db->select($query);
		return $result;



	}

	public function checkOrder($cmrID){
		$query  = "SELECT * FROM tbl_order WHERE cmrId = '$cmrID'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function delorderbyid($id){
		$query  = "DELETE FROM tbl_order WHERE id = '$id'";	
		$result = $this->db->delete($query);
		if($result){
			$themsg = "Order Delete Successfully";
			return $themsg;
		} else{
			$themsg = "Order Not Delete .";
			return $themsg;
		}
	}



	/*For Shop Page*/
	public function BestSell(){

		$query = "SELECT * , tbl_product.* FROM tbl_bestsell INNER JOIN tbl_product ON tbl_bestsell.productid = tbl_product.productID  ORDER BY count DESC LIMIT 8";
		$result = $this->db->select($query);
		return $result;


	}
	public function NumberSellProById($id){

		$query = "SELECT * FROM tbl_bestsell WHERE productID = '$id'";
		$result = $this->db->select($query);
		return $result;


	}
/*-------------admin page order-----------------*/
	public function getAllOrder(){
		
		$query  = "SELECT * , tbl_customer.email  FROM tbl_order INNER JOIN tbl_customer ON tbl_order.cmrId = tbl_customer.id ORDER BY tbl_order.date";
		$result = $this->db->select($query);
		return $result;


	}
	public function getPendingOrder(){
		$query  = "SELECT * FROM tbl_order WHERE status = 0 ORDER BY date";
		$result = $this->db->select($query);
		return $result;


	}
	public function getShiftedOrder(){
		$query  = "SELECT * FROM tbl_order WHERE status = 1 ORDER BY date";
		$result = $this->db->select($query);
		return $result;


	}
	public function getOrderByid($id){
		$query  = "SELECT * , tbl_product.* 
					FROM tbl_order 

 						INNER JOIN 
 						tbl_product
 						ON
 						tbl_order.productID = tbl_product.productID
 						and
 						id = '$id'
 						";
		$result = $this->db->select($query);
		return $result;


	}

	



	/*----------------shifted product from admin page // 
					this method relation with order in shop -----------------*/

	public function productshifted($id,$price,$time){

		$id    = mysqli_real_escape_string($this->db->link,$id);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$time  = mysqli_real_escape_string($this->db->link,$time);

		$query = "UPDATE 
							tbl_order 
				  SET 
				  			status = '1'
				  WHERE 
				  			cmrId = '$id' 
				  AND 
				  			price ='$price' 
				  AND 
				  			date = '$time' ";

		$result_row = $this->db->update($query);

		if($result_row > 0 ){

			$msg =  "<span class='success'>Updated Successfully</span>";
			return $msg;

		}else{

			$msg = "<span class='error'>Not Updated.</span>";
			return $msg;

		}
	}

	public function delOrder($id,$price,$time){
		$id    = mysqli_real_escape_string($this->db->link,$id);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$time  = mysqli_real_escape_string($this->db->link,$time);

		$query = "DELETE FROM 
							tbl_order 
				  WHERE 
				  			cmrId = '$id' 
				  AND 
				  			price ='$price' 
				  AND 
				  			date = '$time' ";


		$result_row = $this->db->delete($query);

			if($result_row > 0 ){

			$msg =  "<span class='success' style='font-size:20px;' >Order Deleted Successfully</span>";
			return $msg;

			}else{

			$msg = "<span class='error' style='font-size:20px;'>Order Not Deleted.</span>";
			return $msg;

		}
	}
	
}


?>