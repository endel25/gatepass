@extends('layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h4 class="m-0 text-dark">Tarmal Group</h4>
      </div>
  </div>
</div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      @if($userrole_permissions_status[0]->IsRead==1)
      <div class="col-lg-3 col-6">
        <!-- small box -->
        
        <div @if($userrole_permissions_status[0]->IsRead==1 || $userrole_permissions_status[1]->IsRead==1) onclick="document.location='{{URL::to('/')}}/PendingEntry';" style="cursor: pointer;" @endif class="small-box bg-secondary" >
        
          <div class="inner">
            <h7>{{ Session::get('Pending_Entry')}}</h7>
            <p>Pending Entry</p>
          </div>
          <div class="icon">
            <i> <img  class="" src="{{ asset('dist/img/Pending.png') }}" style="height:20%; width: 20%; margin-left: 80%; margin-bottom: 30%; opacity: 0.3;"></i>
          </div>
          <!-- <a href="TABLE?ID="PENDING" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>

      </div>
      @endif
       @if($userrole_permissions_status[1]->IsRead==1)
      <div @if($userrole_permissions_status[1]->IsRead==1 || $userrole_permissions_status[2]->IsRead==1) onclick="document.location='{{URL::to('/')}}/EntryApproved';" style="cursor: pointer;" @endif class="col-lg-3 col-6" >
        <!-- small box<sup style="font-size: 20px"></sup> -->
        <div class="small-box bg-secondary" >
          <div class="inner">
            <h7>{{ Session::get('Entry_Approved')}}</h7>
            <p>Entry Approved</p>
          </div>
          <div class="icon">
            <i> <img  class="" src="{{ asset('dist/img/Complate (1).png') }}" style="height:20%; width: 20%; margin-left: 80%; margin-bottom: 30%; opacity: 0.3;"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      @endif     
       @if($userrole_permissions_status[2]->IsRead==1)
      <div @if($userrole_permissions_status[2]->IsRead==1 || $userrole_permissions_status[4]->IsRead==1)onclick="document.location='{{URL::to('/')}}/Loading';" style="cursor: pointer;" @endif class="col-lg-3 col-6" >
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h7>{{ Session::get('Loading')}}</h7>
            <p>Loading</p>
          </div>
          <div class="icon">
            <i> <img  src="{{ asset('dist/img/Loading.png') }}" style="height:20%; width: 20%; margin-left: 80%; margin-bottom: 30%; opacity: 0.4;"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      @endif
      @if($userrole_permissions_status[3]->IsRead==1)
      <div @if($userrole_permissions_status[3]->IsRead==1 || $userrole_permissions_status[4]->IsRead==1)onclick="document.location='{{URL::to('/')}}/OffLoading';" style="cursor: pointer;" @endif class="col-lg-3 col-6" >
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h7>{{ Session::get('OffLoading')}}</h7>
            <p>OffLoading</p>
          </div>
          <div class="icon">
            <i> <img  src="{{ asset('dist/img/Loading.png') }}" style="height:20%; width: 20%; margin-left: 80%; margin-bottom: 30%; opacity: 0.4;"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      @endif
      @if($userrole_permissions_status[7]->IsRead==1)
      <div  onclick="document.location='{{URL::to('/')}}/Verify';" style="cursor: pointer;" class="col-lg-3 col-6" >
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h7>{{ Session::get('Ve_rify')}}</h7>
            <p>Verify</p>
          </div>
          <div class="icon">
            <i> <img  src="{{ asset('dist/img/Verified.png') }}" style="height:20%; width: 20%; margin-left: 80%; margin-bottom: 30%; opacity: 0.4;"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      @endif
      @if($userrole_permissions_status[4]->IsRead==1)
      <div @if($userrole_permissions_status[4]->IsRead==1 || $userrole_permissions_status[5]->IsRead==1)onclick="document.location='{{URL::to('/')}}/GatepassIssued';" style="cursor: pointer;" @endif class="col-lg-3 col-6" >
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h7>{{ Session::get('Gatepass_Issued')}}</h7>
            <p>Gatepass Issued</p>
          </div>
          <div class="icon">
           <i> <img  src="{{ asset('dist/img/Entry approved.png') }}" style="height:20%; width: 20%; margin-left: 80%; margin-bottom: 30%; opacity: 0.4;"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      @endif
      @if($userrole_permissions_status[5]->IsRead==1)
      <div @if($userrole_permissions_status[5]->IsRead==1)onclick="document.location='{{URL::to('/')}}/ExitApproved';" style="cursor: pointer;"@endif class="col-lg-3 col-6" >
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h7>{{ Session::get('Exit_Approved')}}</h7>
            <p>Exit Approved</p>
          </div>
          <div class="icon">
            <i> <img  src="{{ asset('dist/img/Exit approval.png') }}" style="height:20%; width: 20%;margin-left: 80%; margin-bottom: 30%; opacity: 0.4;"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      @endif
      @if($userrole_permissions_status[6]->IsRead==1)
      <div  onclick="document.location='{{URL::to('/')}}/Rejected';" style="cursor: pointer;" class="col-lg-3 col-6" >
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h7>{{ Session::get('Rejected_S')}}</h7>
            <p>Rejected</p>
          </div>
          <div class="icon">
            <i> <img  src="{{ asset('dist/img/Rejected.png') }}" style="height:20%; width: 20%;margin-left: 80%; margin-bottom: 30%; opacity: 0.4;"></i>
          </div>
          <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      @endif
    </div>
    <div class="row">
      <section class="col-md-6">
        <div class="card">
            <div class="card-header" style="height: 50px;" >
               <b>Pending/Entry Approved </b> Vehicle
                @foreach ($up as $ups)
                @if($ups->IsCreate==1)
               <ol class="float-sm-right" >
                  <a class="btn btn-block btn-secondary btn-sm" href="{{ route('gatepass.create') }}">Create Gate Pass</a>
               </ol>
               @endif 
                @endforeach
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Gatepass No</th>
                        <th>Vehicle No</th>
                        <th>Status</th>
                        <th>Date-Time</th>
                        <!-- <th>VisitFor</th> -->
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                   @foreach ($gatepass as $gatepasses) 
                    @if($name_u != 'Admin')
                      @if($gatepasses->CompanyID == $Company_Name)
                        @if($gatepasses->Status == 'Entry Approved' || $gatepasses->Status== 'Pending Entry')
                           <tr>
                              <th>GP<?php
                            if ($gatepasses->id<10) {
                              echo "0".$gatepasses->id;
                            }
                            else
                            {
                              echo $gatepasses->id;
                            }
                            ?>
                          </th>
                              <td>{{$gatepasses->VehicleNo}}</td>
                              <td>{{$gatepasses->Status}}</td>
                              <td>{{$gatepasses->GatepassEntryTime}}</td>

                              <!-- <td>{{$gatepasses->VisitFor}}</td> -->
                              <td> 
                                @foreach ($up as $ups)
                                  @if($ups->IsUpdate==1)
                                   <a class="fas fa-edit" title="EDIT"  href="{{ route('gatepass.edit',$gatepasses->id) }}"></a>  @endif
                                  @if($ups->IsDelete==1) 
                                    <a class="fas fa-trash-alt" href="gatepass/{{ $gatepasses->id }}/delete"></a>
                                  @endif 
                                  &nbsp;&nbsp;&nbsp;
                                      <a class="fas fa-print" title="PRINT"  href="{{ $gatepasses->id }}/invoice"></a>
                                  @endforeach
                              </td>
                           </tr>
                        @endif
                      @endif 
                    @else
                       @if($gatepasses->Status == 'Entry Approved' || $gatepasses->Status== 'Pending Entry')
                           <tr>
                                        <th>GP<?php
                            if ($gatepasses->id<10) {
                              echo "0".$gatepasses->id;
                            }
                            else
                            {
                              echo $gatepasses->id;
                            }
                            ?>
                          </th>
                              <td>{{$gatepasses->VehicleNo}}</td>
                              <td>{{$gatepasses->Status}}</td>
                              <td>{{$gatepasses->GatepassEntryTime}}</td>
                              <td> 
                                @foreach ($up as $ups)
                                  @if($ups->IsUpdate==1)
                                   <a class="fas fa-edit" title="EDIT"  href="{{ route('gatepass.edit',$gatepasses->id) }}"></a> @endif
                                  @if($ups->IsDelete==1) 
                                  &nbsp;
                                    <a class="fas fa-trash-alt" href="gatepass/{{ $gatepasses->id }}/delete"></a>
                                  @endif
                                  &nbsp;&nbsp;&nbsp;
                                  <a class="fas fa-print" title="PRINT"  href="{{ $gatepasses->id }}/invoice"></a>
                                  @endforeach
                              </td>
                           </tr>
                        @endif
                    @endif
                  @endforeach
                  
                  </tbody>
              </table>
            </div>
        </div>
      </section>
      <section class="col-md-6">
        <div class="card">
            <div class="card-header"style="height: 50px;">
              <b>Loading/OffLoading/Issued/Exit Approved</b> Vehicle
            </div>
            <div class="card-body">
              <input type="hidden" id="" name="">
              <table id="example3" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Gatepass No</th>
                        <th>Vehicle No</th>
                        <th>Status</th>
                        <th>Date-Time</th>
                        <!-- <th>VisitFor</th> -->
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                @foreach ($Exit24 as $gatepasses) 
                  @if($name_u != 'Admin')
                      @if($gatepasses->CompanyID == $Company_Name)
                        @if($gatepasses->Status == 'Gatepass Issued' || $gatepasses->Status == 'Loading' || $gatepasses->Status == 'Verify' ||  $gatepasses->Status== 'Exit Approved' )
                         <tr>
                                        <th>GP<?php
                            if ($gatepasses->id<10) {
                              echo "0".$gatepasses->id;
                            }
                            else
                            {
                              echo $gatepasses->id;
                            }
                            ?>
                          </th>
                            <td>{{$gatepasses->VehicleNo}}</td>
                            <td>{{$gatepasses->Status}}</td>
                            <td>{{$gatepasses->GatepassEntryTime}}</td>
                            <td> 
                              @foreach ($up as $ups)
                                @if($ups->IsUpdate==1)
                                 <a class="fas fa-edit" title="EDIT"  href="{{ route('gatepass.edit',$gatepasses->id) }}"></a> @endif
                                @if($ups->IsDelete==1) 
                                &nbsp;
                                  <a class="fas fa-trash-alt" href="gatepass/{{ $gatepasses->id }}/delete"></a>
                                @endif
                                &nbsp;&nbsp;&nbsp;
                                <a class="fas fa-print" title="PRINT"  href="{{ $gatepasses->id }}/invoice"></a>
                                @endforeach
                            </td>
                         </tr>
                        @endif 
                      @endif
                  @else
                    @if($gatepasses->Status == 'Gatepass Issued' || $gatepasses->Status == 'Loading' ||  $gatepasses->Status== 'Exit Approved' || $gatepasses->Status == 'Verify' )
                         <tr>
                                       <th>GP<?php
                            if ($gatepasses->id<10) {
                              echo "0".$gatepasses->id;
                            }
                            else
                            {
                              echo $gatepasses->id;
                            }
                            ?>
                          </th>
                            <td>{{$gatepasses->VehicleNo}}</td>
                            <td>{{$gatepasses->Status}}</td>
                            <td>{{$gatepasses->GatepassEntryTime}}</td>
                            <td> 
                              @foreach ($up as $ups)
                                @if($ups->IsUpdate==1)
                                 <a class="fas fa-edit" title="EDIT"  href="{{ route('gatepass.edit',$gatepasses->id) }}"></a> @endif
                                @if($ups->IsDelete==1) 
                                &nbsp;&nbsp;&nbsp;
                                  <a class="fas fa-trash-alt" href="gatepass/{{ $gatepasses->id }}/delete"></a>
                                @endif
                                &nbsp;&nbsp;&nbsp;
                                <a class="fas fa-print" title="PRINT"  href="{{ $gatepasses->id }}/invoice"></a>
                                @endforeach
                            </td>
                         </tr>
                        @endif 
                  @endif
                @endforeach

                  
                  </tbody>
              </table>
            </div>
        </div>
      </section>
    </div>
  </div>
</section>
@endsection
@section('UserScriptStr')
<script type="text/javascript">


  setInterval(function()
  { 
    window.location.reload();
  }, 120000);

</script>

@endsection