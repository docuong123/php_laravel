<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Models\loaisanpham;

class LoaisanphamController extends Controller
{
    public function all_loaisanpham(){
   	$data = DB::table('loaisanphams')->get();
   	return view ('admin.loaisanpham.all_loaisanpham',compact('data'));
  }
  public function add_loaisanpham(){
    	$data = DB::table('nhoms')->orderby('id','desc')->get();
  		
		return view('admin.loaisanpham.add_loaisanpham')->with('data',$data);
  }
  public function save_loaisanpham(Request $request){
    $loaisanpham = new Loaisanpham;
    $loaisanpham->loaisanpham_ten = $request->txtLSPName;
    $loaisanpham->nhom_id = $request->txtLSPNhom;
    $loaisanpham->loaisanpham_mota=$request->txtLSPIntro;
    $loaisanpham->save();
    return Redirect::to('/all-loaisanpham');
  }
  public function edit_loaisanpham($loai_id){
    $data = DB::table('nhoms')->orderby('id','desc')->get();
    $loaisp = DB::table('loaisanphams')->where('id',$loai_id)->first();
    return view('admin.loaisanpham.edit_loaisanpham')->with('data',$data)->with('loaisp',$loaisp);
  }
  public function update_loaisanpham(Request $request,$loai_id){
    $loaisp = array();
    $loaisp['loaisanpham_ten']=$request->txtLSPName;
    $loaisp['loaisanpham_mota']=$request->txtLSPIntro;
    $loaisp['nhom_id']=$request->txtLSPNhom;
    DB::table('loaisanphams')->where('id',$loai_id)->update($loaisp);
    return Redirect::to('/all-loaisanpham');
  }
  public function delete_loaisanpham($loai_id){
    DB::table('loaisanphams')->where('id',$loai_id)->delete();
    return Redirect::to('/all-loaisanpham');
  }
}
