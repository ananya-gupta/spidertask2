<!DOCTYPE html>
<html lang="en">
<head>
<style>
.error {color: #FF0000;}
</style>
  <title>Registration</title>
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
$nameErr = $rollnoErr = $emailErr = $passwordErr = "";
$name;
$rollno;
$email;
$pwd;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["rollno"])) {
   $rollnoErr = "rollNo. is required";
  } else {
    $rollno = test_input($_POST["rollno"]);
      
  }

  if (empty($_POST["pwd"])) {
    $passwordErr = "Password is required";

  } else {
    $pwd = test_inputpwd($_POST["pwd"]);
  }

  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function test_inputpwd($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data =  MD5($data);
  return $data;
}


?>
<body>


<div class="container">
  <CENTER><h2>REGISTER / <a href="login.php" >LOG IN</a></h2></CENTER>
  <p><span class="error">* required field.</span></p>
  <form class="form-horizontal" action="registration.php" method="post">
   <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        <span class="error">* <?php echo $nameErr;?></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="rollno">Roll No./Prof. ID NO.:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="rollno" placeholder="Enter Roll No./Prof. ID No." name="rollno">
        <span class="error">* <?php echo $rollnoErr;?></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
        <span class="error">* <?php echo $passwordErr;?></span>
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Register</button>
      </div>
    </div>
  </form>
</div>
<?php
if(isset($name)&&isset($rollno)&&isset($email)&&isset($pwd)){
$sql="INSERT INTO `projectdb`.`registration` (`name`, `rollno`, `email`, `password`) VALUES ('$name', '$rollno', '$email', '$pwd')";
$result=mysql_query($sql);

if($result){
	 echo "<div class='alert alert-success'>
  <strong>Success!</strong> Registered Successfully.
</div>" ;      
  
}

else {
echo mysql_error();
}}
// close connection 
mysql_close();
?>
</body>


</html>
