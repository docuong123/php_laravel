<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Models\Nhacungcap;

class NhacungcapController extends Controller
{
    public function all_nhacungcap(){
    	$data = DB::table('nhacungcaps')->get();
    	return view('admin.nhacungcap.all_nhacungcap',compact('data'));
    }
    public function add_nhacungcap(){
    	return view('admin.nhacungcap.add_nhacungcap');
    }
    public function save_nhacungcap(Request $request){
    	$nhacungcap = new Nhacungcap;
    	$nhacungcap->nhacungcap_ten = $request->txtNCCName;
    	$nhacungcap->nhacungcap_diachi = $request->txtNCCAdress;
    	$nhacungcap->nhacungcap_sdt = $request->txtNCCPhone;
    	$nhacungcap->save();
    	return Redirect::to('/all-nhacungcap');
    }
    public function get_Edit($id){
        $nhacungcap = DB::table('nhacungcaps')->where('id',$id)->first();
        return view('admin.nhacungcap.edit_nhacungcap',compact('nhacungcap'));
    }
    public function post_Edit(Request $request,$id){
        $nhacungcap = array();
        $nhacungcap['nhacungcap_ten'] = $request->txtNCCName;
        $nhacungcap['nhacungcap_sdt'] = $request->txtNCCPhone;
        $nhacungcap['nhacungcap_diachi'] = $request->txtNCCAdress;
        DB::table('nhacungcaps')->where('id',$id)->update($nhacungcap);
        return Redirect::to('/all-nhacungcap');
    }
    public function delete($id){
        DB::table('nhacungcaps')->where('id',$id)->delete();
        return Redirect::to('/all-nhacungcap');
    }

}
