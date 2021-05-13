<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CartController extends Controller
{
      public function save_cart(Request $request){
    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;
    	// $product_info = DB::table('sanphams')
    	// ->join('lohangs','sanphams.id', '=', 'lohangs.sanpham_id')
    	// ->join('loaisanphams','sanphams.loaisanpham_id','=','loaisanphams.id')
    	// ->where('sanphams.id',$productId)->first();

        
     //    $data['id'] = $product_info->id;
     //    $data['qty'] = $quantity;
     //    $data['name'] = $product_info->sanpham_ten;
     //    $data['price'] = $product_info->lohang_giabanra;
     //    $data['weight'] = $product_info->lohang_giabanra;
     //    $data['options']['image'] = $product_info->sanpham_anh;
     //    Cart::add($data);

     //    return Redirect()->back();

        $sanpham = DB::select('select * from sanphams where id = ?',[$productId]);
        $muasanpham = DB::select('select sp.id,sp.sanpham_ten,sp.sanpham_anh,lh.lohang_kyhieu, lh.lohang_giabanra from sanphams as sp, lohangs as lh, nhacungcaps as ncc  where ncc.id = lh.nhacungcap_id and lh.sanpham_id = sp.id and sp.id = ?',[$productId]);
            $gia = $muasanpham[0]->lohang_giabanra;
            Cart::add(array( 'id' => $muasanpham[0]->id, 'image' => $muasanpham[0]->sanpham_anh, 'name' => $muasanpham[0]->sanpham_ten, 'qty' => $quantity, 'price' => $gia, 'weight' => $gia));
        return Redirect()->back();

    }
    public function show_cart(){

        $sanpham = DB::table('sanphams')->orderby('id','desc')->get();

        $loaisp = DB::table('loaisanphams')->orderby('id','desc')->get();
        $lohang  = DB::table('lohangs')->orderby('id','desc')->get();
        return view('fontend.cart.show_cart')->with('sanpham',$sanpham)->with('loaisp',$loaisp)->with('lohang',$lohang);
    }
    public function delete_to_cart($rowId){
        Cart::remove($rowId);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
    	$rowId = $request->rowId_cart;
    	$qty = $request->cart_quantity;
    	Cart::update($rowId,$qty);
		return Redirect::to('/show-cart');
    }
}
