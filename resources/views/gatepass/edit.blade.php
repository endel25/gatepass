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
 <style>
        .form-radio {
            width: 15px; /* Adjust the width to make it smaller */
            height: 15px; /* Adjust the height to make it smaller */
        }

    </style>

<section class="content-header">
  <div class="mb-2 flex items-center justify-between">
    <h5 class="text-lg font-semibold dark:text-white-light">Edit Gate-pass #GP{{ str_pad($gatepass->id, 2, '0', STR_PAD_LEFT) }}</h5>
    <a type="button" href="{{ route('gatepass.index') }}" class="btn btn-sm btn-l btn-primary rounded-full">Back</a>
  </div>
</section>
<section class="content">
  <div class="panel">
    <form  class="space-y-2" id="myForm" action="{{ route('gatepass.update',$gatepass->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <!-- Left Section -->
        <div class="flex-1 max-w-lg space-y-4">
          <div class="flex sm:flex-row flex-col">
            <label for="dateTime" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Date Time</label>
            <input id="dateTime" name="dateTime" readonly class="form-input flex-auto" />
          </div>
          <div class="flex sm:flex-row flex-col">
            <label for="GatepassType" class="sm:w-1/3 sm:mr-2">Gatepass Type</label>
            <div class="flex sm:flex-row flex-col">
              <label class="flex items-center cursor-pointer mr-2">
                <input type="radio" {{$gatepass->GatepassType == 'Loading'?'selected':''}} name="GatepassType" value="Loading" class="form-radio" checked />
                <span class="text-white-dark">Loading</span>
              </label>
              <label class="flex items-center cursor-pointer mr-2">
                <input type="radio" {{$gatepass->GatepassType == 'Unloading'?'selected':''}} name="GatepassType" value="Unloading" class="form-radio" />
                <span class="text-white-dark">Unloading</span>
              </label>
              <label class="flex items-center cursor-pointer">
                <input type="radio" {{$gatepass->GatepassType == 'Visit'?'selected':''}} name="GatepassType" value="Visit" class="form-radio" />
                <span class="text-white-dark">Visit</span>
              </label>
            </div>
          </div>

          <div class="flex sm:flex-row flex-col" id="VehicleNoField">
            <label for="VehicleNo" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Vehicle No.</label>
            <input type="text" placeholder="Enter Vehicle No" class="text-xs form-input form-input-sm flex-auto" name="VehicleNo" id="VehicleNo" oninput="this.value = this.value.toUpperCase()" list="VehicleNoList" autocomplete="off" onkeydown="return preventSpace(event)" value="{{$gatepass->VehicleNo}}" readonly>
            <datalist id="VehicleNoList">
            <!-- Populate this datalist dynamically using JavaScript -->
            </datalist>
          </div>
          <div class="flex sm:flex-row flex-col" id="TranspoterField">
            <label for="Transpoter" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Transporter</label>
            <input type="text" placeholder="Enter Transporter Name" class="text-xs form-input form-input-sm flex-auto" name="Transporter" id="Transporter" oninput="this.value = this.value.toUpperCase()" list="TranspoterList" autocomplete="off" value="{{$gatepass->Transporter}}">
            <datalist id="TranspoterList">
            <!-- Populate this datalist dynamically using JavaScript -->
            </datalist>
          </div>
          <div class="flex sm:flex-row flex-col" id="LicenseNoField">
            <label for="LicenseNo" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">National Id</label>
            <input type="text" placeholder="Enter National Id" class="text-xs form-input form-input-sm flex-auto" name="LicenseNo" id="LicenseNo" oninput="this.value = this.value.toUpperCase()" autocomplete="off" value="{{$gatepass->LicenseNo}}">
          </div>
          <div class="flex sm:flex-row flex-col" id="ContactNoField">
            <label for="DriverName" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Driver Name</label>
            <input type="text" placeholder="" class="text-xs form-input form-input-sm flex-auto" name="DriverName" id="DriverName" value="{{$gatepass->DriverName}}" readonly>
          </div>
          @if($gatepass->Status == 'Approved' || $gatepass->GatepassType != 'Visit')
          <div class="flex sm:flex-row flex-col" id="ContactNoField">
            <label class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Tare Weight</label>
            <input type="text" placeholder="" class="text-xs form-input form-input-sm flex-auto" name="TareWeight" id="TareWeight" value="{{$gatepass->TareWeight}}" readonly>
          </div>
          <div class="flex sm:flex-row flex-col" id="ContactNoField">
            <label class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Gross Weight</label>
            <input type="text" placeholder="" class="text-xs form-input form-input-sm flex-auto" name="GrossWeight" id="GrossWeight" value="{{$gatepass->GrossWeight}}" readonly>
          </div>
          <div class="flex sm:flex-row flex-col" id="ContactNoField">
            <label class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Net Weight</label>
            <input type="text" placeholder="" class="text-xs form-input form-input-sm flex-auto" name="NetWeight" id="NetWeight" value="{{$gatepass->NetWeight}}" readonly>
          </div>
          @endif
          <div class="flex sm:flex-row flex-col hidden" id="PurposeField">
            <label for="Persontomeet" class="sm:w-1/3 sm:mr-2">Person to meet</label>
            <select id="Persontomeet"  name="Persontomeet" class="form-select-sm form-input flex-auto">
              <option value="">Select Person</option>
              @foreach($users as $user)
                  <option value="{{$user->FirstName}} {{$user->LastName}}">{{$user->FirstName}} {{$user->LastName}}</option>
              @endforeach
            </select>
          </div>
          <div class="flex sm:flex-row flex-col hidden" id="ExpiredDateField">
            <label for="ExpiredDate" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Expired Date</label>
            <input type="date" class="text-xs form-input form-input-sm flex-auto" name="ExpiredDate" id="ExpiredDate" value="{{$gatepass->ExpiredDate}}" autocomplete="off">
          </div>
          <div class="flex sm:flex-row flex-col">
            <label class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Notes</label>
            <textarea class="text-xs flex-auto form-input form-input-sm" name="Notes">{{$gatepass->Notes}}</textarea>
          </div>
        </div>
        <!-- Right Section -->
        <div class="flex-1 space-y-2 max-w-lg" >
          <div class="webcam-container">
            <div class="webcam-wrapper">
              <div id="webcam1" class="webcam-feed">
                <img src="{{URL::to('/')}}/storage/app/public/webcam/{{$driver->DriverPhoto}}" width="320" id='driverphoto'>
              </div>
              <!-- <button type="button" style="margin-left: 1.2rem;" class="btn-sm btn-primary rounded-full" onclick="startWebcam1()">Start Stream</button>
              <button type="button" class="btn-sm btn-primary rounded-full" onclick="captureWebcam1()">Capture Driver Image</button>-->
              <!-- <input type="hidden" name="webcam1_image" id="webcam1_image">  -->
            </div>
          </div>
        </div>
        <!-- Right Section -->
        <div class="flex-1 space-y-2 max-w-lg">
          <div class="webcam-container">
            <div class="webcam-wrapper">
              <div id="webcam2" class="webcam-feed">
                <img src="{{URL::to('/')}}/storage/app/public/webcam/{{$driver->LicencePhoto}}" width="320"  id="licencephoto">
              </div>
              <!-- <button type="button" style="margin-left: 1.2rem;" class="btn-sm btn-primary rounded-full" onclick="startWebcam2()">Start Stream</button>
              <button type="button" class="btn-sm btn-primary rounded-full" onclick="captureWebcam2()">Capture NationalId Image</button> -->
              <!-- <input type="hidden" name="webcam2_image" id="webcam2_image"> -->
            </div>
          </div>
        </div>
      </div>
      @if($gatepass->Status != 'Exit')
      <button type="submit" id="submitBtn" name="submitBtn" value="Update" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Update</button>
      @endif
      @if($gatepass->Status == 'Pending')
      <button type="submit" id="submitBtn" name="submitBtn" value="Approved" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Approved Entry</button>
      @endif
      @if($gatepass->Status == 'Approved' && ($gatepass->TareWeight != '' || $gatepass->GrossWeight != ''))
      <button type="submit" id="submitBtn" name="submitBtn" value="Loading/Unloading" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Loading/Unloading</button>
      @endif
      @if($gatepass->Status == 'Loading/Unloading' && $gatepass->NetWeight != '' )
      <button type="submit" id="submitBtn" name="submitBtn" value="Issued" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Issued</button>
      @endif
      @if($gatepass->Status == 'Issued' && $gatepass->NetWeight != '' )
      <button type="submit" id="submitBtn" name="submitBtn" value="Exit" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Exit</button>
      @endif

    </form>
  </div>
</section>
<section>
  <div x-data="Vehiclemodal" class="mb-5">
      <!-- button -->
      <div class="flex items-center justify-center">
          <button type="button" class="btn btn-secondary" id="vehiclemodelclick" @click="toggle" style="display:none;">Static modal</button>
      </div>

      <!-- modal -->
      <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
          <div class="flex items-start justify-center min-h-screen px">
              <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-2">
                  <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                      <div class="font-bold text-lg">Add Vehicle</div>
                  </div>
                  <div class="p-5">
                      <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                          <div class="flex sm:flex-row flex-col mb-4" id="VehicleTypeField"> <!-- Added mb-4 class -->
                              <label class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Vehicle Type</label>
                              <select id="G_VehicleType" name="G_VehicleType" class="text-xs flex-1 form-input">
                                  @foreach($vtype as $vtypes)
                                  <option  value="{{$vtypes->FieldValue}}">{{$vtypes->FieldValue}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="flex sm:flex-row flex-col mb-4" id="VehicleNoField">
                              <label for="VehicleNo" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Vehicle No.</label>
                              <input type="text" placeholder="Enter Vehicle No." class="text-xs form-input flex-1" name="G_VehicleNo" id="G_VehicleNo"  oninput="this.value = this.value.toUpperCase()">
                          </div>
                          <div class="flex sm:flex-row flex-col mb-4" id="TransporterField">
                              <label class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Transporter</label>
                              <select id="G_TransporterId" name="G_TransporterId" class="text-xs flex-1 form-input">
                                  @foreach($transporter as $transporters)
                                  <option {{$transporters->id == old('Transporter') ? 'selected' : ''}} value="{{$transporters->id}}">{{$transporters->TransporterName}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="flex sm:flex-row flex-col mb-4">
                              <label class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Notes</label>
                              <textarea class="text-xs flex-1 form-input" id="G_Notes" name="G_Notes"></textarea>
                          </div>
                      </div>
                      <div class="flex justify-end items-center mt-8">
                          <button type="button" id="saveButton" class="btn btn-primary ltr:ml-4 rtl:mr-4">Save</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- script -->
  <script>
      document.addEventListener("alpine:init", () => {
          Alpine.data("Vehiclemodal", (initialOpenState = false) => ({
              open: initialOpenState,

              toggle() {
                  this.open = !this.open;
              },
          }));
      });
  </script>

  <div x-data="Drivermodal" class="mb-5">
      <!-- button -->
      <div class="flex items-center justify-center">
          <button type="button" class="btn btn-secondary" id="drivermodelclick" @click="toggle" style="display:none;">Static modal</button>
      </div>

      <!-- modal -->
       <div class="fixed inset-0 bg-[black]/60 z-[999]  hidden overflow-y-auto" :class="open && '!block'">
                <div class="flex items-start justify-center min-h-screen px-4">
                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-5xl my-8">
                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                            <h5 class="font-bold text-lg">Add Driver</h5>

                        </div>
                        <div class="p-5">
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">

                                <!-- Left Section -->
                                <div class="flex-1 max-w-lg space-y-3">
                                  <div class="flex sm:flex-row flex-col" id="PersonTypeField">
                                    <label for="PersonType" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Person Type</label>
                                    <select id="G_PersonType" name="G_PersonType" class="form-input-sm  form-input">
                                      <option value="Driver">Driver</option>
                                      <option value="Visitor">Visitor</option>
                                    </select>
                                  </div>
                                  <div class="flex sm:flex-row flex-col" id="FirstNameField">
                                    <label for="FirstName" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">First Name</label>
                                    <input type="text" placeholder="Enter First Name" class="form-input form-input-sm flex-auto" name="G_FirstName" id="G_FirstName">
                                  </div>
                                  <div class="flex sm:flex-row flex-col" id="LastNameField">
                                    <label for="LastName" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Last Name</label>
                                    <input type="text" placeholder="Enter Last Name" class=" form-input form-input-sm flex-auto" name="G_LastName" id="G_LastName" >
                                  </div>
                                  <div class="flex sm:flex-row flex-col" id="LicenseNoField">
                                    <label for="LicenseNo" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">National Id</label>
                                    <input type="text" placeholder="Enter National Id" class="form-input form-input-sm flex-auto" name="G_LicenseNo" id="G_LicenseNo" oninput="this.value = this.value.toUpperCase()">
                                  </div>
                                  <div class="flex sm:flex-row flex-col" id="ContactNoField">
                                    <label for="ContactNo" class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Contact No.</label>
                                    <input type="text" placeholder="Enter Contact No." class="form-input form-input-sm flex-auto" name="G_ContactNo" id="G_ContactNo" x-mask='999-9999999'>
                                  </div>
                                  <div class="flex sm:flex-row flex-col">
                                    <label class="mb-0 sm:w-1/2 sm:ltr:mr-2 rtl:ml-2">Notes</label>
                                    <textarea class="form-input-sm flex-auto form-input" name="G_Notes" id="G_Notes"></textarea>
                                  </div>
                                </div>

                                <!-- Right Section -->
                                <div class="flex-1 space-y-2 max-w-lg" >
                                  <div class="webcam-container">
                                    <div class="webcam-wrapper">
                                      <div id="G_webcam1" class="webcam-feed">
                                        <img src="{{asset('dist/img/webcam.png')}}" width="320">
                                      </div>
                                      <button type="button" style="margin-left: 1.2rem;" class="btn-sm btn-primary rounded-full" onclick="startWebcam1()">Start Stream</button>
                                      <button type="button" class="btn-sm btn-primary rounded-full" onclick="captureWebcam1()">Capture Driver Image</button>
                                      <input type="hidden" name="G_webcam1_image" id="G_webcam1_image">
                                    </div>
                                  </div>
                                </div>
                                <!-- Right Section -->
                                <div class="flex-1 space-y-2 max-w-lg">
                                  <div class="webcam-container">
                                    <div class="webcam-wrapper">
                                      <div id="G_webcam2" class="webcam-feed">
                                        <img src="{{asset('dist/img/webcam.png')}}" width="320" >
                                      </div>
                                      <button type="button" style="margin-left: 1.2rem;" class="btn-sm btn-primary rounded-full" onclick="startWebcam2()">Start Stream</button>
                                      <button type="button" class="btn-sm btn-primary rounded-full" onclick="captureWebcam2()">Capture NationalId Image</button>
                                      <input type="hidden" name="G_webcam2_image" id="G_webcam2_image">
                                    </div>
                                  </div>
                                </div>

                            </div>

                            <div class="flex justify-end items-center mt-8">
                                <button type="button" id="saveDriverButton" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  </div>
  <!-- script -->
  <script>
      document.addEventListener("alpine:init", () => {
          Alpine.data("Drivermodal", (initialOpenState = false) => ({
              open: initialOpenState,

              toggle() {
                  this.open = !this.open;
              },
          }));
      });
  </script>
</section>

@endsection
@section('Script')
<script  src="{{ asset('plugins/jquery/webcam.min.js') }}"></script>
<script>
    // Function to toggle fields based on selected Gatepass Type
    function toggleFields() {
        var gatepassType = document.querySelector('input[name="GatepassType"]:checked').value;

        // Show/hide fields based on Gatepass Type
        if (gatepassType === 'Visit') {
            document.getElementById('PurposeField').classList.remove('hidden');
            document.getElementById('ExpiredDateField').classList.remove('hidden');
            document.getElementById('VehicleNoField').classList.add('hidden');
            document.getElementById('TranspoterField').classList.add('hidden');
            document.getElementById('LicenseNoField').classList.add('hidden');
        } else {
            document.getElementById('PurposeField').classList.add('hidden');
            document.getElementById('ExpiredDateField').classList.add('hidden');
            document.getElementById('VehicleNoField').classList.remove('hidden');
            document.getElementById('TranspoterField').classList.remove('hidden');
            document.getElementById('LicenseNoField').classList.remove('hidden');
        }
    }

    // Function to initialize form based on initial Gatepass Type onload
    function initializeForm() {
        toggleFields(); // Toggle fields based on initial Gatepass Type
    }

    // Trigger initializeForm function when the page loads
    window.onload = initializeForm;

    // Trigger toggleFields function whenever Gatepass Type changes
    document.querySelectorAll('input[name="GatepassType"]').forEach(item => {
        item.addEventListener('change', toggleFields);
    });
</script>
<script>

// Web camras
  function startWebcam1() {
    Webcam.set({
      width: 270,
      height: 210,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    Webcam.attach('#G_webcam1');
  }
  function startWebcam2() {
    Webcam.set({
      width: 270,
      height: 210,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    Webcam.attach('#G_webcam2');
  }
  function captureWebcam1() {
    Webcam.snap(function(data_uri) {
      document.getElementById('G_webcam1_image').value = data_uri;
      document.getElementById('G_webcam1').innerHTML = '<img src="' + data_uri + '"/>';
    });
  }
  function captureWebcam2() {
    Webcam.snap(function(data_uri) {
      document.getElementById('G_webcam2_image').value = data_uri;
      document.getElementById('G_webcam2').innerHTML = '<img src="' + data_uri + '"/>';
    });
  }

// Dropdown
  document.addEventListener("DOMContentLoaded", function(e) {
      // seachable
      var options = {
          searchable: true
      };
      NiceSelect.bind(document.getElementById("Persontomeet"), options);
  });
//Real time clock
  $( document ).ready(function() {
    setInterval(function()
    {
       var dt = new Date($.now());

       var _day = dt.getDate();
       var _Month = dt.getMonth() + 1;
       var _Year = dt.getFullYear();

       var _Hour = dt.getHours();
       var _minute = dt.getMinutes();
       var _Secound = dt.getSeconds();

       var _days = _day>9?_day:"0"+_day;
       var _Months = _Month>9?_Month:"0"+_Month
       var _Hours = _Hour>9?_Hour:"0"+_Hour;
       var _minutes = _minute>9?_minute:"0"+_minute;
       var _Secounds = _Secound>9?_Secound:"0"+_Secound;

       var d=_days + "/" +_Months+ "/" +_Year+ " " +_Hours + ":" + _minutes + ":" + _Secounds;
       $("#dateTime").val(d);

    }, 1000);
  });

//Gatepasstype on change
  document.addEventListener('DOMContentLoaded', function() {
    const gatepassTypeRadios = document.querySelectorAll('input[name="GatepassType"]');
    const driverNameLabel = document.querySelector('label[for="DriverName"]');
    const driverNameInput = document.querySelector('#DriverName');
    const transporterField = document.querySelector('#TranspoterField');
    const purposeField = document.querySelector('#PurposeField');
    const expiredDateField = document.querySelector('#ExpiredDateField');

    gatepassTypeRadios.forEach(radio => {
      radio.addEventListener('change', function() {
        if (this.value === 'Visit') {
          driverNameLabel.textContent = 'Visitor Name';
          driverNameInput.placeholder = 'Enter Visitor Name';
          transporterField.classList.add('hidden');
          purposeField.classList.remove('hidden');
          expiredDateField.classList.remove('hidden');
        } else {
          driverNameLabel.textContent = 'Driver Name';
          driverNameInput.placeholder = '';
          transporterField.classList.remove('hidden');
          purposeField.classList.add('hidden');
          expiredDateField.classList.add('hidden');
        }
      });
    });
  });

//Vehicle

  $('#VehicleNo').on('keyup', function() {

      var input = $(this).val().trim();
      if (input) {

              fetchVehicleNo(input);

      }
  });

  function fetchVehicleNo(input) {
    $.ajax({
        url: "{{ url('/vehiclelist') }}",
        method: 'POST',
        data: {
            query: input
        },
        success: function (response) {
            $('#VehicleNoList').empty();
            if (response) {
                response.forEach(function (VehicleNos) {
                    $('#VehicleNoList').append("<option value='" + VehicleNos.VehicleNo + "'>" +
                        VehicleNos.VehicleNo +
                        "</option>");
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching vendors:', error);
        }
    });
  }

  $('#VehicleNo').on('change', function() {

      var input = $(this).val().trim();
      if (input) {
          CheckVehicleNo(input);
      }
  });

  function CheckVehicleNo(input) {
    $.ajax({
        url: "{{ url('/vehiclecheck') }}",
        method: 'POST',
        data: {
            query: input
        },
        success: function (response) {
          var count=response.count;
            if (count == 1) {
              var VehicleNo=response.vehicledata.VehicleNo;
              var TransporterName=response.vehicledata.TransporterName;


              $('#VehicleNo').val(VehicleNo);
              $('#Transpoter').val(TransporterName);
              $('#submitBtn').prop('disabled',false);
            } else {
              vehicleshowAlert()

            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching vendors:', error);
        }
    });
  }

  async function vehicleshowAlert() {
    const vehicleswalWithBootstrapButtons = window.Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-secondary',
            cancelButton: 'btn btn-dark ltr:mr-3 rtl:ml-3'
        },
        buttonsStyling: false
    });

    const result = await vehicleswalWithBootstrapButtons.fire({
        title: 'No vehicle found in the master record',
        text: "Do you add to wish the vehicle?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'YES',
        cancelButtonText: 'NO',
        reverseButtons: true,
        padding: '2em'
    });

    if (result.value) {

      $('#G_VehicleNo').val($('#VehicleNo').val());
      $('#vehiclemodelclick').trigger("click");

    } else if (result.dismiss === window.Swal.DismissReason.cancel) {
        $('#VehicleNo').val('');
    }
  }

  $('#saveButton').click(function() {
      // Clear any previous error messages
      $('#error-message').hide().text('');

      // Collect form data
      var formData = {
          VehicleType: $('#G_VehicleType').val(),
          VehicleNo: $('#G_VehicleNo').val(),
          TransporterId: $('#G_TransporterId').val(),
          Notes: $('#G_Notes').val(),
      };

      // Validate form data
      var isValid = true;
        if (formData.VehicleType === '' || formData.VehicleNo === '' || formData.TransporterId === '') {
            isValid = false;
        }



      if (!isValid) {
          showMessage('Please fill out all fields.','error');
          return;
      }

      // Perform AJAX request
      $.ajax({
          type: 'POST',
          url: '{{ url('/save_vehicle') }}', // Replace with your endpoint URL
          data: formData,
          success: function(response) {
             if (response.success == '1') {
                showMessage('Vehicle create successfully','success');
                $('#Transpoter').val(response.TransporterName);
                $('#vehiclemodelclick').trigger("click");
             }
             else
             {
                showMessage(response.error,'error');
             }
          },
          error: function(error) {
              // Handle error
            showMessage('An error occurred. Please try again.','error');
          }
      });
  });


// Transpoter
  $('#Transpoter').on('keyup', function() {
      var input = $(this).val().trim();
      if (input) {
              fetchTranspoter(input);
      }
  });

  function fetchTranspoter(input) {
    $.ajax({
        url: "{{ url('/transporterlist') }}",
        method: 'POST',
        data: {
            query: input
        },
        success: function (response) {
            $('#TranspoterList').empty();
            if (response) {
                response.forEach(function (Transpoters) {
                    $('#TranspoterList').append("<option value='" +Transpoters.TransporterName+ "'>" +Transpoters.TransporterName+
                        "</option>");
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching vendors:', error);
        }
    });
  }

  $('#Transpoter').on('change', function() {
      var input = $(this).val().trim();
      if (input) {
          CheckTranspoter(input);
      }
  });

  function CheckTranspoter(input) {
    $.ajax({
        url: "{{ url('/transportercheck') }}",
        method: 'POST',
        data: {
            query: input
        },
        success: function (response) {
          var count=response.count;
            if (count == 1) {
              var TransporterName=response.transporterdata.TransporterName;
              $('#Transpoter').val(TransporterName);
            } else {

            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching vendors:', error);
        }
    });
  }

//Driver
  $('#LicenseNo').on('change', function() {

      var input = $(this).val().trim();
      var GatepassType = $('input[name="GatepassType"]:checked').val();
      if (input) {
          CheckLicenseNo(input,GatepassType);
      }
  });

  async function drivershowAlert() {
    const driverswalWithBootstrapButtons = window.Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-secondary',
            cancelButton: 'btn btn-dark ltr:mr-3 rtl:ml-3'
        },
        buttonsStyling: false
    });

    const result = await driverswalWithBootstrapButtons.fire({
        title: 'No driver found in the master record',
        text: "Do you add to wish the driver?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'YES',
        cancelButtonText: 'NO',
        reverseButtons: true,
        padding: '2em'
    });

    if (result.value) {

     $('#G_LicenseNo').val($('#LicenseNo').val());
      $('#drivermodelclick').trigger("click");

    } else if (result.dismiss === window.Swal.DismissReason.cancel) {
        $('#LicenseNo').val('');
    }
  }

  function CheckLicenseNo(input,GatepassType) {
    $.ajax({
        url: "{{ url('/licensenocheck') }}",
        method: 'POST',
        data: {
            query: input,
            GatepassType:GatepassType
        },
        success: function (response) {
          var count=response.count;
            if (count == 1) {
              var firstName=response.driverdata.FirstName;
              var lastName=response.driverdata.LastName;
              var DriverPhoto=response.driverdata.DriverPhoto;
              var LicencePhoto=response.driverdata.LicencePhoto;
              var fullName = firstName + ' ' + lastName;
              $('#DriverName').val(fullName);
                if (DriverPhoto != "") {
                  document.getElementById('driverphoto').src = "{{URL::to('/')}}/storage/app/public/webcam/" + DriverPhoto;
                } if (LicencePhoto != "") {
                  document.getElementById('licencephoto').src = "{{URL::to('/')}}/storage/app/public/webcam/" + LicencePhoto;
                }
            } else {


               drivershowAlert()


            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching vendors:', error);
        }
    });
  }

  $('#saveDriverButton').click(function() {

      // Validate the mandatory fields
      const personType = document.getElementById('G_PersonType').value;
      const firstName = document.getElementById('G_FirstName').value;
      const licenseNo = document.getElementById('G_LicenseNo').value;
      const webcam1Image = document.getElementById('G_webcam1_image').value;
      const webcam2Image = document.getElementById('G_webcam2_image').value;

      if (!personType || !firstName || !licenseNo || !webcam1Image || !webcam2Image) {
          showMessage('Please fill all mandatory fields and capture both images.','error')
           return;
      }


      // Collect the form data
      const formDataDriver = new FormData();
      formDataDriver.append('PersonType', personType);
      formDataDriver.append('FirstName', firstName);
      formDataDriver.append('LastName', document.getElementById('G_LastName').value);
      formDataDriver.append('LicenseNo', licenseNo);
      formDataDriver.append('ContactNo', document.getElementById('G_ContactNo').value);
      formDataDriver.append('Notes', document.getElementById('G_Notes').value);
      formDataDriver.append('webcam1_image', webcam1Image);
      formDataDriver.append('webcam2_image', webcam2Image);


      // Perform AJAX request
      $.ajax({
            type: 'POST',
            url: '{{ url('/save_driver') }}', // Replace with your endpoint URL
            data: formDataDriver,
            processData: false,  // Important!
            contentType: false,  // Important!
            cache: false,
            success: function(response) {
                if (response.success == '1') {
                    showMessage('Driver created successfully', 'success');
                    $('#drivermodelclick').trigger("click");

                    const lastName = document.getElementById('G_LastName').value;
                    const DriverPhoto = response.DriverPhoto;
                    const LicencePhoto = response.LicencePhoto;
                    const fullName = firstName + ' ' + lastName;
                    $('#DriverName').val(fullName);

                    if (DriverPhoto != "") {
                        document.getElementById('driverphoto').src = "{{URL::to('/')}}/storage/app/public/webcam/" + DriverPhoto;
                    }
                    if (LicencePhoto != "") {
                        document.getElementById('licencephoto').src = "{{URL::to('/')}}/storage/app/public/webcam/" + LicencePhoto;
                    }
                } else {
                    showMessage(response.error, 'error');
                }
            },
            error: function(error) {
                // Handle error
                showMessage('An error occurred. Please try again.', 'error');
            }
        });
  });
</script>
@endsection
