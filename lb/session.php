

<?php

/**
 *Then before create this method i want to create seession for our login option so i create another 	class in our lib folder and name it as Session.php

 * Session
 */
class Session {

	public static function init(){

		session_start();
	}
	

	public static function set($key , $val){

		$_SESSION[$key] = $val;


	}
	public static function get($key){

		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return false;
		}
	}

	public static function checkSession(){
		self::init();
		if(self::get('adminlogin') == false){

			self::destroy();
			header('location:login.php');

		}
	}


	public static function checklogin(){
			/* if system get inappropriate user name and pw then where its will be transfer. So for doing this in our Sesssion.php i create another method for this like*/
		self::init();
		if(self::get('adminlogin') == true){

			header('location:dashbord.php');
		}
	}

	public static function destroy(){

		self::init();
        session_unset();
		session_destroy();
		header('location:login.php');


	}
	
}


?>