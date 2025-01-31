@extends('layouts.admin')
@section('content')
<section class="content-header">
  <div class="mb-2 flex items-center justify-between">
    <h5 class="text-lg font-semibold dark:text-white-light">Add Userrole</h5>
    <a type="button" href="{{ route('userroles.index') }}" class="btn btn-sm btn-l btn-primary rounded-full">Back</a>
  </div>
</section>
<section class="content-header">

  
   <form action="{{ route('userroles.store') }}" method="POST">
      @csrf
      <div class="panel">
         <div class="flex-1 max-w-lg space-y-4 sm:space-x-4">
            <div class="flex sm:flex-row flex-col" id="FirstNameField">
               <label for="UserRoleName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">User Role </label>
               <input type="text" placeholder="Enter Userrole Name" class="text-xs form-input flex-auto" name="UserRoleName" id="UserRoleName" value="{{old('UserRoleName')}}">
             </div>
         </div>
      </div>
      <div class="panel">
         <div class="card-header">
            <h3 >Permissions</h3>
            <br>
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
                                    <input id="IsRead{{$permissions->id}}" class="{{$permissions->ParentFeatureID}}" type="checkbox" name="IsRead{{$permissions->id}}"  style="display: {{ $permissions->IsReadDisplay==0?'none':'block'}}" onclick="CheckFunction({{$permissions->id}})">  
                                                                    
                                 </td>
                                 <td  class="jsgrid-cell jsgrid-align-center" >
                                    {{ Form::checkbox('IsCreate' .$permissions->id,null,false, array('class'=>$permissions->ParentFeatureID , 'style' =>  $permissions->IsCreateDisplay==0?'display:none':'display:block')) }}
                                 </td>
                                 <td class="jsgrid-cell jsgrid-align-center">
                                    {{ Form::checkbox('IsUpdate' .$permissions->id,null,false, array('class'=>$permissions->ParentFeatureID, 'style' =>  $permissions->IsUpdateDisplay==0?'display:none':'display:block')) }}
                                 </td>
                                 <td class="jsgrid-cell jsgrid-align-center">
                                    {{ Form::checkbox('IsDelete' .$permissions->id,null,false, array('class'=>$permissions->ParentFeatureID , 'style' =>  $permissions->IsDeleteDisplay==0?'display:none':'display:block')) }}
                                 </td>
                                <td class="jsgrid-cell jsgrid-align-center">
                                    {{ Form::checkbox('IsExecute' .$permissions->id,null,false, array('class'=>$permissions->ParentFeatureID , 'style' =>  $permissions->IsExecuteDisplay==0?'display:none':'display:block')) }}
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