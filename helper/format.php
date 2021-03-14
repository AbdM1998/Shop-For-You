<?php 

/**
** i want to create another class for some validation if you want to avoid any inject or special 		characters  from your login filed then i already added one file in our helpers folder and 			Format.php
 * format class
 */
class format{



	public function formatDate($date){

		return date('F j,Y,g:i a',strtotime($date));/*F=>October(example for month)// j=>30(day),//Y=>2020,//g:i=>12:45(time and second) //a=>am*/
		/*
		strtotime($date)=>Give this fiction a time format to work on
		The function expects to be given a string containing an English date format and will try to parse that format into a Unix timestamp (the number of seconds since January 1 1970 00:00:00 UTC), relative to the timestamp given in now, or the current time if now is not supplied.

		
		$today = date("H:i:s");                         // 17:16:18 
		$today = date("m.d.y");                         // 03.10.01
		$today = date("j, n, Y");                       // 10, 3, 2001
		$today = date("Ymd");                           // 20010310
		$today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001  


		*/
	}

	public function TextShoten($text , $limit = 400){/*$limit => how many char will display in description */

		$text = $text."";
		$text = substr($text, 0, $limit);
		$text =$text."...";
		return $text;


	}	
	public function validation($data){

		$data = trim($data);
		/*Remove characters from both sides of a string ("He" in "Hello" and "d!" in "World")*/
		$data = stripcslashes($data);
		/*Remove the backslash in front of "World!": "Hello \World!" =>Hello World!*/
		$data = htmlspecialchars($data);
		/*Convert the predefined characters "<" (less than) and ">" (greater than) to HTML entities: (Keep it intact) like 
		$str = "This is some <b>bold</b> text.";
		echo htmlspecialchars($str);
		

		output 

		This is some <b>bold</b> text.
		*/

		$data = strip_tags($data);
		return $data;

	}

	public function validapass($password){
		// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);


	if($uppercase && $lowercase && $number && $specialChars && strlen($password) >= 8 ){
		return 1 ;
	}else{
		return 0 ;
	}
}

	public function validateZipCode($zipCode){
		$zipcode = preg_match('#[0-9]{5}#', $zipCode);
	if($zipcode ){
		return 1 ;
	}else{
		return 0 ;
	}
}
public function validatePrice($validatePrice){
		$validatePrice = preg_match('#[0-9]#', $validatePrice);
	if($validatePrice ){
		return 1 ;
	}else{
		return 0 ;
	}
}
public function validateCounrty($Country){
		$Country = preg_match("/^[a-z \\w A-Z]+$/", $Country);
	if($Country ){
		return 1 ;
	}else{
		return 0 ;
	}
}
	public function validateAddress($address){
		$address = preg_match('/^\\d+ [a-zA-Z ]+/', $address);

	if($address ){
		return 1 ;
	}else{
		return 0 ;
	}
}

}

?>