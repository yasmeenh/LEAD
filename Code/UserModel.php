<?php require_once ('Database.php');
       require_once("Client.php");?>
<?php
class UserModel extends Client
 { 
    function ViewPosts($email) {
         $sql_query = "select posts,fname from post,follow,client where id = postid and email = '".$email."' and userEMAIL = '".$email."'";
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
		$sql_query="select password from client where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	}
	function GetF ($email)
	{
		$sql_query="select fname from client where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	}
	function GetL ($email)
	{
		$sql_query="select lname from client where email='".$email."'";
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
		$sql_query="Update client SET fname='".$name."'where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return;
	}
	function UpdateL ($email,$name)
	{
		$sql_query="Update client SET lname='".$name."'where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return;
	}
	function UpdateE ($email,$new)
	{
		$sql_query="Update client SET email='".$new."'where email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return;
	}
	function UpdateP ($email,$new)
	{
		$sql_query="Update client SET password='".$new."'where email='".$email."'";
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
		$sql_query="SELECT email FROM client WHERE email='".$email."'";
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$result = $mysqli->query($sql_query);
		return $result;
	} 
 }
 
 
?>