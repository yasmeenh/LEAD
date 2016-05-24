<?php
ob_start();
 require_once'C:\wamp\www\Search_Model.php';
 require_once'C:\wamp\www\controller.php';
 require_once'C:\wamp\www\Client.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>LEAD </title>
<meta charset="utf-8">
<link rel="stylesheet" href="index.css" type="text/css" charset="utf-8">
<?php
$user=new controller($m=new SearchModel);
?>

</head>
<body>
<div id="background"> <img src="absolute-img.jpg" alt="" class="abs-img">
  <div class="page">
    <div class="sidebar">
      <div class="featured">
		<?php 
			$result=$user->Name($_SESSION["email"]);
			echo "<p style='font-size:25px'>".$result['fname']." ".$result['lname']."</p>";
			$_SESSION["fname"]=$result['fname'];
			$_SESSION['lname']=$result['lname'];
		?>     
		<a href="#" class="figure"><img src="butterfly.jpg" alt=""></a>
	  </div>
      <div id="tweets">
		        <li><a href="INFO.php">Update Info</a></li>
      </div>
      <div class="featured">
	  <h5>Favorite categories:</h5><br>
		<form action="UserView.php" method="post">
	
		<?php
		$result1=$user->Types();
		$result2=$user->Favorite($_SESSION["email"]);
		$row2 = $result2->fetch_assoc();
		while($row1 = $result1->fetch_assoc())
		{
			if($row1["TypeName"]==$row2["tyname"])
			{
				$c=" checked";
				$row2 = $result2->fetch_assoc();
			}
			else
			{
				$c=" ";
			}
		 echo '<input type="checkbox" name="categories[]" value='.$row1["TypeName"].$c.'/>'.$row1["TypeName"].'<br>';
		}?>
		  <input type="submit" name="Sub" value="Submit"/>
		  <?php
		if(isset($_POST['Sub']))
		{
			$user->DeleteLike($_SESSION['email']);
			if(!empty($_POST['categories']))
			{
				foreach($_POST['categories'] as $selected)
				{
				 $user->Likes($_SESSION["email"],$selected);
				}
			}
			header('Location: UserView.php');    
		}		  
	 if ($_SESSION['email'] == "")
	 {
				header("location:indexVisitor.php");
	 }
		 
		 
		?>
		 
		</form>
	  </div>

      <div id="article">
        
      </div>
      <div id="connect">
        
      </div>
    </div>
    <div class="body">
      <ul id="navigation">
        <li><a href="indexUser.php">Home</a></li>
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
	    <h2 style="color:white;">Followed Posts</h2>
      <div class="tutorials">
      </div>
		<!--------------------->
		<?php
		$result=$user->ViewPosts($_SESSION['email']);
		if(mysqli_num_rows($result) == 0)
		{
			echo '<p style="text-align:center;color:white;">'.'No posts to view'.'</p>'.'<br>';
		}			
		else
		{
			while($row = $result->fetch_assoc())
			{
				echo " <div class='event'>". $row["fname"]." :". "<br>";
				echo "<div class='t'>". $row["posts"]. "<br>"."</div>"."</div>";
			}
		}
		
		?>

</div>
      </div>
</div>
    </div>
  </div>
</div>
</body>
</html>
