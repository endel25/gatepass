@extends('layouts.admin')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Invoice</h1>
      </div>
      <div class="col-sm-6">
            <ol class="float-sm-right">
            <a class="btn btn-block btn-primary" href="{{ route('gatepass.index') }}">Back</a>
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
           @foreach ($emailSchedule as $emailSchedule)
                @if($emailSchedule->Active == '1')
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-6"></div>
                        <label>Email To : </label>&nbsp;&nbsp;
                        <input type="email" name="" id="mail">
                        <div class="col-md-2">
                            <a class="btn btn-block bg-gradient-info btn-sm" onclick="createPDF({{$invoicies->ReceiptTicketID}})">SendMail</a>
                        </div>
                    </div> 
                  </div>
                @endif
              @endforeach
          <div class="row">
            <div class="col-md-12">
              <h2 class="page-header" style="text-align-last: center;">
                 WeighMast
                <small class="float-right"></small>
              </h2>
            </div>
          </div>
         <div class="row">
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
                      <input value="{{$invoicies->ReceiptTicketID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
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
                      <input value="{{$invoicies->VehicleID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <label>Account</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->AccountID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-md-7">
                      <label>Transaction Mode</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->TransactionMode}} " disabled="" style="border: none; background: white; flex: 0 0 0%; ">
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
                      <input value="{{$invoicies->DriverID}} {{$invoicies->DriverIDLname}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                
                   <div class="row">
                    <div class="col-md-7">
                      <label>Transaction Type</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->TransactionType}} " disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <label>Product</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->ProductID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <label>Gate</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->GateID}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <label>Charges</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->Charges}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <label>User</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-4"> 
                      <input value="{{$invoicies->CreatedBy}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>              
            </div>
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
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Gross Weight</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-5">
                      <input value="{{number_format((float)$invoicies->GrossWeight, 1, '.', '')}} {{$invoicies->WeightUnit}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-5">
                      <label>Gross Time</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-6">
                      <input value="{{$invoicies->GrossTime}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Tare Weight</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-5">
                      <input value="{{number_format((float)$invoicies->TareWeight, 1, '.', '')}} {{$invoicies->WeightUnit}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-5">
                      <label>Tare Time</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-6">
                      <input value="{{$invoicies->TareTime}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Net Weight</label>
                    </div>
                    <div>
                      <label>:</label>
                    </div>
                    <div class="col-md-5">
                      <input value="{{number_format((float)$invoicies->NetWeight, 1, '.', '')}} {{$invoicies->WeightUnit}}" disabled="" style="border: none; background: white; flex: 0 0 0%; ">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              
            </div>
          </div>
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
