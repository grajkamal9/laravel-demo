@extends('admin.layouts')

@section('content')

<div class="container ">
		<h1 class="mt-4">Properties</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
			<li class="breadcrumb-item active">Properties</li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<button type="button" id="add_property" class="btn btn-primary">Add Property</button>
			</div>
		</div>
		{{ csrf_field() }}
		<!-- <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Properties</h1>                
			</div>
        </div> -->
		<div class="table-responsive text-center">
			<table class="table table-striped table-bordered" id="properties">
				<thead>
					<tr>
                    <!-- 'PropertyId', 'Street', 'Pincode', 'State', 'PropertySize', 'Cost' -->
						<!-- <th class="text-center">#</th> -->
						<th class="text-center">PropertyId</th>
						<th class="text-center">CustomerId</th>
						<th class="text-center">Street</th>
						<th class="text-center">Pincode</th>
						<th class="text-center">State</th>
						<th class="text-center">PropertySize</th>
                        <th class="text-center">Cost</th>
                        <th class="text-center">Actions</th>

					</tr>
				</thead>
				@foreach($data['properties'] as $item)
				<tr class="item{{$item->PropertyId}}">
					<!-- <td>{{$item->id}}</td> -->
					<td>{{$item->PropertyId}}</td>
					<td><a href="{{route('customers') . '/' . $item->CustomerId}}">{{$item->CustomerId}}</a></td>
					<td>{{$item->Street}}</td>
					<td>{{$item->Pincode}}</td>
					<td>{{$item->State}}</td>
					<td>{{$item->PropertySize}}</td>
                    <td>{{$item->Cost}}</td>
					<td><span class="edit-modal"
							data-info="{{$item->PropertyId}},{{$item->ContactNo}},{{$item->FirstName}},{{$item->LastName}},{{$item->Street}},{{$item->Pincode}},{{$item->Email}}">
							<i class="fa fa-edit"></i>
						</span>
						<span class="delete-modal"
							data-info="{{$item->PropertyId}},{{$item->ContactNo}},{{$item->FirstName}},{{$item->LastName}},{{$item->Street}},{{$item->Pincode}},{{$item->Email}}">
							<i class="fa fa-trash"></i>
						</span></td>
				</tr>
				@endforeach
			</table>
		</div>
</div>
	<div id="addProperty" class="customModal modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
							<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
								<h2 id="heading">Property Information</h2>
								<p>Fill all form field to go to next step</p>
								<form id="PropertyForm">
								@csrf
									<!-- progressbar -->
									<ul id="progressbar">
										<li id="account"><strong>Customer</strong></li>
										<li id="personal" class="active"><strong>Property</strong></li>
										<li id="payment"><strong>Loan</strong></li>
										<li id="confirm"><strong>Finish</strong></li>
									</ul>
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
									</div> <br> <!-- fieldsets -->
									<!-- <fieldset>
										<div class="form-card">
											<div class="row">
												<div class="col-7">
													<h2 class="fs-title">Property Information:</h2>
												</div>
												<div class="col-5">
													<h2 class="steps">Step 1 - 4</h2>
												</div>
											</div>  
											<label class="fieldlabels">First Name: *</label> 
											<input type="text" name="FirstName" placeholder="First Name" /> 
											<label class="fieldlabels">LastName: *</label>
											<input type="text" name="LastName" placeholder="Last Name" />
											<label class="fieldlabels">Contact No: *</label> 
											<input type="text" name="ContactNo" placeholder="Contact No" />
											<label class="fieldlabels">Email: *</label>
											<input type="text" name="Email" placeholder="Email" />
											<label class="fieldlabels">Street: *</label>
											<input type="text" name="Street" placeholder="Street" />
											<label class="fieldlabels">Pincode: *</label> 
											<input type="text" name="Pincode" placeholder="Pin code" /> 
											<label class="fieldlabels">State: *</label>
											<input type="text" name="State" placeholder="State" /> 
											
										</div> <input type="button" name="next" class="next action-button" value="Next" />
									</fieldset> -->
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
                                            <label class="fieldlabels">CustomerId: *</label>
											<!-- <input type="text" name="CustomerId" placeholder="CustomerId" /> -->
                                            <select name="CustomerId" id="CustomerId">
                                                @foreach($data['customers'] as $item)
                                                    <option value="{{$item->CustomerId}}">{{$item->FirstName}} {{$item->LastName}} #{{$item->CustomerId}}</option>
                                                @endforeach
                                            </select>      
											<label class="fieldlabels">Street: *</label>
											<input type="text" name="Street" placeholder="Street" />
											<label class="fieldlabels">Pincode: *</label> 
											<input type="text" name="Pincode" placeholder="Pin code" /> 
											<label class="fieldlabels">State: *</label>
											<input type="text" name="State" placeholder="State" /> 
											<label class="fieldlabels">Property Size: *</label> 
											<input type="text" name="PropertySize" placeholder="PropertySize" />
											<label class="fieldlabels">Cost: *</label>
											<input type="text" name="Cost" placeholder="Cost" />

											<!-- <input type="hidden" name="PropertyId" /> -->
										</div> <input type="submit" name="save" class="action-button" value="Save" /> 
                                        <!-- <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> -->
									</fieldset>
									<!-- <fieldset>
										<div class="form-card">
											<div class="row">
												<div class="col-7">
													<h2 class="fs-title">Loan Information:</h2>
												</div>
												<div class="col-5">
													<h2 class="steps">Step 3 - 4</h2>
												</div>
											</div> <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" accept="image/*"> <label class="fieldlabels">Upload Signature Photo:</label> <input type="file" name="pic" accept="image/*">
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
									</fieldset> -->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<link href="{{ asset('css/custom-popup.css') }}" rel="stylesheet" />
	<!-- <link href="{{ asset('css/custom-popup.css') }}" rel="stylesheet" /> -->
    
@endsection

