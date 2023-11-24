@extends('admin.layouts')

@section('content')

<div class="container ">
		<h1 class="mt-4">Loans</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
			<li class="breadcrumb-item active">Loans</li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<button type="button" id="add_loan" class="btn btn-primary">Add Loans</button>
			</div>
		</div>
		{{ csrf_field() }}
		<!-- <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Properties</h1>                
			</div>
        </div> -->
		<div class="table-responsive text-center">
			<table class="table table-striped table-bordered" id="loans">
				<thead>
					<tr>
                    <!-- 'PropertyId', 'Street', 'Pincode', 'State', 'PropertySize', 'Cost' -->
						<!-- <th class="text-center">#</th> -->
                        <th class="text-center">LoanId</th>
						<th class="text-center">PropertyId</th>
						<th class="text-center">CustomerId</th>
						<th class="text-center">Bank</th>
						<th class="text-center">LoanAmount</th>
						<th class="text-center">IntrestRate</th>
						<th class="text-center">IntrestBanking</th>
                        <th class="text-center">RepaymentAmount</th>
                        <th class="text-center">InstallmentAmount</th>
                        <th class="text-center">LoanStartDate</th>
                        <th class="text-center">LoanEndDate</th>
                        <th class="text-center">Actions</th>
					</tr>
				</thead>
				@foreach($data['loans'] as $item)
				<tr class="item{{$item->LoanId}}">
					<!-- <td>{{$item->id}}</td> -->
                    <td>{{$item->LoanId}}</td>
					<td><a href="{{route('customers') . '/' . ((!empty($item->Property[0])) ? $item->Property[0]->PropertyId : '')}}">{{ ((!empty($item->Property[0])) ? $item->Property[0]->PropertyId : '') }}</a></td>
					<td><a href="{{route('customers') . '/' . $item->CustomerId}}">{{$item->CustomerId}}</a></td>
					<td>{{$item->Bank}}</td>
					<td>{{$item->LoanAmount}}</td>
					<td>{{$item->IntrestRate}}</td>
					<td>{{$item->IntrestBanking}}</td>
                    <td>{{$item->RepaymentAmount}}</td>
                    <td>{{$item->InstallmentAmount}}</td>
					<td>{{$item->LoanStartDate}}</td>
                    <td>{{$item->LoanEndDate}}</td>

					<td><span class="edit-loan-modal"
							data-info-PropertyId="{{ ((!empty($item->Property[0])) ? $item->Property[0]->PropertyId : '') }}"
                            data-info-CustomerId="{{$item->CustomerId}}"
							data-info-LoanId="{{$item->LoanId}}"
                            data-info-Bank="{{$item->Bank}}"
                            data-info-LoanAmount="{{$item->LoanAmount}}"
                            data-info-IntrestRate="{{$item->IntrestRate}}"
                            data-info-IntrestBanking="{{$item->IntrestBanking}}"
                            data-info-RepaymentAmount="{{$item->RepaymentAmount}}"
							data-info-InstallmentAmount="{{$item->InstallmentAmount}}"
                            data-info-LoanStartDate="{{$item->LoanStartDate}}"
                            data-info-LoanEndDate="{{$item->LoanEndDate}}"
                            >
							<i class="fa fa-edit"></i>
						</span>
						<span class="delete-loan-modal"
							data-info-LoanId="{{$item->LoanId}}">
							<i class="fa fa-trash"></i>
						</span></td>
				</tr>
				@endforeach

                <tfoot>
					<tr>
                    <!-- 'PropertyId', 'Street', 'Pincode', 'State', 'PropertySize', 'Cost' -->
						<!-- <th class="text-center">#</th> -->
                        <th class="text-center">LoanId</th>
						<th class="text-center">PropertyId</th>
						<th class="text-center">CustomerId</th>
						<th class="text-center">Bank</th>
						<th class="text-center">LoanAmount</th>
						<th class="text-center">IntrestRate</th>
						<th class="text-center">IntrestBanking</th>
                        <th class="text-center">RepaymentAmount</th>
                        <th class="text-center">InstallmentAmount</th>
                        <th class="text-center">LoanStartDate</th>
                        <th class="text-center">LoanEndDate</th>
                        <th class="hide"></th>
					</tr>
                </tfoot>
			</table>
		</div>
</div>
	<div id="addLoan" class="customModal modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
							<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
								<h2 id="heading">Loan Information</h2>
								<p>Fill all form field to go to next step</p>
								<form id="LoanForm">
								@csrf
									<!-- progressbar -->
									<ul id="progressbar">
										<li id="account"><strong>Customer</strong></li>
										<li id="personal"><strong>Property</strong></li>
										<li id="payment" class="active"><strong>Loan</strong></li>
										<li id="confirm"><strong>Finish</strong></li>
									</ul>
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
									</div> <br>
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

											 

                                            <label class="fieldlabels">CustomerId: *</label>
											<!-- <input type="text" name="CustomerId" placeholder="CustomerId" readonly/> -->
                                            <select name="CustomerId" id="CustomerId">
												<option value="">SELECT</option>
                                                @foreach($data['customers'] as $item)
                                                    <option value="{{$item->CustomerId}}">{{$item->FirstName}} {{$item->LastName}} #{{$item->CustomerId}}</option>
                                                @endforeach
                                            </select> 
											<label class="fieldlabels">PropertyId: *</label>
											<!-- <select name="PropertyId" id="PropertyId">
                                                @foreach($data['properties'] as $item)
                                                    <option value="{{$item->PropertyId}}">{{$item->Street}} {{$item->Pincode}} #{{$item->State}}</option>
                                                @endforeach
                                            </select> -->
											<!-- Bank, LoanAmount, IntrestRate, IntrestBanking, RepaymentAmount, InstallmentAmount, LoanStartDate, LoanEndDate -->
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

    <div id="editLoan" class="customModal modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
							<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
								<h2 id="heading">Loan Information</h2>
								<p>Fill all form field to go to next step</p>
								<form id="editLoanForm">
								@csrf
									<!-- progressbar -->
									<ul id="progressbar">
										<li id="account"><strong>Customer</strong></li>
										<li id="personal"><strong>Property</strong></li>
										<li id="payment" class="active"><strong>Loan</strong></li>
										<li id="confirm"><strong>Finish</strong></li>
									</ul>
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
									</div> <br>
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

											 

                                            <label class="fieldlabels">CustomerId: *</label>
											<!-- <input type="text" name="CustomerId" placeholder="CustomerId" readonly/> -->
                                            <select name="CustomerId" id="CustomerId">
												<option value="">SELECT</option>
                                                @foreach($data['customers'] as $item)
                                                    <option value="{{$item->CustomerId}}">{{$item->FirstName}} {{$item->LastName}} #{{$item->CustomerId}}</option>
                                                @endforeach
                                            </select> 
											<label class="fieldlabels">PropertyId: *</label>
											<select name="PropertyId" id="PropertyId">
												<option value="">SELECT</option>
                                                @foreach($data['properties'] as $item)
                                                    <option value="{{$item->PropertyId}}">{{$item->Street}} {{$item->Pincode}} #{{$item->State}}</option>
                                                @endforeach
                                            </select>

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

											<input type="hidden" name="LoanId" />

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

