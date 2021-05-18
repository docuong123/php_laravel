<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Models\Khachhang;

class KhachHangController extends Controller
{
    public function all_khachhang(){
    	$data = DB::table('khachhangs')->get();
    	return view('admin.khachhang.danhsach',compact('data'));
    }
    public function delete_kh($kh_id){
    	$khachhang = DB::table('khachhangs')->where('id',$kh_id)->delete();
    	return Redirect::to('/all-khachhang');
    }
}
