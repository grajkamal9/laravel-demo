<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel 10 Custom User Registration & Login Tutorial - AllPHPTricks.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-image:url({{ asset('/images/image1.jpg') }})">

    <nav class="navbar navbar-expand-lg" style="background-color: grey;">
        <div class="container">
          <a class="navbar-brand" href="{{ URL('/') }}"><img src="{{ asset('/images/logo.webp') }}" style="width:110px;height:80px" alt="weiss-immobiliengruppe"/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li> -->
                @else    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                        </ul>
                    </li>
                @endguest
            </ul>
          </div>
        </div>
    </nav>    

    <div class="container">
        @yield('content')
    </div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
  </script>

	<script>
	
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').removeClass('edit');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        var stuff = $(this).data('info').split(',');
        $('.did').text(stuff[0]);
        $('.dname').html(stuff[1] +" "+stuff[2]);
        $('#myModal').modal('show');
    });

function fillmodalData(details){
    $('#fid').val(details[0]);
    $('#fname').val(details[1]);
    $('#lname').val(details[2]);
    $('#email').val(details[3]);
    $('#gender').val(details[4]);
    $('#country').val(details[5]);
    $('#salary').val(details[6]);
}

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'fname': $('#fname').val(),
                'lname': $('#lname').val(),
                'email': $('#email').val(),
                'gender': $('#gender').val(),
                'country': $('#country').val(),
                'salary': $('#salary').val()
            },
            success: function(data) {
            	if (data.errors){
                	$('#myModal').modal('show');
                    if(data.errors.fname) {
                    	$('.fname_error').removeClass('hidden');
                        $('.fname_error').text("First name can't be empty !");
                    }
                    if(data.errors.lname) {
                    	$('.lname_error').removeClass('hidden');
                        $('.lname_error').text("Last name can't be empty !");
                    }
                    if(data.errors.email) {
                    	$('.email_error').removeClass('hidden');
                        $('.email_error').text("Email must be a valid one !");
                    }
                    if(data.errors.country) {
                    	$('.country_error').removeClass('hidden');
                        $('.country_error').text("Country must be a valid one !");
                    }
                    if(data.errors.salary) {
                    	$('.salary_error').removeClass('hidden');
                        $('.salary_error').text("Salary must be a valid format ! (ex: #.##)");
                    }
                }
            	 else {
            		 
                     $('.error').addClass('hidden');
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" +
                        data.id + "</td><td>" + data.first_name +
                        "</td><td>" + data.last_name + "</td><td>" + data.email + "</td><td>" +
                         data.gender + "</td><td>" + data.country + "</td><td>" + data.salary +
                          "</td><td><button class='edit-modal btn btn-info' data-info='" + data.id+","+data.first_name+","+data.last_name+","+data.email+","+data.gender+","+data.country+","+data.salary+"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + data.id+","+data.first_name+","+data.last_name+","+data.email+","+data.gender+","+data.country+","+data.salary+"' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

            	 }}
        });
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });

    $(document).ready(function(){
        $(document).on('click', '#add_customer', function() {
            $('#addCustomer').modal('show');
        });
    });
    
</script>
<script>
// customer form
$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;

    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    if(current == 1){
        saveCustomer();
    }
    setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
    .css("width",percent+"%")
}
// ContactNo, FirstName, LastName, Street, Pincode, State, Email
function saveCustomer(){
    console.log($('#CustomerForm [name="FirstName"]').val());
    $('#CustomerForm [name="LastName"]').val();
    $('#CustomerForm [name="ContactNo"]').val();
    $('#CustomerForm [name="Email"]').val();
    $('#CustomerForm [name="Street"]').val();
    $('#CustomerForm [name="Pincode"]').val();
    $('#CustomerForm [name="State"]').val();
    
    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    $.ajax({
        method: "POST",
        url: "{{ route('saveCustomer') }}",
        data: { 
            'FirstName': $('#CustomerForm [name="FirstName"]').val(),
            'LastName': $('#CustomerForm [name="LastName"]').val(),
            'ContactNo': $('#CustomerForm [name="ContactNo"]').val(),
            'Email': $('#CustomerForm [name="Email"]').val(),
            'Street': $('#CustomerForm [name="Street"]').val(),
            'Pincode': $('#CustomerForm [name="Pincode"]').val(),
            'State': $('#CustomerForm [name="State"]').val(),
            // '_token': "{{ csrf_token() }}"
        },
        dataType: 'JSON',
    }).done(function( msg ) {
        alert( "Data Saved: " + msg );
    });
    

}
$(".submit").click(function(){
return false;
})

});
</script>
<style>
.addCustomer #heading {
    text-transform: uppercase;
    color: #0d6efd;
    font-weight: normal
}

.addCustomer #CustomerForm {
    text-align: center;
    position: relative;
    margin-top: 20px
}

.addCustomer #CustomerForm fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.addCustomer .form-card {
    text-align: left
}

.addCustomer #CustomerForm fieldset:not(:first-of-type) {
    display: none
}

.addCustomer #CustomerForm input,
.addCustomer #CustomerForm textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

.addCustomer #CustomerForm input:focus,
.addCustomer #CustomerForm textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #0d6efd;
    outline-width: 0
}

.addCustomer #CustomerForm .action-button {
    width: 100px;
    background: #0d6efd;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

.addCustomer #CustomerForm .action-button:hover,
.addCustomer #CustomerForm .action-button:focus {
    background-color: #311B92
}

.addCustomer #CustomerForm .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

.addCustomer #CustomerForm .action-button-previous:hover,
.addCustomer #CustomerForm .action-button-previous:focus {
    background-color: #000000
}

.addCustomer .card {
    z-index: 0;
    border: none;
    position: relative
}

.addCustomer .fs-title {
    font-size: 25px;
    color: #0d6efd;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.addCustomer .purple-text {
    color: #0d6efd;
    font-weight: normal
}

.addCustomer .steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.addCustomer .fieldlabels {
    color: gray;
    text-align: left
}

.addCustomer #progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

.addCustomer #progressbar .active {
    color: #0d6efd
}

.addCustomer #progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

.addCustomer #progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
}

.addCustomer #progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

.addCustomer #progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

.addCustomer #progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

.addCustomer #progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

.addCustomer #progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

.addCustomer #progressbar li.active:before,
.addCustomer #progressbar li.active:after {
    background: #0d6efd
}

.addCustomer .progress {
    height: 20px
}

.addCustomer .progress-bar {
    background-color: #0d6efd
}

.addCustomer .fit-image {
    width: 100%;
    object-fit: cover
}

.modal {
    // --bs-modal-zindex: 1055;
     --bs-modal-width: 80% !important;
}
</style>
</body>
</html>