<?php
 require_once("Controller.php");
 require_once("Client.php");
 include ("SignUp.html");
 ?>
 <?php
$Model= new Client();
$Control=Controller::CreateControllerInstance($Model);


	
$Control->GetUserInfo();
$Control->SendUserPass($Control->SendUserPass());
$Control->SendUserFname($Control->SendUserFname());
$Control->SendUserLname($Control->SendUserLname());
$Control->SendUserEmail($Control->SendUserEmail());
$Control->CheckUserInfo();
?>