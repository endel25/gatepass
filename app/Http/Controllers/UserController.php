<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use Log;
use Storage;


class UserController extends Controller
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
        ->where([['u.id', '=', $UserId],['p.permissionName', '=', 'User']])
        ->first();

        $users = User::latest()->paginate(10);
        return view('users.index',compact('users'),['userrole_permissions'=>$userrole_permissions]); 
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try 
        {
            $userrole = DB::table('user_roles')->get();
            return view('users.create',['userrole'=>$userrole]); 
        }
        catch (\Exception $exception) 
        {
            return view('errors.errors');
        }
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
                'FirstName' => 'required',
                'LastName' => 'nullable',
                'email' => 'required',
                'password' => 'required',
                'UserRoleId'=> 'required',
            ]);
            
            $request = User::create([
                'FirstName' => $request['FirstName'],
                'LastName' => $request['LastName'],
                'password' => Hash::make($request['password']),
                'ContactNo' => $request['ContactNo'],
                'email' => $request['email'],
                'EmailId' => $request['EmailId'],
                'Address' => $request['Address'],
                'Notes' => $request['Notes'],
                'UserRoleId' => $request['UserRoleId'],
                'Active'=>1
            ]);

        } 
        catch (\Exception $exception) 
        {
            // echo "<pre>";print_r($exception);die();
            throw ValidationException::withMessages(['User name already exits!! UserName Are Always Unique']);    
        }

        return redirect()->route('users.index')
                         ->with('success','User created successfully.'); 
        
    }
   
    public function edit(User $user)
    {
        
        try 
        {
            $userrole = DB::table('user_roles')->get();
        }
        catch (\Exception $exception) 
        {
            return view('errors.errors');
        }

        return view('users.edit',compact('user','userrole')); 
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         
        try 
        {
            $request->validate([
                'FirstName' => 'required',
                'LastName' => 'nullable',
                'email' => 'required',
                'password' => 'required',
                'UserRoleId'=> 'required',
                
            ]);
            
     
            $user->update([
                'FirstName' => $request['FirstName'],
                'LastName' => $request['LastName'],
                'password' => Hash::make($request['password']),
                'ContactNo' => $request['ContactNo'],
                'email' => $request['email'],
                'EmailId' => $request['EmailId'],
                'Address' => $request['Address'],
                'Notes' => $request['Notes'],
                'UserRoleId' => $request['UserRoleId'],
            ]);
        }
        catch (\Exception $exception) 
        {
            return view('errors.errors');
        }

        return redirect()->route('users.index')
        ->with('success','User Update successfully.'); 
    }
    
    public function Active_User(Request $request)
    {
        $id = $request->input('id');

        $Active =User::where('id',$id)->first();
        $Activeval =$Active->Active;

        if ($Activeval==0) 
        {
            User::where('id',$id)->update(['Active' =>1]);
            return response()->json(['success' =>  true]);
        }
        else
        {
            User::where('id',$id)->update(['Active' =>0]);
            return response()->json(['success' =>  false]);
        }
        
    }

    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back();
    }

    

}
