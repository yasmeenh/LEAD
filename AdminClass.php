<?php require 'C:\wamp\www\Connection.php';?>
<?php
class AdminClass   
 { 
 
    function SelectPostsbyAdmin($email) 
{
         $query = "select posts,id from post where stnemail = '".$email."'";
		 $resArr = array(); //create the result array
		 
		 $db = Connection::getInstance();
         $mysqli = $db->getConnection(); 
         $resArr = $mysqli->query($query);
		 
		 
		 
		 return $resArr;		 
}


    function SelectDate ($post,$email)
{
	$db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $resArr = array();
		 
	$query1 = "select Date from post where stnemail = '".$email."' and posts = '".$post."'";
	$resArr = $mysqli->query($query1);
	return $resArr;
	      	
}

    function UpdatePost ($id,$UpdatedPost)
{
    $query  = "UPDATE post SET posts='".$UpdatedPost."' WHERE id= '".$id."'";	
    $db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $mysqli->query($query);
	
	 	
}

    function UpdatePostByDate ($Date,$Post,$UpdatedPost)
{
	$query  = "UPDATE post SET posts='".$UpdatedPost."' WHERE Date= '".$Date."' and posts = '".$Post."'";	
    $db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $mysqli->query($query);
}

    function selectPost ($id)
{
	$db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $resArr = array();
		 
	$query1 = "select posts from post where id = '".$id."'";
	$resArr = $mysqli->query($query1);
	return $resArr;
}	


	function LoadName ($email)
{
		$query = "select name from stdact where email = '".$email."'";
		$resArr = array(); //create the result array
		 
		 $db = Connection::getInstance();
         $mysqli = $db->getConnection(); 
         $resArr = $mysqli->query($query);
		 
		 
		 
		 return $resArr;
		 
		 
}
 } <?php require_once("Connection.php");?>
<?php
class AdminClass   
 { 
 
    function SelectPostsbyAdmin($email) 
{
         $query = "select posts,id from post where stnemail = '".$email."'";
		 //$resArr = array(); //create the result array
		 
		 $db = Connection::getInstance();
         $mysqli = $db->getConnection(); 
         $resArr = $mysqli->query($query);
		 
		 
		 
		 return $resArr;		 
}


    function SelectDate ($post,$email)
{
	$db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $resArr = array();
		 
	$query1 = "select Date from post where stnemail = '".$email."' and posts = '".$post."'";
	$resArr = $mysqli->query($query1);
	return $resArr;
	      	
}

    function UpdatePost ($id,$UpdatedPost)
{
    $query  = "UPDATE post SET posts='".$UpdatedPost."' WHERE id= '".$id."'";	
    $db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $mysqli->query($query);
	
	 	
}

    function UpdatePostByDate ($Date,$Post,$UpdatedPost)
{
	$query  = "UPDATE post SET posts='".$UpdatedPost."' WHERE Date= '".$Date."' and posts = '".$Post."'";	
    $db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $mysqli->query($query);
}

    function selectPost ($id)
{
	$db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
   // $resArr = array();
		 
	$query1 = "select posts from post where id = '".$id."'";
	$resArr = $mysqli->query($query1);
	return $resArr;
}	


	
 } 
?>


<?php require_once("Connection.php");?>
<?php
class AdminClass   
 { 
 
    function SelectPostsbyAdmin($email) 
{
         $query = "select posts,id from post where stnemail = '".$email."'";
		 //$resArr = array(); //create the result array
		 
		 $db = Connection::getInstance();
         $mysqli = $db->getConnection(); 
         $resArr = $mysqli->query($query);
		 
		 
		 
		 return $resArr;		 
}


    function SelectDate ($post,$email)
{
	$db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $resArr = array();
		 
	$query1 = "select Date from post where stnemail = '".$email."' and posts = '".$post."'";
	$resArr = $mysqli->query($query1);
	return $resArr;
	      	
}

    function UpdatePost ($id,$UpdatedPost)
{
    $query  = "UPDATE post SET posts='".$UpdatedPost."' WHERE id= '".$id."'";	
    $db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $mysqli->query($query);
	
	 	
}

    function UpdatePostByDate ($Date,$Post,$UpdatedPost)
{
	$query  = "UPDATE post SET posts='".$UpdatedPost."' WHERE Date= '".$Date."' and posts = '".$Post."'";	
    $db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $mysqli->query($query);
}

    function selectPost ($id)
{
	$db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
   // $resArr = array();
		 
	$query1 = "select posts from post where id = '".$id."'";
	$resArr = $mysqli->query($query1);
	return $resArr;
}	


	
 } 
?>



?>


