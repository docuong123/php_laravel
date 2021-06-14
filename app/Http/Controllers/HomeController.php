<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(){
    	$loaisp = DB::table('loaisanphams')->orderby('loaisanpham_ten')->get();
    	$sanpham = DB::table('sanphams')
    	->join('lohangs','sanphams.id','=','lohangs.sanpham_id')->where('lohang_tinhtrang','1')
    	->orderby('lohangs.id','desc')->limit(12)->get();

    	$sanpham1 = DB::table('sanphams')
    	->join('lohangs','sanphams.id','=','lohangs.sanpham_id')->where('lohang_tinhtrang','1')
    	->orderby('sanpham_ten')->paginate(12);
    	return view('fontend.page')->with('loaisp',$loaisp)->with('sanpham',$sanpham)->with('sanpham1',$sanpham1);
    }
    public function search(Request $request){
    	$key_word = $request->keywords_submit;

    	$search_product = DB::table('sanphams')
    	->join('lohangs','sanphams.id','=','lohangs.sanpham_id')
    	->where('sanpham_ten','like','%'.$key_word.'%')
    	->orwhere('lohang_giabanra',$key_word)->get();
    	return view('fontend.sanpham.search')->with('search_product',$search_product);
    }
    public function detail_sanpham($sp_id){
        $dvt = DB::table('donvitinhs')->orderby('donvitinh_ten')->get(); 

        $loaisp = DB::table('loaisanphams')->orderby('loaisanpham_ten')->get();

        $sanpham_detail = DB::table('sanphams')
        ->join('lohangs','sanphams.id','=','lohangs.sanpham_id')
        ->join('donvitinhs','donvitinhs.id','=','sanphams.donvitinh_id')
        ->join('loaisanphams','loaisanphams.id','=','sanphams.loaisanpham_id')
        ->where('sanphams.id',$sp_id)->get();

         foreach ($sanpham_detail as $key => $value) {
            $loai_id = $value->loaisanpham_id;
            $sign_id=$value->donvitinh_id;
             }
        
        /*san pham lien quan theo loai san pham*/

        $relate_sanpham = DB::table('sanphams')
        ->join('lohangs','sanphams.id','=','lohangs.sanpham_id')
        ->join('loaisanphams','loaisanphams.id','=','sanphams.loaisanpham_id')
        ->where('lohang_tinhtrang','1')
        ->where('loaisanphams.id',$loai_id)
        ->whereNotIn('sanphams.id',[$sp_id]) 
        ->get();

        return view('fontend.sanpham.detail_sanpham')
        ->with('dvt',$dvt)
        ->with('loaisp',$loaisp)
        ->with('sanpham_detail',$sanpham_detail)
        ->with('relate',$relate_sanpham);


    }
    public function show_category($loaisp_id){
        $category_name = DB::table('loaisanphams')->where('loaisanphams.id',$loaisp_id)->limit(1)->get();

        $loai_sanpham_id = DB::table('sanphams')
        ->join('lohangs','sanphams.id','=','lohangs.sanpham_id')
        ->join('donvitinhs','donvitinhs.id','=','sanphams.donvitinh_id')
        ->join('loaisanphams','loaisanphams.id','=','sanphams.loaisanpham_id')
        ->where('lohang_tinhtrang', '1')
        ->where('sanphams.loaisanpham_id',$loaisp_id)->get();

        $cate_product=DB::table('loaisanphams')->orderby('loaisanpham_ten')->get();
        
        return view('fontend.loaisanpham.show_category')->with('category_name',$category_name)->with('loai_sanpham_id',$loai_sanpham_id)->with('category',$cate_product);
    }
    public function getBinhluan(){
        
    }
}
