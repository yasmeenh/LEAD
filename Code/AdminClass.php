<?php require_once("Connection.php");
       require_once("Client.php");
	   require_once ("Post.php");
	   ?>
<?php
class AdminClass  extends Client
 { 
     //private $p;
	 
	 
	function __construct() {
		
		//$p = new Post;
	}
	
    function SelectPostsbyAdmin($email) 
{
		 
		 $p = new Post();
         $resArr = array();

         $resArr = $p->SelectPostsbyAdmin2($email);
         return $resArr;		 
}


    function UpdatePost ($id,$UpdatedPost)
{
   
	$resArr = array();
	$p = new Post;
	
	$p-> UpdatePost2 ($id,$UpdatedPost);
	//return $resArr;
	
	 	
}



    function selectPost ($id)
{

	$p = new Post;
	$resArr = array();
	$resArr = $p-> selectPost2 ($id);
	return $resArr;
}	


	
 } 
?>


