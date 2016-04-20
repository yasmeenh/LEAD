<?php
include ("SignUp.html");
?>


<?php

$connect_db=mysqli_connect('localhost','root','','lead');
$pass=isset($_POST['password']) ? $_POST['password'] : '';
$FName=isset($_POST['firstname']) ? $_POST['firstname'] : '';
$LName=isset($_POST['lastname']) ? $_POST['lastname'] : '';
$Email=isset($_POST['email']) ? $_POST['email'] : '';

if(isset($_POST['Signup']))
{
	$query= "SELECT email FROM user WHERE email='$Email'";
	$result = mysqli_query($connect_db,$query);
	if(mysqli_num_rows($result)>0)
	{
		echo "<script>
        alert('This email is already being used');
        </script>";
        die();
	}
	
	if($FName=='')
	{
		echo "<script>
        alert('Please Enter your First Name');
        </script>";
	}
	else if($LName=='')
	{
		echo "<script>
        alert('Please Enter your Last Name');
        </script>";
	}
	else if($pass=='')
	{
		echo "<script>
        alert('Please Enter your Password');
        </script>";
	}
	else if($Email=='')
	{
		echo "<script>
        alert('Please Enter your Email');
        </script>";
	}
    else
    {

        $sql="INSERT INTO user(fname, lname, email, password) VALUES('{$FName}','{$LName}','{$Email}','{$pass}')";

        if(mysqli_query($connect_db, $sql))
        {
            echo "Records added successfully.";
        } 
       else
       {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect_db);
       }
    }
}
?>
<?php
mysqli_close($connect_db);
?>

