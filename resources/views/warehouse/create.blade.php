@extends('layouts.admin')
@section('content')
<style type="text/css">
   .th{text-align: center;}
</style>
<section class="content-header">
   <div class="card card-default">
      <div class="card-header">
         <h3 class="card-title">Warehouse Managment</h3>
         <div class="card-tools">
            <ol class="breadcrumb float-sm-right">
               <a class="btn btn-block btn-primary btn-sm" href="{{ route('warehouse.index') }}"> Back</a>
            </ol>
         </div>
      </div>
   </div>
   <div class="container">
      @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
         {{ $error }}
      </div>
      @endforeach
      @endif 
   </div>
   <form action="" method="POST">
      @csrf
      <div class="card card-default col-md-12">
         <div class="card-header">
            <h3 class="card-title">Add Warehouse</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Warehouse No <sup class="" style="font-size: 7px;"><i class="fas fa-asterisk text-danger"></i></sup></label>
                     <input class="form-control form-control-sm" type="text" required="" name="warehouseNumber" id="warehouseNumber" placeholder="Enter Warehouse No" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label>Warehouse Name <sup class="" style="font-size: 7px;"><i class="fas fa-asterisk text-danger"></i></sup></label>
                     <input class="form-control form-control-sm" type="text" required=""  name="warehouseName" id="warehouseName" placeholder="Enter Warehouse Name" autocomplete="off">
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label >Sub Warehouse</label>
                         <input class="form-control form-control-sm" type="text" id="SubWarehouse"  name=""  autocomplete="off">
                     </div>
                     <div class="col-md-6">
                           <label >Product Name</label>
                           <select class="form-control col-md-12 select2" name="ProductID" id="ProductID">
                           <option selected="selected" value="">Select Product</option> 
                               @foreach($products as $product)
                                 <option value="{{$product->ProductName}}">{{$product->ProductName}}
                                 </option>
                               @endforeach
                           </select> 
                     </div>
                  </div>  
               </div>
                <div class="col-md-6">
                    <div class="row">
                     <div class="form-group col-md-6">
                     <label>KeyPrersonName</label>
                     <input class="form-control form-control-sm" type="text"  name="KeyPersonName" id="KeyPersonName" placeholder="Enter Key Prerson Name" autocomplete="off">
                     </div>
                  <div class="form-group col-md-6">
                     <label >Key Person Email</label>
                     <input class="form-control form-control-sm" type="text"   name="KeyPersonEmail" id="KeyPersonEmail" placeholder="Enter Key Person Email" autocomplete="off">
                  </div>
                  </div>
                  <div class="form-group">
                     <label>Location</label>
                     <input class="form-control form-control-sm" type="text" required=""  name="WLocation" id="WLocation" placeholder="Enter Location Name" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label >Product Quantity(piece)</label>
                           <input class="form-control form-control-sm" type="text" id="PQuantity"  name=""  autocomplete="off">
                        </div>
                        <div class="col-md-6">
                           <label >Theortical Weight(in kg)</label>
                           <div class="row">
                              <div class="col-md-8">
                                 <input class="form-control form-control-sm col-md-12" type="text" id="PWeight"  name=""  autocomplete="off">
                              </div>
                              <div class="col-md-4">
                                 <button type="button" onclick="productAddToTable()" class="btn btn-block bg-gradient-primary btn-sm">Add</button>
                              </div>
                           </div>
                        </div> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card card-default col-md-12">
         <div class="card-header">
            <h3 class="card-title">Product Detail</h3>
         </div>
         <table id="productTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                  <!-- <th class="th">CompanyName</th> -->
                  <th >Sub Warehouse</th>
                  <th>Product Code</th>
                  <th class="th">Product Name</th>
                  <th class="th">Quantity(piece)</th>
                  <th class="th">Theortical Weight(in kg)</th>
                  <th class="th">Active</th>
               </tr>
            </thead>
         </table>
      </div>
      <p id="info"></p>
      <div class="form-group">
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="" id="Warehouse_create" class="btn  btn-primary btn-sm">Submit</button>
         </div>
      </div>
   </form>
</section>
@endsection
@section('UserScriptStr')
<script>
  function productAddToTable() {

    if ($("#ProductID").val()=="" && $("#ProductID").val()=="" && $("#PQuantity").val()=="") 
   {
      alert("Please fill the field!!")
      return false;
   }
    // First check if a <tbody> tag exists, add one if not
    if ($("#productTable tbody").length == 0) {
        $("#productTable").append("<tbody></tbody>");
    }

    // Append product to the table
    $("#productTable tbody").append(
        "<tr>" +
        "<td class='th'>" + $("#SubWarehouse").val() + "</td>" +
        "<td >" + $("#ProductID").val() + "</td>" +
        "<td class='th'>" + $("#PQuantity").val() + "</td>" +
        "<td class='th'>" + $("#PWeight").val() + "</td>" +
        "<td>" +
        "<a type='button'  onclick='productDelete(this);' class='fas fa-trash-alt'>" +
        "</td>" +
        "</tr>");
   }
   function productDelete(ctl) {
    $(ctl).parents("tr").remove();
   }

   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   $( "#ProductID" ).change(function() {
         $("#PQuantity").val("")
   });

   $("#Warehouse_create").click(function(e) 
   {
       e.preventDefault();
       var warehouseNumber = $('#warehouseNumber').val();
       var warehouseName = $("#warehouseName").val();
       var SubWarehouse = $("#SubWarehouse").val();
       var KeyPersonEmail = $('#KeyPersonEmail').val();
       var WLocation = $("#WLocation").val();
       var KeyPersonName = $("#KeyPersonName").val();

        var Temp ='';
        var P_quantity='';
        var myTab = document.getElementById('productTable');
        // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
        for (i = 1; i <= myTab.rows.length-1; i++) {

            // GET THE CELLS COLLECTION OF THE CURRENT ROW.
            var objCells = myTab.rows.item(i).cells;

            // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
            for (var j = 0; j < objCells.length; j++) {
               if(j<=3)
               { 
                  Temp+= objCells.item(j).innerHTML+":";
               }
                
            }
               var temp_slice=Temp.slice(0, -1);
               P_quantity+= temp_slice + ",";
               Temp = "";
        }
       let _token = $('meta[name="csrf-token"]').attr('content');

       if (warehouseNumber!='' && warehouseName!='') 
       {
           $.ajax({
               type: "POST",
               url: "{{URL::to('/')}}/Warehouse/Warehousecreate",
               data: {
                   warehouseNumber: warehouseNumber,
                   warehouseName: warehouseName,
                   KeyPersonEmail: KeyPersonEmail,
                   // /CompanyID:CompanyID,
                   WLocation: WLocation,
                   KeyPersonName:KeyPersonName,
                   P_quantity: P_quantity,
                   _token: _token
               },
               cache: false,
                  success: function(response) {
                     if (response.error) 
                     {
                        toastr.error(response.error);
                     }
                     else{
                          var Baseurl = window.location.origin;
                          toastr.success('Warehouse successfully added');
                           location.href = Baseurl+'/warehouse';
                     }
                   
               }
           });
       } 
       else 
       {
           alert('Please fill warehouseNumber && warehouseName field !');
       }
   });

   function showTableData() {
        var names ='';
        var nam1='';
        var myTab = document.getElementById('productTable');
        // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
        for (i = 1; i <= myTab.rows.length-1; i++) {

            // GET THE CELLS COLLECTION OF THE CURRENT ROW.
            var objCells = myTab.rows.item(i).cells;

            // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
            for (var j = 0; j < objCells.length; j++) {
               if(j<=2)
               { 
                  names+= objCells.item(j).innerHTML+":";
               }
                
            }
               var temp=names.slice(0, -1)
               nam1+= temp + ",";
               names = "";
        }
    }

     // Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}

setInputFilter(document.getElementById("PQuantity"), function(value) {
  return /^-?\d*[.,]?\d*$/.test(value) && (value === "" || parseInt(value) > 0); });
setInputFilter(document.getElementById("PWeight"), function(value) {
  return /^-?\d*[.,]?\d*$/.test(value) && (value === "" || parseInt(value) > 0); });
            
</script>
@endsection
