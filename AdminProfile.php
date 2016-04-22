<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
<?php include ("AdminClass.php"); ?>

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
        $ADC = new AdminClass;
	    $result2 = array();
        $result2 = $ADC->loadName($email);
        
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
	  
	 
	  <div class="center">
	  <p id="rcorners1">
	   <?php $email = "mennah.rabie@gmail";
      $AD = new AdminClass;
	  $result = array();
	  $result = $AD->selectPostsbyAdmin($email);
	  
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

			   echo $row['posts'];
			   echo "<br>";
			   echo '<a href="Home.html" >Update Post</a>  <a href="Home.html" >Delete Post</a>  <a href="Home.html" >View Post</a>';
               echo "<br> <br> <br> <br>";
			   
			}
	   }	  

	?>  
	</p>
	</div>
      



</body>
</html>
