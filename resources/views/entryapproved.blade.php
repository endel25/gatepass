@extends('layouts.admin')
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Entry Approved Data</h1>
         </div>
      </div>
   </div>
</section>
<section class="content">
	<div class="container-fluid">
	   <div class="row">
	      <div class="col-12">
	         <div class="card">
	            <div class="card-body">
	               <table id="example1" class="table table-bordered table-striped">
	                  <thead>
	                     <tr>
	                     		<th>Gatepass No</th>
	                        <th>DateTime</th>
	                        <th>Vehicle No</th>
	                        <th>Trailer No</th>
	                        <th>Company Name</th>
	                        <th>Transporter</th>
	                        <th>Driver Name</th>
	                        <th>Driver ID</th>
	                        <th>VisitFor</th>
	                        <th>User</th>
	                        <th>Action</th>

	                     </tr>
	                  </thead>
	                  <tbody> 
	                   @foreach ($EntryApproved as $EntryApproved) 
	                     <tr>
	                     	
	                     			            <th>GP<?php
                            if ($EntryApproved->id<10) {
                              echo "0".$EntryApproved->id;
                            }
                            else
                            {
                              echo $EntryApproved->id;
                            }
                            ?>
                          </th>
	                        <td>{{$EntryApproved->GatepassEntryTime}}</td>
	                        <td >{{$EntryApproved->VehicleNo}}</td>
	                        <td >{{$EntryApproved->TrailerNo}}</td>
	                        <td >{{$EntryApproved->CompanyID}}</td>
	                        <td>{{$EntryApproved->TransporterID}}</td>
	                        <td>{{$EntryApproved->DriverID}}</td>
	                        <td>{{$EntryApproved->D_licenseNo}}</td>
	                        <td>{{$EntryApproved->VisitFor}}</td>
	                        <td>{{$EntryApproved->FirstName}} {{$EntryApproved->LastName}}</td>
	                        <td> 
                          @foreach ($up as $ups)
                            @if($ups->IsUpdate==1)
                             <a class="fas fa-edit" title="EDIT"  href="{{ route('gatepass.edit',$EntryApproved->id) }}"></a> @endif
                            @if($ups->IsDelete==1) 
                              <a class="fas fa-trash-alt" href="gatepass/{{ $EntryApproved->id }}/delete"></a>
                            @endif
                            <a class="fas fa-print" title="PRINT"  href="{{ $EntryApproved->id }}/invoice"></a>
                            @endforeach
                        </td>
	                     </tr>
	                   @endforeach
	                  </tbody>
	               </table>
	            </div>
	         </div>
	      </div>
	   </div>
	</div>
	<div class="form-group">
	 <div class="col-xs-12 col-sm-12 col-md-12">
	    <ol class="breadcrumb float-sm-right">
	       <input class="btn btn-primary btn-sm" action="action" onclick="window.history.go(-1); return false;" type="submit" value="Back"/>
	    </ol>
	 </div>
	</div>
</section>
@endsection
@section('UserScriptStr')
<script type="text/javascript">


  setInterval(function()
  { 
    window.location.reload();
  }, 60000);

</script>

@endsection