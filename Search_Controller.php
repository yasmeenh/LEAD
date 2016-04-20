
<?php
 require_once("Search_Controller.php");
 require_once("Database.php");
 ?>

<?php


class SearchController{

  private static  $instance=null;
  private $UserSearch;
  protected $Search_Model=null;


  public static  function CreateControllerInstance  (    ){
	  if (!self::$instance)
	  {
		  self::$instance = new SearchController (); 
	  }
	  return self::$instance ;
  }	

//Constructor which take as a parameter the Search Model object
  public function __construct() {
    //$this->Search_Model = $sm;
  }	

  public function GetUserSearch ($us){

  	if($us!='')
    {
      $connectObject=Database::getInstance();
      $connect=$connectObject->getConnection();
      $searchQ= "SELECT posts FROM post,stdact WHERE email=stnemail AND name='STP'";
      $results = mysqli_query($connect,$searchQ);
      if(mysqli_query($connect, $searchQ))
        {
            //echo "Records added successfully.";
          //header('Location: /Search.html');
          

          $i=0; $arr;
            while($row=mysqli_fetch_array($results))
            {
              $arr[$i] = $row['posts'];
              echo "<div id=\"Searchstyle\"> $arr[$i] </div>";
              echo "<br />";
              $i++;

            }
            
        }
       else
       {
            echo "ERROR: Could not able to execute $searchQ. " . mysqli_error($connect_db);
       }
    }
  		//header('Location: /signUp (2).html');
  }

  public function SendUserSearch (){
  	
  }

  public function GetUserSearchResult (){
  	
  }

  public function SendUserSearchResult (){
  	
  }

}


?>
