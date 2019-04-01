<?php

  session_start();
require("check_admin.php");
  if(isset($_SESSION['admin'])&&($_SESSION['admin'] == true))
  {
    header('Location:registrations.php');
  }
  
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src='../js/login.js'></script>
</head>

<body>
  <h4 id = 'loader' style="text-align: center; display: none;">Loading...</h4>
  <div class="wrapper">
    <form class="form-signin"  method="post">       
      <h2 class="form-signin-heading">Admin login</h2>
      <input type="text" class="form-control" name="username" placeholder="Username" id='username' autofocus="" >
      <span style="color:red; font-size: 10px;" id='err_username'></span>
      <input type="password" class="form-control" name="password" placeholder="Password" id='password'>
      <span style="color:red;font-size: 10px;" id='err_password'></span>
      <button class="btn btn-lg btn-primary btn-block" type="submit" id='login'>Login</button>   
    </form>
  </div>
</body>

</html>
