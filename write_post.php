<?php
$connect_db=mysqli_connect('localhost','root','','lead');
session_start();
?>
<?php

require_once('user.php');
require_once('write_post_controller.php');
$writePost=new write_post_controller();
$writePost->write_post();

?>