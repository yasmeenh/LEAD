<?php


Class logModel
{


function validate_login(){
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
}


?>