@extends('layouts.admin')
@section('content')
@extends('layouts.admin')
@section('content')
<section class="content-header">
   <div class="mb-2 flex items-center justify-between">
      <h5 class="text-lg font-semibold dark:text-white-light">Add Location</h5>

      <a type="button" href="{{ route('locations.index') }}" class="btn btn-sm btn-l btn-primary rounded-full">Back</a>

   </div>
</section>
<section class="content" >
	
		<div class="panel">
			<form class="space-y-5" id="myForm" action="{{ route('locations.store') }}" method="POST">
				@csrf
			    <div class="flex sm:flex-row flex-col" id="LocationCodeField">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Location Code</label>
			        <input type="text" placeholder="Enter Location Code" class="text-xs form-input flex-1" name="LocationCode" id="LocationCode" value="{{old('LocationCode')}}">
			    </div>
			    <div class="flex sm:flex-row flex-col" id="LocationNameField">
				    <label for="LocationName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Location Name</label>
				    <input type="text" placeholder="Enter Location Name" class="text-xs form-input flex-1" name="LocationName" id="LocationName" value="{{old('LocationName')}}" >
				</div>
			    <div class="flex sm:flex-row flex-col">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Notes</label>
			       	<textarea class="text-xs flex-1 form-input"></textarea>
			    </div>
				<button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Create</button>
		</form>
	</div>
</section>
@endsection
@section('Script')
<script>
  $(document).ready(function() {
	  $("#myForm").submit(function(event) {
	      event.preventDefault();
	      var LocationName = $("#LocationName").val();
	      var LocationCode = $("#LocationCode").val();
	      if (!LocationCode) {
	           $("#LocationCodeField").addClass("has-error");
	          showMessage('Field LocationCode is required','error');
	      }
	       
	      else if (!LocationName) {
	          $("#LocationNameField").addClass("has-error");
	          showMessage('Field LocationName is required','error');
	      }
	      else {
	          showMessage('Location details created successfully.','success');
	          $("#myForm").unbind('submit').submit();
	      }
	  });
 	$('#LocationName').on('input', function() {
    		$('#LocationNameField').removeClass('has-error').addClass('has-success');
	});
	$('#LocationCode').on('change', function() {
    		$('#LocationCodeField').removeClass('has-error').addClass('has-success');
	});
	
});
</script>
@endsection