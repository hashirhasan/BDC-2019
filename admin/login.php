<?php include "./connect.php" ?>
<?php session_start();?>
<?php  
if(isset($_SESSION['user_role']))
{
   header("Location:index.php");
    
}
    ?>



<?php
error_reporting(0);
if(isset($_POST['login_user']))
{
    
    $enter_username=$_POST['username'];
    $enter_password=$_POST['user_password'];
    $enter_username=mysqli_real_escape_string($connection,$enter_username);
    $enter_password=mysqli_real_escape_string($connection,$enter_password);
    
    $query="SELECT * FROM admin WHERE username='$enter_username'";
    $result=mysqli_query($connection,$query);
    if(mysqli_num_rows($result)==0)
    {
        $notlogin="<p id='checks'>no such entry in database</p>";
    }
    else
    {
    while($row=mysqli_fetch_assoc($result))
    {
        $username=$row['username'];
        $user_password=$row['user_password'];
        $user_role=$row['user_role'];
 
    }
 
  $enter_password=md5($enter_password);

  if($enter_username===$username and $enter_password===$user_password)
  { 
      $_SESSION['username']= $enter_username;
      $_SESSION['user_password']= $enter_password;
	  $_SESSION['user_role']= $user_role;
      header("Location:index.php");   
  }
else
   {
    $notlogin="<p  id='checks'>Invalid Match/Password or Username Incorrect</p>";
   
  }
 
}
}
    
    ?>


        <!DOCTYPE html>
        <html>
        <head>
        <title>login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
             
        </head>
        <body>
            
        <div class="container">
          
        <div class="signup">
              
        <h4 style="display: inline-block; color:black; border-radius: 5px;" >LOGIN</h4>
        
            <?php if(isset($notlogin)){echo $notlogin;}  ?>
        <form action="" method="post" enctype="multipart/form-data">
        <input class="form" type="text" id="text" name="username"  placeholder="Username"  onkeyup="enabled()" autocomplete="off">  
        <input class="form"   type="password" id="password" name="user_password" placeholder="Password" autocomplete="off"> 
           
        <button class="button" type="submit" id="start_button" name="login_user" disabled><span>LOG IN</span></button>

        </form>

        </div>
        </div>
        </body>
        </html>
    <script type="text/javascript">
  function enabled(){
    if(document.getElementById("text").value==="") { 
            //console.log(document.getElementById("mytext").value);
            document.getElementById('start_button').disabled = true; 
          } else { 
            document.getElementById('start_button').disabled = false;
          }
        }
        
        
        function checks(){
            if(document.getElementById('text').value!=""){
                   document.getElementById("checks").innerHTML="";
            document.getElementById("checks").style.visibility = "hidden";
            }
        }
      </script>































