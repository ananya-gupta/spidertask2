<!DOCTYPE html>
<html lang="en">
<head>
<style>
.error {color: #FF0000;}
</style>
  <title>New post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
include("config.php");
mysql_select_db($dbname)or die("cannot select DB");
// define variables and set to empty values
$subjectErr = $titleErr = $contentErr = "";
$subject;
$title;
$content;
$links;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["subject"])) {
    $subjectErr = "Subject is required";
  } else {
    $subject = test_input($_POST["subject"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$subject)) {
      $subjectErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["title"])) {
    $titleErr = "Title is required";
  } else {
    $title = test_input($_POST["title"]);
       // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
      $titleErr = "Only letters and white space allowed"; 
    }

  }
    
  if (empty($_POST["content"])) {
   $contentErr = "Content is required";
  } else {
    $content = test_input($_POST["content"]);
      
  }

 
 $links = test_input($_POST["url"]);
  
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  ?>
<body>
<?php
session_start();
if(!isset($_SESSION['sess_username'])){
	header('Location:  login.php');};
 $username=$_SESSION['sess_username'];
 $accesslevel=$_SESSION['sess_accesslevel'];
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php echo $username;?></a>
    </div>
    <ul class="nav navbar-nav"  style ="float : right" >
      <li ><a <?php if($accesslevel=="prof"){echo "href=profdashboard.php";} else {echo "href=crdashboard.php";}?> >Home</a></li>
      <li class="active"><a href="#">New post</a></li>
      <li ><a href="logout.php">Logout</a></li>
    </ul> 
  </div>
</nav>

<div class="container">
  <center><h2>CREATE NEW POST</h2></center>
  <p><span class="error">* required field.</span></p>
  <form class="form-horizontal" action="new post.php" method="post">
  <div class="form-group">
      <label class="control-label col-sm-2" for="subject">Subject:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="subject" placeholder="Enter subject" name="subject">
        <span class="error">* <?php echo $subjectErr;?></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        <span class="error">* <?php echo $titleErr;?></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="content">Content:</label>
      <div class="col-sm-10">          
        <textarea type="text" class="form-control" id="content" placeholder="content" name="content"></textarea>				  		<span class="error">* <?php echo $contentErr;?></span>
        
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="url">Link:</label>
      <div class="col-sm-10">          
        <input type="url" class="form-control" id="url" placeholder="Enter link" name="url">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Create Post</button>
      </div>
    </div>
  </form>
</div>

</body>
<?php

if(isset($subject)&&isset($title)&&isset($content)){
 $sql="INSERT INTO `projectdb`.`posts` ( `subject`, `title`,`prof_name`, `content`,`links`) VALUES ('$subject','$title','$username','$content','$links')";$result=mysql_query($sql);
if($result){
	
	 echo "<div class='alert alert-success'>
  <strong>Success!</strong> New Post Created Successfully.
</div>" ;      
	
}

else {
echo mysql_error();
}}
// close connection 
mysql_close();
?>
</html>