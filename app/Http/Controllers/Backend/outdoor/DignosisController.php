<?php

namespace App\Http\Controllers\backend\outdoor;

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

class DignosisController extends Controller
{
    public function testDetailsView()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $Specimens = Specimen::all();
        $Group = Group::all();
        $testDetils = Testdetails::all();        

        return view('backend.outdoor.testDetails', compact('categories','subCategories','Specimens','Group','testDetils'));
    }

    public function addTest(Request $request)
    {
        $data = new Testdetails();
        $data->testName = $request->has('txtTestName')? $request->get('txtTestName') : '';
        $data->categoryId = $request->has('cbxCategory')? $request->get('cbxCategory') : '';
        $data->subcategoryId = $request->has('cbxSubCategory')? $request->get('cbxSubCategory') : '';
        $data->specimenId = $request->has('cbxSpecimen')? $request->get('cbxSpecimen') : '';
        $data->groupId = $request->has('cbxGroup')? $request->get('cbxGroup') : '';
        $data->testPrice = $request->has('txtTestPrice')? $request->get('txtTestPrice') : '';
        $data->rprice = $request->has('txtRPrice')? $request->get('txtRPrice') : '';
        $data->room = $request->has('txtRoom')? $request->get('txtRoom') : '';
        $data->testDescription = "Test Description";
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success', 'Test added successfully');
    }

    public function getSubCategory(Request $request, $id)
    {
        $subCategory = Subcategory::where('catId', $id)->get();
        return response()->json(['subCategory'=>$subCategory]);
    }

    public function settingView()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $Specimens = Specimen::all();
        $Group = Group::all();
        $doctor = Doctor::all();
        $refer = Reference::all();
        
        return view('backend.outdoor.setting', compact('categories','subCategories','Specimens','Group','doctor','refer'));
    }

    public function addCategory(Request $request)
    {
        dd($request->all());
        return view('backend.outdoor.setting');
    }

    public function addSubCategory(Request $request)
    {
        $data = new SubCategory();
        $data->catId = $request->has('cbxCategory')? $request->get('cbxCategory') : '';
        $data->subCatName = $request->has('txtsubcategoryName')? $request->get('txtsubcategoryName') : '';
        if(empty($data->catId) || empty($data->subCatName)){
            return redirect()->back()->with('error', 'Please fill up all the fields');
        }
        $data->save();
        return redirect()->back()->with('success', 'Sub Category added successfully');
        
    }

    public function addSpecimen(Request $request)
    {  
        $data = new Specimen();
        $data->name = $request->has('txtSpecimen')? $request->get('txtSpecimen') : '';
        $data->save();
        return redirect()->back()->with('success', 'Specimen added successfully');
    }

    public function addGroup(Request $request)
    {  
        $data = new Group();
        $data->name = $request->has('txtGroup')? $request->get('txtGroup') : '';
        $data->save();
        return redirect()->back()->with('success', 'Group added successfully');
    }

    // ===================== Test Sale ===================== //

    public function testSaleView()
    {
        $testDetils = Testdetails::all();
        $testsum = Testdetails::sum('testPrice');
        $doctor = Doctor::all();
        $refer = Reference::all();
        

        $userId = Auth::guard('admin')->user()->id;
        $sl = Testsaledetails::where('date', date('Y-m-d'))->count();
        $invoice = date('Ymd').$userId.$sl+1;

        $testSale = Testsaledetails::all();
        // $testSale = Testsaledetails::where('date', date('Y-m-d'))->get();

        $sum = Storetest::where('regNum', $invoice)->sum('testprice');
        $store = Storetest::where('regNum', $invoice)->get();

        
        return view('backend.outdoor.testSale', compact('testDetils','doctor','refer','store','sum','testsum','testSale'));
    }

    public function addDoctor(Request $request)
    {
        $doctor = new Doctor();
        $doctor->doctName = $request->has('txtDoctor')? $request->get('txtDoctor'):'';
        $doctor->doctDesignation = $request->has('txtDesignation')? $request->get('txtDesignation'):'';
        $doctor->doctPhone = $request->has('txtPhone')? $request->get('txtPhone'):'';
        $doctor->doctFee = $request->has('txtFee')? $request->get('txtFee'):'';
        $doctor->save();
        return redirect()->back()->with('success', 'Doctor added successfully');
    }

    public function addReference(Request $request)
    {
        $refer = new Reference();
        $refer->refName = $request->has('txtReference') ? $request->get('txtReference'):'';
        $refer->refAddress = $request->has('txtAddress') ? $request->get('txtAddress'):'';
        $refer->refPhone = $request->has('txtPhone') ? $request->get('txtPhone'):'';
        $refer->save();
        return redirect()->back()->with('success', 'Reference added successfully');
    }

    public function addItem(Request $request, $id)
    {
        $val = new Storetest();
        $data = Testdetails::find($id);
        $userId = Auth::guard('admin')->user()->id;
        $sl = Testsaledetails::where('date', date('Y-m-d'))->count();
        $invoice = date('Ymd').$userId.$sl+1;

        $findTest = Storetest::where('testId', $data->id)->where('regNum', $invoice)->first();
        if($findTest){
            return redirect()->back()->with('error', 'Test already added');
        }        

        
        $val->regNum = $invoice;
        $val->testId = $data->id;
        $val->testprice = $data->testPrice;
        $val->categoryId = $data->categoryId;
        $val->subcategoryId = $data->subcategoryId;
        $val->specimenId = $data->specimenId;
        $val->groupId = $data->groupId;
        $val->room = $data->room;
        $val->save();
        return redirect()->back()->with('success', 'Test added successfully');
    }

    public function removeItem($id)
    {
        $remove = Storetest::find($id);
        $remove->delete();
        return redirect()->back()->with('success', 'Test removed successfully');
    }

    public function saleTest(Request $request)
    {
        $data = new Testsaledetails();

        $userId = Auth::guard('admin')->user()->id;
        $sl = Testsaledetails::where('date', date('Y-m-d'))->count();
        $invoice = date('Ymd').$userId.$sl+1;

        $total = Storetest::where('regNum', $invoice)->sum('testprice');

        $data->reg = $invoice;
        $data->date = date('Y-m-d');
        $data->name = $request->has('txtName')? $request->get('txtName'):'';
        $data->dob = $request->has('dtpDob')? $request->get('dtpDob'):'';   
        $data->gender = $request->has('slcGender')? $request->get('slcGender'):'';     
        $data->phone = $request->has('txtPhone')? $request->get('txtPhone'):'';
        $data->address = $request->has('txtAddress')? $request->get('txtAddress'):'';
        $data->doctorId = $request->has('cbxDoctor')? $request->get('cbxDoctor'):'';
        $data->referId = $request->has('cbxRefer')? $request->get('cbxRefer'):'';

        $data->total = $total;

        $data->discount = $discount = $request->has('txtDiscount')? $request->get('txtDiscount'):'';

        $data->payable = $payable = $total - $discount;

        $receivedAmount = $request->has('txtReceived')? $request->get('txtReceived'):'';

        
        if($payable < $receivedAmount){
            $data->pay = $payable; 
            $data->duestatus = 0;
            $data->due = 0;
        }
        else{
            $data->pay = $receivedAmount;
            $data->duestatus = 1;
            $data->due = $data->payable - $receivedAmount;
        }
     
        $data->reportstatus = 1;

        $data->save();
        return redirect()->back()->with('success', 'Test Sale successfully');
    }

    public function deuCollection(Request $request, $id)
    {
        $testSale = Testsaledetails::where('id', $id)->get();
        $invoice = $testSale[0]->reg;        
        $doctor = Doctor::all();
        $refer = Reference::all();

        $sum = Storetest::where('regNum', $invoice)->sum('testprice');
        $store = Storetest::where('regNum', $invoice)->get();
                
        return view('backend.outdoor.dueCollection', compact('testSale','doctor','refer','store','sum'));
    }
}
