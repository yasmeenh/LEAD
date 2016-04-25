<?php 
 require 'AdminClass.php';
 require_once("Database.php");
 require_once("Search_Model.php");
?>

<?php

class Controller
{

  private static  $instance=null;
  private $UserSearch;
  private $SearchResult=array();
  protected $Search_Model=null;

  public static  function CreateControllerInstance  (  $sm  ){
	  if (!self::$instance)
	  {
		  self::$instance = new SearchController ($sm); 
	  }
	  return self::$instance ;
  }	

  
function print_posts()
{
	require_once ('print_posts_model.php');
$posts= new print_posts_model;
$results=array();

$results=$posts->print_posts();	
return $results;
}	
 

//Constructor which take as a parameter the Search Model object
  public function __construct($sm) {
    $this->Search_Model =$sm;
  }	

  //Function to get the student Activity that user entered in the search box
  public function GetUserSearch ($us){

    $this->UserSearch=$us;  	
  }
//Function to send to Model the student Activity that user entered in the search box
  public function SendUserSearch (){

  	$this->Search_Model->GetUserSearch($this->UserSearch);
  }
//Function to get the search result from Model
  public function GetUserSearchResult (){
    if($this->UserSearch=='STP')
    {
     
       require_once("SearchH.php");
    }
    else if($this->UserSearch=='IEEE')
    {
      require_once("IEEE.php");
    }

    else if($this->UserSearch=='Meshwar')
    {
      require_once("Meshwar.php");
    }

    else
    {
      require_once("NoResults.php");
    }

  	$this->SearchResult=$this->Search_Model->SendUserSearchResult();

  }
//Function to send the search result to SearchH.php(Search.html) to echo the array of posts
  public function SendUserSearchResult (){

    return $this->SearchResult;
  }
	
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
