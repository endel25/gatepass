@extends('layouts.admin')
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Company Management Table</h1>
         </div>
         <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               
               <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
               <li class="breadcrumb-item">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>    
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                  </form>
               </li>
            </ol>
         </div> -->
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
               <a class="btn btn-success" href="{{ route('companies.create') }}"> Create New Company</a>
            </div>
            @endif
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
                        <th>Company Name</th>
                        <!-- <th>API</th> -->
                        <th>Location</th>
                        <th>Action</th>
                     </tr>
                      
                  </thead>
                  <tbody>
                     @foreach ($companies as $company) 
                     <tr>
                        <td>{{$company->CompanyName}}</td>
                        <!-- <td>{{$company->CompanyName}}</td> -->
                        <td>{{$company->LocationName}}</td>
                        <td>
                        @if($userrole_permissions->IsUpdate==1) 
                           <a class="fas fa-edit" title="EDIT"  href="{{ route('companies.edit',$company->id) }}"></a>@endif<!-- /<a class="fas fa-trash-alt" href="{{URL::to('/')}}/companies/{{ $company->id }}/delete"></a> -->
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
                &nbsp;
                  <div class="d-flex" style="justify-content: right;">
                     {!! $companies->links() !!}
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


  setInterval(function()
  { 
    window.location.reload();
  }, 300000);

</script>

@endsection