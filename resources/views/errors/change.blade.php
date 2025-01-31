@extends('layouts.admin')
@section('content')
<!-- Unit Managment -->
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Change Password</h1>
         </div>
      </div>
   </div>
</section>
<section class="content-header">
  <div class="container">
       @if ($errors->any())
       @foreach ($errors->all() as $error)
       <div class="alert alert-danger" role="alert">
          {{ $error }}
       </div>
       @endforeach
       @endif 
      @if ($message = Session::get('success'))
       <div class="alert alert-success">
          <p>{{ $message }}</p>
       </div>
      @endif 
    </div>
  <form action="{{ route('changes.store') }}" method="POST">
      @csrf
      <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Current Password</label>
                     <input class="form-control form-control-sm" type="password" id="p1" name="current_password"  autocomplete="current-password">
                  </div>
                  <div class="form-group">
                     <label>New Password</label>
                     <input class="form-control form-control-sm" type="password" id="p2" name="new_password" autocomplete="current-password">
                  </div>
                  <div class="form-group">
                     <label>New Confirm Password</label>
                     <input class="form-control form-control-sm" type="password" id="p3" name="new_confirm_password" autocomplete="current-password">
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
  </form>
   <script type="text/javascript">
      $(function() {
        $('#p1').on('keypress', function(e) {
            if (e.which == 32){
            
                return false;
            }
        });
      });
      $(function() {
        $('#p2').on('keypress', function(e) {
            if (e.which == 32){
            
                return false;
            }
        });
      });
      $(function() {
        $('#p3').on('keypress', function(e) {
            if (e.which == 32){
            
                return false;
            }
        });
      });
   </script>
</section>
@endsection
