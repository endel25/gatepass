@extends('layouts.admin')
@section('content')
<section class="content-header">
   <div class="mb-2 flex items-center justify-between">
      <h5 class="text-lg font-semibold dark:text-white-light">Add Vehicle</h5>

      <a type="button" href="{{ route('vehicles.index') }}" class="btn btn-sm btn-l btn-primary rounded-full">Back</a>

   </div>
</section>
<section class="content" >
	
		<div class="panel">
			<form class="space-y-5" id="myForm" action="{{ route('vehicles.store') }}" method="POST">
				@csrf
			    <div class="flex sm:flex-row flex-col" id="VehicleTypeField">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Vehicle Type</label>
			        <select id="VehicleType" name="VehicleType" class="text-xs flex-1 form-input">
							    @foreach($vtype as $vtypes)
							    <option {{$vtypes->FieldValue ==old('VehicleType')?'selected':''}} value="{{$vtypes->FieldValue}}">{{$vtypes->FieldValue}}</option>
							    @endforeach
							</select>
			    </div>
			    <div class="flex sm:flex-row flex-col" id="VehicleNoField">
					    <label for="VehicleNo" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Vehicle No.</label>
					    <input type="text" placeholder="Enter Vehicle No." class="text-xs form-input flex-1" name="VehicleNo" id="VehicleNo" value="{{old('VehicleNo')}}" oninput="this.value = this.value.toUpperCase()">

					</div>

			    <div class="flex sm:flex-row flex-col" id="TransporterField">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Transporter</label>
			        <select id="TransporterId" name="TransporterId" class="text-xs flex-1 form-input" >
							    @foreach($transporter as $transporters)
							    <option {{$transporters->id ==old('Transporter')?'selected':''}} value="{{$transporters->id}}">{{$transporters->TransporterName}}</option>
							    @endforeach
							</select>
			    </div>
			    <div class="flex sm:flex-row flex-col">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Notes</label>
			       	<textarea class="text-xs flex-1 form-input" name="Notes"></textarea>
			    </div>
				<button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Create</button>
		</form>
	</div>
</section>


@endsection
@section('Script')
<script>

	// Dropdown
	document.addEventListener("DOMContentLoaded", function(e) {
	    // seachable 
	    var options = {
	        searchable: true
	    };
	    NiceSelect.bind(document.getElementById("TransporterId"), options);
	    NiceSelect.bind(document.getElementById("VehicleType"), options);
	});
 
  $(document).ready(function() {
      $("#myForm").submit(function(event) {
          event.preventDefault();
          var VehicleType = $("#VehicleType").val();
          var VehicleNo = $("#VehicleNo").val();
          var Transporter = $("#TransporterId").val();
          if (!VehicleType) {
              $("#VehicleTypeField").addClass("has-error");
              showMessage('Field VehicleType is required','error');
          } 
          else if (!VehicleNo) {
               $("#VehicleNoField").addClass("has-error");
              showMessage('Field Vehicle is required','error');
          }
          else if (!Transporter) {
           	$("#TransporterField").addClass("has-error");
              showMessage('Field Transporter is required','error');
              
          } else {
              showMessage('Vehicle details created successfully.','success');
              $("#myForm").unbind('submit').submit();
          }
      });
     	$('#VehicleNo').on('input', function() {
        $('#VehicleNoField').removeClass('has-error').addClass('has-success');
    	});
    		$('#VehicleType').on('change', function() {
        $('#VehicleTypeField').removeClass('has-error').addClass('has-success');
    	});
    			$('#Transporter').on('change', function() {
        $('#TransporterField').removeClass('has-error').addClass('has-success');
    	});

     
      

  });
</script>

@endsection
	