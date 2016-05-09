<?php
 require_once("Controller.php");
 require_once("Database.php");
 ?>

<?php
class SearchModel{
  private static  $instance=null;
  private $arr=array();
  private $connectObject;
  public static  function CreateModelInstance  (    ){
    if (!self::$instance)
    {
      self::$instance = new SearchModel (); 
    }
    return self::$instance ;
  } 
  public function __construct() {
    
  } 
  public function GetUserSearch ($us){
    if($us!='')
    {

      $this->connectObject=Database::getInstance();
      $connect=$this->connectObject->getConnection();
      $searchQ= "SELECT posts FROM post,client WHERE post.Email=client.email AND fname='$us'"; 
      $results = mysqli_query($connect,$searchQ);
      
      
      if(mysqli_query($connect, $searchQ))
        {
          
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
    
  }
  public function SendUserSearchResult (){
    
    return $this->arr;
    
  }
}
?>