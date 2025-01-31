@extends('layouts.admin')
@section('content')
<style type="text/css">

</style>
<section class="content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-8">
            <h1>Active Loading Data Warehouse</h1>
         </div>
         @if ($errors->any())
         <div class="alert alert-danger">
            <h6>{{$errors->first()}}</h6>
         </div>
         @endif
      </div>
   </div>
</section>
<section class="content">
   <div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">


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
                        <th>User (Loading Incharge)</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $id="";
                     ?>
                   @foreach($gatepass as $gatepasses)
                    <?php

                     if($id!=$gatepasses->Gatepass_ID) { ?>
                     <tr>
                        <form action="{{URL::to('/')}}/Warehouse_loading" method="POST">
                           <td><button class="fa fa-plus-circle" id="showGP{{$gatepasses->Gatepass_ID}}" style="border: none; position: absolute" value="GP<?php
                            if ($gatepasses->Gatepass_ID<10) {
                              echo "0".$gatepasses->Gatepass_ID;
                            }
                            else
                            {
                              echo $gatepasses->Gatepass_ID;
                            }
                            ?>" onclick="myFunction(this.value);"></button>
                              <button class="fa fa-minus-circle"  id="hideGP{{$gatepasses->Gatepass_ID}}" style="border: none; position: absolute ;display:none; " value="GP<?php
                            if ($gatepasses->Gatepass_ID<10) {
                              echo "0".$gatepasses->Gatepass_ID;
                            }
                            else
                            {
                              echo $gatepasses->Gatepass_ID;
                            }
                            ?>" onclick="hidemyFunction(this.value)"></button>
                              <input type="label" name="Gatepass_ID"  style="font-size: 14px; width:80%; text-align:center; border: none; background: white; flex: 0 0 0%; display: flex;"  value="GP<?php
                            if ($gatepasses->Gatepass_ID<10) {
                              echo "0".$gatepasses->Gatepass_ID;
                            }
                            else
                            {
                              echo $gatepasses->Gatepass_ID;
                            }
                            ?>" readonly></td>
                            <td style="display:none;"><input  name="OrderNo" value="{{$gatepasses->OrderNo}}"></td>
                           <td><input type="label" name="VehicleNo"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->VehicleNo}}" readonly></td>
                           <td><input type="label" name="ProductName"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->ProductName}}" readonly></td>
                           <td><input type="label" name="TransporterID"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->TransporterID}}" readonly></td>
                           <td><input type="label" name="Quantity"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->Quantity}}" readonly></td>
                           <td><input type="hidden" class="Assign_Quantity" name="Assign_Quantity"  value="{{$gatepasses->Assign_Quantity}}">{{$gatepasses->Assign_Quantity}}</td>

                           <td><input type="label" name="Actual_Quantity"  class="Actual_Quantity" required style="font-size: 14px; width:100%; text-align:center;" value="{{$gatepasses->Actual_Quantity}}"></td>
                           <td><select name="whuser" required>
                                 <option value="">select user</option>
                                 @foreach($user as $users)
                                 <option>{{$users->FirstName}}</option>
                                 @endforeach
                              </select></td>
                           <td style="text-align-last: center;">
                              @if($gatepasses->LoadingStatus == "")
                              <button type="submit" name="LoadingStatus" id="Start"  @if($gatepasses->Assign_Quantity=="" || $gatepasses->Assign_Quantity==0) disabled @endif value="Loading" class="btn btn-block btn-primary btn-xs" >Start</button>
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
                        <input type="hidden" name="" id="g_id" value="$gatepasses->Gatepass_ID">
                        <form action="{{URL::to('/')}}/Warehouse_loading" method="POST">

                           <td><input type="label" name="Gatepass_ID"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;"  value="GP<?php
                            if ($gatepasses->Gatepass_ID<10) {
                              echo "0".$gatepasses->Gatepass_ID;
                            }
                            else
                            {
                              echo $gatepasses->Gatepass_ID;
                            }
                            ?>" readonly></td>
                            <td style="display:none;"><input  name="OrderNo" value="{{$gatepasses->OrderNo}}"></td>
                           <td><input type="label" name="VehicleNo"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->VehicleNo}}"  readonly></td>
                           <td><input type="label" name="ProductName"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->ProductName}}" readonly></td>
                           <td><input type="label" name="TransporterID"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->TransporterID}}" readonly></td>
                           <td><input type="label" name="Quantity"  style="font-size: 14px; width:100%; text-align:center; border: none; background: white; flex: 0 0 0%;" value="{{$gatepasses->Quantity}}" readonly></td>
                           <td ><input type="hidden" name="Assign_Quantity" id="Assign_Quantity" required class="Assign_Quantity" value="{{$gatepasses->Assign_Quantity}}">{{$gatepasses->Assign_Quantity}}</td>

                           <td><input type="number" class="Actual_Quantity" name="Actual_Quantity" id="Actual_Quantity{{$gatepasses->Gatepass_ID}}" required value="0" required style="font-size: 14px; width:100%; text-align:center;" min="
                         value="{{$gatepasses->Actual_Quantity}}"></td>
                           <td><select name="whuser" required>
                                 <option value="">select user</option>
                                 @foreach($user as $users)
                                 <option>{{$users->FirstName}}</option>
                                 @endforeach
                              </select></td>
                           <td style="text-align-last: center;">
                              @if($gatepasses->LoadingStatus == "")
                              <button type="submit" name="LoadingStatus"  id="Start"  value="Loading" class="btn btn-block btn-primary btn-xs" @if($gatepasses->Assign_Quantity=="" || $gatepasses->Assign_Quantity==0) disabled @endif>Start</button>
                              @elseif($gatepasses->LoadingStatus == "Loading" )
                              <button type="submit" name="LoadingStatus" value="Complete" class="btn btn-block btn-outline-primary btn-xs">Complete</button>
                           </td>
                              @endif
                        </form>
                     </tr>

                     <?php }
                     ?>

                    <?php $id=$gatepasses->Gatepass_ID;?>
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
  }, 120000);

//   $(function () {
//    var Assign_Quantity =  $('.Assign_Quantity').val();

//   $("Actual_Quantity").keydown(function () {
//     // Save old value.
//     if ((parseInt($(this).val()) <= Assign_Quantity && parseInt($(this).val()) >= 0))
//     $(this).data("old", $(this).val());
//   });
//   $("Actual_Quantity").keyup(function () {
//     // Check correct, else revert back to old value.
//     if ( (parseInt($(this).val()) <= Assign_Quantity && parseInt($(this).val()) >= 0))
//       ;
//     else
//       $(this).val($(this).data("old"));
//   });
// });

   // function actualqty(Assign_Quantity,actualqty)
   // {
   //    var _actualqty= actualqty.value;
   //    if (true)
   //    {
   //       if(Assign_Quantity<=_actualqty)
   //       {
   //          toastr.error('Actual quntity can not be more then Assign quntity ');
   //           $("#Start").prop('disabled',true)
   //          actualqty.value="";

   //       }
   //    }

   // }

  function myFunction(VehicleNumber) {
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
   function hidemyFunction(VehicleNumber) {
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

        // Restricts input for the given textbox to the given inputFilter.
   // function setInputFilter(textbox, inputFilter) {
   //   ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
   //     textbox.addEventListener(event, function() {
   //       if (inputFilter(this.value)) {
   //         this.oldValue = this.value;
   //         this.oldSelectionStart = this.selectionStart;
   //         this.oldSelectionEnd = this.selectionEnd;
   //       } else if (this.hasOwnProperty("oldValue")) {
   //         this.value = this.oldValue;
   //         this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
   //       } else {
   //         this.value = "";
   //       }
   //     });
   //   });
   // }

   // setInputFilter(document.getElementById("Actual_Quantity"), function(value) {
   //   return /^-?\d*[.,]?\d*$/.test(value) && (value === "" || parseInt(value) > 0); });

</script>
@endsection
