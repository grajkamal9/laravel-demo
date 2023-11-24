
$(document).ready(function () {
    new DataTable('#customers, #properties, #loans', {
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    let column = this;
                    let title = column.footer().textContent;
     
                    // Create input element
                    let input = document.createElement('input');
                    input.placeholder = title;
                    column.footer().replaceChildren(input);
     
                    // Event listener for user input
                    input.addEventListener('keyup', () => {
                        if (column.search() !== this.value) {
                            column.search(input.value).draw();
                        }
                    });
                });
        }
    });
    // new DataTable('#properties', {
    //     initComplete: function () {
    //         this.api()
    //             .columns()
    //             .every(function () {
    //                 let column = this;
    //                 let title = column.footer().textContent;
     
    //                 // Create input element
    //                 let input = document.createElement('input');
    //                 input.placeholder = title;
    //                 column.footer().replaceChildren(input);
     
    //                 // Event listener for user input
    //                 input.addEventListener('keyup', () => {
    //                     if (column.search() !== this.value) {
    //                         column.search(input.value).draw();
    //                     }
    //                 });
    //             });
    //     }
    // });
});

$('.modal-footer').on('click', '.edit', function () {
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
        success: function (data) {
            if (data.errors) {
                $('#myModal').modal('show');
                if (data.errors.fname) {
                    $('.fname_error').removeClass('hidden');
                    $('.fname_error').text("First name can't be empty !");
                }
                if (data.errors.lname) {
                    $('.lname_error').removeClass('hidden');
                    $('.lname_error').text("Last name can't be empty !");
                }
                if (data.errors.email) {
                    $('.email_error').removeClass('hidden');
                    $('.email_error').text("Email must be a valid one !");
                }
                if (data.errors.country) {
                    $('.country_error').removeClass('hidden');
                    $('.country_error').text("Country must be a valid one !");
                }
                if (data.errors.salary) {
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
                    "</td><td><button class='edit-modal btn btn-info' data-info='" + data.id + "," + data.first_name + "," + data.last_name + "," + data.email + "," + data.gender + "," + data.country + "," + data.salary + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + data.id + "," + data.first_name + "," + data.last_name + "," + data.email + "," + data.gender + "," + data.country + "," + data.salary + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

            }
        }
    });
});
$('.modal-footer').on('click', '.delete', function () {
    $.ajax({
        type: 'post',
        url: '/deleteItem',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('.did').text()
        },
        success: function (data) {
            $('.item' + $('.did').text()).remove();
        }
    });
});



// customer form
$(document).ready(function () {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next").on('click', function () {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        if (current == 1) {
            let error = saveCustomer();
            if(error){
                return;
            }
        } else if (current == 2) {
            let error = saveProperty();
            if(error){
                return;
            }
        } else if (current == 3) {
            let error = saveLoan();
            if(error){
                return;
            }
        }

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        
        setProgressBar(++current);
    });

    $(".previous").click(function () {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }
        $(".submit").click(function () {
        return false;
    })

});
