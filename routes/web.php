<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\outdoor\DignosisController;
use App\Http\Controllers\Backend\outdoor\ReportController;
use App\Http\Controllers\Backend\Account\Expenses\ExpensesController;

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

    //referance section
    Route::get('/refer-cost-view', [DignosisController::class, 'referCostView']);
    Route::get('/refer-cost-find/{id}', [DignosisController::class, 'referCostFind']);
    Route::get('/refer-cost-find-patient/{id}', [DignosisController::class, 'referCostFindPatient']);
    Route::get('/refer-cost-pay/{regNum}', [DignosisController::class, 'referCostPay']);

    // report section routes
    Route::get('/test-sale-report', [ReportController::class, 'testSaleReport'])->name('test.sale.report.View');
    Route::get('/total-sate-day-by-day', [ReportController::class, 'totalSaleDayByDay']);
    Route::get('/search-total-sale-day-by-day', [ReportController::class, 'searchTotalSaleDayByDay']);
    Route::get('/day-wise-sale-report', [ReportController::class, 'dayWiseSaleReport'])->name('day.wise.sale.report.View');
    Route::get('/search-date-wise-report', [ReportController::class, 'searchDateWiseReport']);
    Route::get('/user-wise-report-view', [ReportController::class, 'userWiseReportView']);
    Route::get('/user-wise-report', [ReportController::class, 'userWiseReport']);
    Route::get('/due-report', [ReportController::class, 'dueReport']);
    Route::get('/day-wise-due-report', [ReportController::class, 'dayWisedueReport']);
    Route::get('/search-date-wise-due-report', [ReportController::class, 'searchDayWiseDueReport']);
    Route::get('/user-wise-due-report', [ReportController::class, 'userDayWiseDueReport']);
    Route::get('/search-user-wise-due-report', [ReportController::class, 'searchUserDayWiseDueReport']);

    Route::get('/day-wise-cancel', [ReportController::class, 'dayWiseCancel']);
    Route::get('/search-date-wise-cancel', [ReportController::class, 'searchDateWiseCancel']);

    Route::get('/refer-cost-pay-report', [ReportController::class, 'referCostPayReport']);

    // expenses section 
    Route::get('/daily-expenses', [ExpensesController::class, 'dailyExpensesView']);
    Route::get('/daily-expenses-paid', [ExpensesController::class, 'expensesPaid']);
    Route::get('/expenses-setting', [ExpensesController::class, 'expensesSetting']);
    Route::get('/add-expenses-category', [ExpensesController::class, 'addExpenCat']);
    Route::get('/add-expenses-sub-category', [ExpensesController::class, 'addSubExpenCat']);
    Route::get('/get-sub-category/{id}', [ExpensesController::class, 'getSubCategory']);
    Route::get('/expenses-status-view/{id}', [ExpensesController::class, 'expensesStatusView']);
    Route::get('/daily-expenses-status-update', [ExpensesController::class, 'expensesStatusUpdate']);
    // expenses report section
    Route::get('/expenses-report', [ExpensesController::class, 'expensesReport']);
});

