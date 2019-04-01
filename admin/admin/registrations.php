<?php
	
	session_start();
	if(isset($_SESSION['admin'])&&($_SESSION['admin'] == true))
	{
		//do nothing can be changed
	}
	else
	{
		header("Location:index.php");
	}
	require('../config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<style>
		*{
			margin:0;
			padding:0;
		}
		.btn,.btnbg {
		  border: none;
		  outline: none;
		  padding: 12px 16px;
		  background-color: #f1f1f1;
          cursor: pointer;
		}

		.btn:hover ,.btnbg:hover{
		  background-color: #ddd;
		}

		.btn.active,.btnbg.active {
		  background-color: #666;
		  color: white;
		}
		#myBtnContainer{
			text-align: center;
			margin-bottom: 10px;
		}
		#bg{
			margin:10px;

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
		#message{
			text-align: center;
			margin-left: 665px;
			font-size: 20px;
		}
    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/admin.js"></script>

</head>
<body>
	<h4 id = 'loader' style="text-align: center; display: none;">Loading...</h4>
	<ul>
	  <li><a class="active" href="#registrations">Registrations</a></li>
	  <li><a href="create_slots.php">Create-Slots</a></li>
	  <li><a href="alloted_slots.php">Generate Slots in Excel</a></li>
	  <li style="float:right"><a href='logout.php'>Logout</a></li>
	  
	</ul>
	<h2 id ='registrations'>REGISTRATIONS:</h2>
	<div id="myBtnContainer">
	  <button class="btn active" id='btn-all'> Show all</button>
	  <button class="btn" id="btn-h">Hostellers</button>
	  <button class="btn" id="btn-ds">Day Scholars</button>
	  <button class="btn" id="btn-bg">Blood Group</button>
	  <div id = 'bg'>
	  	<button id='AP' class="btnbg active" >A+</button>
		<button id='AN' class="btnbg" >A-</button>
		<button id='ABP' class="btnbg" >AB+</button>
		<button id='ABN' class="btnbg" >AB-</button>
		<button id='BP' class="btnbg" >B+</button>
	  	<button id='BN' class="btnbg" >B-</button>
	  	<button id='OP' class="btnbg">O+</button>
	  	<button id='ON' class="btnbg">O-</button>
	  </div>
	</div>
	<span id='message'>NO RECORDS</span>
	<table>
		<tr id="1">
			<th>S.NO.</th>
			<th>Name</th>
			<th>Student No</th>
			<th>Year</th>
			<th>Course</th>
			<th>Branch</th>
			<th>Blood Group</th>
			<th>Email</th>
			<th>Mobile No.</th>
			<th>Hosteller/Day Scholar</th>
		</tr>
	</table>	
</body>
</html>