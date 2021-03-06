<?php

namespace App\Http\Controllers;


use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Cart;
use App\Models\Models\Donhang,Chitietdonhang,Thongtinnhanhang,Opt_payment,Khachhang;

class CheckOutController extends Controller
{
    public function login_checkout(){
    	return view('fontend.checkout.login_checkout');
    }
    public function add_customer(Request $request){
    	$data = array();
    	$data['khachhang_ten']=$request->customer_name;
    	$data['khachhang_email']=$request->customer_email;
    	$data['khachhang_password']=md5($request->customer_password);
    	$data['khachhang_diachi']=$request->customer_address;
    	$data['khachhang_sdt']=$request->customer_phone;
    	$customer_id = DB::table('khachhangs')->insertGetId($data);

    	Session::put('id',$customer_id);
    	Session::put('khachhang_ten',$request->customer_name);

    	return Redirect::to('/checkout');

        
    }
    public function login_customer(Request $request){
    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('khachhangs')->where('khachhang_email',$email)->where('khachhang_password',$password)->first();
    	
        if ($result) {
            Session::put('id',$result->id);
            return Redirect('/checkout');
        }else{
            Session::put('message','Tài khoản hoặc mật khẩu không chính xác!!!');
            return Redirect::to('/login-checkout');
        }
    }
    public function logout_checkout(){
    	Session::flush();
    	return Redirect::to('/login-checkout');
    }

    public function checkout(){
        $content = Cart::content();
        $total = Cart::subtotal();
        return view('fontend.checkout.thanhtoan',compact('content','total'));
    }
    public function save_thongtinnhanhang(Request $request){

        $content = Cart::content();
        $total = Cart::subtotal();

        $data = array();
        $data['nguoinhan_ten']=$request->txt_nguoinhan;
        $data['nguoinhan_diachi']=$request->txt_diachi;
        $data['nguoinhan_sodienthoai']=$request->txt_sodienthoai;
        $data['nguoinhan_email']=$request->txt_email;
        $data['nguoinhan_ghichu']=$request->txt_ghichu;

        $nhanhang_id = DB::table('thongtinnhanhangs')->insertGetId($data);
        Session::put('id',$nhanhang_id);
        return Redirect::to('/payment');
    }
    public function payment(){
        return view('fontend.checkout.dathang');
    }
    public function order_place(Request $request)
    {
        $content = Cart::content();
        $total = Cart::subtotal();

        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('opt_payments')->insertGetId($data);


    // lưu đơn hàng
    $donhang = array();
    $donhang['khachhang_id']=Session::get('id');//lay duoc id khach hang de luu vao bang don hang
    $donhang['thongtinnhanhang_id']=Session::get('id');
    $donhang['tinhtranghd_id']=1;
    $donhang['donhang_tongtien']=$total;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $donhang['created_at']=now();
    $donhang_id = DB::table('donhangs')->insertGetId($donhang);

     foreach($content as $v_content){
            $view_donhang['donhang_id'] = $donhang_id;
            $view_donhang['sanpham_id'] = $v_content->id;
            $viewdonhang['gia_sp'] = $v_content->price;
            $view_donhang['chitietdonhang_thanhtien']=$v_content->qty * $v_content->price;
            $view_donhang['chitietdonhang_soluong'] = $v_content->qty;
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $view_donhang['created_at']=now();
            DB::table('chitietdonhangs')->insert($view_donhang);
        }if($data['payment_method']==1){

            Cart::destroy();
            return view('pages.checkout.handcash');

        }elseif($data['payment_method']==2){
            Cart::destroy();
            return view('pages.checkout.handcash');

        }else{
            Cart::destroy();
            return view('pages.checkout.handcash');

        }

    } 
}
