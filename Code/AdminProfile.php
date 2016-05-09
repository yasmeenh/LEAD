
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css">
<?php require_once ("Controller.php");
     // require_once ("LogOut1.php");
       session_start();
       
 ?>

</head>
<body>
<img class="logom" src="logo2.gif" alt="LEAD" height="250" width="250">
 <div id="background"> <img src="absolute-img.jpg" alt="" class="abs-img"></div>
  <div class="page">
    <div class="sidebar">
      <div class="featured">
        <br>
        <div><img src="butterfly.jpg" alt="" class="img"></a> </div>
		<h3> 
		<?php 
		$email=$_SESSION['email'];
        //$email = "mennah.rabie@gmail.com";
		$Model= SearchModel::CreateModelInstance();
        $C = new Controller($Model);
	    $result2 = array();
        $result2 = $C->Name($email);
        
        if (!$result2)
		 {
			$message  = 'Invalid query: ' . mysqli_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
	     }
		 
		else
		{
			$row = mysqli_fetch_assoc($result2);
			echo "<p class='adminname'>".$row['fname']. "</p>";
		}

		?>
		</h3>
	   
	  </div>
	</div>
  </div>

  
 <div class="body">
      <ul class="navigation">
        <li><a href="index1.php">Home</a></li>
		<li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
		<li> <a href="LogOut1.php">Logout</a></li>
      </ul>
	  <div class="search1">
      <form action="Search.php" method="post" >
        <input type="text" name="search" placeholder="Search" class="text1">
       <input type="submit" name="SR" class="submit1"> 
      </form>
	   </li>
	  </ul>
	  </div>
	  </div>
	 
	 
	   <div class="posts">
	  <h1><a href="#">Your Posts</a></h1>
	 	  
	   <?php 
	   if ($_SESSION['email'] == "")
	 {
				header("location:indexVisitor.php");
	 }
	  
	  $result = array();
	  $result = $C->CallSelectPostsbyAdmin($email);
	  
		if (!$result)
		 {
			$message  = 'Invalid query: ' . mysqli_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
	     }
		 else if(mysqli_num_rows($result) == 0)
	    {
			echo "No rows found, nothing to print so am exiting";
			exit;
        }
		else
		{   
			while ($row = mysqli_fetch_assoc($result))
			{ 
               
                echo "<div class='rcorners1'>"."<br>". 
				$row["posts"]."<br>"
				.'<a href="UpdatePost.php?content=' . $row['id'] . '">UpdatePost</a>'. 
				" ". '<a href="UpdatePost.php?content=' . $row['id'] . '" >Delete Post</a>'." ".'<a href="DeletePost.php?content=' . $row['id'] . '" >View Post</a>'."</div>";
				
			}
			echo "
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
			";
	   }
	   

	?>  
	</div>
</body>
</html>
