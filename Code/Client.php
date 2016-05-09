<?php
require_once("Controller.php");
require_once("Database.php");
?>

<?php

class Client
{
   
   private $pass;
     private $FName;
     private $LName;
     private $Email;
     private $connectObject;

   

  public function __construct() {

    Client::SetConnection();
    
  }
  public function SetConnection()
  {
    $this->connectObject=Database::getInstance();
  }

  function LoadName ($email)
{
  $db = Connection::getInstance();
    $query = "select fname,lname from client where email = '".$email."'";
    //$resArr = array(); //create the result array
     
     
         $mysqli = $db->getConnection(); 
         $resArr = $mysqli->query($query);
     
     
     
         return $resArr;     
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
      $connect=$this->connectObject->getConnection();

      if(isset($_POST['Signup']))
      {
        $query= "SELECT email FROM client WHERE email='".$this->Email."'";
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


     $sql="INSERT INTO client(fname, lname, email, password) VALUES('{$this->FName}','{$this->LName}','{$this->Email}','{$this->pass}')";

     $sql1="INSERT INTO user(email) VALUES('{$this->Email}')";
     

        if(mysqli_query($connect, $sql))
        {
          $_SESSION['email']=$this->Email;
          mysqli_query($connect, $sql1);

            echo "Records added successfully.";
			
           header("location: indexUser.php");
        } 
       else
       {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
       }
   }
  
}
  
}

function validate_login(){


	$connect=$this->connectObject->getConnection();
    session_start();
    $pass=isset($_POST['password']) ? $_POST['password'] : '';
    $Email=isset($_POST['login']) ? $_POST['login'] : '';

if(isset($_POST['commit']))
{
	echo"<br />";
	
	
$sql1="SELECT * FROM `user` WHERE `email` LIKE '{$Email}'";

$result1= mysqli_query($connect, $sql1);
$sql="SELECT * FROM `admin` WHERE `EMAIL` LIKE '{$Email}'";

$result= mysqli_query($connect, $sql);


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
		$sql2="SELECT * FROM `client` WHERE `email` LIKE '{$Email}'";

$result2= mysqli_query($connect, $sql2);


if(!$result2)
{
	die("Error with database");
}
else{
	$row=mysqli_fetch_assoc($result2);
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
	}}
	///check admin email
	else if($row=mysqli_fetch_assoc($result)){
		
		$sql3="SELECT * FROM `client` WHERE `email` LIKE '{$Email}'";

$result3= mysqli_query($connect, $sql3);


if(!$result3)
{
	die("Error with database");
}
else{
	$row=mysqli_fetch_assoc($result3);
		
		
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
		}
		
		else{
			echo "<p class='warning'>";
			echo "Email is wrong please try again!";
		    echo"</p>";
		}
	}
}

}
?>