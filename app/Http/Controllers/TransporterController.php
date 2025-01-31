<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Models\Transporter;
use Illuminate\Http\Request;
use DB;
use Auth;
use Storage;

class TransporterController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $UserId = Auth::user()->id;

            $userrole_permissions=DB::table('userrole_permission as up')
            ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
            ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
            ->select('up.*')
            ->where([['u.id', '=', $UserId],['p.permissionName', '=', 'Transporter']])
            ->get()->first();

            $transpoter = Transporter::latest()->paginate(10);
        }
        catch (\Exception $exception) 
        {
            return view('errors.errors');
        }
       
        return view('transporters.index',compact('transpoter'),['userrole_permissions' => $userrole_permissions]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transporters.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        try
        {
            $request->validate([
                'TransporterCode' => 'required',
                'TransporterName' => 'required',
                'ContactNo' => 'nullable',
                'Email' => 'nullable',
                'Address'=> 'nullable',
                'Notes' => 'nullable',
            ]);

            $request['CreatedBy']= Auth::user()->id;


            Transporter::create($request->all());
        }
        catch (\Exception $exception) 
        {
            Storage::put('transporter.txt',$exception);
           throw ValidationException::withMessages(['Please enter unique Transporter Code']);
        }
        

        return redirect()->route('transporter.index')
        ->with('success','Transporter created successfully.');
       
    }

   
    
     public function show(Transporter $transporter)
     {
            //
     }

    
    public function edit(Transporter $transporter)
    {  
        return view('transporters.edit',compact('transporter')); 
       
    }

   
    public function update(Request $request,Transporter $transporter)
    {
        
            try
            {
                $request->validate([
                    'TransporterCode' => 'required',
                    'TransporterName' => 'required',
                    'ContactNo' => 'nullable',
                    'Email' => 'nullable',
                    'Address'=> 'nullable',
                    'Notes' => 'nullable',
                ]);

                $transporter->update($request->all());
            }
            catch (\Exception $exception) 
            {
                 throw ValidationException::withMessages(['Please enter unique Transporter Code']);
            }
            

            return redirect()->route('transporter.index')
            ->with('success','Transporter updated successfully');
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            Transporter::where('id', '=', $id)->delete();
        }
        catch (\Exception $exception) 
        {
            throw ValidationException::withMessages(['Cannot delete transporter: Linked with vehicle.']);
        }
        

       return redirect()->back();
       
      
   }
  
   

}
