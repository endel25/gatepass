@extends('layouts.admin')
@section('content')
<section class="content-header">
   <div class="mb-2 flex items-center justify-between">
      <h5 class="text-lg font-semibold dark:text-white-light">Add Driver</h5>

      <a type="button" href="{{ route('drivers.index') }}" class="btn btn-sm btn-l btn-primary rounded-full">Back</a>

   </div>
</section>
<section class="content" >
  
    <div class="panel">
      <form class="space-y-4" id="myForm" action="{{ route('drivers.store') }}" method="POST">
        @csrf
          <div class="flex sm:flex-row flex-col" id="FirstNameField">
              <label for="FirstName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">First Name</label>
              <input type="text" placeholder="Enter First Name" class="text-xs form-input flex-1" name="FirstName" id="FirstName" value="{{old('FirstName')}}" >
          </div>
          <div class="flex sm:flex-row flex-col" id="LastNameField">
              <label for="LastName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Last Name</label>
              <input type="text" placeholder="Enter Last Name" class="text-xs form-input flex-1" name="LastName" id="LastName" value="{{old('LastName')}}" >
          </div>
          <div class="flex sm:flex-row flex-col" id="LicenseNoField">
              <label for="LicenseNo" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">License No.</label>
              <input type="text" placeholder="Enter License No." class="text-xs form-input flex-1" name="LicenseNo" id="LicenseNo" value="{{old('LicenseNo')}}" oninput="this.value = this.value.toUpperCase()">
          </div>
          <div class="flex sm:flex-row flex-col" id="ContactNoField">
              <label for="ContactNo" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">License No.</label>
              <input type="text" placeholder="Enter Contact No." class="text-xs form-input flex-1" name="ContactNo" id="ContactNo" value="{{old('ContactNo')}}" x-mask='999-9999999'>
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
<script  src="{{ asset('plugins/jquery/webcam.min.js') }}"></script>
<script>

  // Dropdown
  // document.addEventListener("DOMContentLoaded", function(e) {
  //     // seachable 
  //     var options = {
  //         searchable: true
  //     };
  //     NiceSelect.bind(document.getElementById("TransporterId"), options);
     
  // });
 
  $(document).ready(function() {
      $("#myForm").submit(function(event) {
          event.preventDefault();
          var FirstName = $("#FirstName").val();
          var LicenseNo = $("#LicenseNo").val();
          if (!FirstName) {
              $("#FirstNameField").addClass("has-error");
              showMessage('Field FirstName is required','error');
          } 
          else if (!LicenseNo) {
               $("#LicenseNoField").addClass("has-error");
              showMessage('Field LicenseNo is required','error');
          }
           else {
              showMessage('Vehicle details created successfully.','success');
              $("#myForm").unbind('submit').submit();
          }
      });
      $('#FirstName').on('input', function() {
        $('#VehicleNoField').removeClass('has-error').addClass('has-success');
      });
        $('#LicenseNo').on('change', function() {
        $('#VehicleTypeField').removeClass('has-error').addClass('has-success');
      });
         

     
      

  });
</script>

@endsection

