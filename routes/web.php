<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
/* chi tiết sản phẩm */
Route::get('/chi-tiet-san-pham/{sp_id}','HomeController@detail_sanpham'); 
Route::get('/danh-muc-san-pham/{loaisp_id}','HomeController@show_category');

/* cart*/ 
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');

/*check out*/ 
Route::get('/login-checkout','CheckOutController@login_checkout');
Route::get('/logout-checkout','CheckOutController@logout_checkout');
Route::post('/add-customer','CheckOutController@add_customer');
Route::post('/login-customer','CheckOutController@login_customer');

/*thanh toan*/
Route::get('/checkout','CheckOutController@checkout');
Route::post('/save-thongtinnhanhang','CheckOutController@save_thongtinnhanhang');

Route::get('/payment','CheckOutController@payment');
Route::post('/order-place','CheckoutController@order_place');








/* backend */
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dasboard','AdminController@dashboard');

/*don vi tinh*/
Route::get('/all-donvitinh', 'DonvitinhController@all_donvitinh'); 
Route::get('/add-donvitinh','DonvitinhController@add_donvitinh');
Route::post('/save-donvitinh','DonvitinhController@save_donvitinh');
Route::get('/edit-donvitinh/{dvt_id}','DonvitinhController@edit_donvitinh');
Route::post('/update-donvitinh/{dvt_id}','DonvitinhController@update_donvitinh');
Route::get('/delete-donvitinh/{dvt_id}','DonvitinhController@delete_donvitinh');

/*nhom thuc pham*/
Route::get('/all-nhom','NhomController@all_nhom');
Route::get('/add-nhom','NhomController@add_nhom');
Route::post('/save-nhom','NhomController@save_nhom');
Route::get('/getEdit-nhom/{id}','NhomController@get_Edit');
Route::post('/postEdit-nhom/{id}','NhomController@post_Edit');
Route::get('/delete-nhom/{id}','NhomController@delete');

/*nha cung cap*/ 
Route::get('/all-nhacungcap','NhacungcapController@all_nhacungcap');
Route::get('/add-nhacungcap','NhacungcapController@add_nhacungcap');
Route::post('/save-nhacungcap','NhacungcapController@save_nhacungcap');
Route::get('/getEdit/{id}','NhacungcapController@get_Edit');
Route::post('/postEdit/{id}','NhacungcapController@post_Edit');
Route::get('/delete-nhacungcap/{id}','NhacungcapController@delete');

/*Loai thuc pham*/ 
Route::get('/all-loaisanpham','LoaisanphamController@all_loaisanpham');
Route::get('/add-loaisanpham','LoaisanphamController@add_loaisanpham');
Route::post('/save-loaisanpham','LoaisanphamController@save_loaisanpham');
Route::get('/edit-loaisanpham/{loai_id}','LoaisanphamController@edit_loaisanpham');
Route::post('/update-loaisanpham/{loai_id}','LoaisanphamController@update_loaisanpham');
Route::get('/delete-loaisanpham/{loai_id}','LoaisanphamController@delete_loaisanpham');

/*san pham*/ 
Route::get('/all-sanpham','SanphamController@all_sanpham');
Route::get('/add-sanpham','SanphamController@add_sanpham');
Route::post('/save-sanpham','SanphamController@save_sanpham');
Route::get('/edit-sanpham/{sp_id}','SanphamController@edit_sanpham');
Route::post('/update-sanpham/{sp_id}','SanphamController@update_sanpham');
Route::get('/delete-sanpham/{sp_id}','SanphamController@delete_sanpham');

/*Lo hang*/ 
Route::get('/all-lohang','LohangController@all_lohang');
Route::get('/add-lohang','LohangController@add_lohang');
Route::post('/save-lohang','LohangController@save_lohang');
Route::get('/edit-lohang/{lohang_id}','LohangController@edit_lohang');
Route::post('/update-lohang/{lohang_id}','LohangController@update_lohang');
Route::get('/delete-lohang/{lohang_id}','LohangController@delete_lohang');
/*nhap hàng*/ 
Route::get('/add-nhaphang/{lohang_id}','LohangController@add_nhaphang');

Route::post('/post-nhaphang/{lohang_id}','LohangController@post_nhaphang');

Route::get('/unactive-lohang/{lohang_id}','LohangController@unactive_lohang');
Route::get('/active-lohang/{lohang_id}','LohangController@active_lohang');
/*Khach hang */ 
Route::get('/all-khachhang','KhachHangController@all_khachhang');
Route::get('delete-kh/{kh_id}','KhachHangController@delete_kh');

