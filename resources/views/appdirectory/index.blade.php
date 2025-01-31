@extends('layouts.admin')
@section('content')
<style>
   .table td {
  padding: 0.5rem;
  vertical-align: top;
  border-top: 1px solid rgba(0, 40, 100, 0.12);
}
</style>

<section class="content-header">
   <div class="mb-5 flex items-center justify-between">
      <h5 class="text-lg font-semibold dark:text-white-light">Directories Management Stack</h5>

      <a type="button" href="{{ route('appdirectory.create') }}" class="btn btn-sm btn-l btn-primary rounded-full">Add Directories</a>

   </div>
</section>
<section>
   <div class="panel">
      <table id="myTable" class="table-hover whitespace-nowrap">
         <thead>
            <tr>
               <th>Field Namer</th>
               <th>Field Value</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($appdirectory as $appdirectory)
            <tr>
               <td>{{$appdirectory->FieldName}}</td>
               <td>{{$appdirectory->FieldValue}}</td>
               <td><a class="fas fa-trash-alt" href="" onclick="DeleteAD({{$appdirectory->id}})"></a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</section>
@endsection
@section('Script')
<script>
   function DeleteAD(id) 
   {
      let _token = $('meta[name="csrf-token"]').attr('content');

      if (id != "") 
      {
         $.ajax({
            type: 'POST',
            url: "{{URL::to('/')}}/DeleteAD",
            cache: false,
            data: {                     
               id: id,
               _token: _token
           },
            success: function(response){
              toastr.error("Appdirectory Delete successfully");
            },
            error: function(xhr, status, error){
               var errorMessage = xhr.status + ': ' + xhr.statusText
               alert('Error - ' + errorMessage);
               }
         });
      }
   }
</script>

@endsection