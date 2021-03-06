function recaptchaCallback(){$('#register').removeAttr('disabled')};$(document).ready(function(){$.ajax({url:"check_email.php",success:function(result){var result=$.parseJSON(result);console.log("number of registrations ->",result.count['COUNT(student_no)'])}});var bool_email=!0;var bool_student_no=!0;var bool_contact=!0;
function validate_student_no(){var student_no=$('#student_no').val();var regex=/^([1][5-8]\d{5}[Dd]{0,1})$/;if(student_no==''){$('#err_student_no').text('Student number cannot be empty');$('#err_student_no').fadeIn("2500").show();return!1}
else if((regex.test(student_no))!=!0){$('#err_student_no').text('Invalid student number');$('#err_student_no').fadeIn("2500").show();return!1}
else{return!0}}
function validate_name(){var name=$('#name').val();if(name==''){$('#err_name').text('Name cannot be empty');$('#err_name').fadeIn("2500").show();return!1}
else if((/^[a-zA-Z]+[\s]{0,1}[a-zA-Z]+[\s]{0,1}[A-z]+/.test(name))!=!0){$('#err_name').text("Invalid name");$('#err_name').fadeIn("2500").show();return!1}
else{return!0}}
function validate_email(){var email=$('#email').val();var reg=/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])/;if(email==''){$('#err_email').text("Email cannot be empty");$('#err_email').fadeIn("2500").show();return!1}
else if((reg.test(email))!=!0){$('#err_email').text("Invalid email");$('#err_email').fadeIn("2500").show();return!1}
else{return!0}}
function validate_contact_number(){var contact=$('#contact_number').val();var regex=/^([6-9]{1}[0-9]{9})$/;if(contact==''){$('#err_contact_number').text('Contact cannot be empty');$('#err_contact_number').fadeIn("2500").show();return!1}
else if((regex.test(contact))!=!0){$('#err_contact_number').text('Invalid contact number');$('#err_contact_number').fadeIn("2500").show();return!1}
else return!0}
$('#name').focus(function(){$('#err_name').hide()});$('#name').blur(function(){validate_name()});$('#email').focus(function(){$('#err_email').hide()});$('#email').blur(function(){if(validate_email()){ajax_email()}});$('#student_no').focus(function(){$('#err_student_no').hide()});$('#student_no').blur(function(){if(validate_student_no()){ajax_student_no()}});$('#contact_number').focus(function(){$('#err_contact_number').hide()});$('#contact_number').blur(function(){if(validate_contact_number()){ajax_contact()}});$('#number').focus(function(){var course=$('#course').val();if(course=='MBA'||course=='M.Tech'){$('#3').hide();$('#4').hide()}
else if(course=='MCA'){$('#3').show();$('#4').hide()}
else if(course=='B.Tech'){$('#3').show();$('#4').show();$('#1').show();$('#2').show()}})
function ajax_contact(){var contact=$('#contact_number').val();datastring='contact='+contact+'&field=contact';$.ajax({type:"POST",url:"check_email.php",data:datastring,datatype:"json",cache:!1,success:function(result){var result=$.parseJSON(result);if(result.status==0){$("#err_contact_number").text('Contact already exists');$("#err_contact_number").fadeIn("2500").show();bool_contact=!1}
else if(result.status==1){bool_contact=!0}}})}
function ajax_student_no(){var student_no=$('#student_no').val();datastring='student_no='+student_no+'&field=student_no';$.ajax({type:"POST",url:"check_email.php",data:datastring,datatype:"json",cache:!1,success:function(result){var result=$.parseJSON(result);if(result.status==0){$("#err_student_no").text('Student number already exists');$("#err_student_no").fadeIn("2500").show();bool_student_no=!1}
else if(result.status==1){bool_student_no=!0}}})}
function ajax_email(){var email=$('#email').val();datastring='email='+email+'&field=email';$.ajax({type:"POST",url:"check_email.php",data:datastring,datatype:"json",cache:!1,success:function(result){var result=$.parseJSON(result);if(result.status==0){$("#err_email").text('Email already exists');$("#err_email").fadeIn("2500").show();return!1}
else if(result.status==1){return!0}}})}
$('#register').on('click',function(){$("#loader").removeClass("preloader");$("#loader").addClass("afterloader");var test1=validate_student_no();var test2=validate_name();var test3=validate_email();var test4=validate_contact_number();if(test1&&test2&&test3&&test4&&bool_contact&&bool_email&&bool_student_no){var name=$('#name').val();var email=$('#email').val();var student_no=$('#student_no').val();var year=$('#number').val();var course=$('#course').val();var contact=$('#contact_number').val();var bg=$('#blood-group').val();var gender=$('input[name=inlineRadioOptions]:checked').val();var hostler=$('input[name=inlineRadioOption]:checked').val();var response=grecaptcha.getResponse();var datastring='name='+name+'&email='+email+'&student_no='+student_no+'&year='+year+'&course='+course+'&contact='+contact+'&gender='+gender+'&hostler='+hostler+'&bloodgroup='+bg+'&g-recaptcha-response='+response;$('#loader').show();$.ajax({type:"POST",url:"registration.php",data:datastring,datatype:"json",cache:!1,success:function(result){
var result=$.parseJSON(result);if(result.status==0){swal({title:'Registered successfully',text:email,icon:'success'}).then(function(){location.reload()})}
else if(result.status==1){if(result.name!=''){$("#err_name").text(result.name);$("#err_name").fadeIn("2500").show()}
if(result.email!=''){$("#err_email").text(result.email);$("#err_email").fadeIn("2500").show()}
if(result.contact!=''){$("#err_contact_number").text(result.contact);$("#err_contact_number").fadeIn("2500").show()}
if(result.student_no!=''){$("#err_student_no").text(result.student_no);$("#err_student_no").fadeIn("2500").show()}
$('#loader').hide()}}});return!1}
else{return!1}})})