<?php
session_start();
?>
<?php


require_once('Controller.php');
require_once 'Search_Model.php';
require_once 'Post.php';
$writePost=new Controller($m= new Post);
$writePost->write_post();

?>