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
					<td><span class="edit-property-modal"
							data-info-PropertyId="{{$item->PropertyId}}"
                            data-info-CustomerId="{{$item->CustomerId}}"
                            data-info-Street="{{$item->Street}}"
                            data-info-Pincode="{{$item->Pincode}}"
                            data-info-State="{{$item->State}}"
                            data-info-PropertySize="{{$item->PropertySize}}"
                            data-info-Cost="{{$item->Cost}}"
                            >
							<i class="fa fa-edit"></i>
						</span>
						<span class="delete-property-modal"
							data-info-PropertyId="{{$item->PropertyId}}">
							<i class="fa fa-trash"></i>
						</span></td>
				</tr>
				@endforeach

                <tfoot>
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
                        <th class="hide"></th>

					</tr>
                </tfoot>
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
									</div> <br>
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
												<option value="">SELECT</option>
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
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div id="editProperty" class="customModal modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
							<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
								<h2 id="heading">Property Information</h2>
								<p>Fill all form field to go to next step</p>
								<form id="editPropertyForm">
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
									</div> <br>
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
												<option value="">SELECT</option>
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

											<input type="hidden" name="PropertyId" />

                                            <div class="alert alert-success" style="display:none;">
												<strong>Success!</strong> Data saved Successfully
											</div>

										</div> <input type="submit" name="save" class="action-button" value="Save" /> 
                                        <!-- <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> -->
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

