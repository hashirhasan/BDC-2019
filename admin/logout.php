<?php
	session_start();
	if(isset($_SESSION['admin'])&&($_SESSION['admin'] == true))
	{
		session_destroy();
	}
	header('location:index.php');
?>