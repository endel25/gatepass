<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Auth;
use Storage;

class ProductController extends Controller
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
            ->where([['u.id', '=', $UserId],['p.permissionName', '=', 'Product']])
            ->get()->first();

            $products = Product::latest()->paginate(10);
            return view('products.index',compact('products'),['userrole_permissions'=>$userrole_permissions]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $ptype = DB::table('appdirectories')->where('MasterName','Product')->get();
        return view('products.create',['ptype'=>$ptype]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
             $request->validate([
                'ProductName' => 'nullable',
                'ProductCode' => 'required',
                'ProductPrice' =>'nullable',
                'Notes' => 'nullable'
            ]);
            $request['CreatedBy']= Auth::user()->id;

            Product::create($request->all());

        }
        catch (\Exception $exception)
        {
            // echo "<pre>";print_r($exception);die();
            throw ValidationException::withMessages(['Product Code already exits!! Product Code Are Always Unique']);
        }

            return redirect()->route('products.index')
            ->with('success','Product created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $ptype = DB::table('appdirectories')->where('MasterName','Product')->get();
        return view('products.edit',compact('product','ptype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

            $request->validate([
                'ProductName' => 'required',
                'ProductCode' => 'required|unique:products,ProductCode',
                'Notes' => 'nullable'
            ]);

            $request['UpdateBy']= Auth::user()->id;
            $product->update($request->all());

            return redirect()->route('products.index')
            ->with('success','Product updated successfully');



    }

    public function Active_Product(Request $request)
    {
        $id = $request->input('id');

        $Active =Product::where('id',$id)->first();
        $Activeval =$Active->IsActive;

        if ($Activeval==0)
        {
            Product::where('id', '=', $id)->update(['IsActive' =>1]);
            return response()->json(['success' =>  true]);
        }
        else
        {
            Product::where('id', '=', $id)->update(['IsActive' =>0]);
            return response()->json(['success' =>  false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect()->back();
   }
}
