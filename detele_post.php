<?php 
include("config.php");
mysql_select_db($dbname)or die("cannot select DB");
     
    $post_id= $_GET['id'];
	
   $sql="DELETE FROM posts WHERE post_id = $post_id";
     $result=mysql_query($sql);
	 if($result)
	 {
		 echo("<script> alert('done')</script>");
	header("location: profdashboard.php");
}

else {
echo mysql_error();
}
mysql_close();
?>
