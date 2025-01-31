<?php

namespace App\Http\Controllers;

use App\Models\warehouse;
use Illuminate\Http\Request;
use Auth;
use DB;
use Storage;
use Http;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flag = $this->checkPermission("Warehouse","IsRead");
        $UserId = Auth::user()->id;

        $userrole_permissions = DB::table('userrole_permission as up')
        ->join('users as u', 'u.UserRoleId', '=', 'up.UserRoleId')
        ->join('permissions as p', 'p.id', '=', 'up.PermissionId')
        ->select('up.*')
        ->where([['u.id', '=', $UserId],['p.permissionName', '=', 'Warehouse']])
        ->get()->first();

        if ($flag) 
        {

            $warehouse = DB::table('warehouses')->paginate(10); 
            return view('warehouse.index',compact('warehouse'),['userrole_permissions'=>$userrole_permissions]);
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
        $flag = $this->checkPermission("Warehouse","IsCreate");

        if ( $flag) 
        {
            $products = DB::table('products')->get();
            $companies = DB::table('companies')->get();
            return view('warehouse.create',['products'=>$products,'companies'=>$companies]);
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
    public function Warehouse_create(Request $request)
    {
        $flag = $this->checkPermission("Warehouse","IsCreate");

        if ( $flag) 
        {
            $warehouseNumber=$request->input('warehouseNumber');
            $warehouseName=$request->input('warehouseName');
            $KeyPersonEmail=$request->input('KeyPersonEmail');
            $CompanyID=$request->input('CompanyID');
            $WLocation=$request->input('WLocation');
            $KeyPersonName=$request->input('KeyPersonName');
            $P_quantity=$request->input('P_quantity');
            $P_quantity_string = substr($P_quantity, 0, -1);
            $P_quantity_Array = explode(",",$P_quantity_string);
            $count = count($P_quantity_Array);

            try{
                 warehouse::create([
                    'warehouseNumber' => $warehouseNumber,
                    'warehouseName' => $warehouseName,
                    'WLocation'=> $WLocation,
                    'KeyPersonName' => $KeyPersonName,
                    'KeyPersonEmail' =>  $KeyPersonEmail,
                      
                ]);
            }
            catch (\Exception $exception) 
            {
                 $error="warehouseNumber or warehouseName already exits!! Both Are Always Unique";
                 return response()->json(['error' => $error]);
            }

            if ($P_quantity != "") {
                $count = count($P_quantity_Array);
                try
                {
                    for($i=0;$i<$count;$i++) 
                    {
                      $P_QElements=explode(":", $P_quantity_Array[$i]);
                      $CompanyID = $P_QElements[0];
                      $ProductID = $P_QElements[1];
                      $Product_Quantity = $P_QElements[2];
                      $Product_Weight = $P_QElements[3];
                     
                      $WarehouseID=DB::table('warehouses')->max('id');
                      DB::table('warehouse_product_mapping')->insert(
                        ['WarehouseID' => $WarehouseID,
                         'CompanyID' => $CompanyID, 
                         'ProductID' => $ProductID, 
                         'Product_Quantity'=>$Product_Quantity,
                         'Product_Weight'=>$Product_Weight
                        ]);       
                    }
                }
                catch (\Exception $exception) {
                   $error="warehouseNumber or warehouseName already exits!! Both Are Always Unique";
                 return response()->json(['error' => $error]);         
            } 

                
            }
            
        }
        else 
        {
            return view('errors.error');
        }

    }

    public function Get_pdetails()
    {
        $response = Http::get('https://tarmalweighbridge.dcctz.com/dcc_api/public/api/get_item_master_data?api_token=', [
            'api_token' => '67e5d504e03ce2a28080452165a4620d'
        ]);

        $manage = json_decode($response,true);
        
        $success=$manage['success'];
        $data=$manage['data']; 
        $count_p=count($data);
        if ($success === true) 
        {
            for($i=0;$i<=$count_p-1;$i++) 
            { 

              $ProductID = preg_replace('/[^A-Za-z0-9\-\(\) ]/', ' ', $data[$i]['ItemName']);
              $Product_Code= $data[$i]['ItemCode'];
              $warehouseNumber = $data[$i]['WhsCode'];
              $SubWarehouse = $data[$i]['Sub-W/H'];
              $Product_Quantity = $data[$i]['OnHand'];
              $Product_Weight = floatval($data[$i]['TH. WEIGHT']);

              $Warehouse_no=DB::table('warehouses')->select('id')->where('warehouseNumber',$warehouseNumber)->get();
              
              if ($Warehouse_no->isEmpty()) {
                 continue;
              }
              else
              {
                $WarehouseID=$Warehouse_no[0]->id;

                $Count1=\DB::table('warehouse_product_mapping')->where('Product_Code',$Product_Code)->where('WarehouseID',$WarehouseID)->where('SubWarehouse',$SubWarehouse)->count();
                // echo "<pre>";printf($Count1);die;
                // Storage::put('co'.$i.'.txt',$Count1);
                if ($Count1 !=0) 
                {   
                    DB::table('warehouse_product_mapping')->where('WarehouseID',$WarehouseID)->where('Product_Code',$Product_Code)->where('SubWarehouse',$SubWarehouse)->update([
                          'Product_Quantity'=>$Product_Quantity,
                          'Product_Weight'=>$Product_Weight,
                          'ProductID'=>$ProductID
                        ]);
                }
                else
                {
                     DB::table('warehouse_product_mapping')
                     ->insert(['WarehouseID'=>$WarehouseID,
                              'SubWarehouse'=>$SubWarehouse,
                              'ProductID'=>$ProductID,
                              'Product_Quantity'=>$Product_Quantity,
                              'Product_Weight'=>$Product_Weight,
                              'Product_Code'=>$Product_Code
                            ]);
                } 
                
              }
             
            }
             
             return response()->json(["Message" => 'Successfully Get Data']);
        }
        else
        {
           return response()->json(["error" => 'Something Wrong']); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(warehouse $warehouse)
    {
        $flag = $this->checkPermission("Warehouse","IsUpdate");

        if ( $flag) 
        {
        $products = DB::table('products')->get();
        $id=$warehouse->id;
        $companies = DB::table('companies')->get();
        $w_p_m = DB::table('warehouse_product_mapping')->where('WarehouseID',$id)->get();
        return view('warehouse.edit',compact('warehouse'),['products'=>$products,'w_p_m'=>$w_p_m,'companies'=>$companies]); 
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
     * @param  \App\Models\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function Warehouse_update(Request $request)
    {   
        $flag = $this->checkPermission("Warehouse","IsUpdate");

        if ( $flag) 
        {            
            Storage::put('Warehouse_update.txt',$request);
            $WarehouseID=$request->input('WarehouseID');
            $warehouseNumber=$request->input('warehouseNumber');
            $warehouseName=$request->input('warehouseName');
            $CompanyID=$request->input('CompanyID');
            $KeyPersonEmail=$request->input('KeyPersonEmail');
            $WLocation=$request->input('WLocation');
            $KeyPersonName=$request->input('KeyPersonName');
            $P_quantity=$request->input('P_quantity');
            Storage::put('qty2.txt',$P_quantity);
            $P_quantity_string = substr($P_quantity, 0, -1);
            $P_quantity_Array = explode(",",$P_quantity_string);
            try {
                           
                DB::table('warehouses')
                  ->where('id',$WarehouseID)
                  ->update([
                        'warehouseNumber' => $warehouseNumber,
                        'warehouseName' => $warehouseName,
                        'KeyPersonEmail'  => $KeyPersonEmail,                   
                        'WLocation' => $WLocation,
                        'KeyPersonName' => $KeyPersonName,
                    ]);
            }
            catch (\Exception $exception) {
                   $error="warehouseNumber or warehouseName already exits!! Both Are Always Unique";
                 return response()->json(['error' => $error]);         
            }           
             

            if ($P_quantity != "") {
                $count = count($P_quantity_Array);
                 Storage::put('qty1.txt',$P_quantity_Array);
                for($i=1;$i<$count;$i++) 
                {
                    try
                    {
                      $P_QElements=explode(":", $P_quantity_Array[$i]);
                      Storage::put('qty.txt',$P_quantity_Array[$i]);
                      // echo "<pre>";print_r($P_QElements);die;
                      $SubWarehouse = $P_QElements[0];
                      $ProductID = $P_QElements[1];
                      $Product_Quantity = $P_QElements[2];
                      $Product_Weight = $P_QElements[3];
                         // echo "<pre>";print_r($Product_Weight);die;


                        $Count1=\DB::table('warehouse_product_mapping')->where('ProductID',$ProductID)->where('WarehouseID',$WarehouseID)->count();
                      // echo "<pre>";print_r($Count1);die;
                        if ($Count1 !=0 ) {   
                 
                        DB::update("UPDATE `warehouse_product_mapping` SET `Product_Quantity`='".$Product_Quantity."',`Product_Weight`='".$Product_Weight."' WHERE `WarehouseID`='".$WarehouseID."' AND `ProductID`='".$ProductID."' AND `SubWarehouse`='".$SubWarehouse."'");
                        }
                        else{
                        DB::table('warehouse_product_mapping')->insert(
                            ['WarehouseID' => $WarehouseID,
                             'SubWarehouse' => $SubWarehouse, 
                             'ProductID' => $ProductID, 
                             'Product_Quantity'=>$Product_Quantity,
                             'Product_Weight'=>$Product_Weight
                            ]); 
                        }  
                    }
                    catch (\Exception $exception) {
                        Storage::put('qty0.txt',$exception);
                           $error="Something was worng in products details!! Please contact administration";
                         return response()->json(['error' => $error]);         
                    }        
                            
                } 

            }
            
        }
        else 
        {
            return view('errors.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
   
    public function warehouse_productmapping_destroy(Request $request)
    {
        Storage::put('wpmid.txt',$request);
        $id= $request->input('id');
        DB::table('warehouse_product_mapping')->where('id', '=', $id)->delete();
        $error="Product detail delete successfully";
        return response()->json(['error' => $error]);   
    }

    public function destroy($id)
    {
        $flag = $this->checkPermission("Warehouse","IsDelete");

        if ( $flag) 
        {
            DB::table('warehouse_product_mapping')->where('WarehouseID', '=', $id)->delete();

            DB::table('warehouses')->where('id', '=', $id)->delete();


                return redirect()->route('warehouse.index')
                ->with('danger','Warehouse deleted successfully');
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