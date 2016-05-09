<?php 
 require_once 'AdminClass.php';
 require_once("Database.php");
 require_once("Search_Model.php");
 require_once 'UserModel.php';
 require_once("Client.php");
?>

<?php
class Controller
{
  private static  $instance=null;
  private $UserSearch;
  private $SearchResult=array();
  protected $Search_Model=null;
  private $pass;
  private $FName;
  private $LName;
  private $Email;
  public static  function CreateControllerInstance  (  $sm  ){
	  if (!self::$instance)
	  {
		  self::$instance = new Controller ($sm); 
	  }
	  return self::$instance ;
  }	
  
  ////////////////////////////////maryam//////////////////////////////////
   
  function Photo() {
		$u=new UserModel;
		$r=$u->LoadPic();
		$row = $r->fetch_assoc();
		return $row;
    }
  
   function ViewPosts($email) {
		$u=new UserModel;
		$r=$u->ViewPosts($email);
		return $r;
    } 
	function Name($email) {
		$u=new Client;
		$row=$u->LoadName($email);
		//$row = mysqli_fetch_assoc($r);
		return $row;
    }
	function Likes($email,$t) {
		$u=new UserModel;
		$u->AddLikes($email,$t);
		return;
    }	
	function Types() {
		$u=new UserModel;
		$r=$u->loadLikes();
		return $r;
    }
	function Favorite($email) {
		$u=new UserModel;
		$r=$u->MyLikes($email);
		return $r;
    }
	function Update($F,$L,$E,$email) {
		$u=new UserModel;
		$r=$u->UpdateF($email,$F);
		$r=$u->UpdateL($email,$L);
		$r=$u->UpdateE($email,$E);
		return;
    }
	function GetPass($email) {
		$u=new UserModel;
		$r=$u->OldPass($email);
		return $r;
    }
	function ChangePass($email,$new) {
		$u=new UserModel;
		$r=$u->UpdateP($email,$new);
		return;
    }
	function fname($email) {
		$u=new UserModel;
		$r=$u->GetF($email);
		return $r;
    }
	function lname($email) {
		$u=new UserModel;
		$r=$u->GetL($email);
		return $r;
    }
	function DeleteLike($email,$type) {
		$u=new UserModel;
		$r=$u->MyLikes($email);
		while($row = $r->fetch_assoc())
		{
			if($type==$row["tyname"])
			{
				$u->RemoveLike($email,$type);
				return;
			}
		}
		return;
    }
	function SE($email) {
		$u=new UserModel;
		$r=$u->searchEmail($email);
		if(mysqli_num_rows($r)>0)
			return $r=false;
		else
			return $r=true;
		die();
    }
  
  
  
  ////////////////////////tasneem/////////////////////////////
	function validate_login()
	{
	$log_model= new Client();
	$log_model->validate_login();
	}
  
  
function print_posts()
{
	require_once ('Post.php');
$posts= new Post();
$results=array();

$results=$posts->print_posts();	
return $results;
}	


function write_post()
	{
		$write_model= new Post();
	$write_model->write_post();
	}
	
	
	
	
	function logout()
{
	session_unset();
	$_SESSION['email']=null;
	header("location: indexVisitor.php");
}
	
 
public function GetUserInfo()
{
	$this->pass=isset($_POST['password']) ? $_POST['password'] : '';
    $this->FName=isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $this->LName=isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $this->Email=isset($_POST['email']) ? $_POST['email'] : '';
}
public function SendUserPass()
{
   $this->Search_Model->SetUserPass($this->pass);
}
public function SendUserFname()
{
   $this->Search_Model->SetUserFname( $this->FName);
}
public function SendUserLname()
{
   $this->Search_Model->SetUserLname( $this->LName);
}
public function SendUserEmail()
{
   $this->Search_Model->SetUserEmail( $this->Email);
}
public function CheckUserInfo()
  {
  	
       $this->Search_Model->CheckUserInfo();
    
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
  	   $this->SearchResult=$this->Search_Model->SendUserSearchResult();
   
    if(strcasecmp($this->UserSearch,'STP')==0)
    {
     
     $_SESSION['results'] = $this->SearchResult;
       require_once("SearchH.php");
    }
    else if(strcasecmp('IEEE',$this->UserSearch)==0)
    {
     
     $_SESSION['results'] = $this->SearchResult;
      require_once("IEEE.php");
    }
     else if(strcasecmp($this->UserSearch,'Meshwar')==0)
    {
    
     $_SESSION['results'] = $this->SearchResult;
      require_once("Meshwar.php");
    }
    else
    {
     
     $_SESSION['results'] = $this->SearchResult;
      require_once("NoResults.php");
    }
  	//$this->SearchResult=$this->Search_Model->SendUserSearchResult();

  }
//Function to search the search result to SearchH.php(Search.html) to echo the array of posts
  public function SendUserSearchResult (){
    return $this->SearchResult;
  }
	
	/*function CallLoadName ($email)
	{
		$ADC = new AdminClass;
	    $result2 = array();
        $result2 = $ADC->LoadName($email);
		return $result2;
	}*/
	
	function CallSelectPostsbyAdmin ($email)
	{
		$AD = new AdminClass;
	    $result = array();
        $result = $AD->SelectPostsbyAdmin($email);
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
	
	
	
	
	
	
	
	
	
}
?>