<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Models\Nhom;

class NhomController extends Controller
{
 public function all_nhom(){
    	$data = DB::table('nhoms')->get();
    	return view('admin.nhom.all_nhom',compact('data'));
    }
    public function add_nhom(){
    	return view('admin.nhom.add_nhom');
    }
    public function save_nhom(Request $request){
    	$nhom = new Nhom;
    	$nhom->nhom_ten = $request->txtNName;
    	$nhom->nhom_mota = $request->txtNIntro;
    	$nhom->save();
    	return Redirect::to('/all-nhom');
    }
    public function get_Edit($id){

        $nhom = DB::table('nhoms')->where('id',$id)->first();
        return view('admin.nhom.edit_nhom',compact('nhom'));

    }
    public function post_Edit(Request $request,$id){
        $nhom=array();
        $nhom['nhom_ten'] = $request->txtNName;
        $nhom['nhom_mota'] = $request->txtNIntro;
        DB::table('nhoms')->where('id',$id)->update($nhom);
        return Redirect::to('all-nhom');
    }
    public function delete($id){
        DB::table('nhoms')->where('id',$id)->delete();
        return Redirect::to('/all-nhom');
    }

}
