@extends('layouts.admin')
@section('content')
<section class="content-header">
   <div class="mb-2 flex items-center justify-between">
      <h5 class="text-lg font-semibold dark:text-white-light">Add Transporter</h5>

      <a type="button" href="{{ route('transporter.index') }}" class="btn btn-sm btn-l btn-primary rounded-full">Back</a>

   </div>
</section>
<section class="content" >
	<div class="panel">
		<form class="space-y-5" id="myForm" action="{{ route('transporter.store') }}" method="POST">
				@csrf
				<div class="flex sm:flex-row flex-col" id="TransporterCodeField">
				    <label for="TransporterCode" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Transporter Code</label>
				    <input type="text" placeholder="Enter Transporter Code" class="text-xs form-input flex-1" name="TransporterCode" id="TransporterCode" value="{{ old('TransporterCode') }}" />
				</div>
			    <div class="flex sm:flex-row flex-col" id="TransporterNameField">
			        <label for="TransporterName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Transporter Name</label>
			        <input type="text" placeholder="Enter Transporter Name" class="text-xs form-input flex-1" name="TransporterName" id="TransporterName" value="{{ old('TransporterName') }}"/>
			    </div>
			    <div class="flex sm:flex-row flex-col" id="ContactNoField">
			        <label for="ContactNo" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Contact No.</label>
        			<input id="ContactNo" type="text" placeholder="___-_______" class="text-xs form-input flex-1" x-mask="999-9999999" name="ContactNo" value="{{ old('ContactNo') }}"/>
			    </div>
			    <div class="flex sm:flex-row flex-col" id="EmailField">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Email</label>
			        <input type="text" placeholder="Enter Email" class="text-xs form-input flex-1" name="Email" id="Email" value="{{ old('Email') }}"/>
			    </div>
			     <div class="flex sm:flex-row flex-col" id="AddressField">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Address</label>
			        <textarea  rows="3" placeholder="Enter Address" class="flex-1 text-xs form-textarea min-h-[130px] resize-none"  name="Address" id="Address">{{ old('Address') }}</textarea>
			    </div>
			    <div class="flex sm:flex-row flex-col">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Notes</label>
			       	<textarea class="text-xs flex-1 form-textarea resize-none" name="Notes">{{ old('Notes') }}</textarea>
			    </div>
				<button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Create</button>
		</form>
	</div>
</section>
@endsection
@section('Script')
<script>
	$("#myForm").submit(function(event) {
		  event.preventDefault();
		  var TransporterCode = $("#TransporterCode").val();
		  var TransporterName = $("#TransporterName").val();
		  if (!TransporterCode) {
		      $("#TransporterCodeField").addClass("has-error");
		      showMessage('Field TransporterCode is required','error');
		  } 
		  else if (!TransporterName) {
		       $("#TransporterNameField").addClass("has-error");
		      showMessage('Field TransporterName is required','error');
		  }
		  else {
		      showMessage('Transporter created successfully.','success');
		      $("#myForm").unbind('submit').submit();
		  }
	});
 	$('#TransporterCode').on('input', function() {
    	$('#TransporterCodeField').removeClass('has-error').addClass('has-success');
	});
	$('#TransporterName').on('input', function() {
    	$('#TransporterNameField').removeClass('has-error').addClass('has-success');
	});
</script>
@endsection
