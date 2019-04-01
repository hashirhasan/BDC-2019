<?php
	require('../config.php');
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$stmt = $pdo->prepare("SELECT * FROM details WHERE id='1'");
		$stmt->execute();
		$response = $stmt->fetch(PDO::FETCH_ASSOC);
		echo json_encode($response);
	}

?>