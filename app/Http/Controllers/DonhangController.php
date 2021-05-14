<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Models\Donhang,Lohang;

class DonhangController extends Controller
{
    public function all_donhang(){
    	$data = DB::table('donhangs')->get();
    	return view('admin.donhang.danhsach',compact('data'));
    }
    public function get_editdonhang(){
    }
    public function post_editdonhang(){

    }
}
