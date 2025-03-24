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
        $sum = Testsaledetails::where('status',1)->where('date',$today)->sum('pay');
        $sum2 = Testsaledetails::where('status',1)->where('date',$today)->sum('payable');
        $sum3 = Testsaledetails::where('status',1)->where('date',$today)->sum('total');
        $sum4 = Testsaledetails::where('status',1)->where('date',$today)->sum('discount');
        $sum5 = Testsaledetails::where('status',1)->where('date',$today)->sum('due');
        
        $data7days = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->get();
        $sum6 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('pay');
        $sum7 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('payable');
        $sum8 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('total');
        $sum9 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('discount');
        $sum10 = Testsaledetails::where('status',1)->whereBetween('date',[$last7days,$today])->sum('due');

        $data30days = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->get();
        $sum11 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('pay');
        $sum12 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('payable');
        $sum13 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('total');
        $sum14 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('discount');
        $sum15 = Testsaledetails::where('status',1)->whereBetween('date',[$last30days,$today])->sum('due');

        return view('backend.outdoor.report.dignosisSale', compact('testSale','data7days','data30days','sum','sum2','sum3','sum4','sum5','sum6','sum7','sum8','sum9','sum10','sum11','sum12','sum13','sum14','sum15'));
    }

    public function dayWiseSaleReport()
    {
        $today = date('Y-m-d');
        $testSale = Testsaledetails::where('status',1)->where('date',$today)->get();
        $sum = Testsaledetails::where('status',1)->where('date',$today)->sum('pay');
        $sum2 = Testsaledetails::where('status',1)->where('date',$today)->sum('payable');
        $sum3 = Testsaledetails::where('status',1)->where('date',$today)->sum('total');
        $sum4 = Testsaledetails::where('status',1)->where('date',$today)->sum('discount');
        $sum5 = Testsaledetails::where('status',1)->where('date',$today)->sum('due');
        return view('backend.outdoor.report.dayWiseSaleReportView', compact('testSale','sum','sum2','sum3','sum4','sum5'));
    }

    public function searchDateWiseReport(Request $request)
    {
        $startDate = $request->has('dtpStartDate')? $request->get('dtpStartDate'):'';
        $endDate = $request->has('dtpEndDate')? $request->get('dtpEndDate'):'';
        if(empty($startDate) || empty($endDate)){
            return redirect()->back()->with('error', 'Please select start and end date');
        }
        $testSale = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->get();
        $sum = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('pay');
        $sum2 = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('payable');
        $sum3 = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('total');
        $sum4 = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('discount');
        $sum5 = Testsaledetails::where('status',1)->whereBetween('date',[$startDate,$endDate])->sum('due');
        
        return view('backend.outdoor.report.dayWiseSaleReportView', compact('testSale','sum','sum2','sum3','sum4','sum5'));        
    }

    public function userWiseReportView()
    {
        $today = date('Y-m-d');
        $users = Admin::all();
        $testSale = Testsaledetails::where('status',1)->where('date',$today)->get();
        $sum = Testsaledetails::where('status',1)->where('date',$today)->sum('pay');
        $sum2 = Testsaledetails::where('status',1)->where('date',$today)->sum('payable');
        $sum3 = Testsaledetails::where('status',1)->where('date',$today)->sum('total');
        $sum4 = Testsaledetails::where('status',1)->where('date',$today)->sum('discount');
        $sum5 = Testsaledetails::where('status',1)->where('date',$today)->sum('due');
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
        $testSale = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->get();
        
        $sum = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('pay');
        $sum2 = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('payable');
        $sum3 = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('total');
        $sum4 = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('discount');
        $sum5 = Testsaledetails::where('status',1)->where('date',$today)->where('userId',$findUser->id)->sum('due');
        return view('backend.outdoor.report.userWiseReportView', compact('testSale','users','sum','sum2','sum3','sum4','sum5'));
    }

    public function dueReport()
    {
        $today = date('Y-m-d');
        $testSale = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->get();
        $sum = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('pay');
        $sum2 = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('payable');
        $sum3 = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('total');
        $sum4 = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('discount');
        $sum5 = Testsaledetails::where('status',1)->where('duestatus',1)->where('date',$today)->sum('due');
        return view('backend.outdoor.report.dueReport', compact('testSale','sum','sum2','sum3','sum4','sum5'));
    }

    public function dayWisedueReport(Request $request)
    {
        dd($request->all());
    }
}
