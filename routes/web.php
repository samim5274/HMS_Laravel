<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\outdoor\DignosisController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin-register', [AdminController::class, 'viewAdminRegister'])->name('admin.register.view');
Route::get('/register-new-admin', [AdminController::class, 'insertAdmin']);
Route::get('/admin-login', [AdminController::class, 'viewAdminLogin'])->name('admin.login.view');
Route::get('/admin-user-login', [AdminController::class, 'AdminLogin']);

Route::group(['middleware'=>'admin'], function(){
    // dashboard section
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout']);

    // dignosis test outdoor section
    Route::get('/test-details', [DignosisController::class, 'testDetailsView'])->name('test.Details.View');
    Route::get('/get-sub-category/{id}', [DignosisController::class, 'getSubCategory']);
    Route::get('/add-test-details', [DignosisController::class, 'addTest'])->name('test.Details.View');

    Route::get('/dignosis-test-setting', [DignosisController::class, 'settingView'])->name('test.setting.View');

    Route::get('/add-category', [DignosisController::class, 'addCategory']);
    Route::get('/add-sub-category', [DignosisController::class, 'addSubCategory']);
    Route::get('/add-specimen', [DignosisController::class, 'addSpecimen']);
    Route::get('/add-group', [DignosisController::class, 'addGroup']);
    Route::get('/add-doctor', [DignosisController::class, 'addDoctor']);
    Route::get('/add-reference', [DignosisController::class, 'addReference']);

    Route::get('/add-item/{id}', [DignosisController::class, 'addItem']);
    Route::get('/remove-item/{id}', [DignosisController::class, 'removeItem']);
    Route::get('/add-test-sale', [DignosisController::class, 'saleTest']);

    Route::get('/test-sale-view', [DignosisController::class, 'testSaleView'])->name('test.sale.View');
    Route::get('/deu-collection-view', [DignosisController::class, 'deuCollectionView'])->name('test.sale.View');
    Route::get('/deu-collection/{id}', [DignosisController::class, 'deuCollection'])->name('due.collection.View');
    Route::get('/due-collection-update/{id}', [DignosisController::class, 'deuCollectionUpdate']);

    Route::get('/test-sale-return-view', [DignosisController::class, 'testSaleReturnView'])->name('test.sale.return.View');
    Route::get('/test-return/{id}', [DignosisController::class, 'testReturn']);
    Route::get('/test-return-status/{id}', [DignosisController::class, 'testReturnStatus']);

    Route::get('/test-cancel-view', [DignosisController::class, 'testCancelView'])->name('test.cancel.View');
    Route::get('/test-cancel/{id}', [DignosisController::class, 'testCancel']);
    Route::get('/test-cancel-status/{id}', [DignosisController::class, 'testCancelStatus']);

    // report section routes

    Route::get('/test-sale-report', [DignosisController::class, 'testSaleReport'])->name('test.sale.report.View');
});

