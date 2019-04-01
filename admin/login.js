$(document).ready(function(){

	function validate_username()
	{
		var username = $('#username').val();
		if(username == '')
		{
			$('#err_username').text('Username cannot be empty');
			$('#err_username').show();
			return false;
		}
		else
		{
			return true;
		}
	}

	function validate_password()
	{
		var password = $('#password').val();
		if(password == '')
		{
			$('#err_password').text('Password cannot be empty');
			$('#err_password').show();
			return false;
		}
		else
		{
			return true;
		}
	}

	$('#username').focus(function(){
		$('#err_username').hide();
	});

	$('#password').focus(function(){
		$('#err_password').hide();
	});

	$('#login').on('click',function(){

		var test1 = validate_username();
		var test2 = validate_password(); 
		var username = $('#username').val();
		var password = $('#password').val();

		var datastring = 'username='+username+'&password='+password;
		if(test1 && test2)
		{
			$('#loader').css('display','none');
			$.ajax({
				type:'POST',
				url:'check_admin.php',
				data:datastring,
				cache:false,
				datatype:'json',
				success:function(result){
					var response = $.parseJSON(result);
					
					if(response.status == 1)
					{
						$('#loader').css('display','block');
						window.location.href = 'registrations.php';
					}
					else if(response.status == 0)
					{
						$('#err_username').text('Username or password is wrong');
						$('#err_username').show();
					}
				}
			});
		}
		return false;
	});
});