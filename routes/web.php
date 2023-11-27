<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthCheckAdmin;
use App\Http\Middleware\AuthCheckOffice;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\Offices\OfficeController;
use App\Http\Controllers\Dasboard\DasboardController;

use App\Http\Controllers\Shipment\ShipmentController;
use App\Http\Controllers\PackageType\PackageTypeController;
use App\Http\Controllers\SupDasboard\SupDasboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', [OfficeController::class,"homePage"])->name("cargoTS");


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/home", function(){
   return  redirect()->route("super-admin");
});


Route::get('/country', [OfficeController::class,"getCountries"]);
Route::get('/states/{country_id}', [OfficeController::class,"getStates"]);
Route::get('/cities/{state_id}', [OfficeController::class,"getCities"]);


// <----------------Routing For Admin----------->





Route::middleware(AuthCheckOffice::class)->group(function(){

    Route::get('/admin', [DasboardController:: class,"Dasboard"])->name("admin-dashboard");


    Route::prefix('shipment')->group(function () {
    
        Route::get('/add-shipment', [ShipmentController::class,"addShipments"])->name("add-shipment");
       
        Route::post("/add-new-shipments", [ShipmentController::class,"postShipment"])->name("add-new-shipments"); 
    
        Route::get("/get-shipments", [ShipmentController::class,"get_shipments"])->name("get-shipments");

        Route::get("/receive-shipments", [ShipmentController::class,"receive_shipments"])->name("receive-shipments");
    
        Route::get("/view-shipment{id}", [ShipmentController::class,"view_shipment"])->name("view-shipment");

        Route::get("/edit-shipment{id}", [ShipmentController::class,"edit_shipment"])->name("edit-shipment");
    
        Route::post("/update-shipment{id}", [ShipmentController::class,"update_shipment"])->name("update-shipment");
    
        Route::get("/delete-shipment{id}", [ShipmentController::class,"delete_shipment"])->name("delete-shipment");
        
        Route::get("/update-location",[ShipmentController::class,"updateLocation"])->name("update-location");

        Route::post("/confirm-location",[ShipmentController::class,"confirmLocation"])->name("confirm-location");


        Route::post("/deliver", [ShipmentController::class,"deliveryShipment"])->name("shipments.deliver");
    });
    

} );



// <----------------Routing For Super Admin----------->

Route::middleware(AuthCheckAdmin::class)->group(function(){


    Route::get('/super-admin', [SupDasboardController:: class,"SupDasboard"])->name("super-admin");


    Route::prefix("offices")->group(function(){

        Route::get("/add-office",[OfficeController::class,"addOffice"])->name("add-office");

        Route::get("/our-offices",[OfficeController::class,"ourOffices"])->name("our-offices");

        Route::post("/post-office",[OfficeController::class,"postOffice"])->name("post-office");

        Route::get("/view-office{id}",[OfficeController::class,"viewOffice"])->name("view-office");

        Route::get("/edit-office{id}",[OfficeController::class,"editOffice"])->name("edit-office");

        Route::post("/update-office{id}",[OfficeController::class,"updateOffice"])->name("update-office");

        Route::get("/delete-office{id}",[OfficeController::class,"deleteOffice"])->name("delete-office");


     
    });


    Route::prefix('shipment')->group(function () {
        Route::get("/all-shipment", [ShipmentController::class,"get_super_shipments"])->name("super-all-shipment");
    });

    

    Route::prefix('package-type')->group(function () {

        Route::get('/',[PackageTypeController::class, "allPackageTypes"])->name("package-type");

        Route::get('/add-package', function () {return view('admin.add_package');})->name("add-package");
        
        Route::post("add-new-package", [PackageTypeController::class, "postPackageType"])->name('add-new-package');

        Route::get("edit-package/{id}", [PackageTypeController::class, "editPackageType"])->name('edit-package');

        Route::post("update-package/{id}", [PackageTypeController::class, "updatePackageType"])->name('update-package');

        Route::get("delete-package/{id}", [PackageTypeController::class, "deletePackage"])->name('delete-package');

    });

 

    Route::get("Settings", [PackageTypeController::class, "editSettings"])->name('Settings');
    Route::post("update-settings", [PackageTypeController::class, "updateSettings"])->name('update-settings');

});







///

Route::get("/search/offices",[OfficeController::class,"search"])->name("search-offices");