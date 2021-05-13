<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Models\Donvitinh;
class DonvitinhController extends Controller
{
    public function AuthLogin(){
    	$admin_id = Session::get('admin_id');
    	if($admin_id){
    		return Redirect::to('dashboard');
    	}else{
    		return Redirect::to('/admin')->send();
    	}
    }
    public function all_donvitinh(){
    	$this->AuthLogin();
        $data = DB::table('donvitinhs')->get();
        return view('admin.donvitinh.all_donvitinh',compact('data'));
    }
    public function add_donvitinh(){
        $this->AuthLogin();
        return view('admin.donvitinh.add_donvitinh');
    }
    public function save_donvitinh(Request $request){
        $dvt = new Donvitinh;
        $dvt->donvitinh_ten = $request->txtDVTName;
        $dvt->donvitinh_mota = $request->txtDVTIntro;
        $dvt->save();
        return Redirect::to('/all-donvitinh');
    }
    public function edit_donvitinh($dvt_id){
        $dvt = DB::table('donvitinhs')->where('id',$dvt_id)->first();
        return view('admin.donvitinh.edit_donvitinh',compact('dvt'));
        
    }
    public function update_donvitinh(Request $request,$dvt_id){
        $dvt = array();
        $dvt['donvitinh_ten'] = $request->txtDVTName;
        $dvt['donvitinh_mota'] = $request->txtDVTIntro;
        DB::table('donvitinhs')->where('id',$dvt_id)->update($dvt);
        return Redirect::to('/all-donvitinh');

    }
    public function delete_donvitinh($dvt_id){
        DB::table('donvitinhs')->where('id',$dvt_id)->delete();
        return Redirect::to('/all-donvitinh');
    }
}
