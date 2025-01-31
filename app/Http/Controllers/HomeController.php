<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Gatepass;
use Carbon\Carbon;
use Auth;
use DB;
use Storage;
use Session;
use File;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    
        $FromDate = $request->input('FormDate') ? Carbon::parse($request->input('FormDate'))->startOfDay() : null;
        $ToDate = $request->input('ToDate') ? Carbon::parse($request->input('ToDate'))->endOfDay() : null;        

        $UserId = Auth::user()->id;
        $UserroleId = Auth::user()->UserRoleId;
        // $up=DB::select("SELECT * from userrole_permission WHERE UserRoleId='".$UserroleId."' AND PermissionId=3");
        $up = DB::table('userrole_permission')->where('UserRoleId', $UserroleId)->where('PermissionId', 3)->get();
        $userrole_permissions_status = DB::table('userrole_permission as up')
            ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
            ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
            ->select('p.permissionName', 'up.*')
            ->where([['u.id', '=', $UserId], ['p.ParentFeatureID', '=', 14]])
            ->get();

        $UserRoleName = DB::table('user_roles')->select('UserRoleName')->where('id', $UserroleId)->get();
        $name_u = $UserRoleName[0]->UserRoleName;
     
        if($FromDate && $ToDate){
        
            $vehicles = Vehicle::join('transporters', 'transporters.id', '=', 'vehicles.TransporterId')
                ->whereBetween('vehicles.created_at', [$FromDate, $ToDate]) // Specify the table
                ->orderBy('vehicles.id', 'DESC')
                ->select('vehicles.*', 'transporters.TransporterName')
                ->paginate(5);

            $gatepasse = DB::table('gatepasses')
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->whereRaw('TIMESTAMPDIFF(HOUR, GatepassEntryTime, GatepassExitTime) > 24')
                ->get();

            $visitorGatepasses = DB::table('gatepasses')
                ->select(DB::raw('YEAR(GatepassEntryTime) as year, MONTH(GatepassEntryTime) as month, COUNT(*) as count'))
                ->where('GatepassType', 'Visit')
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get();

            $InwordGatepasses = DB::table('gatepasses')
                ->select(DB::raw('YEAR(GatepassEntryTime) as year, MONTH(GatepassEntryTime) as month, COUNT(*) as count'))
                ->where('GatepassType', 'Loading')
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get();

            $OutWordGateapss = DB::table('gatepasses')
                ->select(DB::raw('YEAR(GatepassEntryTime) as year, MONTH(GatepassEntryTime) as month, COUNT(*) as count'))
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->where('GatepassType', 'Unloading')
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get();

            $GateinOutTime = DB::table('gatepasses')
                ->select(
                    DB::raw('DATE_FORMAT(GatepassEntryTime, "%Y-%m") as month'),
                    DB::raw('SUM(TIMESTAMPDIFF(MINUTE, GatepassEntryTime, GatepassExitTime)) / 60 as total_time') // Convert to hours
                )
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $vehicleVsNetWeight = DB::table('gatepasses')
                ->select(
                    DB::raw('MONTH(GatepassEntryTime) as month'),
                    'VehicleNo',
                    DB::raw('SUM(NetWeight) as NetWeight')
                )
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->groupBy(DB::raw('MONTH(GatepassEntryTime), VehicleNo'))
                ->orderBy('month')
                ->get();

            $TotalGatepassCount=DB::table('gatepasses')->whereBetween('created_at', [$FromDate, $ToDate])->count();

            $TotalGatepassCountforlast7days = DB::table('gatepasses')
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                ->count();

            $exitcount = DB::table('gatepasses')
                ->where('Status', 'Exit')
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->count();
            $exitcountforlast7days = DB::table('gatepasses')
                ->where('Status', 'Exit')
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                ->count();

            $GatepassOverStayedVehicle = DB::table('gatepasses')
                ->whereRaw('TIMESTAMPDIFF(HOUR, GatepassEntryTime, GatepassExitTime) > 24')
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->count();

            $GatepassOverStayedVehicleforlast7days = DB::table('gatepasses')
                ->whereBetween('created_at', [$FromDate, $ToDate])
                ->whereRaw('TIMESTAMPDIFF(HOUR, GatepassEntryTime, GatepassExitTime) > 24')
                ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                ->count();

            $TotalGatepassVisitorCount=DB::table('gatepasses')->where('GatepassType','Visit')->whereBetween('created_at', [$FromDate, $ToDate])->count();

            $TotalGatepassVisitorforlast7daysCount=DB::table('gatepasses')->where('GatepassType','Visit')->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->whereBetween('created_at', [$FromDate, $ToDate])->count();
        }
        else
        {
            $vehicles = Vehicle::join('transporters', 'transporters.id', '=', 'vehicles.TransporterId')
                ->orderBy('vehicles.id', 'DESC')
                ->select('vehicles.*', 'transporters.TransporterName')
                ->paginate(5);

            $gatepasse = DB::table('gatepasses')
                ->whereRaw('TIMESTAMPDIFF(HOUR, GatepassEntryTime, GatepassExitTime) > 24')
                ->get();

            $visitorGatepasses = DB::table('gatepasses')
                ->select(DB::raw('YEAR(GatepassEntryTime) as year, MONTH(GatepassEntryTime) as month, COUNT(*) as count'))
                ->where('GatepassType', 'Visit')
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get();

            $InwordGatepasses = DB::table('gatepasses')
                ->select(DB::raw('YEAR(GatepassEntryTime) as year, MONTH(GatepassEntryTime) as month, COUNT(*) as count'))
                ->where('GatepassType', 'Loading')
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get();

            $OutWordGateapss = DB::table('gatepasses')
                ->select(DB::raw('YEAR(GatepassEntryTime) as year, MONTH(GatepassEntryTime) as month, COUNT(*) as count'))
                ->where('GatepassType', 'Unloading')
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get();

            $GateinOutTime = DB::table('gatepasses')
                ->select(
                    DB::raw('DATE_FORMAT(GatepassEntryTime, "%Y-%m") as month'),
                    DB::raw('SUM(TIMESTAMPDIFF(MINUTE, GatepassEntryTime, GatepassExitTime)) / 60 as total_time') // Convert to hours
                )
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $vehicleVsNetWeight = DB::table('gatepasses')
                ->select(
                    DB::raw('MONTH(GatepassEntryTime) as month'),
                    'VehicleNo',
                    DB::raw('SUM(NetWeight) as NetWeight')
                )
                ->groupBy(DB::raw('MONTH(GatepassEntryTime), VehicleNo'))
                ->orderBy('month')
                ->get();

            $TotalGatepassCount=DB::table('gatepasses')->count();

            $TotalGatepassCountforlast7days = DB::table('gatepasses')
                ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                ->count();

            $exitcount = DB::table('gatepasses')
                ->where('Status', 'Exit')
                ->count();

            $exitcountforlast7days = DB::table('gatepasses')
                ->where('Status', 'Exit')
                ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                ->count();

            $GatepassOverStayedVehicle = DB::table('gatepasses')
                ->whereRaw('TIMESTAMPDIFF(HOUR, GatepassEntryTime, GatepassExitTime) > 24')
                ->count();

            $GatepassOverStayedVehicleforlast7days = DB::table('gatepasses')
                ->whereRaw('TIMESTAMPDIFF(HOUR, GatepassEntryTime, GatepassExitTime) > 24')
                ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                ->count();

            $TotalGatepassVisitorCount=DB::table('gatepasses')->where('GatepassType','Visit')->count();

            $TotalGatepassVisitorforlast7daysCount=DB::table('gatepasses')->where('GatepassType','Visit')->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->count();
        }

        try {
            $gatepass = DB::select("select * from gatepasses  ORDER BY `id` DESC");
            $Exit24 = DB::select("SELECT * FROM gatepasses WHERE (`Status`='Gatepass Issued') OR (`Status`='Loading') OR (`Status`='Verify') OR (`Status`='Exit Approved'  AND `GatepassExitTime` >  now() - interval 24 hour) ORDER BY `id` DESC");
        } catch (Exception $exception) {
            return view('errors.errors');
        }
        return view('home', ['userrole_permissions_status' => $userrole_permissions_status, 'gatepass' => $gatepass, 'up' => $up, 'Exit24' => $Exit24, 'Company_Name' => '', 'name_u' => $name_u], compact('TotalGatepassCount','TotalGatepassCountforlast7days','exitcount','exitcountforlast7days','GatepassOverStayedVehicleforlast7days','TotalGatepassVisitorCount','TotalGatepassVisitorforlast7daysCount','vehicles', 'gatepasse', 'visitorGatepasses','InwordGatepasses','OutWordGateapss','GateinOutTime','vehicleVsNetWeight','GatepassOverStayedVehicle'));
    }

    public function checkPermission($PermissionName, $opration)
    {
        try {
            $UserId = Auth::user()->id;

            $userrole_permissions = DB::table('userrole_permission as up')
                ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
                ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
                ->select('up.*')
                ->where([['u.id', '=', $UserId], ['p.permissionName', '=', $PermissionName]])
                ->get()->first();


            if ($opration == 'IsRead') {
                if ($userrole_permissions->IsRead == 1) {
                    return true;
                }
            } else if ($opration == 'IsCreate') {
                if ($userrole_permissions->IsCreate == 1) {
                    return true;
                }
            } else if ($opration == 'IsUpdate') {
                if ($userrole_permissions->IsUpdate == 1) {
                    return true;
                }
            } else if ($opration == 'IsDelete') {
                if ($userrole_permissions->IsDelete == 1) {
                    return true;
                }
            } else if ($opration == 'IsExecute') {
                if ($userrole_permissions->IsExecute == 1) {
                    return true;
                }
            }
        } catch (Exception $exception) {
            return view('errors.errors');
        }

        return  false;
    }

    public function permission(Request $request, $PermissionName)
    {
        try {
            $UserId = Auth::user()->id;

            $userrole_permissions = DB::table('userrole_permission as up')
                ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
                ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
                ->select('up.*')
                ->where([['u.id', '=', $UserId], ['p.permissionName', '=', $PermissionName]])
                ->get();

            if ($userrole_permissions->IsRead == 0) {
                $request->session()->put('hello', 'hii');
            }
        } catch (Exception $exception) {
            return view('errors.errors');
        }
        return  false;
    }
}
