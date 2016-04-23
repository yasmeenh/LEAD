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
		$email = "mennah.rabie@gmail";
        $C = new Controller;
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
        <li><a href="Home.html">Home</a></li>
		<li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact Us</a></li>
		<li> <a href="Home2.html">Logout</a></li>
      </ul>
	  <form action="#" id="search">
        <input type="text">
        <input type="submit" value="" id="submit">
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
				" ". '<a href="UpdatePost.php?content=' . $row['id'] . '" >Delete Post</a>'." ".'<a href="UpdatePost.php?content=' . $row['id'] . '" >View Post</a>'."</div>";
				
			}
	   }
	   

	?>  
	
</body>
</html>
