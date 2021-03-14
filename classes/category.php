<?php

	$filepath = realpath(dirname(__FILE__));/*FOR THIS URL http://localhost/shop*/
	include_once($filepath.'/../lb/database.php');
	include_once($filepath.'/../helper/format.php');

 ?>


<?php 

/**
 * category
 */


class category{

	private $db;
	private $fm;

	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new format();
	}
	public function catInsert($catName){

		$catName = $this->fm->validation($catName);
		$validCat = $this->fm->validateCounrty($catName);
		if($validCat == 1){
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		if(empty($catName)){
			$themsg = "Category Name Must Not Be Empty";
			return $themsg;

		}else{
			$query = "SELECT * FROM tbl_category WHERE catName= '$catName' ";
			$catselect = $this->db->select($query);
			if($catselect !=false){
				$themsg = "<span class='error'>Category Has Exist.</span>";
				return $themsg;
			}else{

			$query = "INSERT INTO tbl_category(catName)VALUES('$catName')";
			$catIns = $this->db->insert($query);
			if($catIns !=false){
				$themsg = "<span class='success'>Category Inserted Successfully .</span>";
				return $themsg;
			}else{
				$themsg = "<span class='error'>Category Not Inserted .</span>";
				return $themsg;
			}

			}
		}
		}else{
			return "Should be character";
		}

	}


	public function getAllcat(){


			$query = "SELECT * FROM tbl_category ORDER BY catID DESC";
			$result = $this->db->select($query);
			if(!empty($result)){
				return $result;
			}else{
				return "you don't have data ";
			}
	}
	public function getCatById($catId){
		$query = "SELECT * FROM tbl_category WHERE catID = '$catId'";
		$result = $this->db->select($query);
		
			return $result;

	}

	public function catUpdate($catName , $catId){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		if(empty($catName)){
			$themsg = "Category Name Must Not Be Empty";
			return $themsg;

		}else{
		$query = "UPDATE tbl_category SET catName ='$catName' WHERE catID = '$catId' ";
		$update_row = $this->db->update($query);
		if($update_row >0){
				$themsg = "<span class='success'>Category Updated Successfully .</span>";
				return $themsg;
			}else{
				$themsg = "<span class='error'>Category Not Updated .</span>";
				return $themsg;
			}
	}
}

	public function delCatBYid($ID){
		$catdel= "DELETE FROM tbl_category WHERE catId = '$ID' ";
		$catdel_row = $this->db->delete($catdel);
		if($catdel_row >0){
				$themsg = "<span class='success'>Category Delete Successfully .</span>";
				return $themsg;
			}else{
				$themsg = "<span class='error'>Category Not Delete .</span>";
				return $themsg;
			}

	}
}


?>