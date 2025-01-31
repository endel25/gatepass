@extends('layouts.admin')
@section('content')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 28px;
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
  height: 20px;
  width: 20px;
  left: 4px;
  bottom: 4px;
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
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
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
.btn {
 
  border: none;
  
  padding: 2px 6px;
  font-size: 14px;
  cursor: pointer;
}
</style>
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1></h1>
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
					   <th>Order No</th>
					   <th>Product Name</th>
					   <th>Quantity(pcs)</th>
                  <th>Actual Quantity(pcs)</th>
					   <th>Weight(In kg)</th>
					   <th>Warehouse</th>
					   <th>Action</th>
					 </tr>
					</thead>
					<tbody> 
					@foreach($data as $datas)
					 <tr>
                  <form action="{{URL::to('/')}}/orderdetailsedit" method="POST">
                     <input type="hidden" name="edit" value="1">
					    <td><input type="label" name="DocNum"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="{{$datas['DocNum']}}" readonly></td>
					    <td><input type="label" name="ItemCode" id="ItemCode" style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="{{$datas['ItemCode']}}" readonly></td>
					    <td><input type="label" name="Quantity"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="{{$datas['Quantity']}}" readonly></td>

                   <td><input type="label" name="Actual_Quantity"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="" ></td>
					    <td><input type="label" name="VehicleNo"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value=""readonly></td>
					    <td><input type="label" name="WhsCode"  style="font-size: 14px; text-align: center; width:100%; border: none; background: white; flex: 0 0 0%;" value="{{$datas['WhsCode']}}"></td>
					    <td>
                     <div class="row">
                        <button class="btn"><i class="fa fa-edit"></i></button>/
                        <button class="btn"><i class="fas fa-trash-alt "></i></button>
                     </div>
                   </td>
                  </form>
					 </tr>
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


@endsection
