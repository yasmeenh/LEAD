<?php require 'C:\wamp\www\ModelClass.php';?>
<?php
class AdminClass extends ModelClass  
 { 
    function selectPostsbyAdmin($email) {
         $query = "select Posts from Post where stnemail = '".$email."'";
    } 
	function loadName ($email)
	{
		$query = "select Name from Client where Email = '".$email."'";
	}
 } 
?>