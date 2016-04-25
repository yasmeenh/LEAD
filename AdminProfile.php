<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
<?php include ("Controller.php");
       session_start();
 ?>

</head>
<body>

 <div id="background"> <img src="images/absolute-img.jpg" alt="" class="abs-img"></div>
  <div class="page">
    <div class="sidebar">
      <div class="featured">
        <br>
        <div><img src="butterfly.jpg" alt=""></a> </div>
		<h3> 
		<?php 
		$email=$_SESSION['email'];
		$Model= SearchModel::CreateModelInstance();
                $C = new Controller($Model);
	    $result2 = array();
        $result2 = $C->CallLoadName($email);
        
        if (!$result2)
		 {
			$message  = 'Invalid query: ' . mysqli_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
	     }
		 
		else
		{
			$row = mysqli_fetch_assoc($result2);
			echo $row['name'];
		}

		?>
		</h3>
	   
	  </div>
	</div>
  </div>

  
 <div class="body">
      <ul id="navigation">
       <li><a href="index1.php">Home</a></li>
       <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
        <li> <a href="#">Logout</a></li>
      </ul>
	 <div class="search1">
      <form action="Search.php" method="post" >
        <input type="text" name="search" placeholder="Search" class="text1">
       <input type="submit" name="SR" class="submit1"> 
      </form>
	  
	  <h1><a href="#">Your Posts</a></h1>
	  </div>
	  
	 
	  
	   <?php 
	   
	  

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
				$row["posts"]."<br>".'<a href="UpdatePost.php?content=' . $row['id'] . '">UpdatePost</a>'. 
				" ". '<a href="UpdatePost.php?content=' . $row['id'] . '" >Delete Post</a>'." ."</div>";
				
			}
	   }
	   
	   
	   

	?>  
	
</body>
</html>
