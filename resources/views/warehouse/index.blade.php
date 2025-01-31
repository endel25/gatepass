@extends('layouts.admin')
@section('content')
<!-- Preloader --> 
<!-- <div class="overlayer" id="overlayer">
   <div class="loader flex-column justify-content-center align-items-center" style=" background-color: transparent;">
      <img class="loader-inner" src="{{ asset('dist/img/Load.png') }}"  minheight="100" minwidth="120" >
   </div>
</div> -->
<style>
   .switch {
     position: relative;
     display: inline-block;
     width: 40px; 
     height: 20px;
   }

   .switch input { 
     opacity: 0;
     width: 0;
     height: 0;
   }

   .slider {
     position: absolute;
     cursor: pointer;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #ccc;
     -webkit-transition: .4s;
     transition: .4s;
   }

   .slider:before {
     position: absolute;
     content: "";
     height: 18px;
     width: 18px;
     left: 2px;
     bottom: 2px;
     background-color: white;
     -webkit-transition: .4s;
     transition: .4s;
   }

   input:checked + .slider {
     background-color: #2196F3;
   }

   input:focus + .slider {
     box-shadow: 0 0 1px #2196F3;
   }

   input:checked + .slider:before {
     -webkit-transform: translateX(18px);
     -ms-transform: translateX(18px);
     transform: translateX(18px);
   }

   /* Rounded sliders */
   .slider.round {
     border-radius: 10px;
   }

   .slider.round:before {
     border-radius: 50%;
   }
   .table th,
   .table td {
     padding: 0.5rem;
     vertical-align: top;
     border-top: 1px solid rgba(0, 40, 100, 0.12);
   }
</style>
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Warehouse Management Table</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <div class="input-group-append" style="cursor: pointer;">
                  <span class="input-group-text spanbutton"  data-toggle="modal" style="cursor: pointer;">
                  <i class="fa fa-database" title="GetData" style="cursor: pointer;" onclick="GetProductdata()"> Get Data</i>
                  </span>
               </div>
            </ol>
         </div>
      </div>
   </div>
</section>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               @if($userrole_permissions->IsCreate==1)
               <div class="card-header">
                  <ol class="float-sm-right">
                  <a class="btn btn-success" href="{{ route('warehouse.create') }}">Add Warehouse</a>
               </div>
               @endif
               <div class="card-body">
                  @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
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
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>Warehouse Number</th>
                           <th>Warehouse Name</th>
                           <th>Location</th>
                           <th>Key PersonName</th>
                           <th>Key PersonEmail</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($warehouse as $warehouses)
                        <tr>
                           <td>{{$warehouses->warehouseNumber}}</td>
                           <td>{{$warehouses->warehouseName}}</td>
                           <td>{{$warehouses->WLocation}}</td>
                           <td>{{$warehouses->KeyPersonName}}</td>
                           <td>{{$warehouses->KeyPersonEmail}}</td>
                           <td> @if($userrole_permissions->IsUpdate==1)
                              <a class="fas fa-edit" title="EDIT"  href="{{ route('warehouse.edit',$warehouses->id) }}"></a>@endif
                              @if($userrole_permissions->IsDelete ==1) / <a class="fas fa-trash-alt" href="{{URL::to('/')}}/warehouse/{{ $warehouses->id }}/delete"></a>@endif
                           </td>
                        </tr>
                         @endforeach
                     </tbody>
                  </table>
                    &nbsp;
                  <div class="d-flex" style="justify-content: right;">
                     {!! $warehouse->links() !!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('UserScriptStr')
<script type="text/javascript">
  // setInterval(function()
  // { 
  //   window.location.reload();
  // }, 300000);
  

   function GetProductdata()
   {
      let _token = $('meta[name="csrf-token"]').attr('content');

      document.getElementsByClassName("overlayer_1")[0].style.display = "block";
      document.getElementsByClassName("loader_1")[0].style.display = "block";
      document.getElementsByClassName("loading_1")[0].style.display = "block";
      

       $.ajax({
            type: "GET",
            url: "{{URL::to('/')}}/getproductdetails",
            data: {
               _token: _token
            },
            cache: false,
            success: function(response) {
               if (response.error) 
               {
                  toastr.error(response.error);
               }
               if (response.Message) 
               {
                  document.getElementsByClassName("overlayer_1")[0].style.display = "none";
                  document.getElementsByClassName("loader_1")[0].style.display = "none";
                  document.getElementsByClassName("loading_1")[0].style.display = "none";
                  toastr.success(response.Message);
                  window.location.reload();
               }
           
            }
         });
   }
</script>

@endsection