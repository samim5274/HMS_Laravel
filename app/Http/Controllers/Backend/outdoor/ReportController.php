<?php

namespace App\Http\Controllers\Backend\outdoor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Specimen;
use App\Models\Subcategory;
use App\Models\Group;
use App\Models\Testdetails;
use App\Models\Doctor;
use App\Models\Reference;
use App\Models\Refercost;
use App\Models\Storetest;
use App\Models\Testsaledetails;
use Auth;
use App\Models\Admin;

class ReportController extends Controller
{
    
    public function testSaleReport()
    {
        $today = date('Y-m-d');
        $last7days = date('Y-m-d', strtotime('-7 days'));
        $last30days = date('Y-m-d', strtotime('-30 days'));
        
        $testSale = Testsaledetails::where('status',1)->where('date',$today)->get();
        // $sum = Testsaledetails::where('status',1)->where('date',$today)->sum('pay');
        // $sum2 = Testsaledetails::where('status',1)->where('date',$today)->sum('payable');
        // $sum3 = Testsaledetails::where('status',1)->where('date',$today)->sum('total');
        // $sum4 = Testsaledetails::where('status',1)->where('date',$today)->sum('discount');
        // $sum5 = Testsaledetails::where('status',1)->where('date',$today)->sum('due');
        
        // $data7days = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->get();
        // $sum6 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('pay');
        // $sum7 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('payable');
        // $sum8 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('total');
        // $sum9 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('discount');
        // $sum10 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('due');

        // $data30days = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->get();
        // $sum11 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('pay');
        // $sum12 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('payable');
        // $sum13 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('total');
        // $sum14 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('discount');
        // $sum15 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('due');

        function getSums($startDate, $endDate) {
            return Testsaledetails::selectRaw(
                'SUM(pay) as total_pay, 
                SUM(payable) as total_payable, 
                SUM(total) as total_total, 
                SUM(discount) as total_discount, 
                SUM(due) as total_due'
            )
            ->where('status', 1)
            ->whereBetween('date', [$startDate, $endDate])
            ->first();
        }

        // Fetch data for 'today'
        $testSaleToday = Testsaledetails::where('status', 1)->where('date', $today)->get();
        $sumsToday = getSums($today, $today);

        // Today sums
        $sum = $sumsToday->total_pay;
        $sum2 = $sumsToday->total_payable;
        $sum3 = $sumsToday->total_total;
        $sum4 = $sumsToday->total_discount;
        $sum5 = $sumsToday->total_due;

        
        // Fetch data for 'last 7 days'
        $data7days = Testsaledetails::where('status', 1)->whereBetween('date', [$last7days, $today])->get();
        $sums7days = getSums($last7days, $today);

        // Last 7 days sums
        $sum6 = $sums7days->total_pay;
        $sum7 = $sums7days->total_payable;
        $sum8 = $sums7days->total_total;
        $sum9 = $sums7days->total_discount;
        $sum10 = $sums7days->total_due;


        // Fetch data for 'last 30 days'
        $data30days = Testsaledetails::where('status', 1)->whereBetween('date', [$last30days, $today])->get();
        $sums30days = getSums($last30days, $today);

        // Last 30 days sums
        $sum11 = $sums30days->total_pay;
        $sum12 = $sums30days->total_payable;
        $sum13 = $sums30days->total_total;
        $sum14 = $sums30days->total_discount;
        $sum15 = $sums30days->total_due;


        return view('backend.outdoor.report.dignosisSale', compact('testSale','data7days','data30days','sum','sum2','sum3','sum4','sum5','sum6','sum7','sum8','sum9','sum10','sum11','sum12','sum13','sum14','sum15'));
    }

    public function totalSaleDayByDay(Request $request)
    {
        $today = date('Y-m-d');

        $last7days = date('Y-m-d', strtotime('-7 days'));
        $last30days = date('Y-m-d', strtotime('-30 days'));


        function getData($startDate, $endDate)
        {
            return Testsaledetails::selectRaw(
                'date,
                sum(pay) as pay,
                sum(payable) as payable,
                sum(total) as total,
                sum(discount) as discount,
                sum(due) as due'
            )
            ->where('status',1)
            ->whereBetween('date',[$startDate,$endDate])
            ->groupBy('date')
            ->get();
        }

        $testSaleDetails = getData($today, $today);
        $last7DaysData = getData($last7days, $today);
        $last30DaysData = getData($last30days, $today);

        function getSums($startDate, $endDate)
        {
            return Testsaledetails::selectRaw(
                'SUM(pay) as total_pay, 
                SUM(payable) as total_payable, 
                SUM(total) as total_total, 
                SUM(discount) as total_discount, 
                SUM(due) as total_due'
            )
            ->where('status', 1)
            ->whereBetween('date', [$startDate, $endDate])
            ->first();
        }

        // get today data
        $sums = getSums($today, $today);
        $sum = $sums->total_pay;
        $sum2 = $sums->total_payable;
        $sum3 = $sums->total_total;
        $sum4 = $sums->total_discount;
        $sum5 = $sums->total_due;

        // get 7 days data
        $sum7s = getSums($last7days, $today);
        $sum6 = $sum7s->total_pay;
        $sum7 = $sum7s->total_payable;
        $sum8 = $sum7s->total_total;
        $sum9 = $sum7s->total_discount;
        $sum10 = $sum7s->total_due;

        // get 30 days data
        $sum30s = getSums($last30days, $today);
        $sum11 = $sum30s->total_pay;
        $sum12 = $sum30s->total_payable;
        $sum13 = $sum30s->total_total;
        $sum14 = $sum30s->total_discount;
        $sum15 = $sum30s->total_due;

        return view('backend.outdoor.report.dayByDayTotalSale', compact('testSaleDetails','last7DaysData','last30DaysData','sum','sum2','sum3','sum4','sum5','sum6','sum7','sum8','sum9','sum10','sum11','sum12','sum13','sum14','sum15'));
    }

    public function searchTotalSaleDayByDay(Request $request)
    {
        $startDate = $request->has('dtpStartDate')? $request->get('dtpStartDate'):'';
        $endDate = $request->has('dtpEndDate')? $request->get('dtpEndDate'):'';

        if(empty($startDate) || empty($endDate)){
            return redirect()->back()->with('error', 'Please select start and end date');
        }

        function getData($startDate, $endDate)
        {
            return Testsaledetails::selectRaw(
                'date,
                sum(pay) as pay,
                sum(payable) as payable,
                sum(total) as total,
                sum(discount) as discount,
                sum(due) as due'
            )
            ->where('status',1)
            ->whereBetween('date',[$startDate,$endDate])
            ->groupBy('date')
            ->get();
        }

        $testSaleDetails = getData($startDate, $endDate);

        function getSums($startDate, $endDate)
        {
            return Testsaledetails::selectRaw(
                'SUM(pay) as total_pay, 
                SUM(payable) as total_payable, 
                SUM(total) as total_total, 
                SUM(discount) as total_discount, 
                SUM(due) as total_due'
            )
            ->where('status', 1)
            ->whereBetween('date', [$startDate, $endDate])
            ->first();
        }

        $sums = getSums($startDate, $endDate);

        $sum = $sums->total_pay;
        $sum2 = $sums->total_payable;
        $sum3 = $sums->total_total;
        $sum4 = $sums->total_discount;
        $sum5 = $sums->total_due;
        
        return view('backend.outdoor.report.dayByDayTotalSaleSearch', compact('testSaleDetails','sum','sum2','sum3','sum4','sum5'));
    }

    public function dayWiseSaleReport()
    {
        $today = date('Y-m-d');
        // $testSale = Testsaledetails::where('status',1)->where('date',$today)->get();
        // $sum = Testsaledetails::where('status',1)->where('date',$today)->sum('pay');
        // $sum2 = Testsaledetails::where('status',1)->where('date',$today)->sum('payable');
        // $sum3 = Testsaledetails::where('status',1)->where('date',$today)->sum('total');
        // $sum4 = Testsaledetails::where('status',1)->where('date',$today)->sum('discount');
        // $sum5 = Testsaledetails::where('status',1)->where('date',$today)->sum('due');
        
        // Fetching all sums in a single query for today
        $sumsToday = Testsaledetails::selectRaw(
            'SUM(pay) as total_pay, 
            SUM(payable) as total_payable, 
            SUM(total) as total_total, 
            SUM(discount) as total_discount, 
            SUM(due) as total_due'
        )
        ->where('status', 1)
        ->where('date', $today)
        ->first(); // Getting the sums for today

        // Fetching all records for today (if needed for other processing)
        $testSale = Testsaledetails::where('status', 1)->where('date', $today)->get();

        // Accessing the sums for today
        $sum = $sumsToday->total_pay;
        $sum2 = $sumsToday->total_payable;
        $sum3 = $sumsToday->total_total;
        $sum4 = $sumsToday->total_discount;
        $sum5 = $sumsToday->total_due;

        return view('backend.outdoor.report.dayWiseSaleReportView', compact('testSale','sum','sum2','sum3','sum4','sum5'));
    }

    public function searchDateWiseReport(Request $request)
    {
        $startDate = $request->has('dtpStartDate')? $request->get('dtpStartDate'):'';
        $endDate = $request->has('dtpEndDate')? $request->get('dtpEndDate'):'';
        if(empty($startDate) || empty($endDate)){
            return redirect()->back()->with('error', 'Please select start and end date');
        }
        
        $sums = Testsaledetails::selectRaw(
            'SUM(pay) as total_pay, 
            SUM(payable) as total_payable, 
            SUM(total) as total_total, 
            SUM(discount) as total_discount, 
            SUM(due) as total_due'
        )
        ->where('status', 1)
        ->whereBetween('date', [$startDate, $endDate])
        ->first(); 

        $testSale = Testsaledetails::where('status', 1)->whereBetween('date', [$startDate, $endDate])->get();

        $sum = $sums->total_pay;
        $sum2 = $sums->total_payable;
        $sum3 = $sums->total_total;
        $sum4 = $sums->total_discount;
        $sum5 = $sums->total_due;

        
        return view('backend.outdoor.report.dayWiseSaleReportView', compact('testSale','sum','sum2','sum3','sum4','sum5'));        
    }

    public function userWiseReportView()
    {
        $today = date('Y-m-d');
        $users = Admin::all();

        // Fetching all sums in a single query for today
        $sumsToday = Testsaledetails::selectRaw(
                'SUM(pay) as total_pay, 
                SUM(payable) as total_payable, 
                SUM(total) as total_total, 
                SUM(discount) as total_discount, 
                SUM(due) as total_due'
            )
            ->where('status', 1)
            ->where('date', $today)
            ->first(); // Getting the sums for today

        // Fetching all records for today (if needed for other processing)
        $testSale = Testsaledetails::where('status', 1)->where('date', $today)->get();

        // Accessing the sums for today
        $sum = $sumsToday->total_pay;
        $sum2 = $sumsToday->total_payable;
        $sum3 = $sumsToday->total_total;
        $sum4 = $sumsToday->total_discount;
        $sum5 = $sumsToday->total_due;

        return view('backend.outdoor.report.userWiseReportView', compact('testSale','users','sum','sum2','sum3','sum4','sum5'));
    }

    public function userWiseReport(Request $request)
    {
        $userid = $request->has('cbxUsername')? $request->get('cbxUsername'):'';
        $users = Admin::all();

        if(empty($userid) || $userid == '0'){
            return redirect()->back()->with('error', 'Please enter username');
        }

        $findUser = Admin::where('id',$userid)->first();
        
        $today = date('Y-m-d');
        
        // Fetching all sums in a single query for today and the specified user
        $sumsToday = Testsaledetails::selectRaw(
            'SUM(pay) as total_pay, 
            SUM(payable) as total_payable, 
            SUM(total) as total_total, 
            SUM(discount) as total_discount, 
            SUM(due) as total_due'
        )
        ->where('status', 1)
        ->where('date', $today)
        ->where('userId', $findUser->id)
        ->first(); // Getting the sums for today and the specific user

        // Fetching all records for today and the specified user (if needed for other processing)
        $testSale = Testsaledetails::where('status', 1)
                                ->where('date', $today)
                                ->where('userId', $findUser->id)
                                ->get();

        // Accessing the sums for today and the specific user
        $sum = $sumsToday->total_pay;
        $sum2 = $sumsToday->total_payable;
        $sum3 = $sumsToday->total_total;
        $sum4 = $sumsToday->total_discount;
        $sum5 = $sumsToday->total_due;

        return view('backend.outdoor.report.userWiseReportView', compact('testSale','users','sum','sum2','sum3','sum4','sum5'));
    }

    public function dueReport()
    {
        $today = date('Y-m-d');

        // Fetching all sums in a single query for today and duestatus = 1
        $sumsToday = Testsaledetails::selectRaw(
                'SUM(pay) as total_pay, 
                SUM(payable) as total_payable, 
                SUM(total) as total_total, 
                SUM(discount) as total_discount, 
                SUM(due) as total_due'
            )
            ->where('status', 1)
            ->where('duestatus', 1)
            ->where('date', $today)
            ->first(); // Getting the sums for today

        // Fetching all records for today and duestatus = 1 (if needed for other processing)
        $testSale = Testsaledetails::where('status', 1)
                                    ->where('duestatus', 1)
                                    ->where('date', $today)
                                    ->get();

        // Accessing the sums for today
        $sum = $sumsToday->total_pay;
        $sum2 = $sumsToday->total_payable;
        $sum3 = $sumsToday->total_total;
        $sum4 = $sumsToday->total_discount;
        $sum5 = $sumsToday->total_due;

        return view('backend.outdoor.report.dueReport', compact('testSale','sum','sum2','sum3','sum4','sum5'));
    }

    public function dayWisedueReport()
    {
        $today = date('Y-m-d');
        $testSale = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->get();
        $pay = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('pay');
        $payable = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('payable');
        $total = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('total');
        $discount = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('discount');
        $due = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('due');
        return view('backend.outdoor.report.dayWiseDueReport', compact('testSale','pay','payable','total','discount','due'));
    }

    public function searchDayWiseDueReport(Request $request) 
    {
        $startDate = $request->has('dtpStartDate')? $request->get('dtpStartDate'):'';
        $endDate = $request->has('dtpEndDate')? $request->get('dtpEndDate'):'';
        if(empty($startDate) || empty($endDate)){
            return redirect()->back()->with('error', 'Please select start and end date');
        }

        $testSale = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->get();
        $pay = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('pay');
        $payable = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('payable');
        $total = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('total');
        $discount = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('discount');
        $due = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('due');
        
        return view('backend.outdoor.report.dayWiseDueReport', compact('testSale','pay','payable','total','discount','due')); 
    }

    public function userDayWiseDueReport(Request $request)
    {
        $today = date('Y-m-d');
        $users = Admin::all();
        $testSale = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->get();
        $pay = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('pay');
        $payable = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('payable');
        $total = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('total');
        $discount = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('discount');
        $due = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('due');
        return view('backend.outdoor.report.userWiseDueReport', compact('testSale','users','pay','payable','total','discount','due'));
    }

    public function searchUserDayWiseDueReport(Request $request)
    {
        $userid = $request->has('cbxUsername')? $request->get('cbxUsername'):'';
        $users = Admin::all();

        if(empty($userid) || $userid == '0'){
            return redirect()->back()->with('error', 'Please enter username');
        }

        $findUser = Admin::where('id',$userid)->first();
        
        $today = date('Y-m-d');
        $testSale = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->get();
        
        $pay = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('pay');
        $payable = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('payable');
        $total = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('total');
        $discount = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('discount');
        $due = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('due');
        return view('backend.outdoor.report.userWiseDueReport', compact('testSale','users','pay','payable','total','discount','due'));
    }

    public function dayWiseCancel()
    {
        $today = date('Y-m-d');
        $testSale = Testsaledetails::where('status',3)->where('date',$today)->get();
        $payable = Testsaledetails::where('status',3)->where('date',$today)->sum('payable');
        $total = Testsaledetails::where('status',3)->where('date',$today)->sum('total');
        $return = Testsaledetails::where('status',3)->where('date',$today)->sum('return');
        return view('backend.outdoor.report.dayWiseCacelView', compact('testSale','payable','total','return'));
    }

    public function searchDateWiseCancel(Request $request)
    {
        $startDate = $request->has('dtpStartDate')? $request->get('dtpStartDate'):'';
        $endDate = $request->has('dtpEndDate')? $request->get('dtpEndDate'):'';

        if(empty($startDate) || empty($endDate)){
            return redirect()->back()->with('error', 'Please select start and end date');
        }
        
        $testSale = Testsaledetails::where('status',3)->whereBetween('date',[$startDate, $endDate])->get();
        $payable = Testsaledetails::where('status',3)->whereBetween('date',[$startDate, $endDate])->sum('payable');
        $total = Testsaledetails::where('status',3)->whereBetween('date',[$startDate, $endDate])->sum('total');
        $return = Testsaledetails::where('status',3)->whereBetween('date',[$startDate, $endDate])->sum('return');
        return view('backend.outdoor.report.dayWiseCacelView', compact('testSale','payable','total','return'));
    }

    public function referCostPayReport(Request $request)
    {
        $today = date('Y-m-d');
        $last7days = date('Y-m-d', strtotime('-7 days'));
        $last30days = date('Y-m-d', strtotime('-30 days'));

        function getDatas($startDate, $endDate)
        {
            return Refercost::selectRaw(
                'date,
                sum(amount) as amount,
                sum(paid) as paid'
            )
            ->where('status',1)
            ->whereBetween('date',[$startDate,$endDate])
            ->groupBy('date')
            ->get();
        }

        $referCost = Refercost::with('reference','admin','testsaledetails')
                                ->where('status',1)
                                ->whereBetween('date',[$today,$today])
                                ->get();
        $last7DaysData = getDatas($last7days, $today);
        $last30DaysData = getDatas($last30days, $today); 

        function getSum($startDate, $endDate)
        {
            return Refercost::selectRaw(
                'SUM(amount) as amount,
                SUM(paid) as paid'
            )
            ->where('status',1)
            ->whereBetween('date',[$startDate,$endDate])
            ->first();
        }

        $sum = getSum($today, $today);
        $amount = $sum->amount;
        $paid = $sum->paid;

        $sum2 = getSum($last7days, $today);
        $amount7 = $sum2->amount;
        $paid7 = $sum2->paid;

        $sum3 = getSum($last30days, $today);
        $amount30 = $sum3->amount;
        $paid30 = $sum3->paid;
        
        return view('backend.outdoor.report.referCostPayReport', compact('referCost','last7DaysData','last30DaysData','amount','paid','amount7','paid7','amount30','paid30'));
    }
}
