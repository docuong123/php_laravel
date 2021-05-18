<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Models\Lohang;

class LohangController extends Controller
{
   public function all_lohang(){
    	$data = DB::table('lohangs')->paginate(10);
    	return view('admin.lohang.all_lohang',compact('data'));
    }
    public function add_lohang(){
    	$sanpham = DB::table('sanphams')->orderby('id','desc')->get();
    	$nhacungcap = DB::table('nhacungcaps')->orderby('id','desc')->get();
    	return view('admin.lohang.add_lohang')->with('sanpham',$sanpham)->with('nhacungcap',$nhacungcap);
    }
    public function save_lohang(Request $request){
    	$lohang = new Lohang();
    	$lohang->lohang_kyhieu =$request->txtLHSignt;
    	$lohang->lohang_soluongsp =$request->txtLHQuant;
        $lohang->lohang_soluongdaban = 0;
        $lohang->lohang_soluongdoitra= 0;
        $lohang->lohang_soluonghientai = $request->txtLHQuant;
    	$lohang->lohang_hansudung=$request->txtLHShelf;
    	$lohang->lohang_giamuavao=$request->txtLHBuyPrice;
    	$lohang->lohang_giabanra=$request->txtLHSalePrice;
    	$lohang->lohang_tinhtrang=$request->lohang_status;
    	$lohang->sanpham_id=$request->txtLHProduct;
    	$lohang->nhacungcap_id=$request->txtLHVendor;

    	$lohang->save();
    	return Redirect::to('/all-lohang');
    }
    public function edit_lohang($lohang_id){
        $sanpham = DB::table('sanphams')->orderby('id','desc')->get();
        $nhacungcap = DB::table('nhacungcaps')->orderby('id','desc')->get();
        $lohang = DB::table('lohangs')->where('id',$lohang_id)->first();

        return view ('admin.lohang.edit_lohang')->with('sanpham',$sanpham)->with('nhacungcap',$nhacungcap)->with('lohang',$lohang);
    }
    public function update_lohang(Request $request,$lohang_id){
        $lohang = array();
        $lohang['lohang_kyhieu']=$request->txtLHSignt;
        $lohang['lohang_soluongsp']=$request->txtLHQuant;
        $lohang['lohang_hansudung']=$request->txtLHShelf;
        $lohang['lohang_giamuavao']=$request->txtLHBuyPrice;
        $lohang['lohang_giabanra']=$request->txtLHSalePrice;
        $lohang['lohang_soluonghientai']=$request->txtLHQuant - $lohang->lohang_soluongdaban + $lohang->lohang_soluongdoitra;
        $lohang['sanpham_id']=$request->txtLHProduct;
        $lohang['lohang_tinhtrang']=$request->lohang_status;
        $lohang['nhacungcap_id']=$request->txtLHVendor;
        DB::table('lohangs')->where('id',$lohang_id)->update($lohang);
        return Redirect::to('/all-lohang');
    }
    public function delete_lohang($lohang_id){
        DB::table('lohangs')->where('id',$lohang_id)->delete();
        return Redirect::to('/all-lohang');
    }
    public function add_nhaphang($lohang_id){
        $sanpham = DB::table('sanphams')->where('id',$lohang_id)->first();
        $nhacungcap = DB::table('nhacungcaps')->orderby('id','desc')->get();
        return view('admin.lohang.nhaphang')->with('sanpham',$sanpham)->with('nhacungcap',$nhacungcap);
    }
   public function post_nhaphang(Request $request,$lohang_id){
    $lohang  = new Lohang();
    $lohang->lohang_kyhieu  = $request->txtLHSignt;
    $lohang->lohang_soluongsp = $request->txtLHQuant;
    $lohang->lohang_hansudung = $request->txtLHShelf;
    $lohang->lohang_giamuavao = $request->txtLHBuyPrice;
    $lohang->lohang_giabanra = $request->txtLHSalePrice;
    $lohang->sanpham_id = $lohang_id;
    $lohang->nhacungcap_id = $request->txtLHVendor;
    $lohang->save();
    return Redirect::to('/all-lohang');
   }
   public function unactive_lohang($lohang_id){
    DB::table('lohangs')->where('id',$lohang_id)->update(['lohang_tinhtrang'=>0]);
        Session::put('message','Ẩn lô hàng sản phẩm thành công !!!');
        return Redirect::to('all-lohang');

   }
   public function active_lohang($lohang_id){
    DB::table('lohangs')->where('id',$lohang_id)->update(['lohang_tinhtrang'=>1]);
        Session::put('message','Hiển thị lô hàng sản phẩm thành công !!!');
        return Redirect::to('all-lohang');

   }
}
