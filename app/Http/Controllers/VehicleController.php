<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Models\Vehicle;
use App\Models\Appdirectory;
use App\Models\Transporter;
use Illuminate\Http\Request;
use DB;
use Auth;
use Str;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $UserId = Auth::user()->id;

        $userrole_permissions = DB::table('userrole_permission as up')
        ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
        ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
        ->select('up.*')
        ->where([['u.id', '=', $UserId],['p.permissionName', '=','Vehicle']])
        ->first();
       
        $vehicles = Vehicle::join('transporters', 'transporters.id', '=', 'vehicles.TransporterId')
                            ->orderBy('vehicles.id','DESC')
                            ->select('vehicles.*','transporters.TransporterName')
                            ->paginate(10); 

        return view('vehicles.index',compact('vehicles','userrole_permissions'));           
        
            
    }
                                
    public function create()
    {
        $vtype = Appdirectory::where('MasterName','Vehicle')->get();
        $transporter = Transporter::select('TransporterName','id')->get();
        return view('vehicles.create',compact('vtype','transporter'));  
    }

    public function store(Request $request)
    {
        $request->validate([
            'VehicleNo' => 'required',
            'VehicleType' => 'required',
            'TransporterId' => 'required',
            
        ]);
       
        try
        {
                Vehicle::create([
                    'VehicleNo'=>$request['VehicleNo'],
                    'VehicleType'=>$request['VehicleType'],
                    'TransporterId'=>$request['TransporterId'],
                    'Notes'=>$request['Notes'],
                    'CreatedBy'=>Auth::user()->id,

                    // 'UpdateBy'
                ]);
        }
        catch(\Exception $exception)
        {
            throw ValidationException::withMessages(['Please enter unique vehicleno!!']);
             
        }
                
        return redirect()->route('vehicles.index')
            ->with('success','Vehicle created successfully.');  
        
    }

    public function show(Vehicle $vehicle)
    {
        //
    }

    public function edit(Vehicle $vehicle)
    {
        $vtype = Appdirectory::where('MasterName','Vehicle')->get();
        $transporter = Transporter::select('TransporterName','id')->get();
        return view('vehicles.edit',compact('vtype','vehicle','transporter'));   
        
        
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'VehicleNo' => 'required',
            'VehicleType' => 'required',
            'TransporterId' => 'required',
        ]);
       
        try
        {
                Vehicle::where('id',$vehicle->id)->update([
                    'VehicleNo'=>$request['VehicleNo'],
                    'VehicleType'=>$request['VehicleType'],
                    'TransporterId'=>$request['TransporterId'],
                    'Notes'=>$request['Notes'],
                    'UpdateBy'=>Auth::user()->id,
                ]);
        }
        catch(\Exception $exception)
        {
            throw ValidationException::withMessages(['Please enter unique vehicleno!!']); 
        }
                
        return redirect()->route('vehicles.index')->with('success','Vehicle updated successfully.');  
    }

    public function Active_Vehicle(Request $request)                         
    {
        $id = $request->input('id');

        $Active =Vehicle::where('id',$id)->first();
        $Activeval =$Active->IsActive;

        if ($Activeval==0) 
        {
            Vehicle::where('id', '=', $id)->update(['IsActive' =>1]);
            return response()->json(['success' =>  true]);
        }
        else
        {
            Vehicle::where('id', '=', $id)->update(['IsActive' =>0]);
            return response()->json(['success' =>  false]);
        }
    }
         
    public function destroy($id)
    {
        Vehicle::where('id', '=', $id)->delete();
        return redirect()->back();
    }
          
}
               