<?php

namespace App\Http\Controllers\Backend\Account\Expenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Expenses;
use App\Models\Excategory;
use App\Models\Exsubcategory;
use Auth;

class ExpensesController extends Controller
{
    public function dailyExpensesView()
    {
        $category = Excategory::all();
        $subcategory = Exsubcategory::with('category')->get();
        return view('backend.account.expenses.expenses', compact('category','subcategory'));
    }

    public function expensesPaid(Request $request)
    {
        $data = new Expenses();
        $catid = $request->has('cbxCategory')? $request->get('cbxCategory') : '';
        $subcatid = $request->has('cbxSubCategory')? $request->get('cbxSubCategory') : '';
        $amount = $request->has('txtAmount')? $request->get('txtAmount') : '';
        $remark = $request->has('txtRemarks')? $request->get('txtRemarks') : '';
        $userId = Auth::guard('admin')->user()->id;

        if(empty($catid) || empty($subcatid))
        {
            return redirect()->back()->with('error','Category & sub-category not selected. Please select & try again. Thank You.');
        }
        
        $data->userId = $userId;
        $data->catId = $catid;
        $data->subCatId = $subcatid;
        $data->amount = $amount;
        $data->date = date('Y-m-d');
        $data->remark = $remark;
        $data->status = 0 ;
        $data->save();
        return redirect()->back()->with('success','Expenses submited.');
    }

    public function expensesSetting()
    {
        $category = Excategory::all();
        $subcategory = Exsubcategory::with('category')->get();
        return View('backend.account.expenses.expensesSetting', compact('category','subcategory'));
    }

    public function addExpenCat(Request $request)
    {
        $catName = $request->has('categoryName')? $request->get('categoryName') : '';
        $data = new Excategory();
        $data->category = $catName;
        $data->save();
        return redirect()->back()->with('success','Expenses Category Added.');
    }

    public function addSubExpenCat(Request $request)
    {
        $catId = $request->has('cbxCategory')? $request->get('cbxCategory') : '';
        $subCatName = $request->has('SubcategoryName')? $request->get('SubcategoryName') : '';
        if(empty($catId))
        {
            return redirect()->back()->with('error','Please select category & try again.');
        }
        $data = new Exsubcategory();
        $data->categoryId = $catId;
        $data->subcategory = $subCatName;
        $data->save();
        return redirect()->back()->with('success','Expenses Sub-Category Added.');
    }

    public function getSubCategory(Request $request, $id)
    {
        $subCategory = Exsubcategory::where('categoryId', $id)->get();
        return response()->json(['subCategory'=>$subCategory]);
    }

    public function expensesReport()
    {
        $expenses = Expenses::with('category','subcategory')->where('date', date('Y-m-d'))->get();

        function getData($startDate, $endDate)
        {
            return Expenses::with('category','subcategory')->whereBetween('date', [$startDate, $endDate])->get();
        }

        $expenses = getData(date('Y-m-d'), date('Y-m-d'));
        $last7Days = getData(date('Y-m-d', strtotime('-7 days')), date('Y-m-d'));
        $last30Days = getData(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'));

        function getSum($startDate, $endDate)
        {
            return Expenses::selectRaw(
                'sum(amount) as amount'
            )->whereBetween('date', [$startDate, $endDate])->where('status',2)->first();
        }
        $sum = getSum(date('Y-m-d'), date('Y-m-d'));
        $sum7 = getSum(strtotime('-7 days'), date('Y-m-d'));
        $sum30 = getSum(strtotime('-30 days'), date('Y-m-d'));
        $today = $sum->amount;
        $today7 = $sum7->amount;
        $today30 = $sum30->amount;
        return View('backend.account.expenses.expensesReport', compact('expenses','last7Days','last30Days','today','today7','today30'));
    }

    public function expensesStatusView(Request $request, $id)
    {
        $data = $expenses = Expenses::where('id', $id)->first();  
        $category = Excategory::all();
        $subcategory = Exsubcategory::with('category')->get();
        return View('backend.account.expenses.expensesStatus', compact('data','category','subcategory'));
    }

    public function expensesStatusUpdate(Request $request, $id)
    {
        $category = Excategory::all();
        $subcategory = Exsubcategory::with('category')->get();
        $status = $request->has('cbxStatus')? $request->get('cbxStatus') : '';        
        $data = $expenses = Expenses::where('id', $id)->first();  
        $data->status = $status;
        $data->update();
        return redirect('/expenses-report')->with('success','Expenses status updated.');
    }
}
