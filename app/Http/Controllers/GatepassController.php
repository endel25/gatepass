<?php
namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Gatepass;
use App\Models\Vehicle;
use App\Models\Transporter;
use App\Models\Appdirectory;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;
use File;
use Illuminate\Support\Facades\Image;
use Http;
use Carbon\Carbon;

class GatepassController extends Controller
{

    public function index()
    {
        $totalcount = DB::table('gatepasses')
            ->count();
        $pendingcount = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->count();
        $pendingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $approvecount = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->count();
        $approvecountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $loadingcount = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->count();
        $loadingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $exitcount = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->count();

        $exitcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();
        $issuedcount = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->count();
        $issuedcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        if ($totalcount) {
            $pendingper = ($pendingcount / $totalcount) * 100;

            $approveper = ($approvecount / $totalcount) * 100;

            $loadingper = ($loadingcount / $totalcount) * 100;

            $exitper = ($exitcount / $totalcount) * 100;

            $issuedper = ($issuedcount / $totalcount) * 100;
        } else {
            $pendingper = 0;

            $approveper = 0;

            $loadingper = 0;

            $exitper = 0;

            $issuedper = 0;
        }
        $gatepasses = DB::table('gatepasses')->latest()->get();

        return view('gatepass.index', compact('issuedcount', 'issuedper', 'issuedcountforlast7days', 'pendingcount', 'pendingper', 'approvecount', 'approveper', 'loadingcount', 'loadingper', 'exitcount', 'exitper', 'exitcountforlast7days', 'loadingcountforlast7days', 'approvecountforlast7days', 'pendingcountforlast7days', 'gatepasses'));
    }

    public function pendingGatepass()
    {
        $totalcount = DB::table('gatepasses')
            ->count();
        $pendingcount = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->count();
        $pendingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $approvecount = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->count();
        $approvecountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $loadingcount = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->count();
        $loadingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $exitcount = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->count();
        $exitcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();
        $issuedcount = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->count();
        $issuedcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        if ($totalcount) {
            $pendingper = ($pendingcount / $totalcount) * 100;

            $approveper = ($approvecount / $totalcount) * 100;

            $loadingper = ($loadingcount / $totalcount) * 100;

            $exitper = ($exitcount / $totalcount) * 100;

            $issuedper = ($issuedcount / $totalcount) * 100;
        } else {
            $pendingper = 0;

            $approveper = 0;

            $loadingper = 0;

            $exitper = 0;

            $issuedper = 0;
        }
        $all_rec_pending = DB::table('gatepasses')->where('Status', 'Pending')->latest()->get();
        return view('gatepass.pending', compact('issuedcount', 'issuedper', 'issuedcountforlast7days', 'pendingcount', 'pendingper', 'approvecount', 'approveper', 'loadingcount', 'loadingper', 'exitcount', 'exitper', 'exitcountforlast7days', 'loadingcountforlast7days', 'approvecountforlast7days', 'pendingcountforlast7days', 'all_rec_pending'));
    }
    public function approved()
    {
        $totalcount = DB::table('gatepasses')
            ->count();
        $pendingcount = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->count();
        $pendingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $approvecount = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->count();
        $approvecountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $loadingcount = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->count();
        $loadingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $exitcount = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->count();
        $exitcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();
        $issuedcount = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->count();
        $issuedcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        if ($totalcount) {
            $pendingper = ($pendingcount / $totalcount) * 100;

            $approveper = ($approvecount / $totalcount) * 100;

            $loadingper = ($loadingcount / $totalcount) * 100;

            $exitper = ($exitcount / $totalcount) * 100;

            $issuedper = ($issuedcount / $totalcount) * 100;
        } else {
            $pendingper = 0;

            $approveper = 0;

            $loadingper = 0;

            $exitper = 0;

            $issuedper = 0;
        }
        $all_rec_approve = DB::table('gatepasses')->where('Status', 'Approved')->latest()->get();
        return view('gatepass.approved', compact('issuedcount', 'issuedper', 'issuedcountforlast7days', 'pendingcount', 'pendingper', 'approvecount', 'approveper', 'loadingcount', 'loadingper', 'exitcount', 'exitper', 'exitcountforlast7days', 'loadingcountforlast7days', 'approvecountforlast7days', 'pendingcountforlast7days', 'all_rec_approve'));
    }

    public function loadingUnloadingGatepass()
    {
        $totalcount = DB::table('gatepasses')
            ->count();
        $pendingcount = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->count();
        $pendingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $approvecount = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->count();
        $approvecountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $loadingcount = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->count();
        $loadingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $exitcount = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->count();
        $exitcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();
        $issuedcount = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->count();
        $issuedcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        if ($totalcount) {
            $pendingper = ($pendingcount / $totalcount) * 100;

            $approveper = ($approvecount / $totalcount) * 100;

            $loadingper = ($loadingcount / $totalcount) * 100;

            $exitper = ($exitcount / $totalcount) * 100;

            $issuedper = ($issuedcount / $totalcount) * 100;
        } else {
            $pendingper = 0;

            $approveper = 0;

            $loadingper = 0;

            $exitper = 0;

            $issuedper = 0;
        }
        $all_rec_loading_unloading = DB::table('gatepasses')->where('Status', 'Loading/Unloading')->latest()->get();
        return view('gatepass.loadingunloading', compact('issuedcount', 'issuedper', 'issuedcountforlast7days', 'pendingcount', 'pendingper', 'approvecount', 'approveper', 'loadingcount', 'loadingper', 'exitcount', 'exitper', 'exitcountforlast7days', 'loadingcountforlast7days', 'approvecountforlast7days', 'pendingcountforlast7days', 'all_rec_loading_unloading'));
    }

    public function exitGatepass()
    {
        $totalcount = DB::table('gatepasses')
            ->count();
        $pendingcount = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->count();
        $pendingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $approvecount = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->count();
        $approvecountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $loadingcount = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->count();
        $loadingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $exitcount = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->count();
        $exitcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();
        $issuedcount = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->count();
        $issuedcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        if ($totalcount) {
            $pendingper = ($pendingcount / $totalcount) * 100;

            $approveper = ($approvecount / $totalcount) * 100;

            $loadingper = ($loadingcount / $totalcount) * 100;

            $exitper = ($exitcount / $totalcount) * 100;

            $issuedper = ($issuedcount / $totalcount) * 100;
        } else {
            $pendingper = 0;

            $approveper = 0;

            $loadingper = 0;

            $exitper = 0;

            $issuedper = 0;
        }
        $all_rec_exit = DB::table('gatepasses')->where('Status', 'Exit')->latest()->get();
        return view('gatepass.exit', compact('issuedcount', 'issuedper', 'issuedcountforlast7days', 'pendingcount', 'pendingper', 'approvecount', 'approveper', 'loadingcount', 'loadingper', 'exitcount', 'exitper', 'exitcountforlast7days', 'loadingcountforlast7days', 'approvecountforlast7days', 'pendingcountforlast7days', 'all_rec_exit'));
    }

    public function issuedGatepass()
    {
        $totalcount = DB::table('gatepasses')
            ->count();
        $pendingcount = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->count();
        $pendingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Pending')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $approvecount = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->count();
        $approvecountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Approved')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $qcapprovecount = DB::table('gatepasses')
            ->where('Status', 'QC Approved')
            ->count();
        $qcapprovecountforlast7days = DB::table('gatepasses')
            ->where('Status', 'QC Approved')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $loadingcount = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->count();
        $loadingcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Loading/Unloading')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        $exitcount = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->count();
        $exitcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Exit')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();
        $issuedcount = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->count();
        $issuedcountforlast7days = DB::table('gatepasses')
            ->where('Status', 'Issued')
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->count();

        if ($totalcount) {
            $pendingper = ($pendingcount / $totalcount) * 100;

            $approveper = ($approvecount / $totalcount) * 100;

            $loadingper = ($loadingcount / $totalcount) * 100;

            $exitper = ($exitcount / $totalcount) * 100;

            $issuedper = ($issuedcount / $totalcount) * 100;
        } else {
            $pendingper = 0;

            $approveper = 0;

            $loadingper = 0;

            $exitper = 0;

            $issuedper = 0;
        }
        $issued = DB::table('gatepasses')->where('Status', 'Issued')->latest()->get();
        return view('gatepass.issued', compact('issuedcount', 'issuedper', 'issuedcountforlast7days', 'pendingcount', 'pendingper', 'approvecount', 'approveper', 'loadingcount', 'loadingper', 'exitcount', 'exitper', 'exitcountforlast7days', 'loadingcountforlast7days', 'approvecountforlast7days', 'pendingcountforlast7days', 'issued'));
    }

    public function create()
    {
        $users = User::where('Active', 1)->get();
        $transporter = Transporter::select('TransporterName', 'id')->get();
        $vtype = Appdirectory::where('MasterName', 'Vehicle')->get();

        return view('gatepass.create', compact('vtype', 'transporter', 'users'));
    }


    public function vehiclelist(Request $request)
    {
        $query = $request->input('query');
        $VehicleNos = Vehicle::select('VehicleNo')->where('VehicleNo', 'like', '%' . $query . '%')->get();
        return response()->json($VehicleNos);
    }

    public function vehiclecheck(Request $request)
    {
        $query = $request->input('query');
        $checkIngatepass = Gatepass::where('VehicleNo', $query)->count();
        if ($checkIngatepass == 1) {
            $status = Gatepass::where('VehicleNo', $query)->where('Status', '!=', 'ExitApproved')->count();
            if ($status == 1) {
                return response()->json([
                    'count' => 2,
                    'error' => 'Vehicle number already active! Please choose another vehicle.'
                ]);
            }
        } else {
            $count = Vehicle::select('VehicleNo')->where('VehicleNo', $query)->count();
            $vehicledata = Vehicle::join('transporters', 'transporters.id', '=', 'vehicles.TransporterId')
                ->where('VehicleNo', $query)
                ->select('vehicles.*', 'transporters.TransporterName')
                ->first();
            return response()->json([
                'count' => $count,
                'vehicledata' => $vehicledata
            ]);
        }
    }

    public function save_vehicle(Request $request)
    {
        try {
            Vehicle::create([
                'VehicleNo' => $request['VehicleNo'],
                'VehicleType' => $request['VehicleType'],
                'TransporterId' => $request['TransporterId'],
                'Notes' => $request['Notes'],
                'CreatedBy' => Auth::user()->id,

            ]);
            $Transporter = Transporter::select('TransporterName')->where('id', $request['TransporterId'])->first();
            return response()->json(['success' =>  '1', 'TransporterName' => $Transporter->TransporterName]);
        } catch (\Exception $exception) {
            return response()->json(['error' =>  'Please enter unique vehicleno!!']);
        }
    }


    public function transporterlist(Request $request)
    {
        $query = $request->input('query');
        $Transpoters = Transporter::select('TransporterName')->where('TransporterName', 'like', '%' . $query . '%')->get();
        return response()->json($Transpoters);
    }

    public function transportercheck(Request $request)
    {
        $query = $request->input('query');
        $count = Transporter::select('TransporterName')->where('TransporterName', $query)->count();
        $transporterdata = Transporter::where('TransporterName', $query)
            ->select('TransporterName')
            ->first();
        return response()->json([
            'count' => $count,
            'transporterdata' => $transporterdata
        ]);
    }

    public function licensenocheck(Request $request)
    {
        $query = $request->input('query');
        $GatepassType = $request->input('GatepassType');


        if ($GatepassType != 'Visit') {
            $count = Driver::select('LicenseNo')->where('LicenseNo', $query)->where('PersonType', 'Driver')->count();
            $driverdata = Driver::where('LicenseNo', $query)
                ->where('PersonType', 'Driver')
                ->first();
        } else {
            $count = Driver::select('LicenseNo')->where('LicenseNo', $query)->where('PersonType', 'Visitor')->count();
            $driverdata = Driver::where('LicenseNo', $query)
                ->where('PersonType', 'Visitor')
                ->select('LicenseNo', 'FirstName', 'LastName', 'DriverPhoto', 'LicencePhoto')
                ->first();
        }

        return response()->json([
            'count' => $count,
            'driverdata' => $driverdata
        ]);
    }

    public function save_driver(Request $request)
    {
        $Driver_image = $request['webcam1_image'];
        $National_image = $request['webcam2_image'];
        $DriverPhoto = $request->LicenseNo . '_driver' . '.' . 'jpg';
        $LicencePhoto = $request->LicenseNo . '_national' . '.' . 'jpg';

        try {
            // DriverPhoto
            $base64_str = substr($Driver_image, strpos($Driver_image, ",") + 1);
            $img = Image::make($base64_str);

            $New_img = $img->stream();
            $Cam_Scan =  base64_encode($New_img);
            Storage::put('cam1.txt',  $Cam_Scan);
            Storage::disk('public')->put('webcam/' . $DriverPhoto, (string) $New_img);

            // LicencePhoto
            $base64_str = substr($National_image, strpos($National_image, ",") + 1);
            $img = Image::make($base64_str);

            $New_img = $img->stream();
            $License_Scan =  base64_encode($New_img);
            Storage::put('cam2.txt',  $License_Scan);
            Storage::disk('public')->put('webcam/' . $LicencePhoto, (string) $New_img);

            Driver::create(
                [
                    'PersonType' => $request['PersonType'],
                    'FirstName' => $request['FirstName'],
                    'LastName' => $request['LastName'],
                    'LicenseNo' => $request['LicenseNo'],
                    'ContactNo' => $request['ContactNo'],
                    'DriverPhoto' => $DriverPhoto,
                    'LicencePhoto' => $LicencePhoto,
                    'Notes' =>  $request['Notes'],
                    'CreatedBy' => Auth::user()->id,
                    'Active' => 1,

                ]
            );
            return response()->json(['success' =>  '1', 'DriverPhoto' => $DriverPhoto, 'LicencePhoto' => $LicencePhoto]);
        } catch (\Exception $exception) {
            return response()->json(['error' =>  'Please enter unique NationalId!!']);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'ExpiredDate' => 'required',
        ]);
        try {
            Gatepass::create([
                'GatepassEntryTime' => Carbon::createFromFormat('d/m/Y H:i:s', $request['dateTime'])->format('Y-m-d H:i:s'),
                'GatepassType' => $request['GatepassType'],
                'VehicleNo' => $request['VehicleNo'],
                'Transporter' => $request['Transporter'],
                'DriverName' => $request['DriverName'],
                'LicenseNo' => $request['LicenseNo'],
                'DriverNote' => $request['DriverNote'],
                'Persontomeet' => $request['Persontomeet'],
                'ExpiredDate' => $request['ExpiredDate'],
                'UserId' => Auth::user()->id,
                'Notes' => $request['Notes'],
                'Status' => 'Pending',

            ]);
        } catch (\Exception $exception) {
            throw ValidationException::withMessages(['Something went worng']);
        }

        return redirect()->route('gatepass.index')
            ->with('success', 'Gatepass created successfully.');
    }


    public function edit(Gatepass $gatepass)
    {
        $users = User::where('Active', 1)->get();
        $driver = Driver::where('LicenseNo', $gatepass->LicenseNo)->first();
        $transporter = Transporter::select('TransporterName', 'id')->get();
        $vtype = Appdirectory::where('MasterName', 'Vehicle')->get();
        return view('gatepass.edit', compact('gatepass', 'users', 'vtype', 'transporter', 'driver'));
    }

    public function update(Gatepass $gatepass, Request $request)
    {
        // print_r($request->all());die();

        try {
            if ($request->submitBtn == 'Approved') {
                // print_r($gatepass->id);die();
                Gatepass::where('id', $gatepass->id)
                    ->update([
                        'Status' => 'Approved',
                        'ApprovedBy' => Auth::user()->id,
                        'ApproveTime' => Carbon::createFromFormat('d/m/Y H:i:s', $request['dateTime'])->format('Y-m-d H:i:s'),

                    ]);
            } else if ($request->submitBtn == 'QC Approved') {
                Gatepass::where('id', $gatepass->id)
                    ->update([
                        'Status' => 'QC Approved',
                    ]);
            }
            else if ($request->submitBtn == 'Loading/Unloading') {
                Gatepass::where('id', $gatepass->id)
                    ->update([
                        'Status' => 'Loading/Unloading',
                    ]);
            } else if ($request->submitBtn == 'Issued') {
                Gatepass::where('id', $gatepass->id)
                    ->update([
                        'Status' => 'Issued',
                    ]);
            } else if ($request->submitBtn == 'Exit') {
                Gatepass::where('id', $gatepass->id)
                    ->update([
                        'Status' => 'Exit',
                        'GatepassExitTime' => Carbon::createFromFormat('d/m/Y H:i:s', $request['dateTime'])->format('Y-m-d H:i:s'),
                    ]);
            } else {
                DB::table('gatepasses')
                    ->where('id', $id)
                    ->update([
                        'GatepassType' => $request['GatepassType'],
                        'VehicleNo' => $request['VehicleNo'],
                        'Transporter' => $request['Transporter'],
                        'DriverName' => $request['DriverName'],
                        'LicenseNo' => $request['LicenseNo'],
                        'DriverNote' => $request['DriverNote'],
                        'Persontomeet' => $request['Persontomeet'],
                        'ExpiredDate' => $request['ExpiredDate'],
                    ]);
            }
        } catch (\Exception $exception) {
            throw ValidationException::withMessages(['Something went worng']);
        }

        return redirect()->route('gatepass.index')
            ->with('success', 'Gatepass updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gatepass  $gatepass
     * @return \Illuminate\Http\Response
     */
    public function Gatepass_update(Request $request)
    {
        $flag = $this->checkPermission("GatePass", "IsUpdate");

        if ($flag) {
            try {
                $UserId = Auth::user()->id;
                $id = $request->input('id');
                $GatepassExitTime = $request->input('GatepassExitTime');
                $company = $request->input('company');
                $VehicleNo_str = $request->input('VehicleNo');
                $VehicleNo = strtoupper($VehicleNo_str);
                $TransporterID = $request->input('TransporterID');
                $DriverID = $request->input('DriverID');
                $D_licenseNo = $request->input('D_licenseNo');
                $VisitFor = $request->input('VisitFor');
                $Status = $request->input('Status');
                $Remark = $request->input('Remark');
                $GatepassType = $request->input('GatepassType');
                $TransactionType = $request->input('TransactionType');
                $ReturnCheck = $request->input('ReturnCheck') == 'on' ? 1 : 0;

                $request->validate([
                    'GatepassEntryTime' => 'nullable',
                    'VehicleNo' => 'required',
                    'TransporterID' => 'nullable',
                    'DriverID' => 'nullable',
                    'D_licenseNo' => 'nullable',
                    'VisitFor' => 'nullable',
                ]);

                try {
                    if ($Status != 'Exit Approved') {
                        DB::table('gatepasses')
                            ->where('id', $id)
                            ->update([
                                'CompanyID' => $company,
                                'VehicleNo' => $VehicleNo,
                                'TransporterID' => $TransporterID,
                                'DriverID' => $DriverID,
                                'D_licenseNo' => $D_licenseNo,
                                'VisitFor' => $VisitFor,
                                'Status' => $Status,
                                'GatepassType' => $GatepassType,
                                'TransactionType' => $TransactionType,
                                'UserId' => $UserId,
                                'ReturnCheck' => $ReturnCheck,
                                'Remark' => $Remark
                            ]);
                    } else {
                        DB::table('gatepasses')
                            ->where('id', $id)
                            ->update([
                                'GatepassExitTime' => $GatepassExitTime,
                                'CompanyID' => $company,
                                'VehicleNo' => $VehicleNo,
                                'TransporterID' => $TransporterID,
                                'DriverID' => $DriverID,
                                'D_licenseNo' => $D_licenseNo,
                                'VisitFor' => $VisitFor,
                                'Status' => $Status,
                                'GatepassType' => $GatepassType,
                                'TransactionType' => $TransactionType,
                                'UserId' => $UserId,
                                'ReturnCheck' => $ReturnCheck,
                                'Remark' => $Remark
                            ]);
                    }
                } catch (Exception $exception) {
                    Storage::put('gatepassupdate.txt', $exception);
                    $error = "Something was worng in data summary!! Please contact administration";
                    return response()->json(['error' => $error]);
                }

                return response()->json(['success' => True]);
            } catch (\Exception $exception) {
                Storage::put('87.txt', $exception);
                $error = "Something was worng !!  Please contact administration";
                return response()->json(['error' => $error]);
            }
        } else {
            return view('errors.error');
        }
    }
    public function Save_editorder(Request $request)
    {
        $id = $request->id;
        $ProductName = $request->ProductName;
        $product_Weight = $request->product_Weight;
        $Actual_Quantity = $request->Actual_Quantity;
        $Quantity = $request->Quantity;
        $SubWarehouse = $request->SubWarehouse;
        $Supervisor = $request->Supervisor;
        $Assign_qty = $request->Assign_qty;
        $LoadingType = $request->LoadingType;


        if ($Quantity != 'NaN' && $Actual_Quantity != '') {
            // $QtyVariance=($Quantity - $Actual_Quantity);
            $QtyVariance = ($Assign_qty - $Actual_Quantity);
            if ($QtyVariance > 0) {
                if ($QtyVariance < 0) {
                    $QtyVariance = (- ($QtyVariance));
                }
                $Actual_Theo_Weight = ($Actual_Quantity * $product_Weight);
                DB::table('gatepass_location_mapping')->where('id', $id)->update(['Actual_Quantity' => $Actual_Quantity, 'QtyVariance' => $QtyVariance, 'Actual_Theo_Weight', $Actual_Theo_Weight]);
            }
        }

        if ($Actual_Quantity == 0) {
            DB::table('gatepass_location_mapping')->where('id', $id)->update(['Actual_Quantity' => $Actual_Quantity, 'QtyVariance' => 0]);
        }
        if ($SubWarehouse != '') {
            DB::table('gatepass_location_mapping')->where('id', $id)->update(['Subwarehouse' => $SubWarehouse]);
        }
        if ($Supervisor != '') {
            DB::table('gatepass_location_mapping')->where('id', $id)->update(['Supervisor' => $Supervisor]);
        }
        if ($LoadingType != '') {
            DB::table('gatepass_location_mapping')->where('id', $id)->update(['LoadingType' => $LoadingType]);
        }
        if ($Assign_qty != 'NaN') {

            $calweight = ($product_Weight * $Assign_qty);
            DB::table('gatepass_location_mapping')->where('id', $id)->update(['Assign_Quantity' => $Assign_qty, 'Assign_Weight' => $calweight]);
        }
    }
    public function Verify_order(Request $request)
    {
        $id = $request->id;
        $ApprovedBy_Item = $request->ApprovedBy_Item;
        $success = $ApprovedBy_Item;

        DB::table('gatepass_location_mapping')->where('id', $id)->update(['ApprovedBy_Item' => $ApprovedBy_Item]);
        $success = "Verify successfully";
        return response()->json(['success' => $success]);
    }


    public function GL_delete(Request $request)
    {
        try {
            Storage::put('GL_delete.txt', $request);
            $id = $request->input('id');
            DB::table('gatepass_location_mapping')->where('id', '=', $id)->delete();
        } catch (\Exception $exception) {
            return view('errors.errors');
        }

        $error = "Detail delete successfully";
        return response()->json(['error' => $error]);
    }

    public function Warehouseloading(Request $request)
    {
        // $Sequenceno=$request->input('Sequenceno');
        $Gatepass_ID = $request->input('Gatepass_ID');
        $id = trim($Gatepass_ID, 'GP');
        $product_Weight = $request->input('product_Weight');
        $OrderNo = $request->input('OrderNo');
        $VehicleNo = $request->input('VehicleNo');
        $ProductName = $request->input('ProductName');
        $Quantity = $request->input('Quantity');
        $Assign_Quantity = $request->input('Assign_Quantity');
        $Weight = $request->input('Weight');
        $Actual_Quantity = $request->input('Actual_Quantity');
        $Actual_Weight = $request->input('Actual_Weight');
        $whuser = $request->input('whuser');
        $LoadingStatus = $request->input('LoadingStatus');
        $QtyVariance = $request->input('QtyVariance');

        if ($Assign_Quantity < $Actual_Quantity) {

            return Redirect::back()->withErrors(['danger' => 'Actual quntity can not be more then Assign quntity']);
        }



        if ($LoadingStatus == 'Loading') {
            if ($Actual_Quantity != 0) {
                // print_r($OrderNo);die();
                $QtyVariance = ($Quantity - $Actual_Quantity);
                if ($QtyVariance < 0) {
                    $QtyVariance = (- ($QtyVariance));
                }
                DB::table('gatepass_location_mapping')
                    ->where('Gatepass_ID', $id)
                    ->where('OrderNo', $OrderNo)
                    ->where('ProductName', $ProductName)
                    ->update(['Actual_Quantity' => $Actual_Quantity, 'Actual_Weight' => $Actual_Weight, 'User_incharge' => $whuser, 'LoadingStatus' => $LoadingStatus, 'QtyVariance' => $QtyVariance]);
            }
            return redirect()->route('ahome');   //Activeloading
        } else if ($LoadingStatus == 'Complete') {
            if ($Actual_Quantity != 0) {
                // print_r($OrderNo);die();
                $QtyVariance = ($Quantity - $Actual_Quantity);
                if ($QtyVariance < 0) {
                    $QtyVariance = (- ($QtyVariance));
                }
                DB::table('gatepass_location_mapping')
                    ->where('Gatepass_ID', $id)
                    ->where('OrderNo', $OrderNo)
                    ->where('ProductName', $ProductName)
                    ->update(['Actual_Quantity' => $Actual_Quantity, 'Actual_Weight' => $Actual_Weight, 'User_incharge' => $whuser, 'LoadingStatus' => $LoadingStatus, 'QtyVariance' => $QtyVariance]);
            }

            $Actual_Theo_Weight = floatval($Actual_Quantity * $product_Weight);
            DB::table('gatepass_location_mapping')
                ->where('Gatepass_ID', $id)
                ->where('OrderNo', $OrderNo)
                ->where('ProductName', $ProductName)
                ->update(['Actual_Theo_Weight' => $Actual_Theo_Weight]);

            $count_W =  DB::select('SELECT `warehouse`,`Subwarehouse`,sum(`Actual_Theo_Weight`) as `Actual_Theo_Weight`
                        FROM `gatepass_location_mapping`
                        WHERE `Gatepass_ID`="' . $id . '" AND `Supervisor` != "" AND `LoadingType`="Warehouse"
                        GROUP BY `warehouse`,`Subwarehouse`');
            $count = count($count_W);

            if ($count != 0) {
                for ($i = 0; $i < $count; $i++) {
                    $warehouse = $count_W[$i]->warehouse;
                    $SubWarehouse = $count_W[$i]->Subwarehouse;
                    $Actual_Theo_Weight = $count_W[$i]->Actual_Theo_Weight;

                    DB::table('gatepass_location_weight')
                        ->where('GatepassId', $id)
                        ->where('warehouse', $warehouse)
                        ->where('SubWarehouse', $SubWarehouse)
                        ->update(['Actual_theo_weight' => $Actual_Theo_Weight]);
                }
            }

            return redirect()->route('chome'); //Completeloading
        } else {
            return redirect()->route('home');
        }
    }
    public function PendingEntry()
    {
        $UserroleId = Auth::user()->UserRoleId;
        $PendingEntry = DB::select("SELECT gatepasses.*,us.FirstName,us.LastName FROM `gatepasses`  JOIN users as us ON us.id=gatepasses.UserId WHERE `Status`='Pending Entry' ORDER BY gatepasses.id DESC");
        $up = DB::select("SELECT * from userrole_permission WHERE UserRoleId='" . $UserroleId . "' AND PermissionId=3");
        return view('pendingentry', ['PendingEntry' => $PendingEntry, 'up' => $up]);
    }
    public function EntryApproved()
    {
        $UserroleId = Auth::user()->UserRoleId;
        $EntryApproved = DB::select("SELECT gatepasses.*,us.FirstName,us.LastName FROM `gatepasses`  JOIN users as us ON us.id=gatepasses.UserId WHERE `Status`='Entry Approved' ORDER BY gatepasses.id DESC");


        $up = DB::select("SELECT * from userrole_permission WHERE UserRoleId='" . $UserroleId . "' AND PermissionId=3");
        return view('EntryApproved', ['EntryApproved' => $EntryApproved, 'up' => $up]);
    }
    public function Rejected()
    {
        $UserroleId = Auth::user()->UserRoleId;
        $Rejected = DB::select("SELECT gatepasses.*,us.FirstName,us.LastName FROM `gatepasses`  JOIN users as us ON us.id=gatepasses.UserId WHERE `Status`='Rejected' ORDER BY gatepasses.id DESC");

        $up = DB::select("SELECT * from userrole_permission WHERE UserRoleId='" . $UserroleId . "' AND PermissionId=3");
        return view('Rejected', ['Rejected' => $Rejected, 'up' => $up]);
    }
    public function Verify()
    {
        $UserroleId = Auth::user()->UserRoleId;
        $Verify = DB::select("SELECT gatepasses.*,us.FirstName,us.LastName FROM `gatepasses`  JOIN users as us ON us.id=gatepasses.UserId WHERE `Status`='Verify' ORDER BY gatepasses.id DESC");

        $up = DB::select("SELECT * from userrole_permission WHERE UserRoleId='" . $UserroleId . "' AND PermissionId=3");
        return view('Verify', ['Verify' => $Verify, 'up' => $up]);
    }
    public function GatepassIssued()
    {
        $UserroleId = Auth::user()->UserRoleId;
        $GatepassIssued = DB::select("SELECT gatepasses.*,us.FirstName,us.LastName FROM `gatepasses`  JOIN users as us ON us.id=gatepasses.UserId WHERE `Status`='Gatepass Issued' ORDER BY gatepasses.id DESC");

        $up = DB::select("SELECT * from userrole_permission WHERE UserRoleId='" . $UserroleId . "' AND PermissionId=3");
        return view('GatepassIssued', ['GatepassIssued' => $GatepassIssued, 'up' => $up]);
    }
    public function ExitApproved()
    {
        $UserroleId = Auth::user()->UserRoleId;
        $ExitApproved = DB::select("SELECT gatepasses.*,us.FirstName,us.LastName FROM `gatepasses`  JOIN users as us ON us.id=gatepasses.UserId WHERE `Status`='Exit Approved' ORDER BY gatepasses.id DESC");

        $up = DB::select("SELECT * from userrole_permission WHERE UserRoleId='" . $UserroleId . "' AND PermissionId=3");
        return view('exit', ['ExitApproved' => $ExitApproved, 'up' => $up]);
    }
    public function Loading()
    {
        $UserroleId = Auth::user()->UserRoleId;
        $Loading = DB::select("SELECT gatepasses.*,us.FirstName,us.LastName FROM `gatepasses`  JOIN users as us ON us.id=gatepasses.UserId WHERE `Status`='Loading' AND VisitFor='Loading' ORDER BY gatepasses.id DESC");

        $up = DB::select("SELECT * from userrole_permission WHERE UserRoleId='" . $UserroleId . "' AND PermissionId=3");
        return view('Loading', ['Loading' => $Loading, 'up' => $up]);
    }
    public function OffLoading()
    {
        $UserroleId = Auth::user()->UserRoleId;
        $Loading = DB::select("SELECT gatepasses.*,us.FirstName,us.LastName FROM `gatepasses`  JOIN users as us ON us.id=gatepasses.UserId WHERE `Status`='Loading' AND VisitFor='OffLoading' ORDER BY gatepasses.id DESC");

        $up = DB::select("SELECT * from userrole_permission WHERE UserRoleId='" . $UserroleId . "' AND PermissionId=3");
        return view('OffLoading', ['Loading' => $Loading, 'up' => $up]);
    }


    public function destroy($id)
    {

        try {
            DB::table('gatepasses')->where('id', '=', $id)->update(['Status', 'Void']);
        } catch (\Exception $exception) {
            Storage::put('error.txt', $exception);
        }

        return redirect()->route('gatepass.index')
            ->with('danger', 'Gatepass Void successfully');
    }

    // QrCode::size(512)
    //          ->format('png')
    //          ->merge('/storage/app/twitter.jpg')
    //          ->errorCorrection('M')
    //          ->generate(
    //              'https://twitter.com/HarryKir',
    //          );



    public function approves(){
        return view('gatepass.approved');
    }




}
