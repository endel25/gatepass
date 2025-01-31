<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use DB;
use Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserId = Auth::user()->id;

            $userrole_permissions=DB::table('userrole_permission as up')
            ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
            ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
            ->select('up.*')
            ->where([['u.id', '=', $UserId],['p.permissionName', '=', 'Location']])
            ->get()->first();

        $locations = DB::table('locations')->paginate(10);
        return view('locations.index',compact('locations'),['userrole_permissions'=>$userrole_permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('locations.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        Location::create($request->all());
         return redirect()->route('locations.index')
            ->with('success','Location created successfully.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('locations.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $location->update($request->all());

        return redirect()->route('locations.index')
        ->with('success','Location updated successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
