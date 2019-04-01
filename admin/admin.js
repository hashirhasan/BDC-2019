$(document).ready(function(){
  /*===========================================*/
  //--------------- Show registrations----------------//
  	run_on_refresh();
  	
	$('#bg').hide();
	$('#message').hide();
	show_registrations('all','');
	$('#btn-bg').on('click',function(){
		$('#bg').show();
		show_registrations('bg','AP');
		$(".btn").removeClass("active");
		$('#btn-bg').addClass('active');
		
	});
	$('#AP').on('click',function(){
		$(".btnbg").removeClass("active");
		$(this).addClass('active');
		show_registrations('bg','AP');
	});
	$('#AN').on('click',function(){
		$(".btnbg").removeClass("active");
		$(this).addClass('active');
		show_registrations('bg','AN');
	});
	$('#ABP').on('click',function(){
		$(".btnbg").removeClass("active");
		$(this).addClass('active');
		show_registrations('bg','ABP');
	});
	$('#ABN').on('click',function(){
		$(".btnbg").removeClass("active");
		$(this).addClass('active');
		show_registrations('bg','ABN');
	});
	$('#BP').on('click',function(){
		$(".btnbg").removeClass("active");
		$(this).addClass('active');
		show_registrations('bg','BP');
	});
	$('#BN').on('click',function(){
		$(".btnbg").removeClass("active");
		$(this).addClass('active');
		show_registrations('bg','BN');
	});
	$('#OP').on('click',function(){
		$(".btnbg").removeClass("active");
		$(this).addClass('active');
		show_registrations('bg','OP');
	});
	$('#ON').on('click',function(){
		$(".btnbg").removeClass("active");
		$(this).addClass('active');
		show_registrations('bg','ON');
	});

	$('#btn-ds').on('click',function(){
		$('#bg').hide();
		show_registrations('ds','');
		$(".btn").removeClass("active");
		$('#btn-ds').addClass('active');
		
	});
	$('#btn-h').on('click',function(){
		$('#bg').hide();
		show_registrations('h','');
		$(".btn").removeClass("active");
		$('#btn-h').addClass('active');
		
	});
	$('#btn-all').on('click',function(){
		$('#bg').hide();
		show_registrations('all','');
		$(".btn").removeClass("active");
		$('#btn-all').addClass('active');
		
	});


	function show_registrations(filter,g)
	{
		
		var datastring='filter='+filter+'&g='+g;
		//(filter);
		//(g);
		$('.items').remove();
		$('#loader').css('display','block');
		$.ajax({
			type:'POST',
			url :'show_registrations.php',
			data:datastring,
			datatype:'json',
			cache:false,
			success:function(result){
				var response = $.parseJSON(result);
				var count = Object.keys(response).length;
				//(response);
				if(response[0] == 1)
				{
					$('#message').hide();
					$('#registrations').text('TOTAL REGISTRATIONS : '+(count-1));
					$('#loader').css('display','none');
					for(var i=1;i<=count;i++)
					{				
						$('#'+(i)).after('<tr id='+(i+1)+' class="items"></tr>');
						$('<td>'+i+'</td>').appendTo('#'+(i+1));
						$('<td></td>').text(response[i].name).appendTo('#'+(i+1));
						$('<td></td>').text(response[i].student_no).appendTo('#'+(i+1));
						$('<td></td>').text(response[i].year).appendTo('#'+(i+1));
						$('<td></td>').text(response[i].course).appendTo('#'+(i+1));
						$('<td></td>').text(response[i].branch).appendTo('#'+(i+1));
						$('<td></td>').text(response[i].blood_group).appendTo('#'+(i+1));
						$('<td></td>').text(response[i].email).appendTo('#'+(i+1));
						$('<td></td>').text(response[i].contact).appendTo('#'+(i+1));
						$('<td></td>').text(response[i].hostler).appendTo('#'+(i+1));
					}
				}
				else
				{
					$('#message').show();
				}
				
			}

		});
	}

	/*===========================================*/
	//--------------- Create Slots----------------//
	function validate_start_time()
	{
		var start = $('#start').val();
		if(start == '')
		{
			$('#err_start').text('Choose a proper start time');
			$('#err_start').show();
			return false;
		}
		else
		{
			return true;
		}
	}

	function validate_end_time()
	{
		var end = $('#end').val();
		var start = $('#start').val();
		console.log(start>end)
		if(end == '')
		{
			$('#err_end').text('Choose a proper start time');
			$('#err_end').show();
			return false;
		}
		else if(start > end)
		{
			$('#err_end').text('Start time should be before end time');
			$('#err_end').show();
			return false;
		}
		else
		{
			return true;
		}


	}

	function validate_no_beds()
	{
		var no_beds = $('#no_beds').val();
		if(no_beds == '')
		{
			$('#err_no_beds').text('Number of beds cannot be empty');
			$('#err_no_beds').show();
			return false;
		}
		else
		{
			return true;
		}
	}

	function validate_no_slots()
	{
		var no_slots = $('#no_slots').val();
		if(no_slots == '')
		{
			$('#err_no_slots').text('Number of slots cannot be empty');
			$('#err_no_slots').show();
			return false;
		}
		else
		{
			return true;
		}
	}

	function validate_slot_duration()
	{
		var slot_duration = $('#slot_duration').val();
		if(slot_duration == '')
		{
			$('#err_slot_duration').text('Slot duration cannot be empty');
			$('#err_slot_duration').show();
			$('.suggestion').hide();
			return false;
		}
		else
		{
			return true;
		}
	}

	$('#start').blur(function(){
		validate_start_time();
	});
	$('#start').focus(function(){
		$('#err_start').hide();
	});

	$('#end').blur(function(){
		validate_end_time();
	});
	$('#end').focus(function(){
		$('#err_end').hide();
	});

	$('#no_beds').blur(function(){
		validate_no_beds();
	});
	$('#no_beds').focus(function(){
		$('#err_no_beds').hide();
	});

	$('#no_slots').blur(function(){
		validate_no_slots();
	});
	$('#no_slots').focus(function(){
		$('#err_no_slots').hide();
	});

	$('#slot_duration').blur(function(){
		validate_slot_duration();
	});
	$('#slot_duration').focus(function(){
		$('#err_slot_duration').hide();
		$('.suggestion').show();
	});

	$('#next').on('click',function(){
		
		test4=validate_start_time();
		test1=validate_no_beds();
		test2=validate_no_slots();
		test3=validate_end_time();
		test5 = validate_slot_duration();

		if(test1 && test2 && test3 && test4 && test5)
		{
			var start = $('#start').val();
			var end = $('#end').val();
			var no_beds = $('#no_beds').val();
			var no_slots = $('#no_slots').val();
			var slot_duration = $('#slot_duration').val();
			var datastring = 'start='+start+'&end='+end+'&beds='+no_beds+'&slots='+no_slots+'&duration='+slot_duration;
			$('#loader').css('display','block');

			$.ajax({
				type:'POST',
				url:'details.php',
				data:datastring,
				datatype:'json',
				cache:false,
				success:function(result){
					var response = $.parseJSON(result);
					console.log(response);
					if(response.status == 1)
					{

						$('#loader').css('display','none');

						show_edit();
						
					}
					else
					{
						console.log(response);
					}

				}
			});
			return false;

		}
		else
		{
			return false;
		}

	});

	

	function show_edit()
	{
		$('#edit').css('display','block');
		$('#next').css('display','none');
		
		$('.form-control').attr('disabled','true');
		var slots = $('#no_slots').val();
		$('#slots').show();
		$('.btn-success').remove();
		slot_time = $('#start').val();
		console.log($('#start').val());
		var time = $('#start').val();
		var slot_timing=[];

		for(var i=1;i<=slots;i++)
		{
			var start =	time;
		    var slot_duration = $('#slot_duration').val();
		    var time = start.split(':');
		    var hr = Number(time[0])+Math.floor(slot_duration/60);
		    var min = Number(time[1])+(slot_duration % 60);
		    if(min == 0)
		    {
		    	min = min + "0";
		    }
		    time = hr+":"+min;
		    slot_timing[i-1] = start+"-"+time;
		    
			$('.panel-body').append("<button class='btn btn-success' style='margin-right:10px;background-color:grey'>"+start+"-"+time+"</button>");
		}
		//console.log(JSON.stringify(slot_timing));
		var datastring = JSON.stringify(slot_timing);
		$('#loader').css('display','block');
		$.ajax({
			type:'POST',
			url:'slot.php',
			data:{mydata:datastring},
			datatype:'json',
			cache:false,
			success:function(result){
				//var result = $.parseJSON(result);
				$('#loader').css('display','none');
				console.log(result);
			}

		});
		
		
	}

	function show_next()
	{
		$('#next').css('display','block');
		$('#edit').css('display','none');
		$('.form-control').prop('disabled',false);
		$('#slots').hide();

		

	}
	$('#edit').on('click',function(){
		show_next();
	});
	//slot_time_distribution();
	

	function run_on_refresh()
	{
		$('#loader').css('display','block');
		$.ajax({
		type:'POST',
		url:'check.php',
		datatype:'json',
		cache:false,
		success:function(result){
			var response = $.parseJSON(result);
			
			if(response.status==1)
			{
				$('#loader').css('display','none');
				$('#start').val(response.start);
				$('#end').val(response.endd);
				$('#no_slots').val(response.slots);
				$('#no_beds').val(response.beds);
				$('#slot_duration').val(response.duration);
				show_edit();
			}
			else
			{
				show_next();
			}

			}
		});
	}
	
	
});