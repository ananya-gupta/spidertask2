<?php
session_start();
$accesslevel=$_SESSION['sess_accesslevel'];
if(!isset($_SESSION['sess_username'])){
	header('Location:  login.php');};
include("config.php");
$id=$_POST["userid"];
$access=$_POST["accesslevel"];
echo $id;
echo $access;
/*if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $accesslevel = $_POST["accesslevel"];
  echo $accesslevel;
  
}*/
if(isset($access) && $accesslevel=='prof'){
$sql1="UPDATE `projectdb`.`registration` SET accesslevel='".$access."' WHERE id=".$id;
$result=mysql_query($sql1);

if($result){
	      
  header("location: users.php");
}

else {
echo mysql_error();
}}
// close connection 
mysql_close();


?>
