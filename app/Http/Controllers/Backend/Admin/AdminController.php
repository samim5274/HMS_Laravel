<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

class AdminController extends Controller
{
    public function viewAdminRegister()
    {
        return view('backend.admin.adminRegister');
    }

    public function insertAdmin(Request $request)
    {
        $data = new Admin();
        
        $request->validate([
            'txtUsername' => 'required',
            'txtEmail' => 'required|email',
            'txtPassword' => 'required',
        ]);

        $mail = $request->input('txtEmail','');
        $findEmail = Admin::where('email', $mail)->exists();
        
        if($findEmail)
        {
            return redirect()->back()->with('error','Email account already taken. Please try again to another email. Thank you!');
        }
        else
        {
            $data->name = $request->has('txtUsername')? $request->get('txtUsername'):'';
            $data->email = $request->has('txtEmail')? $request->get('txtEmail'):'';
            $data->password = Hash::make($request->has('txtPassword')? $request->get('txtPassword'):'');
            $data->status = 1;
            $data->superAdmin = 1;
            $data->save();
            return redirect()->back()->with('success','User admin-user created successfully!');
        }
    }

    public function viewAdminLogin()
    {
        return view('backend.admin.adminLogin');
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function AdminLogin(Request $request)
    {
        $request->validate([
            'txtEmail' => 'required|email',
            'txtPassword' => 'required',
        ]);

        $creadential = [
            'email' => $request->input('txtEmail'),
            'password' => $request->input('txtPassword')
        ];

        if(Auth::guard('admin')->attempt($creadential))
        {
            $userId = Auth::guard('admin')->id();
            $username = Auth::guard('admin')->user()->name;
            return redirect()->route('admin.dashboard');
        }
        else
        {
            Session::flash('error','Invalid user mail & password. Please try again!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.view');
    }
}
