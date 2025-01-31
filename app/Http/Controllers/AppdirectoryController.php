<?php

namespace App\Http\Controllers;

use App\Models\Appdirectory;
use Illuminate\Http\Request;
use DB;
use Storage;

class AppdirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appdirectory=DB::table('appdirectories')->get();
        return view('appdirectory.index',compact('appdirectory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appdirectory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function VehicleType(Request $request)
    {
        
        $VehicleType = $request->VehicleType;

        DB::table('appdirectories')->insert(
                [
                 'MasterName' =>'Vehicle',
                 'FieldName'=>'VehicleType',
                 'FieldValue'  => $VehicleType,                    
                
                ]);

       return response()->json(['success' => True]);
    }
    public function VisitType(Request $request)
    {
       
        $VisitType = $request->VisitType;

        DB::table('appdirectories')->insert(
                [
                 'MasterName' =>'Gatepass',
                 'FieldName'=>'VisitPurpose',
                 'FieldValue'  => $VisitType,                    
                
                ]);

       return response()->json(['success' => True]);
    }
    public function ProductType(Request $request)
    {
       
        $ProductType = $request->ProductType;

        DB::table('appdirectories')->insert(
                [
                 'MasterName' =>'Product',
                 'FieldName'=>'ProductType',
                 'FieldValue'  => $ProductType,                    
                
                ]);

       return response()->json(['success' => True]);
    }
    
    public function DeleteAD(Request $request)
    {
        $id = $request->id;
        DB::table('appdirectories')->where('id', '=', $id)->delete();
       return response()->json(['success' => True]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appdirectory  $appdirectory
     * @return \Illuminate\Http\Response
     */
    public function show(Appdirectory $appdirectory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appdirectory  $appdirectory
     * @return \Illuminate\Http\Response
     */
    public function edit(Appdirectory $appdirectory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appdirectory  $appdirectory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appdirectory $appdirectory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appdirectory  $appdirectory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appdirectory $appdirectory)
    {
        //
    }
}
