<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>users</title>

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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Notice Board</a>
    </div>
    <ul class="nav navbar-nav"  style ="float : right" >
      <li ><a href="profdashboard.php">Home</a></li>
      <li><a href="newpost.php">New post</a></li>
      <li class="active"><a href="#">Users</a></li>
      <li ><a href="logout.php">Logout</a></li>
    </ul> 
  </div>
</nav>
  


<div class="container">
  <center><h2>USERS</h2></center>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Roll.No</th>
        <th>Email</th>
         <th>Access Level</th>
      </tr>
    </thead>
   
    <?php
	include("config.php");
mysql_select_db($dbname)or die("cannot select DB");
    $sql = "SELECT id,name,rollno,email,accesslevel FROM projectdb.registration";
$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
		?>
		<tbody>
      <tr>
        <td> <?php echo $row["name"]?></td>
        <td> <?php echo $row["rollno"]?></td>
       <td>  <?php echo $row["email"]?></td>
        <td><?php echo $row["accesslevel"]?>
        <a href='changeaccess.php?id=<?php echo $row["id"] ?>'>change</a></td>
        
      </tr>
      
     
    </tbody>
    <?php   
    }
} else {
    echo "0 results";
}

mysql_close($conn);
?>
  </table>
</div>
</body>
</html>