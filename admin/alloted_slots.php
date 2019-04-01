<?php
	ob_start();
	header("Content-Type: application/vnd.ms-excel");
	require('../config.php');
	$stmt = $pdo->prepare("SELECT * FROM details WHERE 1");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$beds= $row['beds'];
	$users;$i=0;
	$stmt = $pdo->prepare("SELECT * FROM users WHERE 1");
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		$users[$i] = $row;
		$i++;		
    }
	
	// $slots = $row['slots'];

	// $stmt = $pdo->prepare("SELECT * FROM users WHERE gender='female' AND hostler='Day_Scholar'");
	// $stmt->execute();
	// while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	// {
	// 	$users[$i] = $row;
	// 	$i++;		
 //    }
 //    $stmt = $pdo->prepare("SELECT * FROM users WHERE gender='male' AND hostler='Day_Scholar' AND year = '4'");
 //    $stmt->execute();
 //    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	// {
	// 	$users[$i] = $row;
	// 	$i++;		
 //    }
 //    $stmt = $pdo->prepare("SELECT * FROM users WHERE gender='female' AND hostler='Hosteller'");
	// $stmt->execute();
	// while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	// {
	// 	$users[$i] = $row;
	// 	$i++;		
 //    }

 //    $stmt = $pdo->prepare("SELECT * FROM users WHERE gender='male' AND hostler='Day_Scholar' AND year!= '4'");
 //    $stmt->execute();
	// while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	// {
	// 	$users[$i] = $row;
	// 	$i++;		
 //    }
 //    $stmt = $pdo->prepare("SELECT * FROM users WHERE gender='male' AND hostler='Hosteller'");
	// $stmt->execute();
	// while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	// {
	// 	$users[$i] = $row;
	// 	$i++;		
 //    }
    //echo $i;
    //$reserve =10;
  //   $start = 0;$end = $beds-7;$slot=0;$bool=false;
  //   while($slots > 0)
  //   {
  //   	$stmt1 = $pdo->prepare("SELECT slot_time FROM slot WHERE id=:id");
		// $stmt1->bindparam(':id',$slot);
		// $stmt1->execute();
		// $row = $stmt1->fetch(PDO::FETCH_ASSOC);
  //   	for($j=$start;$j<=$end;$j++)
  //   	{
  //   		if($j < $i)
  //   		{	
    			
		// 		$id = $users[$j]['id'];
	 //    		$stmt = $pdo->prepare("UPDATE users SET slot=:slot WHERE id = :id");
	 //    		$stmt->bindparam(':slot',$row['slot_time']);
	 //    		$stmt->bindparam(':id',$id);
	 //    		$stmt->execute();
  //   		}
    		
  //   	}
  //   	//echo $end;
  //   	$start = $end;
  //   	$end = $end+$beds;
  //   	$slot = $slot+1;$slots--;
  //   }
    
  header("Content-disposition: attachment; filename=slots.xls");

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<style type="text/css">
		*{
			margin:0;
			padding:0;
		}
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- <ul>
	  <li><a href="registrations.php">Registrations</a></li>
	  <li><a href="create_slots.php">Create-Slots</a></li>
	  <li><a class="active" href="alloted_slots.php">Alloted Slots</a></li>
	  <li style="float:right"><a href='logout.php'>Logout</a></li>
	</ul> -->
	<table>
		<tr>
			<td>SNo.</td>
			<th>Student No.</th>
			<th>NAME</th>
			<th>Gender</th>
			<th>Year</th>
			<th>Blood Group</th>
			<th>Email</th>
			<th>Mobile NO.</th>
			<th>Address</th>
			<th>Hosteller/Day Scholar</th>
			<th>SLOT</th>
		</tr>
		<?php
			for($k = 0 ;$k < $i ; $k++)
			{
				echo "<tr>
					<td>".($k+1)."</td>
					<td>".$users[$k]['student_no']."</td>
					<td>".$users[$k]['name']."</td>
					<td>".$users[$k]['gender']."</td>
					<td>".$users[$k]['year']."</td>
					<td>".$users[$k]['blood_group']."</td>
					<td>".$users[$k]['email']."</td>
					<td>".$users[$k]['contact']."</td>
					<td>".$users[$k]['permanent_address']."</td>
					<td>".$users[$k]['hostler']."</td>

					
				</tr>";
			}
		?>
	</table>


</body>
</html>