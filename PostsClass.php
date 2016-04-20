<?php require 'C:\wamp\www\ModelClass.php';?>
<?php
class PostsClass extends ModelClass  
 { 
    function selectPostsByEmail($email) {
         $query = "select Posts from Post where stnemail = '".$email."'";
} 
 } 
?>