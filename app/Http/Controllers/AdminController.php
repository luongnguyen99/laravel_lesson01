<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(){
        $admin = Admin::find(1);
        // dd($admin);

        // $class = $admin->classRoom;
        // $class = $admin->ClassRoom()->get();

        // laasy ra admin kem theo ClassRoom
        $admin = $admin->load('classRoom');

        //Lay ring ra classRoom cua Admin do
        // $admin = $admin->with('classRoom')->get();
        // dd($admin);

       
        return view('admins.index',['admin' => $admin]);

    }
   
    public function indexClass(){
        // lay ra tat ca admin thuoc class 5
        $class = ClassRoom::find(5);
        $admins = $class->admins;

        // lay ra class them theo cac admins thuoc no
        $class = $class->load('admins')->admins[1]->name;
        dd($class);
    }
    public function login(){
        if (Auth::check()) {
            return redirect()->route('classes.list');
        }
        return view('login');
    }

   

    public function logOut(){
        Auth::logout();
        return view('login');
    }

    public function registry()
    {
        return view('registry');
    }
    public function registryPost(Request $request)
    {

        // kiểm tra đã login chưa
       $data = $request->except('_token','comfirm_password');
    //    dd($data);
        $this->validate($request, [
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|max:32',
            'comfirm_password' => 'required|same:password',

        ]);
        $data['password'] = Hash::make($data['password']);
        $data['is_active'] = '1';
        Admin::insert($data);
        // chỉ lấy email và password

        return redirect('admins/login')->with('success', 'Thêm thành công');
        // kiểm tra đăng nhập
        
    }

    public function postLogin(Request $request){

        // kiểm tra đã login chưa
        
        $this->validate($request,[
            'email' => 'required|email|exists:admins',
            'password' => 'required|min:6|max:32',
            ]);
           
        // chỉ lấy email và password
        $data = $request->only(['email','password']);
           
        // kiểm tra đăng nhập
        $checkLogin = Auth::attempt($data);
       
        if ($checkLogin) {
            return redirect()->route('classes.list');
        } else {
            return redirect()->route('admins.login');
        }
        
    }
    
}
