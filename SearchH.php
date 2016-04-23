<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Signup</title>
  <link rel="stylesheet" href="Search.css">
  
  <?php include ("Search.php"); ?>
 
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body bgcolor="#151515">



<div id="background"> </div>
  <div class="page">
    <div class="sidebar">
      <div class="featured">
        <br>
      
    </div>
  </div>
  </div>





  <section class="container">
  <div class="Name">
    <img src="logo.png" alt="Smiley face" height="170" width="170">
  </div>

  <section class="container">
  <div class="Name">
    <h1>Posts</h1>
    <?php
    $results=$Controller->SendUserSearchResult ();
     $length = count($results);
     for ($i = 0; $i < $length; $i++) {

      echo "<container><div  id=\"oval\"><div id=\"left-bar\" class=\"sidebars\"><br/> $results[$i] </div></div>
  </container>";
              echo "<br />";
              echo "<br />";
              
    }
    ?>
  </div>



  <section class="sidebar"><div class="Logo"> <img src="logo.png" alt="Smiley face" height="170" width="170"> </div><div class="featured"><h4>Who We Are ? </h4><h3>
        <br>STP stands for Steps Towards Progress. We are a Student Activity that was founded in 2005 at the Faculty of Engineering - Cairo University.
    The founders of STP saw how students at that time had so much free time that was not well utilized. So, they decided to create STP, in order to form an environment in which these students can learn and pursue their passions.
    All of STP's activities are planned, organized, and executed by students, all under the supervision of Faculty professors.</h3> </div></section>


  <section class="container">
  <div class="Name">
    <h2>Events</h2>
  </div>

  <div class="body">
   <ul class="navigation">
        <li class="selected"><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      <li>
  

  </section>

  <section class="about">
    <p class="about-links">
      
    </p>
    
  </section>



</body>
</html>