@extends('admin.layouts')

@section('content')

	<div class="container ">
		<h1 class="mt-4">Customers</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
			<li class="breadcrumb-item active">Customers</li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<button type="button" id="add_customer" class="btn btn-primary">Add Customer</button>
			</div>
		</div>
		{{ csrf_field() }}
		<!-- <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Customers</h1>                
			</div>
        </div> -->
		<div class="table-responsive text-center">
			<table class="table table-striped table-bordered" id="customers">
				<thead>
					<tr>
						<th class="text-center">CustomerId</th>
						<th class="text-center">ContactNo</th>
						<th class="text-center">FirstName</th>
						<th class="text-center">LastName</th>
						<th class="text-center">Street</th>
						<th class="text-center">Pincode</th>
						<th class="text-center">State</th>
						<th class="text-center">Email</th>
                        <th class="text-center">Actions</th>

					</tr>
				</thead>
				@foreach($data['customers'] as $item)
				<tr class="item{{$item->CustomerId}}">
					<td>{{$item->CustomerId}}</td>
					<td>{{$item->ContactNo}}</td>
					<td>{{$item->FirstName}}</td>
					<td>{{$item->LastName}}</td>
					<td>{{$item->Street}}</td>
					<td>{{$item->Pincode}}</td>
					<td>{{$item->State}}</td>
					<td>{{$item->Email}}</td>
					<td><span class="edit-customer-modal"
							data-info-CustomerId="{{$item->CustomerId}}"
							data-info-ContactNo="{{$item->ContactNo}}"
							data-info-FirstName="{{$item->FirstName}}"
							data-info-LastName="{{$item->LastName}}"
							data-info-Street="{{$item->Street}}"
							data-info-Pincode="{{$item->Pincode}}"
							data-info-State="{{$item->State}}"
							data-info-Email="{{$item->Email}}">
							<i class="fa fa-edit"></i>
						</span>
						<span class="delete-customer-modal"
							data-info-CustomerId="{{$item->CustomerId}}">
							<i class="fa fa-trash"></i>
						</span></td>
				</tr>
				@endforeach

				<tfoot>
					<tr>
						<th class="text-center">CustomerId</th>
						<th class="text-center">ContactNo</th>
						<th class="text-center">FirstName</th>
						<th class="text-center">LastName</th>
						<th class="text-center">Street</th>
						<th class="text-center">Pincode</th>
						<th class="text-center">State</th>
						<th class="text-center">Email</th>
						<th class="hide"></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<div id="addCustomer" class="customModal modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
							<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
								<h2 id="heading">Customer Information</h2>
								<p>Fill all form field to go to next step</p>
								<form id="addMultiformData">
								@csrf
									<!-- progressbar -->
									<ul id="progressbar">
										<li class="active" id="account"><strong>Customer</strong></li>
										<li id="personal"><strong>Property</strong></li>
										<li id="payment"><strong>Loan</strong></li>
										<li id="confirm"><strong>Finish</strong></li>
									</ul>
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
									</div> <br> <!-- fieldsets -->
									<fieldset>
										<div class="form-card">
											<div class="row">
												<div class="col-7">
													<h2 class="fs-title">Customer Information:</h2>
												</div>
												<div class="col-5">
													<h2 class="steps">Step 1 - 4</h2>
												</div>
												<!-- FirstName, LastName, ContactNo, Street, Pincode, State, Email -->
											</div>  
											<label class="fieldlabels">First Name: *</label> 
											<input type="text" name="FirstName" placeholder="First Name" required/> 
											<label class="fieldlabels">LastName: *</label>
											<input type="text" name="LastName" placeholder="Last Name" required/>
											<label class="fieldlabels">Contact No: *</label> 
											<input type="text" name="ContactNo" placeholder="Contact No" required/>
											<label class="fieldlabels">Email: *</label>
											<input type="text" name="Email" placeholder="Email" required/>
											<label class="fieldlabels">Street: *</label>
											<input type="text" name="Street" placeholder="Street" required/>
											<label class="fieldlabels">Pincode: *</label> 
											<input type="text" name="Pincode" placeholder="Pin code" required/> 
											<label class="fieldlabels">State: *</label>
											<input type="text" name="State" placeholder="State" required/> 
											
										</div> <input type="button" name="next" class="next action-button" value="Next" />
									</fieldset>
									<fieldset>
										<div class="form-card">
											<div class="row">
												<div class="col-7">
													<h2 class="fs-title">Property Information:</h2>
												</div>
												<div class="col-5">
													<h2 class="steps">Step 2 - 4</h2>
												</div>
											</div> 
											<label class="fieldlabels">Street: *</label>
											<input type="text" name="Street" placeholder="Street" required/>
											<label class="fieldlabels">Pincode: *</label> 
											<input type="text" name="Pincode" placeholder="Pin code" required/> 
											<label class="fieldlabels">State: *</label>
											<input type="text" name="State" placeholder="State" required/> 
											<label class="fieldlabels">Property Size: *</label> 
											<input type="text" name="PropertySize" placeholder="PropertySize" required/>
											<label class="fieldlabels">Cost: *</label>
											<input type="text" name="Cost" placeholder="Cost" required/>

											<input type="hidden" name="CustomerId" />
										</div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
									</fieldset>
									<fieldset>
										<div class="form-card">
											<div class="row">
												<div class="col-7">
													<h2 class="fs-title">Loan Information:</h2>
												</div>
												<div class="col-5">
													<h2 class="steps">Step 3 - 4</h2>
												</div>
											</div> 

											<!-- `LoanId`,  `CustomerId`, LEFT(`Bank`, 256),  `LoanAmount`,  `IntrestRate`,  `IntrestBanking`,  `RepaymentAmount`,  `InstallmentAmount`, LEFT(`LoanStartDate`, 256), LEFT(`LoanEndDate`, 256), -->
											<!-- <label class="fieldlabels">LoanAmount: *</label>
											<input type="text" name="LoanAmount" placeholder="LoanAmount" required/> -->
											<label class="fieldlabels">Bank: *</label>
											<input type="text" name="Bank" placeholder="Bank" required/>
											<label class="fieldlabels">LoanAmount: *</label>
											<input type="text" name="LoanAmount" placeholder="LoanAmount" required/>
											<label class="fieldlabels">IntrestRate: *</label> 
											<input type="text" name="IntrestRate" placeholder="IntrestRate" required/> 
											<label class="fieldlabels">IntrestBanking: *</label>
											<input type="text" name="IntrestBanking" placeholder="IntrestBanking" required/> 
											<label class="fieldlabels">RepaymentAmount: *</label> 
											<input type="text" name="RepaymentAmount" placeholder="RepaymentAmount" required/>
											<label class="fieldlabels">InstallmentAmount: *</label>
											<input type="text" name="InstallmentAmount" placeholder="InstallmentAmount" required/>
											<label class="fieldlabels">LoanStartDate: *</label> 
											<input type="text" name="LoanStartDate" placeholder="LoanStartDate" required/>
											<label class="fieldlabels">LoanEndDate: *</label>
											<input type="text" name="LoanEndDate" placeholder="LoanEndDate" required/>

											<!-- 
												<input type="hidden" name="CustomerId" /> -->
											<input type="hidden" name="PropertyId" />

										</div> <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
									</fieldset>
									<fieldset>
										<div class="form-card">
											<div class="row">
												<div class="col-7">
													<h2 class="fs-title">Finish:</h2>
												</div>
												<div class="col-5">
													<h2 class="steps">Step 4 - 4</h2>
												</div>
											</div> <br><br>
											<h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
											<div class="row justify-content-center">
												<div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
											</div> <br><br>
											<div class="row justify-content-center">
												<div class="col-7 text-center">
													<h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
												</div>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="editCustomer" class="customModal modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
							<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
								<h2 id="heading">Customer Information</h2>
								<p>Fill all form field to go to next step</p>
								<form id="editCustomerForm">
								@csrf
									<!-- progressbar -->
									<ul id="progressbar">
										<li class="active" id="account"><strong>Customer</strong></li>
										<li id="personal"><strong>Property</strong></li>
										<li id="payment"><strong>Loan</strong></li>
										<li id="confirm"><strong>Finish</strong></li>
									</ul>
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
									</div> <br> <!-- fieldsets -->
									<fieldset>
										<div class="form-card">
											<div class="row">
												<div class="col-7">
													<h2 class="fs-title">Customer Information:</h2>
												</div>
												<div class="col-5">
													<h2 class="steps">Step 1 - 4</h2>
												</div>
												<!-- ContactNo, FirstName, LastName, Street, Pincode, State, Email -->
											</div>  
											<label class="fieldlabels">First Name: *</label> 
											<input type="text" name="FirstName" placeholder="First Name" required/> 
											<label class="fieldlabels">LastName: *</label>
											<input type="text" name="LastName" placeholder="Last Name" required/>
											<label class="fieldlabels">Contact No: *</label> 
											<input type="text" name="ContactNo" placeholder="Contact No" required/>
											<label class="fieldlabels">Email: *</label>
											<input type="text" name="Email" placeholder="Email" required/>
											<label class="fieldlabels">Street: *</label>
											<input type="text" name="Street" placeholder="Street" required/>
											<label class="fieldlabels">Pincode: *</label> 
											<input type="text" name="Pincode" placeholder="Pin code" required/> 
											<label class="fieldlabels">State: *</label>
											<input type="text" name="State" placeholder="State" required/> 
											
											<input type="hidden" name="CustomerId"/> 

											<div class="alert alert-success" style="display:none;">
												<strong>Success!</strong> Data saved Successfully
											</div>

										</div> <input type="submit" name="save" class="action-button" value="Save" />
									</fieldset>
									 
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="confirmModal"   class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="container-fluid">
					<div class="modal-body">
						Are you sure?
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
						<button type="button" data-dismiss="modal" class="btn">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<link href="{{ asset('css/custom-popup.css') }}" rel="stylesheet" />
	<!-- <link href="{{ asset('css/custom-popup.css') }}" rel="stylesheet" /> -->
    <style>
		tfoot input {
			width: 100%;
			padding: 3px;
			box-sizing: border-box;
		}
		tfoot .hide input{
			display: none;
		}
	</style>
@endsection

