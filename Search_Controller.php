
<?php
 require_once("Database.php");
 require_once("SearchH.php");
 ?>

<?php


class SearchController{

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

//Constructor which take as a parameter the Search Model object
  public function __construct($sm) {
    $this->Search_Model = $sm;
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

    $this->SearchResult=$this->Search_Model->SendUserSearchResult();

  }
//Function to send the search result to SearchH.php(Search.html) to echo the array of posts
  public function SendUserSearchResult (){

    return $this->SearchResult;
  }

}


?>
