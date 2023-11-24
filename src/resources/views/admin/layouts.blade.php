<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Weiß Immobiliengruppe</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ URL('/') }}">
                <!-- <img src="{{ asset('/images/logo.webp') }}" style="width:110px;height:80px" alt="weiss-immobiliengruppe"/> -->
                Weiß Immobiliengruppe
            </a>

            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
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
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link" href="{{ url('/dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="{{ url('/customers') }}">
                                <div class="sb-nav-link-icon"><img src="{{ asset('/images/icons8-customers-32.png') }}" style="width:16px;height:16px"></div>
                                Customers
                            </a>
                            <a class="nav-link" href="{{ url('/properties') }}">
                                <div class="sb-nav-link-icon"><img src="{{ asset('/images/icons8-property-32.png') }}" style="width:16px;height:16px"></div>
                                Properties
                            </a>
                            <a class="nav-link" href="{{ url('/loans') }}">
                                <div class="sb-nav-link-icon"><img src="{{ asset('/images/icons8-euro-money-32.png') }}" style="width:16px;height:16px"></div>
                                Loans
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                @yield('content')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Weiß Immobiliengruppe <?php echo date('Y'); ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"> -->

        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/custom-popup.js') }}"></script>
        

        <script>
            //https://validatejs.org/
            // FirstName, LastName, ContactNo, Street, Pincode, State, Email
            var constraints = {
                        FirstName: {
                            presence: true,
                            length: {
                                minimum: 3,
                                message: "must be at least 6 characters"
                            }
                        },
                        LastName: {
                            presence: true,
                            length: {
                                minimum: 3,
                                message: "must be at least 6 characters"
                            }
                        },
                        ContactNo: {
                            presence: true,
                            length: {
                                minimum: 3,
                                message: "must be at least 6 characters"
                            }
                        },
                        Email: {
                            email: true
                        },
                        Street: {
                            presence: true,
                            length: {
                                minimum: 3,
                                message: "must be at least 6 characters"
                            }
                        },
                        Pincode: {
                            presence: true,
                            length: {
                                minimum: 3,
                                message: "must be at least 6 characters"
                            }
                        },
                        State: {
                            presence: true,
                            length: {
                                minimum: 3,
                                message: "must be at least 6 characters"
                            }
                        }
                    };
            
            validate.formatters.custom = function(errors) {
                return errors.map(function(error) {
                    return error.validator;
                });
            };

            $(window).on('load', function(){
                @if(!empty($data['id']))
                    setTimeout(function() {
                        $('.edit-customer-modal[data-info-customerid="{{ $data['id'] }}"]').closest(".edit-customer-modal").click();
                        $('#editCustomer input').attr('disabled', 'disabled');
                        $('#editCustomer input[type="submit"]').hide();
                    }, 10);
                    
                @endif
            });
            $(document).ready(function () {
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                $(document).on('click', '#add_customer', function () {
                    $('#addCustomer').modal('show');
                });

                

                $(document).on('click', '.edit-customer-modal', function () {
                    $('#editCustomer input').removeAttr('disabled');
                    $('#editCustomer input[type="submit"]').show();
                    // console.log('edit-customer-modal', $(this).attr('data-info-CustomerId'));
                    $('#editCustomer').modal('show');

                    $('#editCustomerForm [name="CustomerId"]').val($(this).attr('data-info-CustomerId'));
                    $('#editCustomerForm [name="FirstName"]').val($(this).attr('data-info-FirstName'));
                    $('#editCustomerForm [name="LastName"]').val($(this).attr('data-info-LastName'));
                    $('#editCustomerForm [name="ContactNo"]').val($(this).attr('data-info-ContactNo'));
                    $('#editCustomerForm [name="Email"]').val($(this).attr('data-info-Email'));
                    $('#editCustomerForm [name="Street"]').val($(this).attr('data-info-Street'));
                    $('#editCustomerForm [name="Pincode"]').val($(this).attr('data-info-Pincode'));
                    $('#editCustomerForm [name="State"]').val($(this).attr('data-info-State'));
                });

                $(document).on('click', '.edit-property-modal', function () {
                    $('#editPropertyForm input').removeAttr('disabled');
                    $('#editPropertyForm input[type="submit"]').show();
                    // console.log('edit-customer-modal', $(this).attr('data-info-CustomerId'));
                    $('#editProperty').modal('show');

                    $('#editPropertyForm select[name="CustomerId"] option[value=' + $(this).attr('data-info-CustomerId') + ']').attr('selected', 'selected');
                    
                    $('#editPropertyForm [name="Street"]').val($(this).attr('data-info-Street'));
                    $('#editPropertyForm [name="Pincode"]').val($(this).attr('data-info-Pincode'));
                    $('#editPropertyForm [name="State"]').val($(this).attr('data-info-State'));
                    $('#editPropertyForm [name="PropertySize"]').val($(this).attr('data-info-PropertySize'));
                    $('#editPropertyForm [name="Cost"]').val($(this).attr('data-info-Cost'));
                    $('#editPropertyForm [name="PropertyId"]').val($(this).attr('data-info-PropertyId'));
                    
                });

                $(document).on('click', '.edit-loan-modal', function () {
                    $('#editLoanForm input').removeAttr('disabled');
                    $('#editLoanForm input[type="submit"]').show();
                    // console.log('edit-customer-modal', $(this).attr('data-info-CustomerId'));
                    $('#editLoan').modal('show');

                    $('#editLoanForm [name="LoanId"]').val($(this).attr('data-info-LoanId'));
                    $('#editLoanForm select[name="CustomerId"] option[value=' + $(this).attr('data-info-CustomerId') + ']').attr('selected', 'selected');
                    if($(this).attr('data-info-PropertyId') != ''){
                        $('#editLoanForm select[name="PropertyId"] option[value=' + $(this).attr('data-info-PropertyId') + ']').attr('selected', 'selected');
                    }
                    $('#editLoanForm [name="Bank"]').val($(this).attr('data-info-Bank'));
                    $('#editLoanForm [name="LoanAmount"]').val($(this).attr('data-info-LoanAmount'));
                    $('#editLoanForm [name="IntrestRate"]').val($(this).attr('data-info-IntrestRate'));
                    $('#editLoanForm [name="IntrestBanking"]').val($(this).attr('data-info-IntrestBanking'));
                    $('#editLoanForm [name="RepaymentAmount"]').val($(this).attr('data-info-RepaymentAmount'));
                    $('#editLoanForm [name="InstallmentAmount"]').val($(this).attr('data-info-InstallmentAmount'));
                    $('#editLoanForm [name="LoanStartDate"]').val($(this).attr('data-info-LoanStartDate'));
                    $('#editLoanForm [name="LoanEndDate"]').val($(this).attr('data-info-LoanEndDate'));
                    
                });

                
                $(document).on('click', '.delete-customer-modal', function (e) {
                    // var $form = $(this).closest('form');
                    e.preventDefault();
                    $('#confirmModal').modal('show');
                    $('#confirmModal #delete').attr('data-info-CustomerId', $(this).attr('data-info-CustomerId'));
                    $(document).on('click', '#confirmModal #delete', function(e) {
                        $('#confirmModal').modal('hide');
                        console.log('on delete');
                        let CustomerId = $('#confirmModal #delete').attr('data-info-CustomerId');
                        $.get("{{ route('deleteCustomer') }}" + '/' + CustomerId, function(data, status){
                            console.log(status)
                            location = "{{ route('customers') }}";
                        });
                    });
                    $("#confirmModal #cancel").on('click',function(e){
                        e.preventDefault();
                        $('#confirmModal').model('hide');
                    });
                });

                $(document).on('click', '.delete-property-modal', function (e) {
                    // var $form = $(this).closest('form');
                    e.preventDefault();
                    $('#confirmModal').modal('show');
                    $('#confirmModal #delete').attr('data-info-PropertyId', $(this).attr('data-info-PropertyId'));
                    $(document).on('click', '#confirmModal #delete', function(e) {
                        $('#confirmModal').modal('hide');
                        console.log('on delete');
                        let PropertyId = $('#confirmModal #delete').attr('data-info-PropertyId');
                        $.get("{{ route('deleteProperty') }}" + '/' + PropertyId, function(data, status){
                            console.log(status)
                            location = "{{ route('properties') }}";
                        });
                    });
                    $("#confirmModal #cancel").on('click',function(e){
                        e.preventDefault();
                        $('#confirmModal').model('hide');
                    });
                });

                $(document).on('click', '.delete-loan-modal', function (e) {
                    // var $form = $(this).closest('form');
                    e.preventDefault();
                    $('#confirmModal').modal('show');
                    $('#confirmModal #delete').attr('data-info-LoanId', $(this).attr('data-info-LoanId'));
                    $(document).on('click', '#confirmModal #delete', function(e) {
                        $('#confirmModal').modal('hide');
                        console.log('on delete loan');
                        let LoanId = $('#confirmModal #delete').attr('data-info-LoanId');
                        $.get("{{ route('deleteLoan') }}" + '/' + LoanId, function(data, status){
                            console.log(status)
                            location = "{{ route('loans') }}";
                        });
                    });
                    $("#confirmModal #cancel").on('click',function(e){
                        e.preventDefault();
                        $('#confirmModal').model('hide');
                    });
                });


                $(document).on('click', '#add_property', function () {
                    $('#addProperty').modal('show');
                });


            });

            $(document).on('submit', '#editCustomerForm', function (e) {
                    e.preventDefault();
                    editCustomerForm();
            });

            $(document).on('submit', '#editPropertyForm', function (e) {
                    e.preventDefault();
                    editPropertyForm();
            });

            $(document).on('submit', '#editLoanForm', function (e) {
                    e.preventDefault();
                    editLoanForm();
            });

            $(document).on('submit', '#PropertyForm', function (e) {
                e.preventDefault();
                savePropertyForm();
            });

            // ContactNo, FirstName, LastName, Street, Pincode, State, Email
            function saveCustomer() {
                let error = false;
                let data = {
                        'FirstName': $('#addMultiformData [name="FirstName"]').val(),
                        'LastName': $('#addMultiformData [name="LastName"]').val(),
                        'ContactNo': $('#addMultiformData [name="ContactNo"]').val(),
                        'Email': $('#addMultiformData [name="Email"]').val(),
                        'Street': $('#addMultiformData [name="Street"]').val(),
                        'Pincode': $('#addMultiformData [name="Pincode"]').val(),
                        'State': $('#addMultiformData [name="State"]').val(),
                        // '_token': "{{ csrf_token() }}"
                    };
//                     $('#addMultiformData').validate(data, constraints);
// //                 let errors = $('#addMultiformData').validate(data, constraints);
// // console.log(errors);
//                 return;

                $.ajax({
                    method: "POST",
                    url: "{{ route('saveCustomer') }}",
                    data: data,
                    dataType: 'JSON',
                    async: false,
                }).done(function (data) {
                    $('#addMultiformData [name="CustomerId"]').val(data.CustomerId);
                    error = false;
                }).fail(function(jqXHR, textStatus, errorThrown){
                    alert("Error in processing");
                    error = true;
                });

                return error;
            }

            function editCustomerForm() {
                $.ajax({
                    method: "POST",
                    url: "{{ route('editCustomer') }}",
                    data: {
                        'CustomerId': $('#editCustomerForm [name="CustomerId"]').val(),
                        'FirstName': $('#editCustomerForm [name="FirstName"]').val(),
                        'LastName': $('#editCustomerForm [name="LastName"]').val(),
                        'ContactNo': $('#editCustomerForm [name="ContactNo"]').val(),
                        'Email': $('#editCustomerForm [name="Email"]').val(),
                        'Street': $('#editCustomerForm [name="Street"]').val(),
                        'Pincode': $('#editCustomerForm [name="Pincode"]').val(),
                        'State': $('#editCustomerForm [name="State"]').val(),
                        // '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'JSON',
                    async: false,
                }).done(function (data) {
                    // $('#addMultiformData [name="CustomerId"]').val(data.CustomerId);
                    $('#editCustomerForm .alert').show();
                    setTimeout(function() {
                        location = "{{ route('customers') }}";
                    }, 15);
                }).fail(function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus);
                    alert("Error in processing");
                });
            }

            function editPropertyForm() {
                $.ajax({
                    method: "POST",
                    url: "{{ route('editProperty') }}",
                    data: {
                        //CustomerId Street Pincode State PropertySize Cost PropertyId
                        'CustomerId': $('#editPropertyForm [name="CustomerId"]').val(),
                        'Street': $('#editPropertyForm [name="Street"]').val(),
                        'Pincode': $('#editPropertyForm [name="Pincode"]').val(),
                        'State': $('#editPropertyForm [name="State"]').val(),

                        'PropertySize': $('#editPropertyForm [name="PropertySize"]').val(),
                        'Cost': $('#editPropertyForm [name="Cost"]').val(),
                        'PropertyId': $('#editPropertyForm [name="PropertyId"]').val(),
                        // 'Email': $('#editPropertyForm [name="Email"]').val(),
                        // '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'JSON',
                    async: false,
                }).done(function (data) {
                    // $('#addMultiformData [name="CustomerId"]').val(data.CustomerId);
                    $('#editPropertyForm .alert').show();
                    setTimeout(function() {
                        location = "{{ route('properties') }}";
                    }, 15);
                }).fail(function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus);
                    alert("Error in processing");
                });
            }

            function editLoanForm() {
                $.ajax({
                    method: "POST",
                    url: "{{ route('editLoan') }}",
                    data: {
 //CustomerId, PropertyId, Bank, LoanAmount, IntrestRate, IntrestBanking, RepaymentAmount, InstallmentAmount, LoanStartDate, LoanEndDate

                        'LoanId': $('#editLoanForm [name="LoanId"]').val(),
                        'CustomerId': $('#editLoanForm [name="CustomerId"]').val(),
                        'PropertyId': $('#editLoanForm [name="PropertyId"]').val(),
                        'Bank': $('#editLoanForm [name="Bank"]').val(),
                        'LoanAmount': $('#editLoanForm [name="LoanAmount"]').val(),

                        'IntrestRate': $('#editLoanForm [name="IntrestRate"]').val(),
                        'IntrestBanking': $('#editLoanForm [name="IntrestBanking"]').val(),
                        'RepaymentAmount': $('#editLoanForm [name="RepaymentAmount"]').val(),

                        'InstallmentAmount': $('#editLoanForm [name="InstallmentAmount"]').val(),
                        'LoanStartDate': $('#editLoanForm [name="LoanStartDate"]').val(),
                        'LoanEndDate': $('#editLoanForm [name="LoanEndDate"]').val(),
                        // 'Email': $('#editLoanForm [name="Email"]').val(),
                        // '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'JSON',
                    async: false,
                }).done(function (data) {
                    // $('#addMultiformData [name="CustomerId"]').val(data.CustomerId);
                    $('#editLoanForm .alert').show();
                    setTimeout(function() {
                        location = "{{ route('loans') }}";
                    }, 15);
                }).fail(function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus);
                    alert("Error in processing");
                });
            }

            function saveLoan(){
                let error = false;
                $.ajax({
                    method: "POST",
                    url: "{{ route('saveProperty') }}",
                    data: {
                        'Street': $('#addMultiformData [name="Street"]').val(),
                        'Pincode': $('#addMultiformData [name="Pincode"]').val(),
                        'State': $('#addMultiformData [name="State"]').val(),
                        'PropertySize': $('#addMultiformData [name="PropertySize"]').val(),
                        'Cost': $('#addMultiformData [name="Cost"]').val(),
                        'CustomerId': $('#addMultiformData [name="CustomerId"]').val(),
                        // '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'JSON',
                    async: false,
                }).done(function (data) {
                    // $('#addMultiformData [name="CustomerId"]').val(data.CustomerId);
                    $('#addMultiformData [name="PropertyId"]').val(data.PropertyId);
                    error = false;
                }).fail(function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus);
                    alert("Error in processing");
                    error = true;
                });

                return error;
            }

            function savePropertyForm(){

                $.ajax({
                    method: "POST",
                    url: "{{ route('saveProperty') }}",
                    data: {
                        'Street': $('#PropertyForm [name="Street"]').val(),
                        'Pincode': $('#PropertyForm [name="Pincode"]').val(),
                        'State': $('#PropertyForm [name="State"]').val(),
                        'PropertySize': $('#PropertyForm [name="PropertySize"]').val(),
                        'Cost': $('#PropertyForm [name="Cost"]').val(),
                        'CustomerId': $('#PropertyForm [name="CustomerId"]').val(),
                        // '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'JSON',
                    async: false,
                }).done(function (data) {
                    // $('#CustomerForm [name="CustomerId"]').val(data.CustomerId);
                }).fail(function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus);
                    alert("Error in processing");
                });
            }

            function saveLoan(){
    //   `LoanId`,  `CustomerId`, LEFT(`Bank`, 256),  `LoanAmount`,  `IntrestRate`,  `IntrestBanking`,  `RepaymentAmount`,  `InstallmentAmount`, LEFT(`LoanStartDate`, 256), LEFT(`LoanEndDate`, 256),
                let error = false;
                $.ajax({
                    method: "POST",
                    url: "{{ route('saveLoan') }}",
                    data: {
                        'PropertyId': $('#addMultiformData [name="PropertyId"]').val(),
                        'CustomerId': $('#addMultiformData [name="CustomerId"]').val(),
                        'Bank': $('#addMultiformData [name="Bank"]').val(),
                        'LoanAmount': $('#addMultiformData [name="LoanAmount"]').val(),
                        'IntrestRate': $('#addMultiformData [name="IntrestRate"]').val(),
                        'IntrestBanking': $('#addMultiformData [name="IntrestBanking"]').val(),

                        'RepaymentAmount': $('#addMultiformData [name="RepaymentAmount"]').val(),
                        'InstallmentAmount': $('#addMultiformData [name="InstallmentAmount"]').val(),
                        'LoanStartDate': $('#addMultiformData [name="LoanStartDate"]').val(),
                        'LoanEndDate': $('#addMultiformData [name="LoanEndDate"]').val(),
                        // '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'JSON',
                    async: false,
                }).done(function (data) {
                    $('#addMultiformData [name="CustomerId"]').val(data.CustomerId);
                    error = false;
                }).fail(function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus);
                    alert("Error in processing");
                    error = true;
                });
                return error;
            }

            $(document).on('change', 'form#LoanForm #CustomerId', function (e) {
                    // e.preventDefault();
                    // editCustomerForm();
            });

            $(document).on('click', '#add_loan', function () {
                    $('#addLoan').modal('show');
            });
            
        </script>
    </body>
</html>
