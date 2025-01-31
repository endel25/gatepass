<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WeighMast| Invoice Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet') }}">
</head>
<body>
<div class="wrapper">
  <section class="invoice">
    <div class="row">
      <div class="col-12">
        <h2 class="page-header" style="text-align-last: center;">
          WeighMast
          <small class="float-right"></small>
        </h2>
      </div>
    </div>
    <div class="row">
          @foreach ($MultiDB as $MultiDBs)
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                      <label>Ticket No</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4">
                      <input value="{{$MultiDBs->ReceiptTicketID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
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
                      <input value="{{$MultiDBs->VehicleID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-7">
                        <label>AccountID</label>
                      </div>
                      <div>
                        <label>:</label>
                      </div>
                      <div class="col-md-4"> 
                        <input value="{{$MultiDBs->AccountID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-7">
                        <label>TransactionMode</label>
                      </div>
                      <div>
                        <label>:</label>
                      </div>
                      <div class="col-md-4"> 
                        <input value="{{$MultiDBs->TransactionMode}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                      </div>
                    </div>
                  </div>
              </div>
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
                        <input value="{{$MultiDBs->DriverID}}{{$MultiDBs->DriverIDLname}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-7">
                        <label>TransactionType</label>
                      </div>
                      <div>
                        <label>:</label>
                      </div>
                      <div class="col-md-4"> 
                        <input value="{{$MultiDBs->TransactionType}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-7">
                        <label>Charges</label>
                      </div>
                      <div>
                        <label>:</label>
                      </div>
                      <div class="col-md-4"> 
                        <input value="{{$MultiDBs->Charges}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                      </div>
                    </div>
                  </div>
              </div>
              &nbsp;
              &nbsp;
            </div>
          @endforeach
            <div class="col-md-6">
              @foreach($field as $fields)
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-7">
                      <label>{{$fields->DisplayName}}</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4">
                      <input value="{{$fields->FieldValue}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <table class="table table-striped">
              <thead>
                 <tr>
                    <th>Gross Weight</th>
                    <th>Gross Time</th>
                    <th>Tare Weight</th>
                    <th>Tare Time</th>
                    <th>Net Weight</th>
                    <th>Scale</th>
                    <th>Product</th>
                    <th>Gate</th>
                    <th>User</th>
                 </tr>
              </thead>
              <tbody>
                @foreach ($MultiTable as $MultiTable)
                    <tr>                                    
                    <td>{{$MultiTable->GrossWeight}}</td>
                    <td>{{$MultiTable->GrossTime}}</td>
                    <td>{{$MultiTable->TareWeight}}</td>
                    <td>{{$MultiTable->TareTime}}</td>
                    <td>{{$MultiTable->NetWeight}}</td> 
                    <td></td> 
                    <td>{{$MultiTable->ProductName}}</td> 
                    <td>{{$MultiTable->GateName}}</td> 
                    <td>{{$MultiTable->userName  }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            <div class="col-md-12">
              <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label>  Total Net Weight</label>
                      </div>
                      <div>
                        <label>:</label>
                      </div>
                      <div class="col-md-2">
                        <input value="{{$MultiTable->totalNetWeight}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                      </div>
                    </div>
                  </div>
                </div>
             </div>       
    </div>
  </section>
</div>
<script> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>

