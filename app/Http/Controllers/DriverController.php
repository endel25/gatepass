<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use DB;
use Auth;
use Storage;
use Str;
use File;
Use Image;

class DriverController extends Controller
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
        ->where([['u.id', '=', $UserId],['p.permissionName', '=', 'Driver']])
        ->first();


        $drivers = Driver::latest()->get();
        return view('drivers.index',compact('drivers'),['userrole_permissions'=>$userrole_permissions]);
        
    }

    public function create()
    {
        return view('drivers.create');
    }

    
    public function store(Request $request)
    {
        // echo "<pre>";print_r($request->all());die();
        $request->validate([
            'PersonType' => 'required',
            'FirstName' => 'required',
            'LastName' => 'nullable',
            'webcam1_image' => 'required',
            'webcam2_image'=> 'required',
            'LicenseNo' => 'required',
            'ContactNo' => 'nullable',
            'Notes' => 'nullable'
        ]);

        $Driver_image=$request['webcam1_image'];
        $National_image=$request['webcam2_image'];
        $DriverPhoto=$request->LicenseNo.'_driver'.'.'.'jpg';
        $LicencePhoto=$request->LicenseNo.'_national'.'.'.'jpg';

        try
        {   
            // DriverPhoto 
            $base64_str = substr($Driver_image, strpos($Driver_image, ",")+1);
            $img = Image::make($base64_str);
            
            $New_img= $img->stream();
            $Cam_Scan=  base64_encode($New_img);
            Storage::put('cam1.txt',  $Cam_Scan);
            Storage::disk('public')->put('webcam/'.$DriverPhoto, (string) $New_img);

            // LicencePhoto 
            $base64_str = substr($National_image, strpos($National_image, ",")+1);
            $img = Image::make($base64_str);
           
            $New_img= $img->stream();
            $License_Scan=  base64_encode($New_img);
            Storage::put('cam2.txt',  $License_Scan); 
            Storage::disk('public')->put('webcam/'.$LicencePhoto, (string) $New_img);

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
                 'CreatedBy' =>Auth::user()->id,
                 'Active' =>1,

            ]);
        }
        catch(\Exception $exception)
        {
            throw ValidationException::withMessages(['Please enter unique National Id!!']);
             
        }

        return redirect()->route('drivers.index')
            ->with('success','Driver created successfully.');  
              
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    { 
        return view('drivers.edit',compact('driver'));
    }       

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Driver $driver)
    {
        // echo "<pre>";print_r($request->all());
        // echo "<pre>";print_r($driver);die();
      
        $request->validate([
            'PersonType' => 'required',
            'FirstName' => 'required',
            'LastName' => 'nullable',
            'webcam1_image' => 'nullable',
            'webcam2_image'=> 'nullable',
            'LicenseNo' => 'required',
            'ContactNo' => 'nullable',
            'Notes' => 'nullable'
        ]);

        $Driver_image=$request['webcam1_image'];
        $National_image=$request['webcam2_image'];
        $DriverPhoto=$request->LicenseNo.'_driver'.'.'.'jpg';
        $LicencePhoto=$request->LicenseNo.'_national'.'.'.'jpg';

        try
        {
            // DriverPhoto 
            if ($Driver_image) {
                $base64_str = substr($Driver_image, strpos($Driver_image, ",")+1);
                $img = Image::make($base64_str);
                
                $New_img= $img->stream();
                $Cam_Scan=  base64_encode($New_img);
                Storage::put('cam1.txt',  $Cam_Scan);
                Storage::disk('public')->put('webcam/'.$DriverPhoto, (string) $New_img);
            }
            if ($National_image) {
                // LicencePhoto 
                $base64_str = substr($National_image, strpos($National_image, ",")+1);
                $img = Image::make($base64_str);
               
                $New_img= $img->stream();
                $License_Scan=  base64_encode($New_img);
                Storage::put('cam2.txt',  $License_Scan); 
                Storage::disk('public')->put('webcam/'.$LicencePhoto, (string) $New_img);
            }
            
            Driver::where('id',$driver->id)
                    ->update([
                        'PersonType' => $request['PersonType'],
                        'FirstName' => $request['FirstName'],
                        'LastName' => $request['LastName'],
                        'LicenseNo' => $request['LicenseNo'],
                        'ContactNo' => $request['ContactNo'],
                        'DriverPhoto' => $DriverPhoto,
                        'LicencePhoto' => $LicencePhoto,
                        'Notes' =>  $request['Notes'],
                        'UpdateBy' =>Auth::user()->id,
                        'Active' =>1,
                    ]);
        }           
        catch(\Exception $exception)
        {
            print_r($exception);die();
            throw ValidationException::withMessages(['Please enter unique National Id!!']);
        }
            
        return redirect()->route('drivers.index')
            ->with('success','Driver updated successfully.');  
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $flag = $this->checkPermission("Driver","IsDelete");

        if ( $flag) 
        {
         DB::table('drivers')->where('id', '=', $id)->delete();

         return redirect()->route('drivers.index')
         ->with('danger','Driver deleted successfully');
         }
        else 
        {
            return view('errors.error');
        }  
    }
    
    public function Active_Driver(Request $request)
    {
      
        $id = $request->input('id');
        $Active =Driver::where('id', '=', $id)->first();
        $Activeval =$Active->Active;
        

        if ($Activeval==0) 
        {
            Driver::where('id',$id)->update(['Active' =>1]);
            return response()->json(['success' =>  true]);
        }
        else
        {
            Driver::where('id', $id)->update(['Active'=>0]);
            return response()->json(['success' =>  false]);
        }
    }
    public function Active_Blacklist(Request $request)
    {
      
        $id = $request->input('id');

        $Active =Driver::where('id',$id)->first();
        $Activeval =$Active->Blacklist;

        if ($Activeval==0) 
        {
            Driver::where('id', '=', $id)->update(['Blacklist' =>1]);
            return response()->json(['success' =>  true]);
        }
        else
        {
            Driver::where('id', '=', $id)->update(['Blacklist' =>0]);
            return response()->json(['success' =>  false]);
        }
    }
    
}
