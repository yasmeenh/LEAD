<!DOCTYPE html>

<?php
$connect_db=mysqli_connect('localhost','root','','lead');
session_start();
//require_once('php/post.php');
?>

<html>
<head>
<title>Home Page</title>
<meta charset="utf-8">
<link rel="stylesheet" href="index.css" type="text/css" charset="utf-8">
</head>
<body>


		
		
	
  <div class="page">
  
  
  
    <div class="sidebar">
      <div class="featured">
        
		
		
		
		
		
		
		</div>
		</div>
		
		
		
		
		
		
		
		
		
		<div class="body">
	 <ul class="navigation">
	 <img class="logo" src="logo2.gif" alt="LEAD" height="250" width="250">
        <li class="selected"><a href="index1.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
		<li><a href="LogOut1.php">Logout</a></li>
      <li>
	  <div class="search1">
      <form action="Search.php" method="post" >
        <input type="text" name="search" placeholder="Search" class="text1">
       <input type="submit" name="SR" class="submit1"> 
      </form>
	  
	  
	  </li>
	  </ul>
	  </div>
	  </div>
	  
	  
	  
	  
	  
	 <!---------------------------------------!-->
	  
<div class="images">	  
	  
	  <script type="text/javascript"> 
var i = 0; 
var image = new Array();   
// LIST OF IMAGES 
image[0] = "image1.jpg"; 
image[1] = "image2.jpg"; 
image[2] = "image3.jpg"; 
image[3]= "image4.jpg" ;
image[4]= "image5.jpg" ;
image[5]= "image6.jpg" ;
image[6]= "image8.jpg" ;
image[7]= "image9.jpg" ;
  
var k = image.length-1;    

var caption = new Array(); 

// LIST OF CAPTİONS  
caption[0] = "Caption for the first image"; 
caption[1] = "Caption for the second image"; 
caption[2] = "Caption for the third image";   

function swapImage(){ 
var el = document.getElementById("mydiv"); 

var img= document.getElementById("slide"); 
img.src= image[i];  
if(i < k ) { i++;}  
else  { i = 0; } 
setTimeout("swapImage()",2000);  
} 

function addLoadEvent(func) { 
var oldonload = window.onload; 
if (typeof window.onload != 'function') { 
window.onload = func; 
} 
else { 
window.onload = function() { 
if (oldonload) { 
oldonload(); 
} 
func();}}}  
addLoadEvent(function() { 
swapImage(); });  
</script> 

<table style="border:2px solid #58FAF4;

position:relative;
top:200px;
left:200px;
bottom:200px;

"> 
<tr> 
<td> 
<img name="slide" id="slide" alt ="my images" height="285" width="1000" src="image1.jpgs"/> 
</td> 
</tr> 
<tr> 
<td align="center"style="font:small-caps bold 15px georgia; color:#58FAF4;"> 
<div id ="mydiv"></div> 
</tr> 
</td> 
</table> 
	  
	  
	  </div>
	  
	  
	  
	   <!---------------------------------------!-->
	  
	  
	  
	  <div class="posts">
	  
	   <ul class="navigation">
        <li><a href="write_post.html">Write post</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href="AdminProfile.php">Profile</a></li>
	  
	  </ul>
	  
	  	<?php
		 if ($_SESSION['email'] == "")
	 {
				header("location:indexVisitor.php");
	 }
include 'Controller.php';
require_once 'Search_Model.php';
$allPosts= new Controller($model=new SearchModel);
$result=array();
$result=$allPosts->print_posts();

$emailArray= array();		
$nameArray= array();
$postArray= array();
if(!$result)
{
	die("Error with database");
}
else
{
	$index = 0;
	$index1 = sizeof($result);
while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
     $postArray[$index] = $row['posts'];
	 $emailArray[$index] = $row['Email'];
	 $nameArray[$index] = $row['fname'];
	
	  $index++;
	 
}
$index--;
 echo "</br>";
while($index>=0)
{

	echo "<div class='borderdiv'>";
	
	   echo "<p class='admin'>";
	  echo htmlspecialchars_decode(stripslashes($nameArray[$index]));
	  	  	echo "
<div class='dropdown'>
  <button class='dropbtn'></button>
  <div class='dropdown-content'>
    <a href='#'>Update the post</a>
    <a href='#'>Delete the post</a>
  </div>
</div>";
	  
    echo "</p>";
	  
	  echo "<p class='post'>";
	  echo htmlspecialchars_decode(stripslashes($postArray[$index]));

	  
    echo "</p>";
	echo "</div>";
		
	echo "<br />";
	echo "<form action='#' type='post'>";
	echo "<input type='submit' value='Comment' class='comment'>";
	echo "<br />";
	
	$index--;
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
</div>
      </div>
 ";
}

?>	  
	 
	  
	  
	  
	    </div>
      </div>
  
 
</body>
<!--<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
!--></html>