<?php
 require_once("Search_Controller.php");
 require_once("Search.html");
 ?>
 <?php

$Controller=new SearchController();
if(isset($_POST['SR']))
$Controller->GetUserSearch($_POST['search']);
else 
$Controller->GetUserSearch('');

?>