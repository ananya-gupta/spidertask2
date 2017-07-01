<!DOCTYPE html>
<html lang="en">
<head>
<style>
.error {color: #FF0000;}
</style>
  <title>change access</title>
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

<body>
<?php
include("config.php");
mysql_select_db($dbname)or die("cannot select DB");
$id=$_GET['id'];
  $sql ="SELECT * FROM projectdb.registration WHERE id= $id";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
?>
<div class="container">
  <center><h2>USERS</h2></center>
  
  <table class="table table-hover">
    <thead>
      <tr>
       <th>ID</th>
        <th>Name</th>
        <th>Roll.No</th>
        <th>Email</th>
         <th>Access Level</th>
      </tr>
    </thead>
   <tbody>
     <form method= "post" action="changeaccessc.php">
 <tr>
      <td> <input type="text" name="userid" id="userid" value="<?php echo $row["id"]?>" /></td>
        <td> <?php echo $row["name"]?></td>
        <td> <?php echo $row["rollno"]?></td>
       <td>  <?php echo $row["email"]?></td>
        <td>
           <select name="accesslevel">
    <option value="prof">Prof.</option>
    <option value="cr">CR</option>
    <option value="student">Student</option>
    
  </select>
  <button type="submit" >Change</button>
  </form></td>
        
      </tr>
      
     
    </tbody>


</body>
</html>
