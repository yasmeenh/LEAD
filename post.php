<?php<?php
require_once("Controller.php");
require_once("Database.php");
//require_once('user.php');
?>

<?php

class Post{
	
	private $connectObject;
	
	
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



$sql1="INSERT INTO `post` (`posts`, `id`, `stnemail` , `stnname`) VALUES ('{$post_written}', '{$indexforid}', '{$_SESSION['email']}', '{$_SESSION['name']}');";

$result1= mysqli_query($connect, $sql1);


if(!$result1)
{
	die("Error with database");
	 die(mysqli_error());
}
else{
	 header("location:\lead/index.php");
}

}
	
}

function print_posts(){
		$connect=$this->connectObject->getConnection();

$sql="SELECT * FROM `post` INNER JOIN `stdact` ON stnemail=email";

$result= mysqli_query($connect, $sql);

return $result;


		
	}

}


?>
$connect_db=mysqli_connect('localhost','root','','lead');
require_once('user.php');
class post{
	var $postmsg;
	var $adminpost;
	var $postid;
	//$connect_db=mysqli_connect('localhost','root','','lead');
	function __construct()
	{
		
	}
	
	
	function print_posts(){
		$connect_db=mysqli_connect('localhost','root','','lead');
		$postArray= array();
$emailArray= array();		
$nameArray= array();
$sql="SELECT * FROM `post`";

$result= mysqli_query($connect_db, $sql);


if(!$result)
{
	die("Error with database");
}
else
{
	$index = 0;
	$index1 = sizeof($result);
while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
     $postArray[$index] = $row['posts'];
	 $emailArray[$index] = $row['stnemail'];
	 $nameArray[$index] = $row['stnname'];
	
	  $index++;
	 
}
$index--;
 echo ".";
while($index>=0)
{

	echo "<div class='borderdiv'>";
	
	   echo "<p class='admin'>";
	  echo htmlspecialchars_decode(stripslashes($nameArray[$index]));
	  	  	echo "
<div class='dropdown'>
  <button class='dropbtn'></button>
  <div class='dropdown-content'>
    <a href='#'>Update the post</a>
    <a href='#'>Delete the post</a>
  </div>
</div>";
	  
    echo "</p>";
	  
	  echo "<p class='post'>";
	  echo htmlspecialchars_decode(stripslashes($postArray[$index]));

	  
    echo "</p>";
	echo "</div>";
		
	echo "<br />";
	echo "<form action='write_post.html' type='post'>";
	echo "<input type='submit' value='Comment' class='comment'>";
	echo "<br />";
	
	$index--;
}
	
}
		
	}
	



////////////////////////login function//////////////////////////

 function validate_login()
{
	$connect_db=mysqli_connect('localhost','root','','lead');
session_start();
$pass=isset($_POST['password']) ? $_POST['password'] : '';
$Email=isset($_POST['login']) ? $_POST['login'] : '';

//print_r ($_POST);
if(isset($_POST['commit']))
{
	echo"<br />";
	
	
$sql1="SELECT * FROM `user` WHERE `email` LIKE '{$Email}'";

$result1= mysqli_query($connect_db, $sql1);
$sql="SELECT * FROM `stdact` WHERE `email` LIKE '{$Email}'";

$result= mysqli_query($connect_db, $sql);
//echo sizeof($result1);

if(!$result1)
{
	die("Error with database");
}
if(!$result)
{
	die("Error with database");
}
//check user email
 if($row=mysqli_fetch_assoc($result1))
	{
		if($pass==$row['password'])
		{
			
			$_SESSION["email"]=$row['email'];
			$_SESSION["name"]=$row['fname']+ $row['lname'];
		 header("location:\lead/write_post.html");
		}
		else{
			echo "<p class='warning'>";
		echo "User password is wrong try again!";
		echo"</p>";
		}
	}

	///check admin email
else if($row=mysqli_fetch_assoc($result)){
		if($pass==$row['password'])
		{
			$_SESSION["email"]=$row['email'];
			$_SESSION["name"]=$row['name'];
		 header("location:\lead/index.php");
		}
		else{
			echo "<p class='warning'>";
		echo "Admin password is wrong try again!";
		echo"</p>";
			
		}
			
		}
		//email wrong
else{
				//echo sizeof ($row);	
		echo "<p class='warning'>";
		echo "Email is wrong please try again!";
		echo"</p>";
		//echo"Email wrong";
		}
		}
	
	
}


/////////////////////////////write post function//////////////////////////
function write_post()
{
	$connect_db=mysqli_connect('localhost','root','','lead');
	
	$post_written=isset($_POST['writPost']) ? $_POST['writPost'] : '';
	
$sql="SELECT * FROM `post`";

$result= mysqli_query($connect_db, $sql);


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
	//echo "here";
}		

//echo $indexforid;
//echo $post_written;

$sql1="INSERT INTO `post` (`posts`, `id`, `stnemail` , `stnname`) VALUES ('{$post_written}', '{$indexforid}', '{$_SESSION['email']}', '{$_SESSION['name']}');";

$result1= mysqli_query($connect_db, $sql1);
//echo sizeof($result);


if(!$result1)
{
	die("Error with database");
	 die(mysqli_error());
}
else{
	 header("location:\lead/index.php");
}

}
	
}


	
	
}






?>
<?php
mysqli_close($connect_db);
?>