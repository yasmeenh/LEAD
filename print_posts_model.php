<?php


class print_posts_model{


//require_once 'post.php';
function print_posts(){
		$connect_db=mysqli_connect('localhost','root','','lead');

$sql="SELECT * FROM `post` INNER JOIN `stdact` ON stnemail=email";

$result= mysqli_query($connect_db, $sql);

return $result;


		
	}
	
	

}


?>

