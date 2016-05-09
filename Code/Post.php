<?php
require_once("Controller.php");
require_once("Database.php");
require_once('Connection.php');
?>

<?php

class Post{
	
	private $connectObject;
	var $postmsg;
	var $adminpost;
	var $postid;
	
	function __construct()
	{
		Post::SetConnection();
		  	

	}
	public function SetConnection()
  {
  	$this->connectObject=Database::getInstance();
  }



function  write_post()
{
	
	$connect=$this->connectObject->getConnection();
	
	$post_written=isset($_POST['writPost']) ? $_POST['writPost'] : '';
	
$sql="SELECT * FROM `post`";

$result= mysqli_query($connect, $sql);
echo "hi";

if(!$result)
{
	die("Error with database");
}


else{
$rowsArray = array();
if($row = mysqli_fetch_assoc($result))
{
$index = 0;
 $rowsArray[$index] = $row['id'];
  $index++;
while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
     $rowsArray[$index] = $row['id'];
    //echo "<br />";
	 //echo $rowsArray[$index];
	  $index++;
}
//echo $index;
if($index!=0)
{
$indexforid=$rowsArray[$index-1]+1;
}
else{
$indexforid=$rowsArray[$index]+1;	
}
}
else{
	$indexforid=1;

}		



$sql1="INSERT INTO `post` (`posts`, `id`, `Email`) VALUES ('{$post_written}', '{$indexforid}', '{$_SESSION['email']}');";

$result1= mysqli_query($connect, $sql1);


if(!$result1)
{
	die("Error with database");
	 die(mysqli_error());
}
else{
	 header("location:index1.php");
}

}
	
}


function print_posts(){
		$connect=$this->connectObject->getConnection();

$sql="SELECT * FROM `post` INNER JOIN `client` ON client.email=post.Email ORDER BY post.id";

$result= mysqli_query($connect, $sql);

return $result;


		
	}


   function SelectPostsbyAdmin2($email) 
{
					
		//$connect=$this->connectObject->getConnection();

         //$query = "select posts,id from post where Email = '".$email."'";
		 $query = "select * from `post` where Email = '".$email."'";

		 //$resArr = array(); //create the result array
         $db = Connection::getInstance();
         $mysqli = $db->getConnection(); 
         $resArr = $mysqli->query($query);
		
         //$resArr= mysqli_query($connect, $sql);
		 return $resArr;
         		 
}


    function UpdatePost2 ($id,$UpdatedPost)
{
    $query  = "UPDATE post SET posts='".$UpdatedPost."' WHERE id= '".$id."'";	
    $db = Connection::getInstance();
    $mysqli = $db->getConnection(); 
    $mysqli->query($query);
	
	 	
}



    function selectPost2 ($id)
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