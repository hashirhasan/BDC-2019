 <?php include "include/adminheader.php"?>

   
            <div class="row">
                <div class="col-1"></div>
                <div class="col-8">
<style>
  td,th{
            padding: 15px;
        }
        
     
 #appadd {
    white-space: nowrap;
    overflow: hidden;
    width: 40px;
    height: 40px;
    text-overflow: ellipsis; 
}

table.gridtable {
	
	font-family: tahoma;
	line-height:15px;
	font-size:12px;
	color:#333333;
	border-width: 1px;
	
	border-color: #666666;
	border-collapse: collapse;
	
}
table.gridtable th {
	border-width: 1px;
	border-style: solid;
	border-color: #666666;
	color:#FFFFFF;
	background-color: #5A94CE; /*#66CCFF*/
	
}
table.gridtable td {
	border-width: 1px;
	border-style: solid;
	border-color: #666666;
	background-color: transparent;
	
}


</style>



<table style="margin-left:-100px;" width="1100px" style="table-layout:fixed;" class="gridtable" >
                    <thead>
                    <tr>
                        <th width="110px">Student No</th>
                        <th width="200px">Donar Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th >Blood Group</th>
                        <th >Gender</th>
                         <th>Hosteller</th>
                         <th width="200px">Email Id</th>
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
								echo"<td id='appadd' >{$gender}</td>";
								echo"<td id='appadd' >{$hostler}</td>";
								echo"<td id='appadd'>{$email}</td>";
								echo"<td id='appadd' >{$contact}</td>";
                         echo"</tr>";
                            
                        }
                        
                    ?>
                    </tbody>
                    </table>

					
					  </div>
                <div class="col-3"></div>
             </div>
    </div>
    </div>
</body>
</html>
                