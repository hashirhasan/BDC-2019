 





<?php include"connect.php" ?>
<?php

$output="";
if(isset($_POST['submit']))
{
	          
		header("Content-type: application/xls");
       header("Content-Disposition: attachment; filename=blooddonation.xls");
	header("Pragma: no-cache");
header("Expires: 0");

$output="<table >
                    <thead>
                    <tr>
                        <th>Student No</th>
                        <th>Donar Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th >Blood Group</th>
                        <th >Gender</th>
                         <th>Hosteller</th>
                         <th>Email Id</th>
						<th>Contact No</th>
                        </tr>
                  </thead>
                    <tbody>";
                    
                       echo $output; 
                        $query="SELECT * FROM users";
                        $result=mysqli_query($connection,$query);
                       if(!$result){
                           die("query failed".mysqli_error($connection));
                       }
                        while($row=mysqli_fetch_assoc($result))
                        {   
							 $name = $row['name'];
							$student_no = $row['student_no'];
							$email = $row['email'];
							$contact = $row['contact'];
							$year = $row['year'];
							$course = $row['course'];
							$gender = $row['gender'];
							$hostler = $row['hostler'];
							$bloodgroup = $row['blood_group'];
                         echo"<tr>";
								echo"<td >{$student_no}</td>";
								echo"<td id='appadd'>{$name}</td>";
								echo"<td id='appadd'>{$course}</td>";
								echo"<td id='appadd'>{$year}</td>";
								echo"<td id='appadd'>{$bloodgroup}</td>";
								echo"<td id='appadd'>{$gender}</td>";
								echo"<td id='appadd' >{$hostler}</td>";
								echo"<td id='appadd'>{$email}</td>";
								echo"<td id='appadd' >{$contact}</td>";
                         echo"</tr>";
                            
                        }
                        
                   
                   echo" </tbody>";
                   echo "</table>";
}
?>