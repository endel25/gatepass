<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tarmal Groups| Receipt Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="`/5ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet') }}">
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
</head>
<body>
  <style type="text/css">
    .th{text-align: center;}
  </style>
<div class="wrapper">
  <section class="invoice">
    <div class="row">
      <div class="col-12">
        <h2 class="page-header" style="text-align-last: center;">
         <!--   <span><img src="{{ asset('dist/img/Tarmallogo.png') }}"   style="margin-left: 25px; width: 80%;"></span> -->
          Tarmal Wire Products Ltd
          <small class="float-right"></small>
        </h2>
      </div>
    </div>
     @foreach ($invoice as $invoicies)
        <div class="invoice p-3 mb-3">
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
                      <label>Date</label>
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
                  <div class="row">
                    <div class="col-md-7">
                      <label>Vehicle No</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->VehicleNo}}" disabled=""  style="border: none; background: white; flex: 0 0 0%;">
                    </div>
                  </div>
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
                    <div class="row">
                    <div class="col-md-7">
                      <label>Transporter</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->TransporterID}} " disabled="" style="border: none; background: white; flex: 0 0 0%; ">
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
              &nbsp;
              &nbsp;
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
               <div class="row">
                
               </div>
          </div>
          
        </div>
         @if($invoicies->Status!='Entry Approved' && $invoicies->Status!='Pending Entry')
          <div class="card card-default col-md-12">
           <div class="card-header">
              <h3 class="card-title">{{$invoicies->GatepassType}} Order Details</h3>
           </div>
           <table id="locationTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <!-- <th class="th">Sequence No</th> -->
                  <th class="th">{{$invoicies->GatepassType}} Order No</th>
                  <th class="th">Product Name</th>
                  <th class="th">Quantity(piece)</th>
                  <th class="th">Actual Quantity(piece)</th>
                  <th class="th">Weight(In kg)</th>
                  <th class="th">Actual Weight(In kg)</th>
                  <th class="th">Warehouse</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($g_l_m as $g_l_m) 
                 <tr>
                  <!-- <td class="th">{{$g_l_m->Sequenceno}}</td> -->
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
          @endforeach         
  </section>
</div>
<script> 
  window.addEventListener("load", window.print()); 
    
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

</body>
</html>

