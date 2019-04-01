<?php
	
	require('../config.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$response;
		$username = $_POST['username'];
		$password = $_POST['password'];
		$stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :username");
		$stmt->bindparam(':username',$username);
		$stmt->execute();
		$num = $stmt->rowCount();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(($num > 0)&&($row['password'] == $password))
		{
			$_SESSION['admin'] = true;
			$response['status'] = 1;
		}
		else if($num == 0)
		{
			$response['status'] = 0;
			$response['num']= $num;
		}
		echo json_encode($response);
	}
?>