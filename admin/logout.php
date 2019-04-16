<?php session_start(); ?>
<?php session_destroy(); ?>                 <!--for ending the session  -->
<?php

header("Location:./login.php");       //updating the location
?>