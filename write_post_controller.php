<?php

require_once 'write_post_model.php';
class write_post_controller{
	
	
	
	var $write_model ;
	
	
	function write_post()
	{
		$write_model= new write_post_model;
	$write_model->write_post();
	}
}


?>