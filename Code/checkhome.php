<?php
	$connect_db=mysqli_connect('localhost','root','','lead');
session_start();
if($_SESSION['email']!=NULL)
{
$Email=$_SESSION['email'];
}
else{
$Email='';
}
	
$sql1="SELECT * FROM `user` WHERE `email` LIKE '{$Email}'";

$result1= mysqli_query($connect_db, $sql1);
$sql="SELECT * FROM `stdact` WHERE `email` LIKE '{$Email}'";

$result= mysqli_query($connect_db, $sql);
//echo sizeof($result1);

if(!$result1)
{
	die("Error with database");
}
if(!$result)
{
	die("Error with database");
}
//check user email
 if($row=mysqli_fetch_assoc($result1))
 {
	 header("location: indexUser.php"); 
 }
 
 else if($row=mysqli_fetch_assoc($result))
 {
	 header("location: index1.php"); 
 }
 else{
	 if($row=mysqli_fetch_assoc($result1))
 {
	 header("location: indexVisitor.php"); 
 }
 }
 
 
?>