<?php require 'C:\wamp\www\Database.php';?>
<?php
class UserModel
 { 
 	 function LoadPic() {
		 $e="qqq";
        $sql_query = "select PIC from client where email= '".$e."'";
		 $db = Database::getInstance();
		 $mysqli = $db->getConnection();
		 $result = $mysqli->query($sql_query);
		 return $result;
    } 
    function ViewPosts($email) {
         $sql_query = "select posts,name from post,follow,stdact where id = postid and stnemail = email and useremail = '".$email."'";
		 $db = Database::getInstance();
		 $mysqli = $db->getConnection();
		 $result = $mysqli->query($sql_query);
		 return $result;
    } 
	function loadName ($email)
	{
		$sql_query = "select Fname,Lname from user where Email = '".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	}
	function loadLikes ()
	{
		$sql_query = "select TypeName from type";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	}
	function MyLikes ($email)
	{
		$sql_query = "select tyname from likes where useremail = '".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	}
	function OldPass ($email)
	{
		$sql_query="select password from user where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	}
	function GetF ($email)
	{
		$sql_query="select fname from user where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	}
	function GetL ($email)
	{
		$sql_query="select lname from user where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	}
	function AddLikes ($email,$type)
	{
		$sql_query="INSERT INTO likes(tyname,useremail) VALUES('{$type}','{$email}')";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return;
	}
	function UpdateF ($email,$name)
	{
		$sql_query="Update user SET fname='".$name."'where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return;
	}
	function UpdateL ($email,$name)
	{
		$sql_query="Update user SET lname='".$name."'where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return;
	}
	function UpdateE ($email,$new)
	{
		$sql_query="Update user SET email='".$new."'where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return;
	}
	function UpdateP ($email,$new)
	{
		$sql_query="Update user SET password='".$new."'where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return;
	}
	function RemoveLike ($email,$type)
	{
		$sql_query="Delete from likes where useremail ='".$email."'and tyname='".$type."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return;
	}
	function searchEmail ($email)
	{
		$sql_query="SELECT email FROM user WHERE email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	} 
 }
?>
