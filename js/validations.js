$(document).ready(function () {

    var bool_email = true;
    var bool_student_no = true;
    var bool_contact = true;

    /*this is for student number*/
    function validate_student_no() {
        //check if its empty
        var student_no = $('#student_no').val();
        var regex = /^([1][4-7]\d{5}[Dd]{0,1})$/; //add regex here
        if (student_no == '') {
            $('#err_student_no').text('Student number cannot be empty');
            $('#err_student_no').fadeIn("2500").show();
            //console.log('working');
            return false;
        }
        //check whether its valid student number or not
        else if ((regex.test(student_no)) != true) {
            $('#err_student_no').text('Invalid student number');
            $('#err_student_no').fadeIn("2500").show();
            //console.log('syudent_no');
            return false;
        }
        else {
            return true;
        }

    }

    /*this is for validating name*/
    function validate_name() {

        //check if its empty
        var name = $('#name').val();
        console.log('working');
        if (name == '') {
            $('#err_name').text('Name cannot be empty');
            $('#err_name').fadeIn("2500").show();
            return false;
        }
        //check if its valid name or not
        else if ((/^[a-zA-Z]+[\s]{0,1}[a-zA-Z]+[\s]{0,1}[A-z]+/.test(name)) != true) {
            $('#err_name').text("Invalid name");
            $('#err_name').fadeIn("2500").show();

            return false;
        }
        else {
            return true;
        }
    }

    /*this is for validating email*/
    function validate_email() {
        var email = $('#email').val();
        var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])/;
        //check if its empty
        if (email == '') {
            $('#err_email').text("Email cannot be empty");
            $('#err_email').fadeIn("2500").show();
            return false;
        }
        //check if its valid email or not
        else if ((reg.test(email)) != true) {
            $('#err_email').text("Invalid email");
            $('#err_email').fadeIn("2500").show();
            return false;
        }
        else {
            return true;
        }
    }

    function validate_contact_no() {
        var contact = $('#contact_number').val();
        var regex = /^([6-9]{1}[0-9]{9})$/;//add regex here
        //check if its empty
        if (contact == '') {
            $('#err_contact_no').text('Contact cannot be empty');
            $('#err_contact_no').fadeIn("2500").show();
            return false;
        }
        //check if its valid or not
        else if ((regex.test(contact)) != true) {
            $('#err_contact_no').text('Invalid contact number');
            $('#err_contact_no').fadeIn("2500").show();
            return false;
        }
        else
            return true;
    }



    //Dynamic error display 
    $('#name').focus(function () {
        $('#err_name').hide();
    });
    $('#name').blur(function () {
        validate_name();
    });


    $('#email').focus(function () {
        $('#err_email').hide();
    });
    $('#email').blur(function () {
        if (validate_email()) {
            ajax_email();

        }
    });


    $('#student_no').focus(function () {
        $('#err_student_no').hide();
    });
    $('#student_no').blur(function () {

        if (validate_student_no()) {
            ajax_student_no();

        }
    });


    $('#contact_number').focus(function () {
        $('#err_contact_no').hide();
    });
    $('#contact_number').blur(function () {
        if (validate_contact_no()) {
            ajax_contact();

        }
    });

    $('#number').focus(function () {
        var course = $('#course').val();
        if (course == 'MBA' || course == 'M.Tech') {
            $('#3').hide();
            $('#4').hide();
        }
        else if (course == 'MCA') {
            $('#3').show();
            $('#4').hide();
        }
        else if (course == 'B.Tech') {
            $('#3').show();
            $('#4').show();
            $('#1').show();
            $('#2').show();
        }
    })

    function ajax_contact() {
        var contact = $('#contact_number').val();
        datastring = 'contact=' + contact + '&field=contact';
        $.ajax({
            type: "POST",
            url: "check_email.php",
            data: datastring,
            datatype: "json",
            cache: false,
            success: function (result) {
                var result = $.parseJSON(result);
                if (result.status == 0) {
                    $("#err_contact_no").text('Contact already exists');
                    $("#err_contact_no").fadeIn("2500").show();
                    bool_contact = false;
                }
                else if (result.status == 1) {

                    bool_contact = true;

                }
            }
        });
    }

    function ajax_student_no() {
        var student_no = $('#student_no').val();
        datastring = 'student_no=' + student_no + '&field=student_no';
        $.ajax({
            type: "POST",
            url: "check_email.php",
            data: datastring,
            datatype: "json",
            cache: false,
            success: function (result) {
                console.log(result);
                var result = $.parseJSON(result);
                debugger
                if (result.status == 0) {
                    $("#err_student_no").text('Student number already exists');
                    $("#err_student_no").fadeIn("2500").show();
                    bool_student_no = false;
                }
                else if (result.status == 1) {
                    bool_student_no = true;
                }
            }
        });
    }

    function ajax_email() {
        var email = $('#email').val();
        datastring = 'email=' + email + '&field=email';
        $.ajax({
            type: "POST",
            url: "check_email.php",
            data: datastring,
            datatype: "json",
            cache: false,
            success: function (result) {
                var result = $.parseJSON(result);
                if (result.status == 0) {
                    $("#err_email").text('Email already exists');
                    $("#err_email").fadeIn("2500").show();
                    return false;
                }
                else if (result.status == 1) {
                    return true;
                }
            }
        });
    }

    $('#register').on('click', function () {
        var test1 = validate_student_no();
        var test2 = validate_name();
        var test3 = validate_email();
        var test4 = validate_contact_no();


        if (test1 && test2 && test3 && test4 && bool_contact && bool_email && bool_student_no) {

            var name = $('#name').val();
            var email = $('#email').val();
            var student_no = $('#student_no').val();
//            var branch = $('#branch').val();
            var year = $('#number').val();
            var course = $('#course').val();
            var contact = $('#contact_number').val();
            var bg = $('#blood-group').val();
            var gender = $('input[name=inlineRadioOptions]:checked').val();
            var hostler = $('input[name=inlineRadioOption]:checked').val();

            var datastring = 'name=' + name + '&email=' + email + '&student_no=' + student_no + '&year=' + year + '&course=' + course + '&contact=' + contact + '&gender=' + gender + '&hostler=' + hostler + '&bloodgroup=' + bg;
            debugger
            console.log(datastring);
            $('.loader').show();

            $.ajax({
                type: "POST",
                url: "registration.php",
                data: datastring,
                datatype: "json",
                cache: false,
                success: function (result) {

                    var result = $.parseJSON(result);
                    console.log(result);

                    if (result.status == 0) {
                        $('.loader').hide();

                        swal({
                            title: 'Registered successfully',
                            text: email,
                            icon: 'success'
                        }).then(
                            function () {
                                location.reload();
                            });

                    }
                    else if (result.status == 1) {
                        if (result.name != '') {
                            $("#err_name").text(result.name);
                            $("#err_name").fadeIn("2500").show();
                        }
                        if (result.email != '') {
                            $("#err_email").text(result.email);
                            $("#err_email").fadeIn("2500").show();
                        }
                        if (result.contact != '') {
                            $("#err_contact_no").text(result.contact);
                            $("#err_contact_no").fadeIn("2500").show();
                        }
                        if (result.student_no != '') {
                            $("#err_student_no").text(result.student_no);
                            $("#err_student_no").fadeIn("2500").show();
                        }
                        $('.loader').hide();

                    }

                }
            });

            return false;
        }
        else {
            return false;
        }
    })

});