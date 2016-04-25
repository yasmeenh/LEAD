<?php session_start(); 

require_once "Search_Model.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>LEAD </title>
<meta charset="utf-8">
<link rel="stylesheet" href="userstyle.css" type="text/css" charset="utf-8">
<?php include 'controller.php';
$user=new controller($m=new SearchModel);
$e='maryam@yahoo.com';
$e=$_SESSION["email"];
?>

</head>
<body>
<div id="background"> <img src="absolute-img.jpg" alt="" class="abs-img">
  <div class="page">
    <div class="sidebar">
      <div class="featured">
		<?php 
			$result=$user->Name($e);
			echo "<p style='font-size:25px'>".$result['Fname']." ".$result['Lname']."</p>";
		?>     
		<a href="#" class="figure"><img src="butterfly.jpg" alt=""></a>
	  </div>
      <div id="tweets">
		        <li><a href="accessories.php">Update Info</a></li>
      </div>
      <div class="featured">
	  <h5>Favorite categories:</h5><br>
		<form action="UserView.php" method="post">
	
		<?php
		 
		$result1=$user->Types();
		$result2=$user->Favorite($e);
		$row2 = $result2->fetch_assoc();
		$counter=0;
		while($row1 = $result1->fetch_assoc())
		{
			$counter++;
			if($row1["TypeName"]==$row2["tyname"])
			{
				$c=" checked";
				$row2 = $result2->fetch_assoc();
			}
			else
			{
				$c="notchecked";
			}

		 echo '<input type="checkbox" name="categories[]" value='.$row1["TypeName"].$c.'/>'.$row1["TypeName"].'<br>';
		}?>
		  <input type="submit" name="Sub" value="Submit"/>
		  <?php
		   if(isset($_POST['Sub']))
		  {
			  $result1=$user->Types();
			  $y=0;
			while($row1 = $result1->fetch_assoc())
			{
				  /*if(in_array($row1["TypeName"],$_POST['categories']))
				 if(in_array($row1["TypeName"],$_POST['categories'])&& isset($_POST['categories']))*/
				  /*if(in_array($row["TypeName"],$_POST['categories']))
					  echo "this".$row["TypeName"] ."<br>";*/
				  /*
				  foreach($_POST['check_list'] as $report_id){
        echo "$report_id was checked! ";
     }
   */
				  if(isset($_POST['categories'][$row1["TypeName"]]))
				  {
					  	/*$user->Likes($e,$row1["TypeName"]);
						echo $row1["TypeName"]." Pressed"."<br>";*/
						$user->Likes($e,$row1["TypeName"]);
						//echo $row1["TypeName"]." Pressed"."<br>";
				  }
				  else{
					  	/*$user->DeleteLike($e,$row1["TypeName"]);
						echo $row1["TypeName"]." nooo"."<br>";*/
						
						/*$user->DeleteLike($e,$row1["TypeName"]);*/
						//echo $row1["TypeName"]." nooooooo"."<br>";
				  }
				  
			 }
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
        <li><a href="index1.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
      <form action="#" id="search">
        <input type="text">
        <input type="submit" value="" id="submit">
      </form>
      <h1><a href="#">LEAD</a></h1>
      <ul class="navigation">
	    <li class="selected"><a href="tutorials.html">My Profile</a></li>
        <li><a href="blog.html">Notification</a></li>
      </ul>
	    <h2 style="color:white;">Followed Posts</h2>
      <div class="tutorials">
      </div>
		<!--------------------->
		<?php
		$result=$user->ViewPosts($e);
		if(mysqli_num_rows($result) == 0)
		{
			echo '<p style="text-align:center;color:white;">'.'No posts to view'.'</p>'.'<br>';
		}		
		else
		{
			while($row = $result->fetch_assoc())
			{
				echo " <div class='event'>". $row["name"]." :". "<br>";
				echo "<div class='t'>". $row["posts"]. "<br>"."</div>"."</div>";
			}
		}
		
		?>
 <footer class='visitorf'>
  <div class='foot'>
 <h1> <p  class='hh'>Contact us</p></h1>
   <a href='#' class='fb'>
   <img src='facebook.png' width='100' height='100'>
   </a>
      <a href='#' class='fb'>
   <img src='twitter.png' width='100' height='100'>
   </a>
      <a href='#' class='fb'>
   <img src='email.png' width='100' height='100'>
   </a>
   <p class='rights'> 2016 , All Rights for LEAD team </p>
   </div>
</footer>
</div>
      </div>
 ";	
</div>
    </div>
  </div>
</div>
</body>
</html>
