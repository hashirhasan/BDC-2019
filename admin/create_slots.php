<!DOCTYPE html>
<html>
<head>
	<title>Create Slots</title>
	<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/admin.js"></script>
    <style type="text/css">
    	.suggestion{
    		color:	#808080;
    		font-size: 12px;
    	}
    	.error{
    		color:red;
    		font-size:14px;
    	}
    </style>
</head>
<body>
	<ul>
	  <li><a  href="registrations.php">Registrations</a></li>
	  <li><a class="active" href="create_slots.php">Create-Slots</a></li>
	  <li><a href="alloted_slots.php">Generate Slots in Excel</a></li>
	  <li style="float:right"><a href='logout.php'>Logout</a></li>
	</ul>
	<form>
    <div class="form-row container">
	    <div class="form-group col-md-6">
          <label for="start" >Start Time:</label> 
          <input id="start" type="time"  class="form-control"  autocomplete="off">
          <span id="err_start" class="error"></span>
	    </div>
	    <div class="form-group col-md-6">
          <label for="end" >End Time:</label> 
          <input id="end" type="time"  class="form-control"  autocomplete="off">
          <span id="err_end" class="error"></span>
        </div>
	</div>
	<div class="form-row container">
        <div class="form-group col-md-6">
          <label for="beds" >Number of Beds:</label> 
          <input id="no_beds" type="number" placeholder="Enter Number of beds" class="form-control"  autocomplete="off">
          <span id="err_no_beds" class="error"></span>
        </div>
        <div class="form-group col-md-6">
          <label for="no_slots" >Number of Slots:</label> 
          <input id="no_slots" type="number" placeholder="Enter Number of slots" class="form-control"  autocomplete="off">
          <span id="err_no_slots" class="error"></span>
        </div>
    </div>
    <div class="form-row container">
        <div class="form-group col-md-12">
          <label for="slot_duration" >Duration of each Slot:</label> 
          <input id="slot_duration" type="number" placeholder="Enter duration of each slot in minutes" class="form-control"  autocomplete="off">
          <span class='suggestion'>eg: If slot duration is 1 hour then enter 60</span>
          <span id="err_slot_duration" class="error"></span>
        </div>
    </div>
    <div class="form-row container">
    	<!-- <div class="form-group col-md-6">
    		<button type="button" class="btn btn-primary" style="float: left;width:100px" id='edit'>EDIT</button>
        </div> -->
    	<div class="form-group col-md-12">
    		<button type="submit" class="btn btn-primary" style="float: right;width:100px" id='next'>NEXT</button>
    	 </div>
        
    </div>
</form>
	<div class="form-row container">
		<div class="form-group col-md-6">
    		<button type="button" class="btn btn-primary" style="float: left;width:100px;display: none;" id='edit'>EDIT</button>
        </div>
	</div>

	<div class="form-row container" id='slots'>
		<div class="panel panel-primary">
	      <div class="panel-heading" style="background-color: black">Available Slots:</div>
	      <div class="panel-body">
	      	
	      </div>
    	</div>
	</div>

</body>
</html>