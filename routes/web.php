<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppdirectoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\GatepassController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransporterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\WarehouseController;

// use App\Http\Controllers\SalesorderController;
// use App\Http\Controllers\PurchaseorderController;
// use App\Http\Controllers\CompanyController;
// use App\Http\Controllers\ReportController;
// use App\Http\Controllers\SecurityController;
// use App\Http\Controllers\SuppliyerController;
// use App\Http\Controllers\ScrapController;
// use App\Http\Controllers\ScrapdailyreportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

  // Login
    Route::resource('login', LoginController::class);
    Route::namespace('Auth')->group(function ()
    {

      Route::get('/login',[App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
      Route::post('/login',[App\Http\Controllers\Auth\LoginController::class, 'process_login']);
      Route::get('/register',[App\Http\Controllers\Auth\LoginController::class, 'show_signup_form'])->name('register');
      Route::post('/register',[App\Http\Controllers\LoginController::class, 'process_signup']);
      Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    });


Route::group(['middleware' => "web"], function()
{
    Route::resource('appdirectory', AppdirectoryController::class);
    Route::resource('changes', ChangePasswordController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('gatepass', GatepassController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('products', ProductController::class);
    Route::resource('transporter', TransporterController::class);
    Route::resource('users', UserController::class);
    Route::resource('userroles', UserRoleController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('visitors', VisitorController::class);
    Route::resource('warehouse', WarehouseController::class);

    // Route::resource('salesorder', SalesorderController::class);
    // Route::resource('purchaseorder', PurchaseorderController::class);
    // Route::resource('companies', CompanyController::class);
    // Route::resource('reports', ReportController::class);
    // Route::resource('securities', SecurityController::class);
    // Route::resource('suppliyers', SuppliyerController::class);
    // Route::resource('scrap',ScrapController::class);
    // Route::resource('scrapdailyreports',ScrapdailyreportController::class);

    //Home

    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/dashboardFilter', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboardFilter');
    Route::get('/home/permission/{PermissionName}', [App\Http\Controllers\HomeController::class, 'permission']);

    // Driver

    Route::post('/Active_Blacklist', [App\Http\Controllers\DriverController::class, 'Active_Blacklist']);
    Route::post('/Active_Driver', [App\Http\Controllers\DriverController::class, 'Active_Driver']);

    // User

    Route::post('/Active_User', [App\Http\Controllers\UserController::class, 'Active_User']);

    // GatePass

    Route::post('/vehiclelist', [App\Http\Controllers\GatepassController::class, 'vehiclelist']);
    Route::post('/vehiclecheck', [App\Http\Controllers\GatepassController::class, 'vehiclecheck']);
    Route::post('/save_vehicle', [App\Http\Controllers\GatepassController::class, 'save_vehicle']);
    Route::post('/transporterlist', [App\Http\Controllers\GatepassController::class, 'transporterlist']);
    Route::post('/transportercheck', [App\Http\Controllers\GatepassController::class, 'transportercheck']);
    Route::post('/licensenocheck', [App\Http\Controllers\GatepassController::class, 'licensenocheck']);
    Route::post('/save_driver', [App\Http\Controllers\GatepassController::class, 'save_driver']);
    Route::get('/pendingGatepass', [App\Http\Controllers\GatepassController::class, 'pendingGatepass'])->name('pendingGatepass');
    Route::get('/approvedGatepass', [App\Http\Controllers\GatepassController::class, 'approved'])->name('approvedGatepass');
    Route::get('/loadingUnloadingGatepass', [App\Http\Controllers\GatepassController::class, 'loadingUnloadingGatepass'])->name('loadingUnloadingGatepass');
    Route::get('/exitGatepass', [App\Http\Controllers\GatepassController::class, 'exitGatepass'])->name('exitGatepass');
    Route::get('/issuedGatepass', [App\Http\Controllers\GatepassController::class, 'issuedGatepass'])->name('issuedGatepass');


    // Route::post('/CheckVehicle', [App\Http\Controllers\GatepassController::class, 'CheckVehicle']);
    // Route::post('/Gatepass/DriverDetails', [App\Http\Controllers\GatepassController::class, 'DriverDetails']);
    // Route::post('/Gatepass/Gatepasscreate', [App\Http\Controllers\GatepassController::class, 'Gatepass_create']);
    // Route::post('/Gatepass/Gatepassupdate', [App\Http\Controllers\GatepassController::class, 'Gatepass_update']);
    // Route::post('GL/GLdelete', [App\Http\Controllers\GatepassController::class, 'GL_delete']);
    // Route::post('/VehicleDetails', [App\Http\Controllers\GatepassController::class, 'VehicleDetails']);
    // Route::post('/CheckVehicleStatus', [App\Http\Controllers\GatepassController::class, 'CheckVehicleStatus']);
    // Route::post('/statuscheck', [App\Http\Controllers\GatepassController::class, 'statuscheck']);
    // Route::get('/PendingEntry', [App\Http\Controllers\GatepassController::class, 'PendingEntry']);
    // Route::get('/EntryApproved', [App\Http\Controllers\GatepassController::class, 'EntryApproved']);
    // Route::post('/Warehouse_loading', [App\Http\Controllers\GatepassController::class, 'Warehouseloading']);
    // Route::get('/GatepassIssued', [App\Http\Controllers\GatepassController::class, 'GatepassIssued']);
    // Route::get('/Rejected', [App\Http\Controllers\GatepassController::class, 'Rejected']);
    // Route::get('/Verify', [App\Http\Controllers\GatepassController::class, 'Verify']);
    // Route::get('/ExitApproved', [App\Http\Controllers\GatepassController::class, 'ExitApproved']);
    // Route::get('/Loading', [App\Http\Controllers\GatepassController::class, 'Loading']);
    // Route::get('/OffLoading', [App\Http\Controllers\GatepassController::class, 'OffLoading']);

    Route::post('/w_Verify', [App\Http\Controllers\GatepassController::class, 'W_Verify']);

    Route::post('/Vehicle_create', [App\Http\Controllers\GatepassController::class, 'Vehicle_create']);
    Route::post('/Driver_create', [App\Http\Controllers\GatepassController::class, 'Driver_create']);
    Route::post('/SO_Details', [App\Http\Controllers\GatepassController::class, 'SO_Details']);


    Route::post('/Active_Product', [App\Http\Controllers\ProductController::class, 'Active_Product']);
    // Route::post('/Product_Vehicle', [ProductController::class, 'updateActiveStatus'])->name('product.updateActive');



    Route::post('/Active_Vehicle', [App\Http\Controllers\VehicleController::class, 'Active_Vehicle']);
    Route::get('/activeloading', [App\Http\Controllers\GatepassController::class, 'whloading'])->name('whhome');
    Route::get('/loading', [App\Http\Controllers\GatepassController::class, 'Activeloading'])->name('ahome');
    Route::get('/completeloading', [App\Http\Controllers\GatepassController::class, 'Completeloading'])->name('chome');
    Route::post('/saveorder', [App\Http\Controllers\GatepassController::class, 'Save_editorder']);
    Route::post('/Verifyorder', [App\Http\Controllers\GatepassController::class, 'Verify_order']);

    // API's
    Route::get('/getdetails', [App\Http\Controllers\GatepassController::class, 'Get_Api']);

    // get_sap_product_api
    Route::get('/getproductdetails',[App\Http\Controllers\warehouseController::class, 'Get_pdetails']);

    // invoice
    Route::get('{id}/invoice',[App\Http\Controllers\InvoiceController::class, 'display'])->name('invoice');
    Route::get('{id}/print',[App\Http\Controllers\InvoiceController::class, 'prints']);

    //Warehouse
    Route::post('/Warehouse/Warehousecreate', [App\Http\Controllers\warehouseController::class, 'Warehouse_create']);
    Route::post('/Warehouse/Warehouseupdate', [App\Http\Controllers\warehouseController::class, 'Warehouse_update']);
    Route::post('Warehouse/Warehouse_pdelete',[App\Http\Controllers\warehouseController::class, 'warehouse_productmapping_destroy']);


    //Salesorder
    Route::post('SalesOrder/WPmappingDetails', [App\Http\Controllers\SalesorderController::class, 'WPmappingDetails']);
    Route::post('SO/SO_create', [App\Http\Controllers\SalesorderController::class, 'SO_create']);
    Route::post('SO/Sodelete', [App\Http\Controllers\SalesorderController::class, 'SO_delete']);
    Route::post('SO/SO_update', [App\Http\Controllers\SalesorderController::class, 'SO_update']);

    //Purchaseorder
    Route::post('SalesOrder/WPmappingDetails', [App\Http\Controllers\SalesorderController::class, 'WPmappingDetails']);
    Route::post('PO/PO_create', [App\Http\Controllers\PurchaseorderController::class, 'PO_create']);
    Route::post('PO/Podelete', [App\Http\Controllers\PurchaseorderController::class, 'PO_delete']);
    Route::post('PO/PO_update', [App\Http\Controllers\PurchaseorderController::class, 'PO_update']);

   //Appdirectory

    Route::post('/addVehicleType', [App\Http\Controllers\AppdirectoryController::class, 'VehicleType']);
    Route::post('/addVisitType', [App\Http\Controllers\AppdirectoryController::class, 'VisitType']);
    Route::post('/addProductType', [App\Http\Controllers\AppdirectoryController::class, 'ProductType']);

    Route::post('/DeleteAD',[App\Http\Controllers\AppdirectoryController::class, 'DeleteAD']);


    // delete

    Route::get('userroles/{id}/delete',[App\Http\Controllers\UserRoleController::class, 'destroy']);
    Route::get('products/{id}/delete',[App\Http\Controllers\ProductController::class, 'destroy']);
    Route::get('users/{id}/delete',[App\Http\Controllers\UserController::class, 'destroy']);
    Route::get('drivers/{id}/delete',[App\Http\Controllers\DriverController::class, 'destroy']);
    Route::get('locations/{id}/delete',[App\Http\Controllers\LocationController::class, 'destroy']);
    Route::get('transporter/{id}/delete',[App\Http\Controllers\TransporterController::class, 'destroy']);
    Route::get('gatepass/{id}/delete',[App\Http\Controllers\GatepassController::class, 'destroy']);
    Route::get('warehouse/{id}/delete',[App\Http\Controllers\warehouseController::class, 'destroy']);
    Route::get('Salesorder/{id}/delete',[App\Http\Controllers\SalesorderController::class, 'destroy']);
    Route::get('companies/{id}/delete',[App\Http\Controllers\CompanyController::class, 'destroy']);
     Route::get('vehicles/{id}/delete',[App\Http\Controllers\VehicleController::class, 'destroy']);
    //IssuedGatepass
    Route::get('gatepass/{id}/Issued',[App\Http\Controllers\GatepassController::class, 'Issued']);

    //CloseGatepass
    Route::post('/Close',[App\Http\Controllers\GatepassController::class, 'Close']);

    Route::post('/Close',[App\Http\Controllers\GatepassController::class, 'Close']);
     Route::post('data', [App\Http\Controllers\ReportController::class, 'data'])->name('data');
    Route::post('fetch', [App\Http\Controllers\SecurityController::class, 'fetch'])->name('fetch');
    //Supplier
    Route::post('catch',[App\Http\Controllers\SuppliyerController::class,'catch'])->name('catch');
    //Scrap
    Route::post('create',[App\Http\Controllers\ScrapController::class,'create'])->name('create');
});

