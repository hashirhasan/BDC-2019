<?php
	require('../config.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$start = $_POST['start'];
		$end = $_POST['end'];
		$beds = $_POST['beds'];
		$slots = $_POST['slots'];
		$duration = $_POST['duration'];
		$id=1;
		$stmt = $pdo->prepare("UPDATE details SET start=:start, endd = :endd, beds=:beds,slots=:slots,duration=:duration,status=:status WHERE id='1'");
		$stmt->bindparam(':start',$start);
		$stmt->bindparam(':endd',$end);
		$stmt->bindparam(':beds',$beds);
		$stmt->bindparam(':slots',$slots);
		$stmt->bindparam(':duration',$duration);
		$stmt->bindparam(':status',$id);
		//$stmt->bindparam(':id',$id);
		$stmt->execute();
		
		$response['status'] = 1;
		
		
		echo json_encode($response);

	}
?>