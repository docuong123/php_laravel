<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class ThongnkeController extends Controller
{
    public function thongke(){
    		$sl = DB::table('lohangs')
    		->select(DB::raw('SUM(lohang_soluongsp) as nhap'),
    			     DB::raw('SUM(lohang_soluongdaban) as ban'),
    			     DB::raw('SUM(lohang_soluonghientai) as ton'),
    			     DB::raw('SUM(lohang_soluongdoitra) as tra')
    	)->get();
    		$bannhieu = DB::table('lohangs')
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_soluongdaban) as ban'),
	   				DB::raw('SUM(lohang_soluonghientai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->orderBy('ban', 'desc')
	   			->get();
	   	$tonnhieu = DB::table('lohangs')
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_soluongdaban) as ban'),
	   				DB::raw('SUM(lohang_soluonghientai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->orderBy('ton', 'desc')
	   			->get();
	   	$hethan = DB::table('lohangs')
	   			->where('lohang_tinhtrang',0)
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_soluongdaban) as ban'),
	   				DB::raw('SUM(lohang_soluonghientai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->get();
	   	$conhan = DB::table('lohangs')
	   			->where('lohang_tinhtrang',1)
	   			->select(
	   				'sanpham_id',
	   				DB::raw('SUM(lohang_soluongdaban) as ban'),
	   				DB::raw('SUM(lohang_soluonghientai) as ton')
	   				)
	   			->groupBy('sanpham_id')
	   			->get();		
    	return view('admin.thongke.tongquan',compact('sl','tonnhieu','hethan','conhan','bannhieu'));
    }
    
}
