<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Models\Donhang,Lohang,Thongtinnhanhang;
use PDF;

class DonhangController extends Controller
{
    public function all_donhang(){
    	$data = DB::table('donhangs')->get();
    	return view('admin.donhang.danhsach',compact('data'));
    }
    public function get_editdonhang($id){
    	$tinhtrang = DB::table('tinhtranghds')->orderby('id','desc')->get();
    	$donhang = DB::table('donhangs')->where('id',$id)->first();
    	$khachhang = DB::table('khachhangs')->where('id',$donhang->khachhang_id)->first();
    	$nhanhang = DB::table('thongtinnhanhangs')->where('id',$donhang->thongtinnhanhang_id)->first();
    	$chitiet = DB::table('chitietdonhangs')->where('donhang_id',$donhang->id)->get();
    	return view('admin.donhang.sua',compact('tinhtrang','donhang','khachhang','nhanhang','chitiet'));
    }
    public function post_editdonhang(Request $request ,$id){
    	$donhang = DB::table('donhangs')->where('id',$id)->first();
    	$status1 = $donhang->tinhtranghd_id;
    	$status2 = $request->selStatus;


    	if($status1 != $status2 && $status2 == 2){
    		DB::table('donhangs')->where('id',$id)
    		->update(['tinhtranghd_id'=> $status2,
    		]);
    		$idSP = DB::table('chitietdonhangs')
    		->select('sanpham_id','chitietdonhang_soluong')
    		->where('donhang_id',$id)->get();
    		foreach ($idSP as $key => $val) {
	    		$idLHM = Db::table('lohangs')->where('sanpham_id',$val->sanpham_id)->max('id');
	    		$lohang = DB::table('lohangs')->where('id',$idLHM)->first();
	    		DB::table('lohangs')
	    			->where('id',$idLHM)
	    			->update([
	    				'lohang_soluongdaban' => $lohang->lohang_soluongdaban + $val->chitietdonhang_soluong,
	    				'lohang_soluonghientai' => $lohang->lohang_soluonghientai - $val->chitietdonhang_soluong,
	    				]);
	    	}

    	}elseif ($status1 !=$status2 &&$status2==3) {
    		DB::table('donhangs')->where('id',$id)
    		->update([ 'tinhtranghd_id' =>$status2,
    		]);
    		$idSP = DB::table('chitietdonhangs')
    		->select('sanpham_id','chitietdonhang_soluong')
    		->where('donhang_id',$id)->get();
    		foreach ($idSP as $key => $val) {
	    		$idLHM = Db::table('lohangs')->where('sanpham_id',$val->sanpham_id)->max('id');
	    		$lohang = DB::table('lohangs')->where('id',$idLHM)->first();
	    		DB::table('lohangs')
	    			->where('id',$idLHM)
	    			->update([
	    				'lohang_soluongdoitra' => $lohang->lohang_soluongdoitra + $val->chitietdonhang_soluong,
	    				'lohang_soluonghientai' => $lohang->$lohang_soluonghientai + $val->chitietdonhang_soluong,
	    				'lohang_soluongdaban' => $lohang->lohang_soluongdaban - $val->chitietdonhang_soluong,
	    				]);
	    	}
    	}elseif ($status1 != $status2 && $status2 ==4) {
    		DB::table('donhangs')->where('id',$id)
    			->update([
    					'tinhtranghd_id' => $status2,
    				]);
    		$idSP = DB::table('chitietdonhangs')
    			->select('sanpham_id','chitietdonhang_soluong')
    			->where('donhang_id',$id)->get();
	    	foreach ($idSP as $key => $val) {
	    		$idLHM = Db::table('lohangs')->where('sanpham_id',$val->sanpham_id)->max('id');
	    		$lohang = DB::table('lohangs')->where('id',$idLHM)->first();
	    		DB::table('lohangs')
	    			->where('id',$idLHM)
	    			->update([
	    				'lohang_soluongdaban' => $lohang->lohang_soluongdaban + $val->chitietdonhang_soluong,
	    				'lohang_soluonghientai' => $lohang->lohang_soluongsp - $val->chitietdonhang_soluong,
	    				]);
	    	}
    	}else{
    		DB::table('donhangs')->where('id',$id)
    			->update([
    					'tinhtranghd_id' => $status2,
    				]);
    	}
    	return Redirect::to('/all-donhang');
    }

    public function get_editsuagiaohang($id){
        $tinhtrang = DB::table('tinhtranghds')->orderby('id','desc')->get();
        $donhang = DB::table('donhangs')->where('id',$id)->first();
        $khachhang = DB::table('khachhangs')->where('id',$donhang->khachhang_id)->first();
        $nhanhang = DB::table('thongtinnhanhangs')->where('id',$donhang->thongtinnhanhang_id)->first();
        $chitiet = DB::table('chitietdonhangs')->where('donhang_id',$donhang->id)->get();
        return view('admin.donhang.suagiaohang',compact('tinhtrang','donhang','khachhang','nhanhang','chitiet'));
    }
    public function post_editsuagiaohang(Request $request,$id){
      $donhang = DB::table('donhangs')->where('id',$id)->get();
      $nhanhang = array();
      $nhanhang['nguoinhan_ten']=$request->txtName;
      $nhanhang['nguoinhan_sodienthoai']=$request->txtPhone;
      $nhanhang['nguoinhan_diachi']=$request->txtAddress;
      $nhanhang['nguoinhan_email']=$request->txtEmail;
      $nhanhang['nguoinhan_ghichu']=$request->txtNote;
      DB::table('thongtinnhanhangs')
      ->join('donhangs','donhangs.thongtinnhanhang_id','=','thongtinnhanhangs.id')
      ->where('thongtinnhanhangs.id',$id)->update($nhanhang);
      return Redirect::to('/all-donhang');
    }

    public function get_editthanhtoan($id){
        $tinhtrang = DB::table('tinhtranghds')->orderby('id','desc')->get();
        $donhang = DB::table('donhangs')->where('id',$id)->first();
        $khachhang = DB::table('khachhangs')->where('id',$donhang->khachhang_id)->first();
        $nhanhang = DB::table('thongtinnhanhangs')->where('id',$donhang->thongtinnhanhang_id)->first();
        $chitiet = DB::table('chitietdonhangs')->where('donhang_id',$donhang->id)->get();
        return view('admin.donhang.suathanhtoan',compact('tinhtrang','donhang','khachhang','nhanhang','chitiet'));
    }
    public function post_editthanhtoan(Request $request , $id){
       $sp= DB::select('select sanpham_id,chitietdonhang_soluong,chitietdonhang_thanhtien,(chitietdonhang_thanhtien/chitietdonhang_soluong) as gia from chitietdonhangs where donhang_id = ?', [$id]);
        // print_r(count($idSP));
        $data = $request->input('products',[]);
        // print_r($data);
        for ($i=0; $i < count($sp); $i++) { 
            $a = $sp[$i]->sanpham_id;
            DB::table('chitietdonhangs')
                ->where([['sanpham_id',$a],['donhang_id',$id] ])
                ->update([
                    'chitietdonhang_soluong'=>$request->txtQuant[$i],
                    'chitietdonhang_thanhtien'=>($request->txtQuant[$i]*$sp[$i]->gia),
                    ]);
        }

        //Delete san pham khoi gio hang

        foreach ($data as  $val) {
            DB::table('chitietdonhangs')
                ->where([['sanpham_id',$val],['donhang_id',$id] ])
                ->delete();
        }

        //Tinh lai tong gia tri don hang

        $tong = DB::select('select sum(chitietdonhang_thanhtien) as tong from chitietdonhangs where donhang_id = ?', [$id]);
        // print_r($tong[0]->tong);
        $p = DB::table('donhangs')
            ->where('id',$id)
            ->update([
                'donhang_tongtien' =>$tong[0]->tong,
                ]);
        return Redirect::to('/all-donhang');

    }

    public function pdf($id){
        $donhang = DB::table('donhangs')->where('id',$id)->first();
        $chitietdonhang = DB::table('chitietdonhangs')->where('donhang_id',$id)->get();
        $khachhang = DB::table('khachhangs')->where('id',$donhang->khachhang_id)->first();
        // print_r($khachhang);
        $pdf = PDF::loadView('admin.donhang.hoadon',compact('donhang','chitietdonhang','khachhang'));
        return $pdf->stream();

    }
}
