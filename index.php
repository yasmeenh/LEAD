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
<link rel="stylesheet" href="css/index.css" type="text/css" charset="utf-8">
</head>
<body>


		<img class="logo" src="image/logo2.gif" alt="LEAD" height="250" width="250">
		
	
  <div class="page">
  
    <div class="sidebar">
      <div class="featured">
        <h3>Most readed posts</h3>
		
		
		
		
		
		
		</div>
		</div>
		
		
		
		
		
		
		
		
		
		<div class="body">
	 <ul class="navigation">
        <li class="selected"><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
      <li>
	  <div class="search1">
      <form action="" >
        <input type="text" name="search" placeholder="Search" class="text1">
       <input type="submit" value="" class="submit1"> 
      </form>
	  
	  
	  </li>
	  </ul>
	  </div>
	  </div>
	  
	  <div class="posts">
	  
	   <ul class="navigation">
        <li><a href="write_post.html">Write post</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href="#">Profile</a></li>
	  
	  
	  
	  	<?php
include 'php/post.php';
$allPosts= new post;
$allPosts->print_posts();

?>	  
	 
	  
	  
	  
	     <div ID="more"><a href="#">Load more</a></div>
	    </div>
      </div>
  
 
</body>
<!--<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
!--></html>