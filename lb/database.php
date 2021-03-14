<?php

	$filepath = realpath(dirname(__FILE__));/*FOR THIS URL http://localhost/shop && __FILE__	The full path and filename of the file with symlinks resolved. If used inside an include, the name of the included file is returned.*/
	include_once($filepath.'/../config/config.php');//localhost/shop/lb/database.php/../confing/config.php

 ?>


<?php

class Database{

	public $host=DB_HOST;
	public $user=DB_USER;
	public $pass=DB_PASS;
	public $dbname=DB_NAME;


	public $link;
	public $error;



	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){

		$this->link= new mysqli($this->host,$this->user,$this->pass,$this->dbname);

			if(!$this->link){
				$this->error="connection fail".$this->link->connect_error;
				return false;
				
			}

	}
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows >0){
			return $result;
		}else{
			return false;
		}
	}

	//create data in DB

	public function insert($query){

		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($insert_row >0){
			return $insert_row;
			
		}else{
			return false;

		}

	}
	public function update($query){

		$update_row= $this->link->query($query) or die($this->link->error.__LINE__);
		if($update_row >0){
			return $update_row;

		}else{
			return false;

		}
	}
	public function delete($query){

		$delete_row= $this->link->query($query) or die($this->link->error.__LINE__);
		if($delete_row >0){
			return $delete_row;
			

		}else{
			return false;

		}
	}
}


?>