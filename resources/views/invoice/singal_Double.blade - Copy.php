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
       <form>
        @foreach ($invoice as $invoicies)
        <div class="invoice p-3 mb-3">
          <div class="row">
            <div class="col-md-12">
              <h2 class="page-header" style="text-align-last: ;">
                 <span><img src="{{ asset('dist/img/Tarmallogo.png') }}"   style="margin-left:; width: 15%;"></span>
                 
                <small class="" style="text-align-last:center;margin-left:20% ;">Tarmal Wire Products Ltd</small>
              </h2>
            </div>
          </div>
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
                   <div class="row">
                    <div class="col-md-7">
                      <label>Driver ID</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->D_licenseNo}} " disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
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
            <div class="col-md-6">
            </div>
          &nbsp;
          @if($invoicies->Status!='Entry Approved' && $invoicies->Status!='Pending Entry')
          <div class="card card-default col-md-12">
           <div class="card-header">
              <h3 class="card-title">{{$invoicies->GatepassType}}  Order Details</h3>
           </div>
           <table id="locationTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <!-- <th class="th">Sequence No</th> -->
                  <th class="th">{{$invoicies->GatepassType}} Order No</th>
                  <th class="th">Product Name</th>
                  <th class="th">{{$invoicies->GatepassType}} Quantity(piece)</th>
                  <th class="th">Actual Quantity(piece)</th>
                  <th class="th">Weight(In kg)</th>
                  <th class="th">Actual Weight(In kg)</th>
                  <th class="th">Warehouse</th>
                 </tr>
              </thead>
              <tbody>
                @foreach($g_l_m as $g_l_m) 
                 <tr>
                  <td class="th">{{$g_l_m->OrderNo}}</td>
                  <td class="th">{{$g_l_m->ProductName}}</td>
                  <td class="th">{{$g_l_m->Quantity}}</td>
                  <td class="th">{{$g_l_m->Actual_Quantity}}</td>
                  <td class="th">{{$g_l_m->Weight}}</td>
                  <td class="th">{{$g_l_m->Actual_Weight}}</td>
                  <td class="th">{{$g_l_m->warehouse}}</td>
                 </tr>
                  @endforeach
              </tbody>
           </table>
          </div>
          @endif
          <div class="row no-print">
            <div class="col-12">
              <a href="print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
          </div>
          </div>
          </div>
        @endforeach
       </form>

      </div>
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
@endsection