<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Models\Sanpham;
use File,Input;
class SanphamController extends Controller
{
    public function all_sanpham(){
    	$data = DB::table('sanphams')->paginate(5);
    	return view('admin.sanpham.all_sanpham',compact('data'));

        
    }
    public function add_sanpham(){
    	$dvt = DB::table('donvitinhs')->orderby('id','desc')->get();
    	$loaisp = DB::table('loaisanphams')->orderby('id','desc')->get();
    	return view('admin.sanpham.add_sanpham')->with('dvt',$dvt)->with('loaisp',$loaisp); 
    }
    public function save_sanpham(Request $request){
    	$sanpham = array();
    	$sanpham['sanpham_ten'] = $request->txtSPName;
        $sanpham['sanpham_mota']=$request->txtSPIntro;
    	$sanpham['donvitinh_id'] = $request->txtSPDVT;
        $sanpham['loaisanpham_id']=$request->txtSPLoai;
        $sanpham['sanpham_khuyenmai']=0;
    	$sanpham['sanpham_anh'] = $request->txtSPAnh;
    	$get_image = $request->file('txtSPAnh');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/sanpham/',$new_image);
            $sanpham['sanpham_anh']= $new_image ;
            DB::table('sanphams')->insert($sanpham);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-sanpham');
        }
        $sanpham['sanpham_anh']='';
        Session::put('message','Thêm sản phẩm thất bại');
        return Redirect::to('add-sanpham');
    }
    public function edit_sanpham($sp_id){
        $dvt = DB::table('donvitinhs')->orderby('id','desc')->get();
        $loaisp = DB::table('loaisanphams')->orderby('id','desc')->get();
        $sanpham = DB::table('sanphams')->where('id',$sp_id)->get();
        $manager_sanpham = view('admin.sanpham.edit_sanpham')->with('sanpham',$sanpham)->with('dvt',$dvt)->with('loaisp',$loaisp);
        return view('admin_layout')->with('admin.sanpham.edit_sanpham',$manager_sanpham);
    }
    public function update_sanpham(Request $request,$sp_id){   
    $sanpham = array();
    $sanpham['sanpham_ten']=$request->txtSPName;
    $sanpham['sanpham_mota']=$request->txtSPIntro;
    $sanpham['donvitinh_id']=$request->txtSPDVT;
    $sanpham['loaisanpham_id']=$request->txtSPLoai;
    $sanpham['sanpham_khuyenmai']=0;
    $get_image = $request->file('txtSPAnh');
    if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('public/upload/sanpham/',$new_image);
        $sanpham['sanpham_anh']=$new_image;
        DB::table('sanphams')->where('id',$sp_id)->update($sanpham);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-sanpham');
    }
    DB::table('sanphams')->where('id',$sp_id)->update($sanpham);
    Session::put('message','Cập nhật sản phẩm thành công');
    return Redirect::to('all-sanpham');
    

    }
    public function delete_sanpham($sp_id){
        DB::table('lohangs')->where('sanpham_id',$sp_id)->delete();
        DB::table('sanphams')->where('id',$sp_id)->delete();
        return Redirect::to('/all-sanpham');
    }

}
