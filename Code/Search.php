<?php
 require_once("Controller.php");
 require_once("Search_Model.php");
 
 ?>
 <?php

$Model= SearchModel::CreateModelInstance();
$Controller=Controller::CreateControllerInstance($Model);
//$_SESSION['Controller'] = $Controller;
//if(isset($_POST['SR']))
{
	
$Controller->GetUserSearch($_POST['search']);
$Controller->SendUserSearch ();
$Controller->GetUserSearchResult ();
}
//else 
//$Controller->GetUserSearch('');

?>