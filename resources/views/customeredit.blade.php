@extends('master')
@section('pageheader')
<h2>Edit Customer</h2>
@stop
@section('maincontent')
<div class="row">
	<div class="col">
		<section class="card">
			<form class="form-horizontal form-bordered" action="{{route('editcustomerpost')}}" method="post">
				@csrf
				<header class="card-header">                   
					<a href="{{ route('managecustomer') }}" class="btn btn-primary btn-sm pull-right">Manage Customer</a>
					<h2 class="card-title">Edit Customer</h2>
				</header>
				<div class="card-body">

					@if (Session::has('error'))
					<div class="alert alert-danger">{{ Session::get('error') }}</div>
					@endif 

					@if(Session::has('msg') && Session::get('msg'))
					<div class="row">
						<div class="col">
							<div class="alert alert-success mt-20">
								Customer Updated  <strong> Succesfully!</strong>
							</div>
						</div>
					</div>
					@endif                 

					<div class="form-group row">
						<label class="col-lg-3 control-label text-lg-right pt-2">Employee Name <span class="req">*</span></label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="name" id="categoryname" value="{{  $query->name  }}">
							@if ($errors->has('name')) 
							<div class="validation-error errorActive">{!! $errors->first('name') !!}</div> 
							@endif
						</div>
					</div>
					<input type="hidden" name="id" value="{{  $query->id  }}">

					<div class="form-group row">
						<label class="col-lg-3 control-label text-lg-right pt-2">Employee Code <span class="req">*</span></label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="code" id="code" value="{{  $query->code  }}">
							@if ($errors->has('code')) 
							<div class="validation-error errorActive">{!! $errors->first('code') !!}</div> 
							@endif
						</div>
					</div>


					<div class="form-group row">
						<label class="col-lg-3 control-label text-lg-right pt-2">Email <span class="req">*</span></label>
						<div class="col-lg-6">
							<input type="email" class="form-control" name="email" id="email" value="{{  $query->email  }}">
							@if ($errors->has('email')) 
							<div class="validation-error errorActive">{!! $errors->first('email') !!}</div> 
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-3 control-label text-lg-right pt-2">Mobile No <span class="req">*</span></label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="mobile" id="mobile" value="{{  $query->phone  }}">
							@if ($errors->has('mobile')) 
							<div class="validation-error errorActive">{!! $errors->first('mobile') !!}</div> 
							@endif
						</div>
					</div>


					<div class="form-group row">
						<label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
						<div class="col-lg-6">
							<select class="form-select form-control" aria-label="Default select example" name="status">
							  <option  value="enabled" {{ $query['status'] ==  'enabled' ? 'Selected' : '' }}>Enabled</option>
							  <option value="disabled"  {{ $query['status'] ==  'disabled' ? 'Selected' : '' }}>disabled</option>
							  
							</select>
						</div>
					</div>



				</div>
				<footer class="card-footer text-right">
					<button class="btn btn-primary btn-sm">Submit </button>
					<button type="reset" class="btn btn-default btn-sm">Reset</button>
				</footer>
			</form>
		</section>
	</div>
</div>
@stop