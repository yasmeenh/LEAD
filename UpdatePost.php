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

$content = isset($_GET['content']) ? $_GET['content'] : '';
$C = new Controller;

$result = array();
$result = $result2 = $C->CallSelectPost($content);
$res    = mysqli_fetch_assoc($result2);
$_SESSION["post"] = $res['posts'];

$result2 = array();
$email = "mennah.rabie@gmail";
$result2 = $C->CallSelectDate($res['posts'], $email);


if (!$result2)
{
  $message  = 'Invalid query: ' . mysqli_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die($message);
}
else if(mysqli_num_rows($result2) == 0)
{
  echo "No rows found, nothing to print so I'am exiting";
  exit;
}
else
{   
   echo "<div class='rcorners1'>"."<br>". $res['posts']."<br>";
   echo "<br>";
   
if (mysqli_num_rows($result2) >1)
{
	while ($row = mysqli_fetch_assoc($result2))
	{
		echo '<a href="UpdatePost2.php?content=' . $row['Date'] . '">"'.$row['Date'].'"</a>';
		echo "<br>";
	}
        echo "There're two posts with same content, click on date of post you wish to update";	
        		
}

else
	
{
			  
    if (!empty ($_POST))
	{
		$C->CallUpdatePost($content, $_POST ['UpdatedPost']);
	}
}
							
}
	 
?>
     
	 <form method = "post" action ="">
     Enter the Updated Post here: <br> <input type="UpdatedPost" name="UpdatedPost" class = "mytext"><br>
     <input type="submit">
     </form>
	
	
     	
	
	

</body>
</html>

