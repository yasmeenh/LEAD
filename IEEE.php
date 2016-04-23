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





  <section class="container">
  <div class="Name">
    
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
      <div class="featured"><div class="Logo"> <img src="IEEE.png" alt="Smiley face" height="170" width="170"> </div>
    <div id="left-bar" class="sidebars"><h4><br>Overview <br><br></h4>
   
    <h8>IEEE Cairo University Student Branch was the first IEEE student branch to be established in Egypt. 
It is located at the Faculty of Engineering and serves four departments within the faculty, Electronics and Communications Engineering, Electrical Power Engineering, Computer Engineering,and Biomedical Engineering, but its services is not limited to these departments as it provides all students with different soft skills sessions and trainings. </h8>

    <h3>
        <br>Vision<br><br></h3>
      <h8>
Enhancing the sense of engineering students through creating leading technical community.</h8>
<h6><br>
Mission<br><br>
</h6>
<h8>
Enhancing the sense of engineering students through creating leading technical community and
keeping pace with with the current technological advance and improving the interpersonal skills of
students for a better egypt.<br><br><br></h8></div> </div></div></div>


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