<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
<?php require_once('C:\wamp\www\AdminClass.php'); ?>
</head>
<body>

<div id="background"> <img src="images/absolute-img.jpg" alt="" class="abs-img">
  <div class="page">
    <div class="sidebar">
      <div class="featured">
        <br>
        <div><img src="butterfly.jpg" alt=""></a> </div>
		<h3></h3>
	    
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
	  
	  <? php
	  $AD = new AdminClass;
	  
	  $db = Database::getInstance();
      $mysqli = $db->getConnection(); 
      $sql_query = 
      $result = $mysqli->query($sql_query);
	  
	  
	  
	  
	  
	  
	  
	  ?>
	  
	  
      <h1><a href="#">Your Posts</a></h1>
	   <p class="posts">Hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
       #<a href="Home.html" >Update Post</a>  #<a href="Home.html" >Delete Post</a>  #<a href="Home.html" >View Post</a>
	   <br><hr><br>
	   <p class="posts"> This paragraph contains a very long word: thisisaveryveryveryveryveryverylongword. The long word will break and wrap to the next line.</p>
       #<a href="Home.html">Update Post</a> #<a href="Home.html">Delete Post</a> #<a href="Home.html">View Post</a>
	   <br><hr><br>
       <p class="posts">thank you </p>
       #<a href="Home.html">Update Post</a> #<a href="Home.html">Delete Post</a></li> #<a href="Home.html">View Post</a></li>
	   <br><hr><br>
</div>   

<div class="RightSide">
        <h1>Notifications</h1>
        <p id="rcorners1">stp deleted post</p>
		<p id="rcorners1">new notification from ieee</p>
		<p id="rcorners1">mshwar added a new post</p>
		<p id="rcorners1">stp changed time of event</p>
		<p id="rcorners1">xxxxxx</p>
		<p id="rcorners1">stp deleted post</p>
		<p id="rcorners1">gate commented on your post</p>
		<p id="rcorners1">new notification from ieee</p>
		<p id="rcorners1">mshwar added a new post</p>
		<p id="rcorners1">gate commented on your post</p>
		<p id="rcorners1">xxxxxx</p>
		<p id="rcorners1">gate commented on your post</p>
		<p id="rcorners1">stp changed time of event</p>
</div>
      
</html>
</body>
</html>

