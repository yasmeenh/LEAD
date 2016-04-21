
<?php
 require_once("Search_Controller.php");
 require_once("Database.php");
 ?>

<?php


class SearchModel{

  private static  $instance=null;
  private $arr=array();


  public static  function CreateModelInstance  (    ){
    if (!self::$instance)
    {
      self::$instance = new SearchModel (); 
    }
    return self::$instance ;
  } 

//Constructor which take as a parameter the Search Model object
  public function __construct() {
    
  } 

  public function GetUserSearch ($us){


    if($us!='')
    {
      $connectObject=Database::getInstance();
      $connect=$connectObject->getConnection();
      $searchQ= "SELECT posts FROM post,stdact WHERE email=stnemail AND name='$us'"; 
      $results = mysqli_query($connect,$searchQ);
      
      
      if(mysqli_query($connect, $searchQ))
        {
          //header('Location: /Search.html');
          if(mysqli_affected_rows($connect)!=0)
          {
          $i=0; 
            while($row=mysqli_fetch_array($results))
            {
              $this->arr[$i] = $row['posts'];
              $i++;

            }
          }
          else
          {
            echo "<div id=\"Searchstyle\"> No results matched your search. </div>";
          }
            
        }
       else
       {
            echo "ERROR: Could not able to execute $searchQ. " . mysqli_error($connect);
       }
    }
      //header('Location: /signUp (2).html');
  }

  public function SendUserSearchResult (){

    return $this->arr;
    
  }

}


?>
