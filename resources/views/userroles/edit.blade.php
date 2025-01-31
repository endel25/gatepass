@extends('layouts.admin')
@section('content')
<!-- WeighBridge Managment -->
<section class="content-header">
   <div class="card card-default">
      <div class="card-header">
         <h3 class="card-title">User Role Managment</h3>
         <div class="card-tools">
            <ol class="breadcrumb float-sm-right">
               <a class="btn btn-block bg-gradient-primary btn-sm" href="{{ route('userroles.index') }}"> Back</a>
            </ol>
         </div>
      </div>
   </div>
   <form action="{{ route('userroles.update',$userrole->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title">Edit User Role</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="row">
                        <label>User Role Name <sup class="" style="font-size: 7px;"><i class="fas fa-asterisk text-danger"></i></sup> </label>
                        &nbsp;
                        &nbsp;
                        <input class="form-group col-md-9 " required="" type="text" style="font-size: 13px;" value="{{ $userrole->UserRoleName }}" name="UserRoleName"  id="" placeholder=" Enter User Role Name" autocomplete="off">
                     </div>
                  </div>
               </div>
               <!-- <div class="col-md-5">
                  <div class="form-group">
                     <div class="row">
                        <label>User Location</label>
                        &nbsp;
                        &nbsp;
                        <select class="form-group col-md-9" name="UserLocation" id="">
                           <option selected="selected" value="">Select warehouseName</option> 
                          

                             @foreach($userrole->warehouses as $warehouses)
                              @if($userrole->UserLocation == $warehouses->id)
                              {
                                 <option selected="" value="{{$warehouses->id}}">{{$warehouses->warehouseNumber}}</option>
                              }
                              @else
                              {     
                                <option value="{{$warehouses->id}}">{{$warehouses->warehouseNumber}}
                              </option>
                              }                       
                              @endif
                           @endforeach   

                        </select> 
                     </div>
                  </div>
               </div> -->
                <div class="col-md-1">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" {{$userrole->Active==0?'':'checked'}} name="Active" id="defaultChecked">
                     <label class="custom-control-label" for="defaultChecked">Active</label>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title">Permission</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
         </div>
         <div class="card-body">
            <div class="card">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card-body table-responsive p-0">
                        <table  class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Permission</th>
                                 <th>Read</th>
                                 <th>Create</th>
                                 <th>Update</th>
                                 <th>Delete</th>
                                 <th>Active</th>
                              </tr>
                           </thead>
                           <tbody>
                              <!-- Transaction Management -->
                              @foreach ($permission as $permissions)
                              <tr>
                                 <td data-name="id">
                                    <input   type="hidden" name="items[][{{$permissions->id}}]"  >
                                    {{ Form::hidden('id'.$permissions->id, $permissions->id) }}
                                    <span style="font-weight:{{  $permissions->IsMaster==1?'600':'500' }}">{{  $permissions->permissionName }}</span></td>
                                 <td class="jsgrid-cell jsgrid-align-center">
                                    <input id="IsRead{{$permissions->id}}"  {{ $permissions->IsRead==0?'':'checked'}} class="{{$permissions->ParentFeatureID}}" type="checkbox" name="IsRead{{$permissions->id}}"  style="display: {{ $permissions->IsReadDisplay==0?'none':'block'}}" onclick="CheckFunction({{$permissions->id}})">  
                                                                    
                                 </td>
                                 <td  class="jsgrid-cell jsgrid-align-center" >
                                    {{ Form::checkbox('IsCreate' .$permissions->id,null,$permissions->IsCreate==0?false:true, array('class'=>$permissions->ParentFeatureID , 'style' =>  $permissions->IsCreateDisplay==0?'display:none':'display:block')) }}
                                 </td>
                                 <td class="jsgrid-cell jsgrid-align-center">
                                    {{ Form::checkbox('IsUpdate' .$permissions->id,null,$permissions->IsUpdate==0?false:true, array('class'=>$permissions->ParentFeatureID, 'style' =>  $permissions->IsUpdateDisplay==0?'display:none':'display:block')) }}
                                 </td>
                                 <td class="jsgrid-cell jsgrid-align-center">
                                    {{ Form::checkbox('IsDelete' .$permissions->id,null,$permissions->IsDelete==0?false:true, array('class'=>$permissions->ParentFeatureID , 'style' =>  $permissions->IsDeleteDisplay==0?'display:none':'display:block')) }}
                                 </td>
                                <td class="jsgrid-cell jsgrid-align-center">
                                    {{ Form::checkbox('IsExecute' .$permissions->id,null,$permissions->IsExecute==0?false:true, array('class'=>$permissions->ParentFeatureID , 'style' =>  $permissions->IsExecuteDisplay==0?'display:none':'display:block')) }}
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="form-group">
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
         </div>
      </div>
      <div class="container">
         @if ($errors->any())
         @foreach ($errors->all() as $error)
         <div class="alert alert-danger" role="alert">
            {{ $error }}
         </div>
         @endforeach
         @endif 
      </div>
   </form>
</section>
@endsection
@section('UserScriptStr')
<script>
  function CheckFunction(id) {
   // Get the checkbox
   var checkBox = document.getElementById("IsRead"+id);

   $("." + id).prop('checked', checkBox.checked); 

   $("input[name=IsCreate"+ id +"]").prop('checked', checkBox.checked);
   $("input[name=IsUpdate"+ id +"]").prop('checked', checkBox.checked);
   $("input[name=IsDelete"+ id +"]").prop('checked', checkBox.checked);
   $("input[name=IsExecute"+ id +"]").prop('checked', checkBox.checked);
   
   var inputs = $("." + id);
    


   for (var i = 0; i < inputs.length; i++) 
   {
      var iid = $(inputs[i]).attr('id');
      if(iid!= null)
      {
         if(iid.indexOf("IsRead") != -1)
         {
            iid = iid.replace('IsRead','');     
            $("." + iid).prop('checked', checkBox.checked);
         }  
      }
          
      
     
      //alert($(inputs[i]));
   }

      $(":hidden").prop('checked', false);

}
</script>
@endsection