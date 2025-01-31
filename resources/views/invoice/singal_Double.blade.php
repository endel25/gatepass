@extends('layouts.admin')
@section('content')
<style type="text/css">
  .th{text-align: center;}
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        @foreach ($invoice as $invoicies)
        @if($invoicies->Status!="Exit Approved")
        <h1>Gatepass In</h1>
        @else
        <h1>Gatepass Out</h1>
        @endif
        @endforeach
      </div>
      <div class="col-sm-6">
            <ol class="float-sm-right">
            <a class="btn btn-block btn-primary" href="{{ route('home') }}">Back</a>
            </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        @foreach ($invoice as $invoicies)
        <div class="invoice p-3 mb-3">
          <div class="row">
      <div class="col-md-12">

        <h2 class="page-header" style="text-align-last: ;">
           <span><img src="{{ asset('dist/img/Tarmallogo.png') }}"   style="margin-left:1%; width: 15%;"><h2 style="margin-left:25%; margin-top: %; font: bold;">Tarmal Wire Products Ltd</h2></span>
        </h2>
      </div>
    </div>
          &nbsp;
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <input type="hidden" id="datetime" value="{{$invoicies->GatepassEntryTime}}" name="">
                    <input type="hidden" id="Outdatetime" value="{{$invoicies->GatepassExitTime}}" name="">
                    <div class="col-md-7">
                      <label>Gatepass No</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4">
                      <input value="GP0{{$invoicies->id}}" disabled=""  style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <input type="hidden" id="datetime" value="{{$invoicies->GatepassEntryTime}}" name="">
                    <input type="hidden" id="Outdatetime" value="{{$invoicies->GatepassExitTime}}" name="">
                    <div class="col-md-7">
                      <label>In Date</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4">
                      <input value="" disabled="" id="date" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                      <label>In Time</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4">
                      <input value="" disabled="" id="time" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                      <label>Vehicle No</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4">
                      <input value="{{$invoicies->VehicleNo}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                      <label>Company Name</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4">
                      <input value="{{$invoicies->CompanyID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              @if($invoicies->VisitFor == 'Loading')
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                      <label>Transporter</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4">
                      <input value="{{$invoicies->TransporterID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>  
              @endif          
            </div>
            <div class="col-md-6">   
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                      <label>Driver</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->DriverID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
               @if($invoicies->VisitFor == 'Loading')
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                  <label>National ID</label>
                </div>
                <div>
                  <label>:</label>
                </div>
                <div class="col-md-4"> 
                  <input value="{{$invoicies->D_licenseNo}} " disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                </div>
                  </div>
                </div>
              </div>
              @endif

              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                    <label>Visit For</label>
                  </div>
                  <div>
                    <label>:</label>
                  </div>
                  <div class="col-md-4"> 
                    <input value="{{$invoicies->VisitFor}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                  </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                    <label>Status</label>
                  </div>
                  <div>
                    <label>:</label>
                  </div>
                  <div class="col-md-4"> 
                    <input value="{{$invoicies->Status}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                  </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                      <label>Out Date</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input  disabled="" id="Outdate" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                      <label>Out Time</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input  disabled="" id="Outtime" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>                
            </div>
          </div>
          
        @endforeach
      </div>
    </div>
  </div>
  <div class="row no-print" id="myclick">
    <div class="col-12 text-center">
      <button  onclick="myfunforprint()" target="_blank" class="btn btn-primary "><i class="fas fa-print"></i> Print</button>
    </div>
  </div>
</section>
@endsection
 @section('UserScriptStr')
<script>
 
    var date=$('#datetime').val();
    var Outdatetime=$('#Outdatetime').val();
    var Date_d = date.split(" ")[0];
    var Date_t = date.split(" ")[1]; 
    var Outdate = Outdatetime.split(" ")[0];
    var Outtime = Outdatetime.split(" ")[1]; 
      $('#date').val(Date_d);
      $('#time').val(Date_t);
      $('#Outdate').val(Outdate);
      $('#Outtime').val(Outtime);

</script>
<script>
    function myfunforprint(){
            document.getElementById("myclick").style.display="none";
            document.getElementById("myfooter").style.display="none";
            window.print();
            document.getElementById("myclick").style.display="block";
            document.getElementById("myfooter").style.display="block";  
    }
</script>
@endsection