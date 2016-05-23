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



  <div id="left-wrap">
  <div id="left-bar" class="sidebar">
      <div class="featured"><div class="Logo"> <img src="Meshwar.png" alt="Smiley face" height="170" width="170"> </div><h4>Who We Are ? </h4>
       <h8> <br>Meshwar is a campaign established at the faculty
of Engineering Cairo University.

Meshwar is working on 2 branches :
- Awareness
- Charity </h8>
<h3><br><br>
  Our Vision <br></h3>
  <h8><br>
Seeking to see a better society through participating in constructing 
an effective and straight person and developing society hoping to 
eliminate negative habits 
<br><br></h8>
<h6><br>
Our Slogan </h6>
<h8><br>
حياتك مشوار سيب فيها بصمة</h8>  <br><br><br></h7></div> </div></div></div></section>


  <section class="container">
  <div class="Name">
  
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