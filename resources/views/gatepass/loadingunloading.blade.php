@extends('layouts.admin')
@section('content')
@section('Title', 'Dashboard')
@if ($message = Session::get('status'))
   <input type="hidden" id="status" value="{{ $message }}">
@endif

<div class="dvanimation animate__animated p-6" :class="[$store.app.animation]">
   <div x-data="finance">
       
    <section>
        <div class="mb-5 grid grid-cols-1 gap-6 text-white sm:grid-cols-5 xl:grid-cols-6">

            <!-- Pending Gatepass -->
            <a href="{{ route('pendingGatepass') }}" class="block">
                 <div class="panel max-w-md mx-auto bg-gradient-to-r from-blue-500 to-cyan-400 p-6 rounded-lg shadow-lg card"
                     data-name="Pending Gatepass">
                     <div class="flex">
                         <!-- Left Column -->
                         <div class="w-2/3">
                             <div class="text-md font-semibold">Pending Gatepass</div>
                             <div class="mt-5 flex items-center">
                                 <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{ $pendingcount }}</div>
                                 <div class="badge bg-white/30">{{ $pendingper }}%</div>
                             </div>
                             <div class="mt-5 flex items-center font-semibold">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                     <path opacity="0.5"
                                         d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                         stroke="currentColor" stroke-width="1.5"></path>
                                     <path
                                         d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                         stroke="currentColor" stroke-width="1.5"></path>
                                 </svg>
                                 Last Week {{ $pendingcountforlast7days }}
                             </div>
                         </div>
                         <!-- Right Column -->
                         <div class="w-1/3">
                             <img src="{{ asset('assets/images/pending.png') }}" alt="Logo" style="opacity: 0.5;" />
                         </div>
                     </div>
                 </div>
            </a>


            <!-- Approved Gatepass -->
            <a href="{{ route('approvedGatepass') }}" class="block">
                 <div  class="panel max-w-md mx-auto bg-gradient-to-r from-violet-500 to-violet-400 p-6 rounded-lg shadow-lg card"
                     data-name="Approved Gatepass">
                     <div class="flex">
                         <!-- Left Column -->
                         <div class="w-2/3">
                             <div class="text-md font-semibold">Approved Gatepass</div>
                             <div class="mt-5 flex items-center">
                                 <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{ $approvecount }}</div>
                                 <div class="badge bg-white/30">{{ $approveper }}%</div>
                             </div>
                             <div class="mt-5 flex items-center font-semibold">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                     <path opacity="0.5"
                                         d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                         stroke="currentColor" stroke-width="1.5"></path>
                                     <path
                                         d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                         stroke="currentColor" stroke-width="1.5"></path>
                                 </svg>
                                 Last Week {{ $approvecountforlast7days }}
                             </div>
                         </div>
                         <!-- Right Column -->
                         <div class="w-1/3">
                             <img src="{{ asset('assets/images/Approved.png') }}" alt="Logo" style="opacity: 0.5;" />
                         </div>
                     </div>
                 </div>
             </a>


            <!-- Loading/Unloading Gatepass -->
            <a href="{{ route('loadingUnloadingGatepass') }}" class="block">
                 <div class="panel max-w-md mx-auto bg-gradient-to-r from-blue-500 to-blue-400 p-6 rounded-lg shadow-lg card"
                     data-name="Loading / Unloading Gatepass">
                     <div class="flex">
                         <!-- Left Column -->
                         <div class="w-2/3">
                             <div class="text-md font-semibold whitespace-nowrap">Loading / Unloading Gatepass</div>
                             <div class="mt-5 flex items-center">
                                 <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{ $loadingcount }}</div>
                                 <div class="badge bg-white/30">{{ $loadingper }}%</div>
                             </div>
                             <div class="mt-5 flex items-center font-semibold">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                     <path opacity="0.5"
                                         d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                         stroke="currentColor" stroke-width="1.5"></path>
                                     <path
                                         d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                         stroke="currentColor" stroke-width="1.5"></path>
                                 </svg>
                                 Last Week {{ $loadingcountforlast7days }}
                             </div>
                         </div>
                         <!-- Right Column -->
                         <div class="w-1/3">
                             <img src="{{ asset('assets/images/loading.png') }}" alt="Logo" style="opacity: 0.5;" />
                         </div>
                     </div>
                 </div>
             </a>

             
            <!-- Issued Gatepass -->
            <a href="{{ route('issuedGatepass') }}" class="block">
                 <div class="panel max-w-md mx-auto bg-gradient-to-r from-blue-500 to-blue-400 p-6 rounded-lg shadow-lg card"
                     data-name="Issued Gatepass">
                     <div class="flex">
                         <!-- Left Column -->
                         <div class="w-2/3">
                             <div class="text-md font-semibold">Issued Gatepass</div>
                             <div class="mt-5 flex items-center">
                                 <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{ $issuedcount }}</div>
                                 <div class="badge bg-white/30">{{ $issuedper }}%</div>
                             </div>
                             <div class="mt-5 flex items-center font-semibold">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                     <path opacity="0.5"
                                         d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                         stroke="currentColor" stroke-width="1.5"></path>
                                     <path
                                         d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                         stroke="currentColor" stroke-width="1.5"></path>
                                 </svg>
                                 Last Week {{ $issuedcountforlast7days }}
                             </div>
                         </div>
                         <!-- Right Column -->
                         <div class="w-1/3">
                             <img src="{{ asset('assets/images/loading.png') }}" alt="Logo" style="opacity: 0.5;" />
                         </div>
                     </div>
                 </div>
            </a>

            
            <!-- Exit Gatepass -->
            <a href="{{ route('exitGatepass') }}" class="block">
                <div class="panel max-w-md mx-auto bg-gradient-to-r from-cyan-500 to-cyan-400 p-6 rounded-lg shadow-lg card"
                    data-name="Exit Gatepass">
                    <div class="flex">
                        <!-- Left Column -->
                        <div class="w-2/3">
                            <div class="text-md font-semibold">Exit Gatepass</div>
                            <div class="mt-5 flex items-center">
                                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{ $exitcount }}</div>
                                <div class="badge bg-white/30">{{ $exitper }}%</div>
                            </div>
                            <div class="mt-5 flex items-center font-semibold">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                    <path opacity="0.5"
                                        d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                    <path
                                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                </svg>
                                Last Week {{ $exitcountforlast7days }}
                            </div>
                        </div>
                        <!-- Right Column -->
                        <div class="w-1/3">
                            <img src="{{ asset('assets/images/exit.png') }}" alt="Logo" style="opacity: 0.5;" />
                        </div>
                    </div>
                </div>
            </a>    

    </section>

       <div class="panel">
        <table id="myTable" class="table-hover whitespace-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vehicle No</th>
                    <th>Licence Number</th>
                    <th>Tare Weight</th>
                    <th>Gross Weight</th>
                    <th>Net Weight</th>
                    <th>QR Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($all_rec_loading_unloading as $item)
                 <tr>
                     <td>{{$item->id}}</td>
                     <td>{{$item->VehicleNo}}</td>
                     <td>{{$item->LicenseNo}}</td>
                     <td>{{$item->GrossWeight}}</td>
                     <td>{{$item->TareWeight}}</td>
                     <td>{{$item->NetWeight}}</td>
                     <td><canvas id="qr-{{ $item->id }}" width="80" height="80"></canvas></td>
                     <td>
                          <div class="flex items-center  gap-4" >
                             <a class="edit-link" href="{{ route('gatepass.edit',$item->id) }}" title="EDIT">
                                 <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M11.4001 18.1612L11.4001 18.1612L18.796 10.7653C17.7894 10.3464 16.5972 9.6582 15.4697 8.53068C14.342 7.40298 13.6537 6.21058 13.2348 5.2039L5.83882 12.5999L5.83879 12.5999C5.26166 13.1771 4.97307 13.4657 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L7.47918 20.5844C8.25351 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5343 19.0269 10.823 18.7383 11.4001 18.1612Z" fill="currentColor"></path>
                                 <path d="M20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178L14.3999 4.03882C14.4121 4.0755 14.4246 4.11268 14.4377 4.15035C14.7628 5.0875 15.3763 6.31601 16.5303 7.47002C17.6843 8.62403 18.9128 9.23749 19.85 9.56262C19.8875 9.57563 19.9245 9.58817 19.961 9.60026L20.8482 8.71306Z" fill="currentColor"></path>
                             </svg>
                             </a>
                         </div>
                     </td>
                 </tr>
                 @endforeach
            </tbody>
        </table>
       </div>
   </div>
</div>


@endsection
@section('Script')
<script type="text/javascript">
      $(document).ready(function() {
        const status=$('#status').val();
        if (status) {login_status();}
      });

      function login_status() {
        const status=$('#status').val();
          const toast = window.Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              padding: '2em',
          });
          toast.fire({
              icon: 'success',
              title: status,
              padding: '2em',
          });
      }
</script>
<script src="https://cdn.jsdelivr.net/npm/qrious@latest/dist/qrious.min.js"></script>


@endsection