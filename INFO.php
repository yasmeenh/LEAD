<?php 
ob_start();
require_once'C:\wamp\www\Client.php'; 
require_once'C:\wamp\www\controller.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>LEAD </title>
<meta charset="utf-8">
<link rel="stylesheet" href="index.css" type="text/css" charset="utf-8">
</head>
<body>
<div id="background"> <img src="absolute-img.jpg" alt="" class="abs-img">
  <div class="page">
    <div class="sidebar">
      <div class="featured">
	  <?php 
			$user=new controller($m=new SearchModel);
			$e=$_SESSION["email"];
			$nm="";
			echo "<p style='font-size:25px'>".$_SESSION["fname"]." ".$_SESSION["lname"]."</p>";
		?>
        <a href="#" class="figure"><img src="butterfly.jpg" alt=""></a> 
		</div>
    </div>
    <div class="body">
      <ul id="navigation">
        <li><a href="indexUser.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
		<li><a href="LogOut1.php">Log Out</a></li>
      </ul>
      <form action="#" id="search">
        <input type="text">
        <input type="submit" value="" id="submit">
      </form>
      <h1><a href="#">LEAD</a></h1>
      <ul class="navigation">
	    <li class="selected"><a href="UserView.php">My Profile</a></li>
        <li><a href="#">Notification</a></li>
      </ul>
	    <h2 style="color:white;">Edit my information</h2>
		<br>
      <div class="tutorials">
      </div>
      <form action="INFO.php" method="post"  class="information">
	  <?php
	  if($nm=="")
	  {
		$result=$user->fname($e);
		$row1 = $result->fetch_assoc();
		$nm=$row1['fname'];
	  }
		$result=$user->lname($e);
		 $row2 = $result->fetch_assoc();
	  ?>
		<p style="color:#c3e8ec;font-size:20px">First name :</p>
        <p><input type="text" name="firstname" value=<?php echo $nm ?> placeholder="First name"></p>
		<p style="color:#c3e8ec;font-size:20px">Last name :</p>
		<p><input type="text" name="lastname" value=<?php echo $row2["lname"] ?> placeholder="Last name"></p>
		<p style="color:#c3e8ec;font-size:20px">Email :</p>
		<p><input type="text" name="email" value=<?php echo $e ?> placeholder="E-mail"></p>
		<ul id="ch">
		<p class="submit"><input type="submit" name="commit" value="Save changes"></p>
		</ul>
		<br><br><br>
      </form>
	    <form method="post" class="information">
		<p style="color:#c3e8ec;font-size:20px">Old password :</p>
        <p><input type="password" name="Oldpassword" value="" placeholder="Old Password"></p>
		<p style="color:#c3e8ec;font-size:20px">New password :</p>
		<p><input type="password" name="Newpassword" value="" placeholder="New Password"></p>
		<br>
		<ul id="ch">
        <p class="submit"><input type="submit" name="commit2" value="change password"></p>
		</ul>
	 </form>
	 <?php 
	 $oldpass=isset($_POST['Oldpassword']) ? $_POST['Oldpassword'] : '';
	 $newpass=isset($_POST['Newpassword']) ? $_POST['Newpassword'] : '';
	 $FName=isset($_POST['firstname']) ? $_POST['firstname'] : '';
	 $LName=isset($_POST['lastname']) ? $_POST['lastname'] : '';
	 $Email=isset($_POST['email']) ? $_POST['email'] : '';
	 if(isset($_POST['commit']))
	 {
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
	 else if($Email=='')
	 {
		echo "<script>
        alert('Please Enter your Email');
        </script>";
	 }
     else
     {
		 echo $_POST['email'];
		 if($e!=$_POST['email'])
		 {
			if(!($result=$user->SE($_POST['email'])))
			{
				echo "<script>
				alert('This email is already being used');
				</script>";
			}
			else
			{
				$result=$user->Update($_POST['firstname'],$_POST['lastname'],$_POST['email'],$e);
				$nm=$_POST['firstname'];
				$_SESSION["email"] = $_POST['email'];
					header("Location:UserView.php");    
					exit();
			}
		 }
		 else
			{
				$result=$user->Update($_POST['firstname'],$_POST['lastname'],$_POST['email'],$e);
				$nm=$_POST['firstname'];
					header("location: UserView.php");
					exit();			
			}
	 }
	 }
	 if(isset($_POST['commit2']))
	 {
	 if($oldpass=='')
	 {
		echo "<script>
        alert('Please Enter your old password');
        </script>";
	 }
	 else if($newpass=='')
	 {
		echo "<script>
        alert('Please Enter your new password');
        </script>";
	 }
     else
     {
		 $result=$user->GetPass($e);
		 $row = $result->fetch_assoc();
		 if($_POST['Oldpassword']==$row["password"])
		 {
		  $result=$user->ChangePass($e,$_POST['Newpassword']);
					header('Location: UserView.php');    
		 }
		 else{
			 echo "<script>
			 alert('Incorrect Password');
			 </script>";
		 }
     }
	 }
	?>
    </div>
  </div>
</div>
</body>
</html>