<!DOCTYPE html>
<html>
<style type="text/css">
   input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type=number] {
  -moz-appearance: textfield;
}
   #fontcolor{color: black;}
   .fontcolor{color: black;}
   .table th,
   .table td {
   padding: 0.5rem;
   vertical-align: top;
   border-top: 1px solid rgba(0, 40, 100, 0.12);
   }
   .body{
      line-height: inherit;
   }
</style>
<style type="text/css">
   * {
  margin: 0;
  padding: 0;
}
#overlayer_1 {
     width:100%;
     height:100%;
     position:fixed;
     z-index:1;
     background:whitesmoke;
   }

.loader_1 {
  display: flex;
  width: 80px;
  height: 100px;
  position: fixed;
  z-index:3;
  top: 50%;
  left: 55%;
  /*transform: translate(-50%, -50%);*/
}

.loading_1 {
  border: 2px solid #ccc;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border-top-color: #1ecd97;
  border-left-color: #1ecd97;
  animation: spin 1s infinite ease-in;
}


@keyframes spin {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}
</style>
<style type="text/css">
/*   img {
     margin: 0;
     display:0;
     padding: 0;
   }*/
   #overlayer {
        width:100%;
        height:100%;
        position:fixed;
        z-index:1;
        background:whitesmoke;
   }
   .loader {
        display: flex;
        width: 80px;
        height: 100px;
        position: fixed;
        z-index:3;
        top: 50%;
        left: 55%;
        animation: loader 1s infinite ease;
   }
   .loader-inner {
        vertical-align: top;
        display: inline-block;
        width: 100%;
        height: 100% ;
        background-color: transparent;
        animation: loader-inner 1s infinite ease-in;
   }
   @keyframes loader {
        0% {
          transform: rotate(0deg);
        }
        25% {
          transform: rotate(100deg);
        }
        50% {
          transform: rotate(180deg);
        }
        75% {
          transform: rotate(260deg);
        }
        100% {
          transform: rotate(360deg);
        }
   }
   @keyframes loader-inner {
        0% {
          height: 80%;
        }
        25% {
          height: 80%;
        }
        50% {
          height: 80%;
        }
        75% {
          height: 80%;
        }
        100% {
          height: 80%;
        }
   }
</style>

<head>
      <!-- <meta charset="utf-8"> -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- <link rel="icon" href="{{ asset('dist\img\icon.png') }}" style="width: 50px;height: 20px;"> -->
      <title>Tarmal Group| Gatepass</title>
      <!-- Tell the browser to be responsive to screen width -->
      <link rel = "icon" href ="{{ asset('dist\img\Tlogo.png') }}" type = "image/x-icon">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
      <!-- iCheck -->
      <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
      <!-- JQVMap -->
      <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
      <!-- DataTables -->
      <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
      <!-- select2 -->
      <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
       <!-- SweetAlert2 -->
     <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
     <!-- Toastr -->
     <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
      <!-- jQuery -->
      <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- <script src="{{ asset('video.js') }}"></script>
         <script src="{{ asset('videojs-vlc.js') }}"></script> -->
      <!-- jsGrid -->
      <link rel="stylesheet" href="{{ asset('plugins/jsgrid/jsgrid.min.css') }}">
      <link rel="stylesheet" href="{{ asset('plugins/jsgrid/jsgrid-theme.min.css') }}">
      <!-- summernote -->
      <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
      <!-- Google Font: Source Sans Pro -->
      <link href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body class="sidebar-mini layout-fixed sidebar-collapse">
   <div class="wrapper">
      <div class="overlayer_1" id="overlayer_1" style="display:none;">
         <div class="loader_1 flex-column justify-content-center align-items-centerx"  style=" background-color: transparent;">
           <div>
            <img class="loading_1" src="{{ asset('dist/img/Load.png') }}"  minheight="100" minwidth="120">
           </div>
         </div>
      </div>
      <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-image: linear-gradient(white, #D3D3D3);">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item" id="fontcolor">
               <a class="nav-link" data-widget="pushmenu" href="#" id="fontcolor" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="{{ route('home') }}" class="nav-link" id="fontcolor">Home</a>
            </li>
             <li class="nav-item" id="fontcolor">
             
            </li>
         </ul>
         
         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto" id="fontcolor" >
            <!-- Dropdown Menu -->
            <li class="nav-item dropdown">
               <a class="nav-link" data-toggle="dropdown" href="#" id="fontcolor">
                  <i class="fas fa-user"></i>&nbsp;&nbsp;{{Session::get('email')}}
                  <!-- <span class="badge badge-warning navbar-badge">15</span> -->
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->
                  <a href="" class="dropdown-item">
                  <i class="fas fa-user-circle mr-2"></i>  
                  {{Session::get('email')}}  
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                     <i class="fa fa-envelope mr-2" aria-hidden="true"></i> Contact Us
                     <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="fas fa-sign-out-alt mr-2 "></i> {{ __('Sign-Out') }}
                     <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
                  <div class="dropdown-divider"></div>
                  <!-- <a href="#" class="dropdown-item">
                     <i class="fas fa-file mr-2"></i> 3 new reports
                      <span class="float-right text-muted text-sm">2 days</span> 
                     </a> -->
                  <div class="dropdown-divider"></div>
                  <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
               </div>
            </li>
          <!--   <li class="nav-item">
               <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
               <i class="fas fa-th-large"></i>
               </a>
            </li> -->
         </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-image: linear-gradient(white, #D3D3D3);">
         <!-- Brand Logo -->
         <div class="user-panel  d-flex">
            <a  class="brand-link" style="margin-bottom: -4%;">
               <img src="{{ asset('dist/img/Tlogo.png') }}" class="brand-image  elevation" style="opacity: .8">
               <span class="brand-text"><img src="{{ asset('dist/img/Tarmallogo.png') }}"   style="margin-left:10%; width: 45%; "></span>
            </a>
         </div>
         <!-- Sidebar -->
         <div class="sidebar" style="background-image: linear-gradient(white, #D3D3D3);">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    @if(!Session::has('Dashboard')) 
                     <li class="nav-item has-treeview" id="Dashboard" >
                     <a href="{{ route('home') }}" class="nav-link" id="fontcolor">
                        <i class="nav-icon fas fa-columns"></i>
                        <p >
                           Dashboard
                        </p>
                     </a>
                  </li>
                  @endif
                  @if(!Session::has('GatePassManagement')) 
                  <!-- <li class="nav-item has-treeview" id="GatePass">
                     <a href="{{route('gatepass.index')}}" class="nav-link" id="">
                        <i class="nav-icon fas fa-ticket-alt fontcolor"></i>
                        <p class="fontcolor">
                            Gate Pass
                        </p>
                     </a>
                  </li> -->
                  @endif
                  
                  <li class="nav-item has-treeview fontcolor">
                     @if(!Session::has('DataSetup')) 
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy fontcolor" id="DataSetup"></i>
                        <p class="fontcolor">
                           Data Setup
                           <i class="fas fa-angle-left right"></i>
                           <span class="badge badge-info right"></span>
                        </p>
                     </a>
                     @endif
                     <ul class="nav nav-treeview">
                        @if(!Session::has('Location'))
                        <li class="nav-item has-treeview" id="">
                           <a href="{{route('locations.index')}}" class="nav-link" id="">
                              <!-- <i class="nav-icon fas fa-balance-scale-right fontcolor" ></i> -->
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Location
                              </p>
                           </a>
                        </li>
                        @endif
                        @if(!Session::has('Product'))
                        <li class="nav-item has-treeview" id="Product">
                           <a href="{{route('companies.index')}}" class="nav-link" id="">
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <!-- <i class="nav-icon  fas fa-building fontcolor" ></i> -->
                              <p class="fontcolor">
                                  Company
                              </p>
                           </a>
                        </li>
                        @endif
                        @if(!Session::has('Warehouse'))
                        <li class="nav-item has-treeview" id="Warehouse">
                           <a href="{{route('warehouse.index')}}" class="nav-link" id="">
                              <!-- <i class="nav-icon fas fa-warehouse fontcolor" ></i> -->
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Warehouse
                              </p>
                           </a>
                        </li>
                        @endif
                        @if(!Session::has('Transporter')) 
                        <li class="nav-item has-treeview" id="Transporter" >
                           <a href="{{route('accounts.index')}}" class="nav-link fontcolor" id="fontcolor">
                              <!-- <i class="nav-icon fas fas fa-truck"></i> -->
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p>
                                 Transporter
                              </p>
                           </a>
                        </li>
                        @endif
                        @if(!Session::has('Driver')) 
                        <li class="nav-item has-treeview" id="Driver">
                           <a href="{{route('drivers.index')}}" class="nav-link" id="">
                              <!-- <i class="nav-icon fa fa-user fontcolor" ></i> -->
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Driver
                              </p>
                           </a>
                        </li>
                        @endif
                        @if(!Session::has('Vehicle')) 
                        <li class="nav-item has-treeview" id="">
                           <a href="{{route('vehicles.index')}}" class="nav-link" id="">
                              <!-- <i class="nav-icon fas fa-truck-pickup fontcolor" ></i> -->
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Vehicle
                              </p>
                           </a>
                        </li>
                        @endif
                        @if(!Session::has('Product'))
                        <li class="nav-item has-treeview" id="Product">
                           <a href="{{route('products.index')}}" class="nav-link" id="">
                              <!-- <i class="nav-icon fab fa-product-hunt fontcolor" ></i> -->
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Product
                              </p>
                           </a>
                        </li>
                        @endif 
                        <!-- @if(!Session::has('PurchaseOrder'))
                        <li class="nav-item has-treeview" id="">
                           <a href="{{route('purchaseorder.index')}}" class="nav-link" id="">
                              <i class="nav-icon fas fa-balance-scale-right fontcolor" ></i>
                              <p class="fontcolor">
                                  Purchase Order
                              </p>
                           </a>
                        </li>
                        @endif -->
                     </ul>
                  </li>
                  <li class="nav-item has-treeview fontcolor">
                     @if(!Session::has('Administrator'))
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog fontcolor"></i>
                        <p class="fontcolor">
                           Administration
                           <i class="fas fa-angle-left right"></i>
                           <span class="badge badge-info right"></span>
                        </p>
                     </a>
                     @endif
                     <ul class="nav nav-treeview">
                        @if(!Session::has('UserRole'))
                        <li class="nav-item has-treeview " id="UserRole">
                           <a href="{{route('userroles.index')}}" class="nav-link" id="">
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  User Role
                              </p>
                           </a>
                        </li>
                        @endif
                        @if(!Session::has('User'))
                        <li class="nav-item has-treeview" id="User">
                           <a href="{{route('users.index')}}" class="nav-link" id="">
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  User 
                              </p>
                           </a>
                        </li>
                        @endif
                        @if(!Session::has('User'))
                        <li class="nav-item has-treeview" id="User">
                           <a href="{{route('appdirectory.index')}}" class="nav-link" id="">
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Add Directories 
                              </p>
                           </a>
                        </li>
                        @endif
                        @if(!Session::has('ChangePassword'))
                        <li class="nav-item has-treeview" id="">
                           <a href="{{route('changes.index')}}" class="nav-link" id="fontcolor">
                              <i class="far fa-circle nav-icon fontcolor"></i>
                              <p>
                                 Change Password
                              </p>
                           </a>
                        </li>
                         @endif
                     </ul>
                  </li>
                  <li class="nav-item has-treeview fontcolor">
                     @if(!Session::has('Administrator'))
                     <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file fontcolor"></i>
                        <p class="fontcolor">
                           Reports
                           <i class="fas fa-angle-left right"></i>
                           <span class="badge badge-info right"></span>
                        </p>
                     </a>
                     @endif
                     <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview " id="UserRole">
                           <a href="{{route('reports.index')}}" class="nav-link" id="">
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Transaction Report
                              </p>
                           </a>
                        </li>
                        
                     </ul>
                       <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview " id="UserRole">
                           <a href="{{route('securities.index')}}" class="nav-link" id="">
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Security Report
                              </p>
                           </a>
                        </li>
                        
                     </ul>
                     <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview " id="UserRole">
                           <a href="{{route('suppliyers.index')}}" class="nav-link" id="">
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Suppliyer Report
                              </p>
                           </a>
                        </li>
                        
                     </ul>
                         <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview " id="UserRole">
                           <a href="{{route('scrap.index')}}" class="nav-link" id="">
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  Scrap Daily Report
                              </p>
                           </a>
                        </li>
                        
                     </ul>
                           <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview " id="UserRole">
                           <a href="{{route('scrapdailyreports.index')}}" class="nav-link" id="">
                              <i class="far fa-circle nav-icon fontcolor" ></i>
                              <p class="fontcolor">
                                  ScrapDaily Report
                              </p>
                           </a>
                        </li>
                        
                     </ul>
                  </li>
                  @if(Session::has('UseroleId'))
                   <li class="nav-item has-treeview" id="User">
                     <a href="{{URL::to('/')}}/activeloading" class="nav-link" id="">
                        <i class="far fa-circle nav-icon fontcolor" ></i>
                        <p class="fontcolor">
                            Active
                        </p>
                     </a>
                  </li>
                   @endif
                  @if(Session::has('User_Id') || Session::has('UseroleId'))
                  <li class="nav-item has-treeview" id="User">
                     <a href="{{URL::to('/')}}/loading" class="nav-link" id="">
                        <i class="far fa-circle nav-icon fontcolor" ></i>
                        <p class="fontcolor">
                            In Progess 
                        </p>
                     </a>
                  </li>
                  @endif
                  @if(Session::has('User_Id') || Session::has('UseroleId'))
                  <li class="nav-item has-treeview" id="User">
                     <a href="{{URL::to('/')}}/completeloading" class="nav-link" id="">
                        <i class="far fa-circle nav-icon fontcolor" ></i>
                        <p class="fontcolor">
                            Complete 
                        </p>
                     </a>
                  </li>
                  @endif
               </ul>
            </nav>
         </div>
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         @yield('content')
      </div>
      <!-- main-footer  -->
      <footer class="main-footer" id="myfooter">
         <strong><a href="https://endel.digital/" target="_blank" rel="noopener noreferrer">Endel Digital</a>.</strong>
         All rights reserved.
         <!-- <div class="float-right d-none d-sm-inline-block">
            <b>Version</b>1.3.0
         </div> -->
      </footer>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->
   <!-- Bootstrap 4 -->
   <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <!-- SweetAlert2 -->
   <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
   <!-- Toastr -->
   <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
   <!-- ChartJS -->
   <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
   <!-- Sparkline -->
   <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
   <!-- JQVMap -->
   <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
   <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
   <!-- jQuery Knob Chart -->
   <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
   <!-- daterangepicker -->
   <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
   <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
   <!-- Summernote -->
   <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
   <!-- overlayScrollbars -->
   <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
   <!-- AdminLTE App -->
   <script src="{{ asset('dist/js/adminlte.js') }}"></script>
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="{{ asset('dist/js/demo.js') }}"></script>
   <!-- Bootstrap 4 -->
   <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <!-- Select2 -->
   <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
   <!-- DataTables -->
   <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
   <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
   <!-- jsGrid -->
   <script src="{{ asset('plugins/jsgrid/demos/db.js') }}"></script>
   <script src="{{ asset('plugins/jsgrid/jsgrid.min.js') }}"></script>
   <script>
   
   

      $(function () {
        
        $("#example3").DataTable({
          "responsive": true,
          "autoWidth": false,
          "ordering": false,
        });
        $("#example13").DataTable({
          "responsive": true,
          "autoWidth": false,
          "ordering": false,

        });
        $("#example134").DataTable({
          "responsive": true,
          "autoWidth": false,
          "ordering": false,
        });
        $("#example").DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "responsive": false,
        });
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": false,
        });

        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
         const Toast = Swal.mixin({
               toast: true,
              position: 'top-end',
              showConfirmButton: false,
             timer: 3000
         });
      
      });   
   </script>
   <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        
        //Initialize Select2 Elements
        
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
      
        //Date range picker
        $('#reservationdatetime').datetimepicker({
            format: 'DD/MM/YYYY hh:mm:ss'
        });

        $('#reservationdate').datetimepicker({
            format: 'DD/MM/YYYY'
        });
      
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'DD/MM/YYYY hh:mm A'
          }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
          {
            ranges   : {
              'Today'       : [moment(), moment()],
              'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month'  : [moment().startOf('month'), moment().endOf('month')],
              'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
          },
          function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )
      
       
        //Bootstrap Duallistbox
        // $('.duallistbox').bootstrapDualListbox()
      
        //Colorpicker
        // $('.my-colorpicker1').colorpicker()
        // //color picker with addon
        // $('.my-colorpicker2').colorpicker()
      
        // $('.my-colorpicker2').on('colorpickerChange', function(event) {
        //   $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        // });
      
        // $("input[data-bootstrap-switch]").each(function(){
        //   $(this).bootstrapSwitch('state', $(this).prop('checked'));
        // });
      
      })
   </script>
   @yield('UserScript')
   @yield('UserScriptStr')
</body>
</html>