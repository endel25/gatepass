@extends('layouts.admin')
@section('content')
<!-- Company Managment -->
<section class="content-header">
	<div class="card card-default">
		<div class="card-header">
			<h3 class="card-title">Company Managment</h3>
			<div class="card-tools">
				<ol class="breadcrumb float-sm-right">
					<a class="btn btn-block bg-gradient-primary btn-sm" href="{{ route('companies.index') }}"> Back</a>
				</ol>
			</div>
		</div>
	</div>
	<div class="container">
		@if ($errors->any())
		@foreach ($errors->all() as $error)
		<div class="alert alert-danger" role="alert">
			{{ $error }}
		</div>
		@endforeach
		@endif 
	</div>
	<form action="{{ route('companies.update',$company->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">Edit Company</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
					<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
		         <div class="col-md-6">
		            <div class="form-group">
		               <div class="row">
		                  <label>Company Name <sup class="" style="font-size: 7px;"><i class="fas fa-asterisk text-danger"></i></sup></label>
		                  &nbsp;
		                  &nbsp;
		                  <input class="form-group col-md-7" required="" type="text" name="CompanyName" style="font-size: 14px;" value="{{$company->CompanyName}}" autocomplete="off">
		               </div>
		            </div>
		         </div>
		         <div class="col-md-6">
		            <div class="form-group">
		               <div class="row">
		                  <label>Location Name <sup class="" style="font-size: 7px;"><i class="fas fa-asterisk text-danger"></i></sup></label>
		                  &nbsp;
		                  &nbsp;
		                 	<select class="form-group col-md-7" name="LocationId">
	                        <option value="">Select LocationName</option> 
	                        @foreach($company->location as $location)
	                              @if($company->LocationId == $location->id)
	                              {
	                                 <option selected="" value="{{$location->id}}">{{$location->LocationName}}</option>
	                              }
	                              @else
	                              {     
	                                 <option  value="{{$location->id}}">{{$location->LocationName}}</option>
	                              }                       
	                              @endif
	                           @endforeach 
	                     </select> 
		               </div>
		            </div>
	         	</div>
		         <!-- <div class="col-md-3">
		            <div class="custom-control custom-checkbox">
		               <input type="checkbox" class="custom-control-input"  name="SAPIntegration" id="chkPassport" {{$company->SAPIntegration==0?'':'checked'}}>
		               <label class="custom-control-label" for="chkPassport">SAP Integrated</label>
		            </div>
		         </div> -->
	      	</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary btn-sm">Submit</button>
			</div>
		</div>
	</form>
</section>
@endsection
