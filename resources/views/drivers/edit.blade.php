@extends('layouts.admin')
@section('content')
<style type="text/css">
    .webcam-container {
        display: flex;
      flex-direction: column-reverse;
      align-items: flex-end;
    }
    .webcam-wrapper {
        width: 100%;
        max-width: 300px;
        margin: 10px;
    }
    .webcam-feed {
        width: 90%;
        height: 200px;
        background-color: #ccc;
        margin-bottom: 10px;
        border: solid 1px;
    }
    @media (max-width: 640px) {
        .webcam-wrapper {
            width: 100%;
            max-width: none;
        }
    }
</style>

<section class="content-header">
  <div class="mb-2 flex items-center justify-between">
    <h5 class="text-lg font-semibold dark:text-white-light">Add Driver</h5>
    <a type="button" href="{{ route('drivers.index') }}" class="btn btn-sm btn-l btn-primary rounded-full">Back</a>
  </div>
</section>
<section class="content">
  <div class="panel">
    <form class="space-y-2" id="myForm" action="{{ route('drivers.update',$driver->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        
        <!-- Left Section -->
        <div class="flex-1 max-w-lg space-y-4">
          <div class="flex sm:flex-row flex-col" id="PersonTypeField">
            <label for="PersonType" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Person Type</label>
            <select id="PersonType" name="PersonType" class="text-xs  form-input">
              <option {{$driver->PersonType == 'Driver'?'selected':''}} value="Driver">Driver</option>     
              <option {{$driver->PersonType == 'Visitor'?'selected':''}} value="Visitor">Visitor</option>     
            </select>
          </div>
          <div class="flex sm:flex-row flex-col" id="FirstNameField">
            <label for="FirstName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">First Name</label>
            <input type="text" placeholder="Enter First Name" class="text-xs form-input flex-auto" name="FirstName" id="FirstName" value="{{$driver->FirstName}}">
          </div>
          <div class="flex sm:flex-row flex-col" id="LastNameField">
            <label for="LastName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Last Name</label>
            <input type="text" placeholder="Enter Last Name" class="text-xs form-input flex-auto" name="LastName" id="LastName" value="{{$driver->LastName}}">
          </div>
          <div class="flex sm:flex-row flex-col" id="LicenseNoField">
            <label for="LicenseNo" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">National Id</label>
            <input type="text" placeholder="Enter National Id" class="text-xs form-input flex-auto" name="LicenseNo" id="LicenseNo" value="{{$driver->LicenseNo}}" oninput="this.value = this.value.toUpperCase()">
          </div>
          <div class="flex sm:flex-row flex-col" id="ContactNoField">
            <label for="ContactNo" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Contact No.</label>
            <input type="text" placeholder="Enter Contact No." class="text-xs form-input flex-auto" name="ContactNo" id="ContactNo" value="{{$driver->ContactNo}}" x-mask='999-9999999'>
          </div>
          <div class="flex sm:flex-row flex-col">
            <label class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Notes</label>
            <textarea class="text-xs flex-auto form-input" name="Notes"></textarea>
          </div>
        </div>

        <!-- Right Section -->
        <div class="flex-1 space-y-2 max-w-lg" >
          <div class="webcam-container">
            <div class="webcam-wrapper">
              <div id="webcam1" class="webcam-feed">
                <img src="{{ asset('storage/app/public/webcam/'.$driver->LicenseNo.'_driver'.'.jpg') }}" width="320" style="height: -webkit-fill-available;">
              </div>
              <button type="button" style="margin-left: 1.2rem;" class="btn-sm btn-primary rounded-full" onclick="startWebcam1()">Start Stream</button>
              <button type="button" class="btn-sm btn-primary rounded-full" onclick="captureWebcam1()">Capture Driver Image</button>
              <input type="hidden" name="webcam1_image" id="webcam1_image">
            </div>
          </div>
        </div>
        <!-- Right Section -->
        <div class="flex-1 space-y-2 max-w-lg">
          <div class="webcam-container">
            <div class="webcam-wrapper">
              <div id="webcam2" class="webcam-feed">
                <img src="{{ asset('storage/app/public/webcam/'.$driver->LicenseNo.'_national'.'.jpg') }}" width="320" style="height: -webkit-fill-available;">
              </div>
              <button type="button" style="margin-left: 1.2rem;" class="btn-sm btn-primary rounded-full" onclick="startWebcam2()">Start Stream</button>
              <button type="button" class="btn-sm btn-primary rounded-full" onclick="captureWebcam2()">Capture NationalId Image</button>
              <input type="hidden" name="webcam2_image" id="webcam2_image">
            </div>
          </div>
        </div>
        
      </div>
      <button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Update</button>
    </form>
  </div>
</section>
@endsection

@section('Script')
<script src="{{ asset('plugins/jquery/webcam.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $("#myForm").submit(function(event) {
      event.preventDefault();
      var FirstName = $("#FirstName").val();
      var LicenseNo = $("#LicenseNo").val();
      var PersonType = $("#PersonType").val();

      if (!PersonType) {
        $("#PersonTypeField").addClass("has-error");
        showMessage('Field PersonType is required', 'error');
      } 
      else if (!FirstName) {
        $("#FirstNameField").addClass("has-error");
        showMessage('Field FirstName is required', 'error');
      } else if (!LicenseNo) {
        $("#LicenseNoField").addClass("has-error");
        showMessage('Field National Id is required', 'error');
      }  
      else {
        showMessage('Driver details created successfully.', 'success');
        $("#myForm").unbind('submit').submit();
      }
    });

    $('#PersonType').on('input', function() {
      $('#PersonTypeField').removeClass('has-error').addClass('has-success');
    });
    $('#FirstName').on('input', function() {
      $('#FirstNameField').removeClass('has-error').addClass('has-success');
    });
    $('#LicenseNo').on('change', function() {
      $('#LicenseNoField').removeClass('has-error').addClass('has-success');
    });
  });

  function startWebcam1() {
    Webcam.set({
      width: 270,
      height: 210,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    Webcam.attach('#webcam1');
  }

  function startWebcam2() {
    Webcam.set({
      width: 270,
      height: 210,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    Webcam.attach('#webcam2');
  }

  function captureWebcam1() {
    Webcam.snap(function(data_uri) {
      document.getElementById('webcam1_image').value = data_uri;
      document.getElementById('webcam1').innerHTML = '<img src="' + data_uri + '"/>';
    });
  }

  function captureWebcam2() {
    Webcam.snap(function(data_uri) {
      document.getElementById('webcam2_image').value = data_uri;
      document.getElementById('webcam2').innerHTML = '<img src="' + data_uri + '"/>';
    });
  }
</script>
@endsection
