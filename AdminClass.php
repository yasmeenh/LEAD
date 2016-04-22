
<?php require 'C:\wamp\www\Connection.php';?>
<?php
class AdminClass   
 { 
 
    function selectPostsbyAdmin($email) 
{
         $query = "select posts from post where stnemail = '".$email."'";
		 $resArr = array(); //create the result array
		 
		 $db = Connection::getInstance();
         $mysqli = $db->getConnection(); 
         $resArr = $mysqli->query($query);
		 
		 
		 
		 return $resArr;
		 
		 
		 
}
	
	function loadName ($email)
{
		$query = "select name from stdact where email = '".$email."'";
		$resArr = array(); //create the result array
		 
		 $db = Connection::getInstance();
         $mysqli = $db->getConnection(); 
         $resArr = $mysqli->query($query);
		 
		 return $resArr;
		 
		 
}
 } 


<?php
