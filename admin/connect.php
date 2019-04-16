<?php
   require('../credentials.php');
    $host = host;
	$dbname = dbname;
$connection=mysqli_connect($host,username,password,$dbname);                   //making connection to the database medicare1
    if(!$connection){
        die("connection failed");
    }
    
   

?>