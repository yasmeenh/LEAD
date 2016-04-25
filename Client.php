<?php

class Client
{
	 
	 private $pass;
     private $FName;
     private $LName;
     private $Email;

	 

  public function __construct() {
    
  }


  public function SetUserPass($p)
  {
  	$this->pass=$p;
  }
   public function SetUserFname($F)
  {
    $this->FName=$F;
  }
   public function SetUserLname($L)
  {  	
    $this->LName=$L;
  }
   public function SetUserEmail($E)
  {
    $this->Email=$E;
  }


  	public function CheckUserInfo()
  	{
  	$connectObject=Database::getInstance();
    $connect=$connectObject->getConnection();
  		if(isset($_POST['Signup']))
  		{
	$query= "SELECT email FROM user WHERE email='".$this->Email."'";
	$result = mysqli_query($connect,$query);
	if(mysqli_num_rows($result)>0)
	{
		echo "<script>
        alert('This email is already being used');
        </script>";
        die();
	}
	
	if($this->FName=='')
	{
		echo "<script>
        alert('Please Enter your First Name');
        </script>";
	}
	else if($this->LName=='')
	{
		echo "<script>
        alert('Please Enter your Last Name');
        </script>";
	}
	else if($this->pass=='')
	{
		echo "<script>
        alert('Please Enter your Password');
        </script>";
	}
	else if($this->Email=='')
	{
		echo "<script>
        alert('Please Enter your Email');
        </script>";
	}
    else
    {


  	 $sql="INSERT INTO user(fname, lname, email, password) VALUES('{$this->FName}','{$this->LName}','{$this->Email}','{$this->pass}')";



        if(mysqli_query($connect, $sql))
        {
        	$_SESSION['email']=$this->Email;
			

            echo "Records added successfully.";
			header("location: index1.php");
        } 
       else
       {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
       }
   }
  
}
  
}

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
		 header("location: indexUser.php");
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
		 header("location: index1.php");
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