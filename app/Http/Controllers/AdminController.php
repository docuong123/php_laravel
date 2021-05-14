<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function AuthLogin(){
    	$admin_id=Session::get('admin_id');
    	if($admin_id){
    		return Redirect::to('dashboard');
    	}else{
    		return Redirect::to('admin')->send();
    	}
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $Request){
        $admin_email = $Request->admin_email;
        $admin_password = md5($Request->admin_password);
        $result = DB::table('admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('dashboard');
        }else{
            Session::put('message','Tài khoản hoặc mật khẩu không  chính xác!!!');
            return Redirect::to('/admin');
        }

    }
}
