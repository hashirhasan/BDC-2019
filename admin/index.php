 <?php include "include/adminheader.php"?>    <!--navbar of the admin page  -->
  
<?php
    $result_count_register=mysqli_query($connection,"SELECT count(*) as total from users");
    $data_register=mysqli_fetch_assoc($result_count_register);
    
    ?>
<div class="row">
<div class="col-4">
</div>
<div class="col-4">
<h1>Total Registrations:<span  style="color:red;"><?php echo $data_register['total']; ?></span></h1>
</div>
<div class="col-4">

</div>
</div>
</div>
</body>
</html>