<?php

namespace App\Http\Controllers\backend\outdoor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        $sum = Storetest::where('regNum', $invoice)->where('status',1)->sum('testprice');
        $store = Storetest::with('testdetails')->where('regNum', $invoice)->get();

        
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
        //dd($invoice);
        $findTest = Storetest::where('testId', $data->id)->where('regNum', $invoice)->first();
        if($findTest){
            return redirect()->back()->with('error', 'Test already added');
        }        

        
        $val->regNum = $invoice;
        $val->testId = $data->id;
        $val->testprice = $data->testPrice;
        $val->referprice = $data->rprice;
        $val->categoryId = $data->categoryId;
        $val->subcategoryId = $data->subcategoryId;
        $val->specimenId = $data->specimenId;
        $val->groupId = $data->groupId;
        $val->room = $data->room;
        $val->status = 1;
        $val->reportstatus = 0;
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
        $name = $request->has('txtName')? $request->get('txtName'):'';
        $dob = $request->has('dtpDob')? $request->get('dtpDob'):'';  
        $gender = $request->has('slcGender')? $request->get('slcGender'):'';  
        $phone = $request->has('txtPhone')? $request->get('txtPhone'):'';
        $address = $request->has('txtAddress')? $request->get('txtAddress'):'';
        $doctor = $request->has('cbxDoctor')? $request->get('cbxDoctor'):'';
        $refer = $request->has('cbxRefer')? $request->get('cbxRefer'):'';

        if(empty($doctor) || empty($refer) || empty($name) || empty($dob) || empty($gender) || empty($phone) || empty($address)){
            return redirect()->back()->with('error', 'Some information is missing. Please check and try again! Thank you!');
        }

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

        
        if($payable <= $receivedAmount){
            $data->pay = $payable; 
            $data->duestatus = 0;
            $data->due = 0;
        }
        else{
            $data->pay = $receivedAmount;
            $data->duestatus = 1;
            $data->due = $data->payable - $receivedAmount;
        }
     
        $data->status = 1;
        $data->return = 0;
        $data->referStatus = 1;
        $data->userId = Auth::guard('admin')->user()->id;
            
        if($total <= 0){
            return redirect()->back()->with('error', 'Please add test first');
        }
        $data->save();
        return redirect()->back()->with('success', 'Test Sale successfully');
    }

    public function deuCollectionView()
    {
        $testSale = Testsaledetails::all();
        return view('backend.outdoor.dueCollectionView', compact('testSale'));
    }

    public function deuCollection(Request $request, $id)
    {
        $testSale = Testsaledetails::where('id', $id)->get();
        $invoice = $testSale[0]->reg;        
        $doctor = Doctor::all();
        $refer = Reference::all();

        $sum = Storetest::where('regNum', $invoice)->where('status',1)->sum('testprice');
        $store = Storetest::with('testdetails')->where('regNum', $invoice)->get();

        $total = $testSale[0]->payable;
        $totalpay = $testSale[0]->pay;
        $payabledue = $total - $totalpay;
               
        return view('backend.outdoor.dueCollection', compact('testSale','doctor','refer','store','sum','payabledue'));
    }

    public function deuCollectionUpdate(Request $request, $id)
    {
        $data = Testsaledetails::find($id); // payable, pay, duestatus, due

        $oldDiscount = $data->discount;
        $oldPay = $data->pay;
        $oldDue = $data->due;

        $discount = $request->has('txtDiscount')? $request->get('txtDiscount'):'';
        $receivedDue = $request->has('txtReceivedDue')? $request->get('txtReceivedDue'):'';
        $invoice = $data->reg;
        $total = Storetest::where('regNum', $invoice)->sum('testprice');

        $newDiscount = $oldDiscount + $discount;
        $newPay = $oldPay + $receivedDue;
        $newPayable = $total - $newDiscount;

        if($discount > $oldDue){
            return redirect()->back()->with('error', 'Discount amount is greater than due amount.');
        }
        else{
            $data->discount = $newDiscount;

            if($newPayable <= $receivedDue || $oldDue <= $receivedDue){
                $data->pay = $newPayable;
            }
            else{
                $data->pay = $newPay;
            }            
            $data->payable = $newPayable;
            
            if($data->pay == $data->payable){
                $data->due = 0;
            }
            else{
                $data->due = $newPayable - $newPay;
            }

            if($data->due <= 0 ){
                $data->duestatus = 0;
            }
            else{
                $data->duestatus = 1;
            }
        }
        $data->update();
        return redirect('/deu-collection-view')->with('success', 'Due Collection successfully');
    }

    public function testSaleReturnView()
    {
        $testSale = Testsaledetails::all();
        return view('backend.outdoor.testSaleReturnView', compact('testSale'));
    }

    public function testReturn(Request $request, $id)
    {
        $storeTest = Storetest::with('testdetails')->where('regNum', $id)->get();
        $testSale = Testsaledetails::where('reg', $id)->get();
        $invoice = $testSale[0]->reg; 
        $sum = Storetest::where('regNum', $invoice)->where('status',1)->sum('testprice');
        return view('backend.outdoor.testReturn', compact('storeTest','testSale','sum'));
    }

    public function testReturnStatus(Request $request, $id)
    {
        $data = Storetest::find($id);

        $testSale = Testsaledetails::where('reg', $data->regNum)->get();
        $total = $testSale[0]->total;
        $payable = $testSale[0]->payable;
        $discount = $testSale[0]->discount;
        $due = $testSale[0]->due;
        $pay = $testSale[0]->pay;
        
        $price = $data->testprice;

        if($price <= $discount)
        {
            $discount = 0;
            $payable = $payable - $price;
            $total = $total - $price;
            $pay = $pay - $price;
        }
        elseif($total - $price <= $discount)
        {
            $discount = 0;
            $payable = $payable - $price;
            $total = $total - $price;
            $pay = $pay - $price;
        }
        else{
            $payable = $payable - $price - $discount;
            $total = $total - $price - $discount;
            $pay = $pay - $price;
        }
                
        
        $testSale[0]->total = $total;
        $testSale[0]->payable = $payable;
        $testSale[0]->discount = $discount;
        $testSale[0]->pay = $pay;

        dd('Payable:'.$payable, 'Return:'.$price,'Total:'.$total, 'Discount:'.$discount, 'Pay:'.$pay);
        $data->status = 0;
        // $testSale[0]->update();
        // $data->update();
        return redirect()->back()->with('success', 'Test return successfully');
    }

    public function testCancelView()
    {
        $testSale = Testsaledetails::all();
        return view('backend.outdoor.testCancelView', compact('testSale'));
    }

    public function testCancel(Request $request, $id)
    {
        $data = Testsaledetails::where('reg',$id)->get();
        $storeTests = Storetest::with('testdetails')->where('regNum', $id)->get();
        $sum = Storetest::where('regNum', $id)->where('status',1)->sum('testprice');
        return view('backend.outdoor.testCancel', compact('data','storeTests','sum'));
    }

    public function testCancelStatus(Request $request, $id)
    {
        $data = Testsaledetails::where('id',$id)->first();
        $store = Storetest::with('testdetails')->where('regNum', $data->reg)->where('reportstatus',1)->get();
        if($store->isNotEmpty())
        {
            return redirect()->back()->with('error', 'Test already reported! Please try to another patient. Thank you!');
        }

        if($data->status == '1')
        {
            $testStore = Storetest::with('testdetails')->where('regNum', $data->reg)->update(['status' => 0]);
            $data->status = 0;
            $data->return = $data->pay;
            $data->pay = 0;
            $data->due = 0;
            $data->duestatus = 3;
            $data->status = 3;
            $data->update();
            return redirect()->back()->with('success', 'Test cancel successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Test already canceled! Please try to another patient. Thank you!');
        }
    }

    public function referCostView()
    {
        $refer = Reference::all();
        return view('backend.outdoor.referCostView', compact('refer'));
    }

    public function referCostFind(Request $request, $id)
    {
        $testSale = Testsaledetails::where('referId', $id)->where('referStatus',1)->get(); 
        
        if($testSale->isEmpty())
        {
            return redirect()->back()->with('error', 'No test found for this reference');
        }
  
        $refer = Reference::where('id',$id)->first();
        
        return view('backend.outdoor.referPatientFind', compact('testSale','refer'));
    }

    public function referCostFindPatient(Request $request, $id)
    {
        $testSale = Testsaledetails::where('id', $id)->get(); 

        $invoice = $testSale[0]->reg;   

        $refers = Reference::where('id',$testSale[0]->referId)->first();

        $sum = Storetest::where('regNum', $invoice)->sum('testprice');
        $referCostSum = Storetest::where('regNum', $invoice)->sum('referprice');
        $store = Storetest::with('testdetails')->where('regNum', $invoice)->get();
        //  dd($testSale);
        return view('backend.outdoor.referCostPay', compact('testSale','store','refers','sum','referCostSum'));
    }

    public function referCostPay(Request $request, $regNum)
    {
        $paid = $request->has('txtPaid')? $request->get('txtPaid'):'';
        $remark = $request->has('txtRemark')? $request->get('txtRemark'):'';
        
        $testSale = Testsaledetails::where('reg', $regNum)->get();
        $store = Storetest::with('testdetails')->where('regNum', $testSale[0]->reg)->get();        
        $totalReferPrice = Storetest::where('regNum', $testSale[0]->reg)->sum('referprice');

        $saleTest = Testsaledetails::where('reg', $testSale[0]->reg)->first();
        $saleTest->referStatus = 0;

        $find = Refercost::where('regNum', $testSale[0]->reg)->first();        
        if($find != null)
        {
            return redirect()->back()->with('error', 'Reference cost already paid');
        }

        $data = new Refercost();
        $data->date = date('Y-m-d');
        $data->regNum = $store[0]->regNum;
        $data->patientId = $testSale[0]->id;
        $data->userId = Auth::guard('admin')->user()->id;
        $data->referId = $testSale[0]->referId;
        $data->amount = $totalReferPrice;
        $data->paid = $totalReferPrice;
        $data->remarks = $remark;
        $data->status = 1;
        $saleTest->update();
        $data->save();        
        return redirect()->back()->with('success', 'Reference cost paid successfully');
    }

    public function reportView()
    {
        $testSale = Testsaledetails::where('status', 1)->orderBy('id', 'desc')->get();
        return view('backend.outdoor.investigationReport.ivestigationReportView', compact('testSale'));
    }

    public function reportStatus(Request $request, $id)
    {
        $testSale = Testsaledetails::where('id', $id)->orderBy('id', 'desc')->get();
        $storeTest = Storetest::with('testdetails')->where('regNum', $testSale[0]->reg)->get();
        
        $age = Carbon::parse($testSale[0]->dob)->diff(Carbon::now());
        $year = $age->y;
        $month = $age->m;
        $day = $age->d;

        return view('backend.outdoor.investigationReport.investigationReportStatus', compact('testSale','storeTest', 'year','month','day'));
    }

    public function reportUpdated(Request $request, $reg, $id)
    {
        $data = Testsaledetails::where('reg', $reg)->first();       
                     
        $cbxStatus = $request->has('cbxStatus')? $request->get('cbxStatus'):'';
        
        $testStore = Storetest::where('regNum', $data->reg)->where('id', $id)->update(['reportstatus' => $cbxStatus]);
                
        return redirect()->back()->with('success', 'Report updated successfully');
    }
}
