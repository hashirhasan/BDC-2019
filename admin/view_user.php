 <?php include "include/adminheader.php"?>

 <div style="margin:auto; padding-bottom:80px;">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
  table,td,th{
            padding: 15px;
        }
        
/*
     
 #appadd {
    white-space: nowrap;
    overflow: hidden;
    width: 40px;
    height: 40px;
    text-overflow: ellipsis; 
}
*/

table.gridtable {
	
	font-family: tahoma;
	line-height:15px;
	font-size:0.78125vw;
	color:#333333;
	border-width: 1px;
	overflow-x: auto;
	border-color: #666666;
	border-collapse: collapse;
	margin:auto;
	
	/* width:"71.61458333333333vw"; */
}
table.gridtable th {
	
	border-style: solid;
	border-color: #666666;
	color:#FFFFFF;
	background-color: #5A94CE; /*#66CCFF*/
	font-size:0.78125vw;
/*	margin-left: auto;*/
}
table.gridtable td {
	
	border-style: solid;
	border-color: #666666;
	background-color: transparent;
	font-size:0.78125vw;
	
}


</style>



<table  style="table-layout:fixed;" class="gridtable" >
                    <thead>
                    <tr>
                        <th >Student No</th>
                        <th >Donar Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th >Blood Group</th>
                        <th >Gender</th>
                         <th>Hosteller</th>
                         <th>Email Id</th>
						<th>Contact No</th>
                        </tr>
                  </thead>
                    <tbody>
                     <?php 
                        
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
                        
                    ?>
                    </tbody>
                    </table>
	 <div style="padding-top:25px; margin-left:55vw;">
	 <form action="excel.php" method="post">
    <button type="submit"  name="submit"class="btn btn-primary">Export_Excel</button>
	 </form>
	 </div>
</div>	
           
             </div>
    </div>
    </div>
</body>
</html>
                