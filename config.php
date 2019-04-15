<?php
	require('credentials.php');
	$host = host;
	$dbname = dbname;
	try
	{
	     $pdo = new PDO("mysql:host={$host};dbname={$dbname}",username,password);
	     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
	     echo $e->getMessage();
	}
?>