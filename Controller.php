<?php require 'C:\wamp\www\AdminClass.php';?>

<?php

class Controller
{
	
	function CallLoadName ($email)
	{
		$ADC = new AdminClass;
	    $result2 = array();
        $result2 = $ADC->LoadName($email);
		return $result2;
	}
	
	function CallSelectPostsbyAdmin ($email)
	{
		$AD = new AdminClass;
	    $result = array();
        $result = $AD->SelectPostsbyAdmin($email);
		return $result;
	}
	
	function CallSelectDate ($post,$email)
	{
		$AD = new AdminClass;
	    $result = array();
        $result = $AD->SelectDate($post,$email);
		return $result;
	}
	
	function CallSelectPost ($id)
	{
		$AD = new AdminClass;
	    $result = array();
        $result = $AD->selectPost($id);
		return $result;
	}
	
	function CallUpdatePost ($id,$UpdatedPost)
	{
		$AD = new AdminClass;
	    $result = array();
        $result = $AD->UpdatePost($id,$UpdatedPost);
		
	}
	
	function CallUpdatePostByDate ($Date, $Post,$UpdatedPost)
	{
		$AD = new AdminClass;
	    $result = array();
        $result = $AD->UpdatePostByDate($Date ,$Post,$UpdatedPost);	
	}
	
	
	
	
	
	
	
	
}
?>
