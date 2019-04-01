<?php
	require('../config.php');
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$slot_timing = json_decode($_POST['mydata']);
		$n = sizeOf($slot_timing);
		for($i = 0;$i<$n;$i++)
		{
			$stmt = $pdo->prepare("UPDATE slot SET slot_time = :slot_time WHERE id = :id");
			$stmt->bindparam(':slot_time',$slot_timing[$i]);
			$stmt->bindparam(':id',$i);
			$stmt->execute();
		}
		echo 'true';
	}

?>