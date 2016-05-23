
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
<?php include ("Controller.php"); 

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
session_start();
$content = isset($_GET['content']) ? $_GET['content'] : '';  ///date
$post = $_SESSION["post"]; //post
$C = new Controller;
 
 
 
if (!empty ($_POST))
{
    $C->CallUpdatePostByDate($content, $post, $_POST ['UpdatedPost']);
}

echo '<div class = "rcorners1">'.$post.'</div>';
?>

<div class = "rcorners1">
<form method = "post" action ="">
Enter the Updated Post here: <br> <input type="UpdatedPost" name="UpdatedPost" class = "mytext"><br>
<input type="submit">
</form>


</body>
</html>
