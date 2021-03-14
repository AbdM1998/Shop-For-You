<?php

	$filepath = realpath(dirname(__FILE__));/*FOR THIS URL http://localhost/shop*/
	include_once($filepath.'/../lb/database.php');
	include_once($filepath.'/../helper/format.php');



 ?>
 <?php

 /**
  * product
  */
 class product{
 	private $db;
 	private $fm;

 	function __construct()
 	{
		$this->db = new Database();
		$this->fm = new format();
 	}

 	public function productInsert($data, $file){

 		/*method for all filed and images upload function.*/
 		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
 		$validpro = $this->fm->validateCounrty($productName);
		if($validpro == 1){
 		/*the $data is a variable $_POST and the value is $_POST['catID']=$data['catID'] */
 		$catID		 = mysqli_real_escape_string($this->db->link,$data['catID']);
 		
 		$body 		 = mysqli_real_escape_string($this->db->link,$data['body']);
 		$price 		 = mysqli_real_escape_string($this->db->link,$data['price']);
 		if($this->fm->validatePrice($price) == 0 || $this->fm->validatePrice($data['Quntity']) == 0){
 			return "Must Be Number";

 		}$query = "SELECT * FROM tbl_product WHERE productName = '$productName' ";
			$proselect = $this->db->select($query);
			if($proselect !=false){
				$themsg = "<span class='error'>Product Has Exist.</span>";
				return $themsg;
			}else{
 		$qunt 		 = mysqli_real_escape_string($this->db->link,$data['Quntity']);
 		$type 		 = mysqli_real_escape_string($this->db->link,$data['type']);

 		$permited = array('jpg','png','jpeg','gif');
 		$file_name  =$file['image']['name'];/*$file this name for input image in productadd.php*/
 		$file_size  =$file['image']['size'];
 		$file_temp  =$file['image']['tmp_name'];
 		
 		$div 	  = explode('.', $file_name);
 		$file_ext = strtolower(end($div));
 		/*file location



 		end(array)
 		Set the internal pointer of an array to its last element 

 		pointer on -> last elemnt on this array

 		Returns the value of the last element or FALSE for empty array.
 		 */
 		$unique_image = substr(md5(time()),0,10).'.'.$file_ext;/*uplode time image*/
 		$uploaded_image= "upload/".$unique_image;

 	if($productName == "" || $catID == "" ||  $body == "" || $price == "" || $type == "" ){

 		$themsg = "<span class='error'>product Not Inserted .</span>";
				return $themsg;

 	}else{


 		move_uploaded_file($file_temp, $uploaded_image);/*send img to upload file */
 		$query = "INSERT INTO 
 							tbl_product(productName,catID,body,price,image,type,qunt)
 					VALUES
 							('$productName','$catID','$body','$price','$uploaded_image','$type',$qunt)";

 			$insert_row=$this->db->insert($query);
 			if($insert_row !=false){
				$themsg = "<span class='success'>Product Inserted Successfully .</span>";
				return $themsg;
			}else{
				$themsg = "<span class='error'>Product Not Inserted .</span>";
				return $themsg;
			}
			

 		}
 		}
 	}else{
 		return "Should be character";
 	}



 	}
 

 	public function getAllproduct(){

 			$query  = "SELECT tbl_product.* ,tbl_category.catName as catName

 						FROM 
 							tbl_product
 						INNER JOIN 
 						tbl_category
 						ON
 						tbl_product.catID = tbl_category.catID
 						
 						ORDER BY 
 						tbl_product.productID 
 						DESC   ";
 			$result = $this->db->select($query);
 			return $result;



 	}

 	public function getProductBYID($ID){

 			$query  =$query = "SELECT tbl_product.* ,tbl_category.catName as catName

 						FROM 
 							tbl_product
 						INNER JOIN 
 						tbl_category
 						ON
 						tbl_product.catID = tbl_category.catID
 						 WHERE productID = '$ID'";
			$result = $this->db->select($query);
		
			return $result;


 	}
 	public function productupdate($data , $file , $proid){

 			$productName = mysqli_real_escape_string($this->db->link,$_POST['productName']);
 			$catID		 = mysqli_real_escape_string($this->db->link,$data['catID']);
 			$qunt  		 =mysqli_real_escape_string($this->db->link,$data['Quntity']);
 			$body 		 = mysqli_real_escape_string($this->db->link,$data['body']);
 			$price 		 = mysqli_real_escape_string($this->db->link,$data['price']);
 			$type 		 = mysqli_real_escape_string($this->db->link,$data['type']);


 			$permited = array('jpg','jpeg','png' , 'gif');
 			$file_name = $file['image']['name'];
 			$file_size = $file['image']['size'];
 			$file_temp = $file['image']['tmp_name'];

 			$div 	  = explode('.', $file_name);
 			$file_ext = strtolower(end($div));
 			$unique_image = substr(md5(time()),0,10).'.'.$file_ext;/*uplode time image*/
	 		$uploaded_image= "upload/".$unique_image;

			 	if($productName == "" || $catID == "" || $body == "" || $price == "" || $type == "" ){

	 					$themsg = "<span class='error'>product Not Inserted .</span>";
						return $themsg;

	 			}else{
	 				if(!empty($file_name)){/*if uploded image will execute this code else executed another code without image in update statment*/



	 			if($file_size >1054589 ){
	 				return $msg= "<span class='error'>The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form</span>";
					
					}elseif(in_array($file_ext,$permited) === false ){
	 				return $msg= "<span class='error'>You Can Upload Only ".implode(",", $permited)." </span>";


					 }else{


				 		move_uploaded_file($file_temp, $uploaded_image);/*send img to upload file */
				 		$query = "UPDATE 
			 							tbl_product
			 							SET 
			 							productName= '$productName',
			 							catID ='$catID',
			 							qunt ='$qunt',
			 							body ='$body',
			 							price ='$price',
			 							image ='$uploaded_image',
			 							type ='$type'
			 							WHERE 
			 							productID = '$proid'";

			 			$update_row=$this->db->update($query);
			 			if($update_row !=false){
							$themsg = "<span class='success'>Product Update Successfully .</span>";
							return $themsg;
						}else{
							$themsg = "<span class='error'>Product Not Update .</span>";
							return $themsg;
						}
			 	}


			 }else{
			 		$query = "UPDATE 
			 							tbl_product
			 							SET 
			 							productName= '$productName',
			 							catID ='$catID',
			 							qunt='$qunt',
			 							body ='$body',
			 							price ='$price',
			 							
			 							type ='$type'
			 							WHERE 
			 							productID = '$proid'";

			 			$update_row=$this->db->update($query);
			 			if($update_row !=false){
							$themsg = "<span class='success'>Product Update Successfully .</span>";
							return $themsg;
						}else{
							$themsg = "<span class='error'>Product Not Update .</span>";
							return $themsg;
							}

					 }
			 	}
		}

		public function deleteProduct($productID){
			$query  = "SELECT * FROM tbl_product WHERE  productID = '$productID'";/*to delete  image from upload*/
			$getprod = $this->db->select($query);
			if($getprod){
				while ($getImg = $getprod->fetch_assoc()) {
					$delLink = $getImg['image'];
					unlink($delLink);
				}
				$query  = "DELETE FROM tbl_product WHERE  productID = '$productID' ";
				$result =$this->db->delete($query);
				if( $result){
					$themsg = "<span class='success'>Product Delete Successfully .</span>";
								return $themsg;
				}else{
								$themsg = "<span class='error'>Product Not Delete .</span>";
								return $themsg;
								}
			}

			
		}

		/* method to stor */
		public function getAllProduct2() {
      	 $query = "SELECT * FROM tbl_product ";
         $result = $this->db->select($query);
         return $result;
      }
      public function get20Product() {
      	 $query = "SELECT * FROM tbl_product LIMIT 20";
         $result = $this->db->select($query);
         return $result;
      }
      public function getALLFeaturedProduct() {

      	 $query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC";
         $result = $this->db->select($query);
         return $result;
      }
      public function getLimitFeaturedProduct() {

      	 $query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
         $result = $this->db->select($query);
         return $result;
      }
      public function getAllGenProduct() {

      	 $query = "SELECT * FROM tbl_product WHERE type='1' ORDER BY productId DESC ";
         $result = $this->db->select($query);
         return $result;
      }
      public function getGenProduct() {

      	 $query = "SELECT * FROM tbl_product WHERE type='1' ORDER BY productId DESC LIMIT 4";
         $result = $this->db->select($query);
         return $result;
      }
		public function getFeaturedProduct() {

      	 $query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4 ";
         $result = $this->db->select($query);
         return $result;
      }

      public function getLatestProduct(){
      	 $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 8 ";
         $result = $this->db->select($query);
         return $result;
      }



       public function getsimilarProduct($catid){

      	    
 			$query ="SELECT * FROM tbl_product WHERE catID='$catid'";
 			$result1 = $this->db->select($query);
            return $result1;

 			   
      }

      /* to privew page relation between 3 table*/

      public function getSingleProduct($id){
      	$query = "SELECT 
      					tbl_product.*, tbl_category.catName as catName  
      			  FROM 
      					tbl_product 
      		   	  
      	          INNER JOIN 
      	          		tbl_category 
      	          ON 
      	          		tbl_product.catID = tbl_category.catID   
      	          AND 
      	          		tbl_product.productID = '$id' ";
      	$result = $this->db->select($query);
         return $result;
      }





     /*to admin page catedit And Page prodacut by Cat*/
    public function MinMaxproduct($id,$min,$max){
    	$id = mysqli_real_escape_string($this->db->link,$id);
    	$min = mysqli_real_escape_string($this->db->link,$min);
    	$max = mysqli_real_escape_string($this->db->link,$max);
  
    	$query = "SELECT * FROM tbl_product WHERE catID = '$id' AND price BETWEEN '$min' AND  '$max'";

		$result = $this->db->select($query);
		return $result;
   	 

	}

	public function productbycat($id){

		$query = "SELECT * FROM tbl_product WHERE catID = '$id'";
		$result = $this->db->select($query);
		return $result;
	    

	}


    /*to page prodacut by Cat */




    public function checkID($id){
    	$id = mysqli_real_escape_string($this->db->link,$id);
		$query = "SELECT * FROM tbl_product WHERE catID = '$id'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}else{
			return 0;
		}
    }



    public function ProductByOnlyCat($id){

    	$query = "SELECT * FROM tbl_category WHERE catID = '$id'";
		$result = $this->db->select($query);
		return $result;
    }


    










    /*to wish list */

    public function SaveWishListData($id,$cmrid){

    	$QueryChkProd = "SELECT * FROM tbl_wlist WHERE productID = '$id' AND cmrId ='$cmrid'";
    	$resultChk = $this->db->select($QueryChkProd);
    	if($resultChk){

    		$msg = "This Product Alerdy Added To WishList Page!";

			return $msg ; 

    	}else{

    	$PQuery = "SELECT * FROM tbl_product WHERE productID = '$id'";
    	$GetProd = $this->db->select($PQuery)->fetch_assoc();
    	if($GetProd){
    		

    			$productName = $GetProd['productName'];
    			$price = $GetProd['price'];
    			$image = $GetProd['image'];
    	
    	}

    	$insertComp = "INSERT INTO tbl_wlist(cmrId,productID,productName,price,image)VALUES('$cmrid','$id','$productName','$price','$image')";
    	$result_row = $this->db->insert($insertComp);
    	if ($result_row) {
    		$themsg = "<span class='success' style='color:green'>Product Add To WishList Page </span>";
			return $themsg; 
    	}else{
    		$themsg = "<span class='error'>Not Add To WishList Page </span>";
			return $themsg; 
    	}

    }
    


 }


    public function getWishData($cmrID){

    	$query = "SELECT * FROM tbl_wlist WHERE cmrId = '$cmrID' ORDER BY id DESC ";
    	$result = $this->db->select($query);
    	return $result;

    }


    public function deleteWishBYid($cmrId,$id){
    			$query  = "DELETE FROM tbl_wlist WHERE cmrId='$cmrId' AND  productID = '$id' ";
				$result =$this->db->delete($query);
				if( $result){
					$themsg = "<span class='success' style='color:green'>Product Delete Successfully .</span>";
								return $themsg;
				}else{
								$themsg = "<span class='error'>Product Not Delete .</span>";
								return $themsg;
								}
    }



















	/* To slider Page */

	public function getAllsliderImage(){
		$query = "SELECT * FROM tbl_image ORDER BY id DESC ";
    	$result = $this->db->select($query);
    	return $result;
	}




	public function DelSliderById($id){
		$query  = "DELETE FROM tbl_image WHERE id='$id'";
				$result =$this->db->delete($query);
				if( $result){
					$themsg = "<span class='success' style='color:green'>Image Delete Successfully .</span>";
								return $themsg;
				}else{
								$themsg = "<span class='error'>Image Not Delete .</span>";
								return $themsg;
								}
	}




	public function sliderInsert($title,$desc , $file){
		$title = mysqli_real_escape_string($this->db->link,$title);
		$desc = mysqli_real_escape_string($this->db->link,$desc);


		$permited = array('jpg','png','jpeg','gif');
 		$file_name  =$file['image']['name'];
 		$file_size  =$file['image']['size'];
 		$file_temp  =$file['image']['tmp_name'];
 		
 		$div 	  = explode('.', $file_name);
 		$file_ext = strtolower(end($div));
 		
 		$unique_image = substr(md5(time()),0,10).'.'.$file_ext;/*uplode time image*/
 		$uploaded_image= "upload/".$unique_image;

 	if($title == "" ){

 		$themsg = "<span class='error'>title Must Not Be Empty .</span>";
				return $themsg;

 	}else{


 		move_uploaded_file($file_temp, $uploaded_image);
 		$query = "INSERT INTO 
 							tbl_image(title,body,image)
 					VALUES
 							('$title','$desc','$uploaded_image')";

 			$insert_row=$this->db->insert($query);
 			if($insert_row !=false){
				$themsg = "<span class='success'>Slider Inserted Successfully .</span>";
				return $themsg;
			}else{
				$themsg = "<span class='error'>Slider Not Inserted .</span>";
				return $themsg;
			}
	}
}


	public function getsliderById($sliderID){
		$query = "SELECT * FROM tbl_image WHERE id= '$sliderID' ";
    	$result = $this->db->select($query);
    	return $result;
	}



	public function Sliderupdate($title , $file ,$sliderID){

		
 			$title = mysqli_real_escape_string($this->db->link,$title);
 			


 			$permited = array('jpg','jpeg','png' , 'gif');
 			$file_name = $file['image']['name'];
 			$file_size = $file['image']['size'];
 			$file_temp = $file['image']['tmp_name'];

 			$div 	  = explode('.', $file_name);
 			$file_ext = strtolower(end($div));
 			$unique_image = substr(md5(time()),0,10).'.'.$file_ext;/*uplode time image*/
	 		$uploaded_image= "upload/".$unique_image;

			 	if($title == "" ){

	 					$themsg = "<span class='error'>Slider Not Updated .</span>";
						return $themsg;

	 			}else{
	 				if(!empty($file_name)){



		 			if($file_size >1054589 ){
		 				return $msg= "<span class='error'>The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form</span>";
						
						}elseif(in_array($file_ext , $permited === false) ){
		 				return $msg= "<span class='error'>You Can Upload Only ".implode(",", $permited)." </span>";


						 }else{


					 		move_uploaded_file($file_temp, $uploaded_image);/*send img to upload file */
					 		$query = "UPDATE 
				 							tbl_image
				 							SET 
				 							title= '$title',
				 							
				 							image ='$uploaded_image'
				 							
				 							WHERE 
				 							id = '$sliderID'";

				 			$update_row=$this->db->update($query);
				 			if($update_row !=false){
								$themsg = "<span class='success'>Slider Update Successfully .</span>";
								return $themsg;
							}else{
								$themsg = "<span class='error'>Slider Not Update .</span>";
								return $themsg;
							}
				 	}


				 }else{
				 		$query = "UPDATE 
				 							tbl_image
				 							SET 
				 							title= '$title'
				 							WHERE 
				 							id = '$sliderID'";

				 			$update_row=$this->db->update($query);
				 			if($update_row !=false){
								$themsg = "<span class='success'>Slider Update Successfully .</span>";
								return $themsg;
							}else{
								$themsg = "<span class='error'>Slider Not Update .</span>";
								return $themsg;
								}

						 }
				 	}
				 }




			/*For Search*/

	public function productbySearch($search){
		/*advance search in shop1 in class product*/
		$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%' OR body LIKE '%$search%'  ";
    	$result = $this->db->select($query);
    	return $result;
	}
}



 ?>