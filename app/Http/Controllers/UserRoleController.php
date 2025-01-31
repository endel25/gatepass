<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;
use DB;
use Auth;
use Storage;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flag = $this->checkPermission("UserRole","IsRead");
        $UserId = Auth::user()->id;

        $userrole_permissions = DB::table('userrole_permission as up')
        ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
        ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
        ->select('up.*')
        ->where([['u.id', '=', $UserId],['p.permissionName', '=', 'UserRole']])
        ->get()->first();
        if ( $flag) 
        {
            try
            {
                $userrole = UserRole::latest()->paginate(10);
            }
            catch(Exception $exception)
            {
                return view('errors.errors');
            }
           
            return view('userroles.index',compact('userrole'),['userrole_permissions'=>$userrole_permissions]);  
        }
        else 
        {
            return view('errors.error');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $flag = $this->checkPermission("UserRole","IsCreate");

        if ( $flag) 
        {
            try
            {
                $warehouses=DB::table('warehouses')->get();
                $permission = [];
                $MstList=DB::table('permissions')->where('IsMaster',1)->get();
                foreach ($MstList as $mst) 
                {
                    array_push($permission,$mst);
                    $SubList=DB::table('permissions')->where('ParentFeatureID',$mst->id)->get();
                    foreach ($SubList as $sub) 
                    {
                        array_push($permission, $sub);                
                        $Sub_List=DB::table('permissions')->where('ParentFeatureID',$sub->id)->get();
                        foreach ($Sub_List as $sub_l) 
                        {               
                            array_push($permission, $sub_l);
                        }    
                    }             
                }
            }
            catch (\Exception $exception) 
            {
                return view('errors.errors');
            }
            //$permission = DB::table('permissions')->get();

            return view('userroles.create',['permission'=>$permission,'warehouses'=>$warehouses]); 
        }
        else 
        {
           return view('errors.error');
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
        $flag = $this->checkPermission("UserRole","IsCreate");

        if ( $flag) 
        {
                $request->validate([
                'UserRoleName' => 'required',
                'UserLocation' => 'nullable',
                'Active' => 'nullable',

                ]);

           $Active = $request->input('Active');
           $request['Active']= $Active == 'on'?1:0;

           try 
           {
              $userrole_id = UserRole::create($request->all())->id;

              $i=0;
              $j=0;
              foreach($request->input('items', []) as $item)
              {
                $j++;

                $per_roles = new UserRole($item);
                $per_roles->id= $request->input("id{$j}");
                $per_roles->IsRead =$request->input(["IsRead{$j}"])== 'on'?1:0;
                $per_roles->IsCreate = $request->input(["IsCreate{$j}"])== 'on'?1:0;
                $per_roles->IsUpdate = $request->input(["IsUpdate{$j}"])== 'on'?1:0;
                $per_roles->IsDelete = $request->input(["IsDelete{$j}"])== 'on'?1:0;
                $per_roles->IsExecute = $request->input(["IsExecute{$j}"])== 'on'?1:0;

                try
                {
                    DB::table('userrole_permission')->insert(
                    ['PermissionId' => $per_roles->id, 'UserRoleId' => $userrole_id,'IsRead' =>  $per_roles->IsRead,'IsCreate' =>  $per_roles->IsCreate,'IsDelete' =>  $per_roles->IsDelete,'IsUpdate' =>  $per_roles->IsUpdate,'IsExecute' =>  $per_roles->IsExecute]);
                }
                catch (\Exception $exception) 
                {
                    // echo"print_r($exception);";die;
                    return view('errors.errors');
                }
                

              }
            } 
            catch (\Exception $exception) 
            {
                // echo"print_r($exception);";die;
                return view('errors.errors');
            }

          return redirect()->route('userroles.index')
          ->with('success','UserRole created successfully.');    
        }
        else 
        {
             // echo"print_r($exception);";die;
           return view('errors.error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
     //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $userrole)
    {
        $flag = $this->checkPermission("UserRole","IsUpdate");

        if ( $flag) 
        {
            try
            {
                $warehouses=DB::table('warehouses')->get();
                $userrole->warehouses = $warehouses;
                $permission = [];
                $MstList = DB::table('permissions')
                ->leftJoin('userrole_permission as up', 'permissions.id', '=', 'up.PermissionId')
                ->select('permissions.*','up.IsRead as IsRead','up.IsCreate as IsCreate','up.IsUpdate as IsUpdate','up.IsDelete as IsDelete','up.IsExecute as IsExecute')
                 ->where('up.UserRoleId',$userrole->id)->get();

                 $RoleId = $userrole->id;

                //$up_mstlist=DB::table('userrole_permission')->where('UserRoleId',$userrole->id)->get();
                foreach ($MstList as $mst) 
                {
                    array_push($permission,$mst);
                    $SubList=DB::table('permissions')
                    ->leftJoin('userrole_permission as up', 'permissions.id', '=', 'up.PermissionId')
                    ->select('permissions.*','up.IsRead as IsRead','up.IsCreate as IsCreate','up.IsUpdate as IsUpdate','up.IsDelete as IsDelete','up.IsExecute as IsExecute')
                    ->where([['permissions.ParentFeatureID', '=', $mst->id],['up.UserRoleId', '><', $userrole->id]])                  
                    ->get();

                    foreach ($SubList as $sub) 
                    {
                        array_push($permission, $sub);                
                        $Sub_List=DB::table('permissions')
                        ->leftJoin('userrole_permission as up', 'permissions.id', '=', 'up.PermissionId')
                        ->select('permissions.*','up.IsRead as IsRead','up.IsCreate as IsCreate','up.IsUpdate as IsUpdate','up.IsDelete as IsDelete','up.IsExecute as IsExecute')
                         ->where([['permissions.ParentFeatureID', '=', $sub->id],['up.UserRoleId', '=', $userrole->id]]) 
                         ->get();
                        foreach ($Sub_List as $sub_l) 
                        {               
                            array_push($permission, $sub_l);
                        }    
                    }             
                }
            }
            catch (\Exception $exception) 
            {
                return view('errors.errors');
            }

            return view('userroles.edit',compact('userrole'),['permission'=>$permission,'warehouses'=>$warehouses]);  
        }
        else 
        {
           return view('errors.error');
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, UserRole $userrole)
    {
        $flag = $this->checkPermission("UserRole","IsUpdate");

        if ( $flag) 
        {
            try
            {
                $request->validate([
                'UserRoleName' => 'required',
                'UserLocation' => 'nullable',
                'Active' => 'nullable',

                ]);

                $Active = $request->input('Active');
                $request['Active']= $Active == 'on'?1:0;
             

                $userrole->update($request->all());
                $i=0;
                $j=0;
                foreach($request->input('items', []) as $item)
                {
                    
                    $j++;

                    $per_roles = new UserRole($item);
                    $per_roles->id= $request->input("id{$j}");
                    $per_roles->IsRead =$request->input(["IsRead{$j}"])== 'on'?1:0;
                    $per_roles->IsCreate = $request->input(["IsCreate{$j}"])== 'on'?1:0;
                    $per_roles->IsUpdate = $request->input(["IsUpdate{$j}"])== 'on'?1:0;
                    $per_roles->IsDelete = $request->input(["IsDelete{$j}"])== 'on'?1:0;
                    $per_roles->IsExecute = $request->input(["IsExecute{$j}"])== 'on'?1:0;

                    try
                    {
                        DB::table('userrole_permission')->where([['PermissionId', '=',$per_roles->id],['UserRoleId', '=', $userrole->id]])
                    ->update(
                        ['IsRead' =>  $per_roles->IsRead,'IsCreate' =>  $per_roles->IsCreate,'IsDelete' =>  $per_roles->IsDelete,'IsUpdate' =>  $per_roles->IsUpdate,'IsExecute' =>  $per_roles->IsExecute]);
                    }
                    catch (\Exception $exception) 
                    {
                        return view('errors.errors');
                    }
                    
                    
                }
            }
            catch (\Exception $exception) 
            {
                Storage::put('errors.txt',$exception);
                return view('errors.errors');
            }
                return redirect()->route('userroles.index')
                ->with('success','UserRole updated successfully');
        }
        else 
        {
           return view('errors.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $flag = $this->checkPermission("UserRole","IsDelete");

        if ( $flag) 
        {
            try
            {
                DB::table('user_roles')->where('id', '=', $id)->delete();
                DB::table('userrole_permission')->where('UserRoleId', '=', $id)->delete();
            }
            catch (\Exception $exception) 
            {
                return back()->withError("UserRole Is Active,Can't delete UserRole")->withInput();    
            }
          
            return redirect()->route('userroles.index')
            ->with('danger','UserRole deleted successfully');  
        }
        else 
        {
           return view('errors.error');
        } 
    }

    public function checkPermission($PermissionName,$opration)
    {

        $UserId = Auth::user()->id;

        $userrole_permissions = DB::table('userrole_permission as up')
        ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
        ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
        ->select('up.*')
        ->where([['u.id', '=', $UserId],['p.permissionName', '=', $PermissionName]])
        ->get()->first();

            //File::append('C:\Users\Admin\Desktop\test.txt', $userrole_permissions);


        if ($opration=='IsRead') 
        {
            if ($userrole_permissions->IsRead == 1)
            {
                return true;
            }
        }
        else if ($opration=='IsCreate')
        {
            if ($userrole_permissions->IsCreate == 1)
            {
               return true;
            }
        }        
        else if ($opration=='IsUpdate') 
        {
            if ($userrole_permissions->IsUpdate == 1)
            {
               return true;
            }
        }
        else if ($opration=='IsDelete') 
        {
            if ($userrole_permissions->IsDelete == 1)
            {
               return true;
            }
        }       
        else if ($opration=='IsExecute') 
        {
            if ($userrole_permissions->IsExecute == 1)
            {
                return true;
            }
        }

        return  false;
    }
}
