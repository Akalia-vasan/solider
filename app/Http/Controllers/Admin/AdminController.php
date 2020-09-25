<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    public function index(){
        $adminData = Admin::orderBy('id', 'DESC')->paginate(10);
        return view('admin.admin.index', compact('adminData'));
    }

    public function create(){

        return view('admin.admin.create');
    }

    public function store(Request $request)
    {

        $rules = [
            "name" => "required|min:2",
            "email" => "required|email|regex:/(.*)@gmail\.com/i|unique:admins,email",
            "password" => "required|min:6",
        ];

        if( !is_null( $request->input('id') ) ){
            $newAdmin     = Admin::find($request->id);
            $msg         = ' Updated';

        }else{
            $newAdmin     = new Admin();
            $msg         = ' Created';
        }


        $newAdmin->username = $request->name;
        $newAdmin->name = $request->name;
        $newAdmin->email =  $request->email;
        $newAdmin->password = Hash::make($request->password);
        $newAdmin->save();
        return redirect()->route('admin.index')->with("msg",$msg);
    }

    public function edit(Admin $admin)
    {

        return view('admin.admin.create', compact('admin'));
    }
}
