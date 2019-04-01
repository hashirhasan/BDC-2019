<?php
	require('../config.php');
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$filter = $_POST['filter'];
		$g = $_POST['g'];
		if($filter == 'all')
		{
			$stmt = $pdo->prepare("SELECT * FROM users WHERE 1");
		}
		else if($filter == 'h')
		{
			$stmt = $pdo->prepare("SELECT * FROM users WHERE hostler='Hosteller'");
			
		}
		else if($filter == 'ds')
		{
			$stmt = $pdo->prepare("SELECT * FROM users WHERE hostler='Day_Scholar'");
			
		}
		else if($filter == 'bg')
		{
			$stmt = $pdo->prepare("SELECT * FROM users WHERE blood_group=:g");
			$stmt->bindparam(':g',$g);

		}
		$stmt->execute();
		$n = $stmt->rowCount();

		$data[0]=0;
		// if($n==0)
		// {
		// 	$data['status']=0;
		// }
		$i=1;
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{	
			$data[0]=1;
			$data[$i] = $row;
			$i++;
		}
		echo json_encode($data);
	}
?>