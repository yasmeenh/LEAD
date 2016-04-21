<?php

require_once 'login_model.php';
class login_controller{
	
	
	
	var $log_model ;
	
	
	function validate_login()
	{
		//echo realpath (dirname(__FILE__));
		$log_model= new login_model;
	$log_model->validate_login();
	}
}


?>