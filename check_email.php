<?php
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		require('config.php');
		$response['status'] = 1;
		if($_POST['field'] == 'email')
		{
			$email = $_POST['email'];
			$stmt = $pdo->prepare("SELECT email FROM `users` WHERE email = :email");
			$stmt->bindparam(":email" , $email);
			$stmt->execute();
			$emailcount=$stmt->fetch(PDO::FETCH_ASSOC);
			if($emailcount > 0)
			{
				$response['status'] = 0;
			}
			else
			{
				$response['status'] = 1;
			}
			// echo json_encode($response);
		}
		else if($_POST['field'] == 'student_no')
		{
			$student_no = $_POST['student_no'];
			$stmt = $pdo->prepare("SELECT student_no FROM users  WHERE student_no = :student_no");
			$stmt->bindparam(":student_no" , $student_no);
			$stmt->execute();
			$count=$stmt->fetch(PDO::FETCH_ASSOC);
			if($count > 0)
			{
				$response['status'] = 0;
			}
			else
			{
				$response['status'] = 1;
			}
			// echo json_encode($response);
		}
		else if($_POST['field'] == 'contact')
		{
			$contact = $_POST['contact'];
			$stmt = $pdo->prepare("SELECT contact FROM `users` WHERE contact = :contact");
			$stmt->bindparam(":contact" , $contact);
			$stmt->execute();
			$count=$stmt->fetch(PDO::FETCH_ASSOC);
			if($count > 0)
			{
				$response['status'] = 0;
			}
			else
			{
				$response['status'] = 1;
			}
			// echo json_encode($response);
		}
		echo json_encode($response);
	}
	
?>