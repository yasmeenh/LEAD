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
  
  <?php require_once ("Search.php");
  require_once ("Controller.php");
  ?>
 
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body bgcolor="#151515">




  <section class="container">
  <div class="Name">
    <img src="logo.gif" alt="Smiley face" height="170" width="170">
  </div>

  <section class="container">
  <div class="Name">
    <?php
       $object = $_SESSION['Controller'];
    $results=$object->SendUserSearchResult ();
     $length = count($results);
     for ($i = 0; $i < $length; $i++) {
      echo "<container><div  id=\"oval\"><div id=\"left-bar\" class=\"sidebars\"><br/> $results[$i] </div></div>
  </container>";
              echo "<br />";
              echo "<br />";
              
    }
    ?>
  </div>



  <section class="container">

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