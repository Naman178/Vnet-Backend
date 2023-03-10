<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProformaInvoice\ProformaInvoiceController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\role\RoleController;
use App\Http\Controllers\Consignment\ConsignmentController;
use App\Http\Controllers\ProfileSettings\ProfileSettingsController;
use App\Http\Controllers\PurchaseOrder\PurchaseOrderController;
use App\Http\Controllers\Invoice\InvoiceController;
use Dcblogdev\Xero\Facades\Xero;
use App\Http\Controllers\Settings\SettingsController;

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
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.dashboardv1');
    })->name('dashboard');

    //User Module
    Route::get('/user',[UserController::class,'index'])->name('user-index');
    Route::post('/user/store',[UserController::class,'store'])->name('user-store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::get('/user/delete/{id}', [UserController::class, 'remove'])->name('user-delete');
    Route::get('/user/sendResetPassword/{email}', [UserController::class, 'sendResetPassword'])->name('user-send-reset-password');

    //Role Module
    Route::resource('roles', RoleController::class);

    //Profile Settings Module
    Route::get('/profilesettings/{id}',[ProfileSettingsController::class,'index'])->name('profile-settings');
    Route::post('/profilesettings/store',[ProfileSettingsController::class,'store'])->name('profilesettings-store');
    Route::get('/changePassword', [ProfileSettingsController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword', [ProfileSettingsController::class, 'changePasswordPost'])->name('changePasswordPost');

    //Settings Module
    Route::get('/settings',[SettingsController::class,'index'])->name('settings-index');
    Route::post('/settings/store',[SettingsController::class,'store'])->name('settings-store');
});
