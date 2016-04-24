<?php
//include ("SignUp.html");
require_once("Controller.php");
require_once("Database.php");
?>


<?php

class SignUp
{

	 private static  $instance=null;
	 private $pass;
     private $FName;
     private $LName;
     private $Email;

	 public static  function CreateSignUpModelInstance  (    )
	 {
	 	if (!self::$instance)
	 	{
	 		self::$instance = new SignUp (); 
	 	}
	 	return self::$instance ;
	 } 

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
}

?>

