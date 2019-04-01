$(document).ready(function(){
	$('#loader').hide();
	//swal('hello world');
	/*this is for student number*/
	function validate_student_no()
	{
		//check if its empty
		var student_no = $('#student_no').val();
		var regex = /^([1][4-7]\d{5}[Dd]{0,1})$/; //add regex here
		if(student_no == '')
		{
			$('#err_student_no').text('Student number cannot be empty');
			$('#err_student_no').show();
			console.log('working');
			return false;
		}
		//check whether its valid student number or not
		else if( (regex.test(student_no)) != true)
		{
			$('#err_student_no').text('Invalid student number');
			$('#err_student_no').show();
			console.log('syudent_no');
			return false;
		}
		else
		{
			return true;
		}

	}

	/*this is for validating name*/
	function validate_name(){

		//check if its empty
		var name = $('#name').val();
		console.log('working');
		if(name == '')
		{
			$('#err_name').text('Name cannot be empty');
			$('#err_name').show();
			return false;
		}
		//check if its valid name or not
		else if(( /^[A-z ]+$/.test(name)) != true)
		{
			$('#err_name').text("Invalid name");
			$('#err_name').show();
			console.log('name');
			return false;
		}
		else
		{
			return true;
		}
	}

	/*this is for validating email*/
	function validate_email()
	{
		var email = $('#email').val();
		var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])/;
		//check if its empty
		if(email == '')
		{
			$('#err_email').text("Email cannot be empty");
			$('#err_email').show();
			return false;
		}
		//check if its valid email or not
		else if((reg.test(email)) != true)
		{
			$('#err_email').text("Invalid email");
			$('#err_email').show();
			return false;
		}
		else
		{
			return true;
		}
	}

	function validate_contact_no()
	{
		var contact = $('#contact_number').val();
		var regex = /^([6-9]{1}[0-9]{9})$/;//add regex here
		//check if its empty
		if(contact == '')
		{
			$('#err_contact_no').text('Contact cannot be empty');
			$('#err_contact_no').show();
			return false;
		}
		//check if its valid or not
		else if((regex.test(contact)) != true)
		{
			$('#err_contact_no').text('Invalid contact number');
			$('#err_contact_no').show();
			return false;
		}
		else
			return true;
	}

	

    //Dynamic error display 
    $('#name').focus(function(){
    	$('#err_name').hide();
    });
    $('#name').blur(function(){
    	validate_name();
    });


    $('#email').focus(function(){
    	$('#err_email').hide();
    });
    $('#email').blur(function(){
    	validate_email();
    });


    $('#student_no').focus(function(){
    	$('#err_student_no').hide();
    });
    $('#student_no').blur(function(){
    	validate_student_no();
    });


    $('#contact_number').focus(function(){
    	$('#err_contact_no').hide();
    });
    $('#contact_number').blur(function(){
    	validate_contact_no();
    })


	$('#register').on('click',function(){
		var test1 = validate_student_no();
		var test2 = validate_name();
		var test3 = validate_email();
		var test4 = validate_contact_no();
		if(test1 && test2 && test3 && test4)
		{
			
			var name = $('#name').val();
			var email = $('#email').val();
			var student_no = $('#student_no').val();
			var branch = $('#branch').val();
			var year = $('#number').val();
			var course = $('#course').val();
			var contact = $('#contact_number').val();
			var bg = $('#blood-group').val(); 
			var gender = $('input[name=inlineRadioOptions]:checked').val();
			var hostler = $('input[name=inlineRadioOption]:checked').val();
			
			var datastring = 'name='+name+'&email='+email+'&student_no='+student_no+'&branch='+branch+'&year='+year+'&course='+course+'&contact='+contact+'&gender='+gender+'&hostler='+hostler+'&bloodgroup='+bg;
			debugger
			$('#loader').show();
			$.ajax({
				type : "POST",
				url : "registration.php",
				data : datastring,
				datatype : "json",
				cache : false,
				success : function(result){
					
					var result = $.parseJSON(result);
					console.log(result);
					debugger
					if(result.status == 0)
					{
						$('#loader').hide();
						//swal('Registered Successfully',{icon:'success'});
						swal({
							title:'Registered successfully',
							text:email,
							icon:'success'
						    }).then(
						    function(){
						    	location.reload();
						    });

					}
					else if(result.status == 1)
					{
						if(result.name !=0)
						{
							$("#err_name").text(result.name);
							$("#err_name").show();
						}
						if(result.email!=0)
						{
							$("#err_email").text(result.email);
							$("#err_email").show();
						}
						if(result.contact!=0)
						{
							$("#err_contact_no").text(result.contact);
							$("#err_contact_no").show();
						}
						if(result.student_no!=0)
						{
							$("#err_student_no").text(result.student_no);
							$("#err_student_no").show();
						}
						$('#loader').hide();
						
					}
					
				}
			});
			
			return false;
		}
		else
		{
			return false;
		}
	})

});