@extends('layouts.admin')
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
        
         <div class="col-sm-12">
            <h1>In Progress Loading Data Warehouse</h1>
         </div>
         
      </div>
   </div>
</section>
<section class="content">
   <div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               @if ($errors->any())
                  <div class="alert alert-danger">
                     <h6>{{$errors->first()}}</h6>
                  </div>
               @endif 
               @if ($message = Session::get('success'))
               <div class="alert alert-success">
                  <p>{{ $message }}</p>
               </div>
               @endif 
               @if ($message = Session::get('danger'))
               <div class="alert alert-danger">
                  <p>{{ $message }}</p>
               </div>
               @endif 
               <table id="example13" class="table table-bordered table-striped">
                  <thead>
                     <tr>

                        <th>Gatepass No</th>
                        <th>Vehicle No</th>
                        <th>Product Name</th>
                        <th>Transporter Name</th>
                        <th>Quantity</th>
                        <th>Assign Qty</th>
                        <th>Actual Quantity</th>
                        <th>User (Warehosue Incharge)</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody> 
                     <?php $id="";
                     ?>
                   @foreach($gatepass as $gatepasses)
                   @if($gatepasses->User_incharge==$user_name[0]->FirstName || $UserRoleName[0]->UserRoleName=='WarehouseSupervisor')
                    <?php 

                     if($id!=$gatepasses->Gatepass_ID) { ?>
                     <tr>
                        <form action="{{URL::to('/')}}/Warehouse_loading" method="POST">
                           <td style="display:none;"><input  name="OrderNo" value="{{$gatepasses->OrderNo}}"></td>
                            <td style="display:none;"><input  name="product_Weight" value="{{$gatepasses->product_Weight}}"></td>
                           <td><button class="fa fa-plus-circle" id="showGP{{$gatepasses->Gatepass_ID}}" style="border: none; position: absolute" value="GP{{$gatepasses->Gatepass_ID}}" onclick="lmyFunction(this.value);"></button>
                              <button class="fa fa-minus-circle"  id="hideGP{{$gatepasses->Gatepass_ID}}" style="border: none; position: absolute ;display:none; " value="GP{{$gatepasses->Gatepass_ID}}" onclick="lhidemyFunction(this.value)"></button>
                              <input type="label" name="Gatepass_ID"  style="font-size: 14px; width:80%; text-align:center; border: none; background: white; flex: 0 0 0%; display: flex;"  value="GP{{$gatepasses->Gatepass_ID}}" readonly></td>
                           <td><input type="label" name="VehicleNo"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->VehicleNo}}" readonly></td>
                            <td style="display:none;"><input type="label" name="VehicleNo"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->VehicleNo}}" readonly></td>
                           <td><input type="label" name="ProductName"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->ProductName}}" readonly></td>
                           <td><input type="label" name="TransporterID"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->TransporterID}}" readonly></td>
                           <td><input type="label" name="Quantity"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->Quantity}}" readonly></td>
                           <td><input type="hidden" class="Assign_Quantity" name="Assign_Quantity"  value="{{$gatepasses->Assign_Quantity}}">{{$gatepasses->Assign_Quantity}}</td>
                           
                           <td><input type="label" name="Actual_Quantity" required style="font-size: 14px; width:100%; text-align:center;" value="{{$gatepasses->Actual_Quantity}}"></td> 
                           <td><input type="label" name="whuser"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->User_incharge}}" readonly></td>
                           <td style="text-align-last: center;">
                              @if($gatepasses->LoadingStatus == "")
                              <button type="submit" name="LoadingStatus"  value="Loading" class="btn btn-block btn-outline-primary btn-xs">Start</button>

                              @elseif($gatepasses->LoadingStatus == "Loading" )
                               <button type="submit"  name="LoadingStatus" value="Complete" class="btn btn-block btn-outline-primary btn-xs">Complete</button>
                           </td>
                              @endif
                        </form>
                     </tr>
                   <?php } 
                    else
                     {   ?>
                     <tr  style="display: none;" id="<?php echo 'GP'.$gatepasses->Gatepass_ID;?>">
                        <form action="{{URL::to('/')}}/Warehouse_loading" method="POST">
                           <td style="display:none;"><input  name="OrderNo" value="{{$gatepasses->OrderNo}}"></td>
                            <td style="display:none;"><input  name="product_Weight" value="{{$gatepasses->product_Weight}}"></td>
                           <td><input type="label" name="Gatepass_ID"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;"  value="GP{{$gatepasses->Gatepass_ID}}" readonly></td>
                           <td><input type="label" name="VehicleNo"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->VehicleNo}}"  readonly></td>
                           <td><input type="label" name="ProductName"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->ProductName}}" readonly></td>
                             <td><input type="label" name="TransporterID"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->TransporterID}}" readonly></td>
                           <td><input type="label" name="Quantity"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->Quantity}}" readonly></td>
                           <td><input type="hidden" class="Assign_Quantity" name="Assign_Quantity"  value="{{$gatepasses->Assign_Quantity}}">{{$gatepasses->Assign_Quantity}}</td>
                           
                           <td><input type="label" name="Actual_Quantity"  required style="font-size: 14px; width:100%; text-align:center;" value="{{$gatepasses->Actual_Quantity}}"></td>
                           <td><input type="label" name="whuser"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->User_incharge}}" readonly></td>
                           <td style="text-align-last: center;">
                              @if($gatepasses->LoadingStatus == "")
                              <button type="submit" name="LoadingStatus"  value="Loading" class="btn btn-block btn-outline-primary btn-xs">Start</button>
                              @elseif($gatepasses->LoadingStatus == "Loading" )
                              <button type="submit" name="LoadingStatus" value="Complete" class="btn btn-block btn-outline-primary btn-xs">Complete</button>
                           </td>
                              @endif
                        </form>
                     </tr>

                     <?php }
                     ?>
                    
                    <?php $id=$gatepasses->Gatepass_ID;?>
                    @endif
                   @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
@endsection
@section('UserScriptStr')
<script type="text/javascript">
  setInterval(function()
  { 
    window.location.reload();
  }, 300000);

   function lmyFunction(VehicleNumber) {
       event.preventDefault();
        var elms=document.querySelectorAll("[id='"+VehicleNumber+"']");
         if(elms.length < 1){

         console.log("none");
        }
         else{
        for(var i = 0; i < elms.length; i++) {
           elms[i].style.display=''; 
        }
           document.getElementById("show"+VehicleNumber).style.display="none";
            document.getElementById("hide"+VehicleNumber).style.display="";
         }
   }
   function lhidemyFunction(VehicleNumber) {
       event.preventDefault();
        var elms=document.querySelectorAll("[id='"+VehicleNumber+"']");
        if(elms.length < 1){

         console.log("none");
        }
        else{
          for(var i = 0; i < elms.length; i++) {
           elms[i].style.display='none'; 
        }
            document.getElementById("show"+VehicleNumber).style.display="";
            document.getElementById("hide"+VehicleNumber).style.display="none";
        }
       
        // $('#hide').show();
   }
  
</script>
@endsection