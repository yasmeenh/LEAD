
<?php

require_once 'php/print_posts_model.php';
class print_posts_controller{


function print_posts()
{
$posts= new print_posts_model;
$results=array();

$results=$posts->print_posts();	
return $results;
}	

}


?>


