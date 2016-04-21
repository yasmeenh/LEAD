<?php

class write_post_model{
	
	
	/////////////////////////////write post function//////////////////////////
function  write_post()
{
	$connect_db=mysqli_connect('localhost','root','','lead');
	
	$post_written=isset($_POST['writPost']) ? $_POST['writPost'] : '';
	
$sql="SELECT * FROM `post`";

$result= mysqli_query($connect_db, $sql);


if(!$result)
{
	die("Error with database");
}


else{
$rowsArray = array();
if($row = mysqli_fetch_assoc($result))
{
$index = 0;
 $rowsArray[$index] = $row['id'];
  $index++;
while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
     $rowsArray[$index] = $row['id'];
    //echo "<br />";
	 //echo $rowsArray[$index];
	  $index++;
}
//echo $index;
if($index!=0)
{
$indexforid=$rowsArray[$index-1]+1;
}
else{
$indexforid=$rowsArray[$index]+1;	
}
}
else{
	$indexforid=1;
	//echo "here";
}		

//echo $indexforid;
//echo $post_written;

$sql1="INSERT INTO `post` (`posts`, `id`, `stnemail` , `stnname`) VALUES ('{$post_written}', '{$indexforid}', '{$_SESSION['email']}', '{$_SESSION['name']}');";

$result1= mysqli_query($connect_db, $sql1);
//echo sizeof($result);


if(!$result1)
{
	die("Error with database");
	 die(mysqli_error());
}
else{
	 header("location:\lead/index.php");
}

}
	
}


}


?>