<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!--Icon Fonts-->
    <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>         
  </head>
<?php
session_start();

if(!isset($_SESSION['sess_username'])){
	header('Location:  login.php');};
 $username=$_SESSION['sess_username'];
 
?>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php echo $username?> </a>
    </div>
    <ul class="nav navbar-nav"  style ="float : right" >
      <li class="active"><a href="#">Home</a></li>
      <li><a href="newpost.php">New post</a></li>
      <li><a href="users.php">Users</a></li>
      <li ><a href="logout.php">Logout</a></li>
    </ul> 
  </div>
</nav>
  


<!-- Pricing Table Section -->
<section id="pricing-table">
    <div class="container">
        <div class="row">
            <div class="pricing">
                <!-- Pricing Table Section --><?php
				
	include("config.php");
mysql_select_db($dbname)or die("cannot select DB");
  $username=$_SESSION['sess_username'];
    $sql = "SELECT post_id,subject,title,prof_name,post_date,content,links FROM projectdb.posts";
$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
?>
               <div class='col-md-4 col-sm-12 col-xs-12'>
                    <div class='pricing-table'>
                        <div class='pricing-header'>
                        
                        <a href='detele_post.php?id=<?php echo $row["post_id"] ?>'  class='btn btn-danger'>Delete</a>
                       
						
                        
                            <p class='pricing-title'><?php echo$row["subject"]?></p>
                            <p class='pricing-title1'><?php echo$row["title"]?></p>
                            <p class='pricing-title2'>Posted by- <?php echo$row["prof_name"]?></p>
                            <p class='pricing-title3'><?php echo$row["post_date"]?></p>
                            
                        </div>

                        <center><div class='pricing-list'>
                           <?php echo$row["content"]?>
                           <p class='pricing-title3'><a href ="<?php echo$row["links"]?>"><?php echo$row["links"]?></a></p>
                        </div></center>
                    </div>
                </div>
                <?php
				}
} else {
    echo "No Posts";
}
mysql_close($conn);
?> 
            </div>
        </div>
    </div>
</section>;
</body>
</html>