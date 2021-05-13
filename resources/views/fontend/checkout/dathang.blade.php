@extends('layout')
@section('content')

<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart wow">
          <div class="page-title">
            <h2>Xem Lại Giỏ hàng</h2>
          </div>
          <div class="table-responsive">
           
             
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">
                 
                 				<?php
                				     $content = Cart::content();
                				?>
                  <thead>
                    <tr class="first last">
                      <th rowspan="1">&nbsp;</th>
                      <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                      {{-- <th rowspan="1"></th> --}}
                      <th colspan="1" class="a-center"><span class="nobr">Giá</span></th>
                      <th class="a-center" rowspan="1">Số lượng</th>
                      <th colspan="1" class="a-center">Tổng tiền</th>
                      <th class="a-center" rowspan="1">&nbsp;</th>
                    </tr>
                  </thead>
                  <tfoot>
                  <tr class="first last">
                      <td class="a-right last" colspan="50"><a href="{{URL::to('/trang-chu')}}"><button onclick="setLocation('#')" class="button btn-continue" title="" type="button"><span><span>Tiếp tục mua hàng</span></span></button></a>
                   </td>
                    
                  </tfoot>
                  <tbody>
                     @foreach($content as $v_content)
                    <tr class="last even">
                      <td class="image"><a class="product-image" title="Sample Product" href="#women-s-u-tank-top/"><img src="{{URL::to('public/upload/sanpham/'.$v_content->options->image)}}" width="100px" alt="" /></a></td>
                      <td><h2 class="product-name"> <a href="#women-s-u-tank-top/">{{$v_content->name}}</a> </h2></td>
                    
                      <td class="a-right"><span class="cart-price"> <span class="price">{{number_format($v_content->price)}} VNĐ</span> </span></td>
                      <td >
                      	<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST" >
									{{ csrf_field() }}
									<input style="width: 50px" class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
                      </td>

                      <td class="a-right movewishlist"><span class="cart-price"> <span class="price">
                      	<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal);
									?> VNĐ
                      </span> </span></td>
                      <td class="a-center last"><a class="button remove-item" title="Remove item" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><span><span>Remove item</span></span></a></td>
                    </tr>
                    @endforeach()
                  </tbody>
                </table>
              </fieldset>
           
          </div>
        </div>
<h4 style="margin-top: 20px;font-size: 20px;">Chọn hình thức thanh toán</h4>
			<form method="POST" action="{{URL::to('/order-place')}}">
				{{ csrf_field() }}
			<div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Thanh toán bằng thẻ ATM</label>
					</span>
					<span style="margin-right: 20px;margin-left: 20px">
						<label><input name="payment_option" value="2" type="checkbox"> Thanh toán khi nhận hàng</label>
					</span>
					<span>
						<label><input name="payment_option" value="3" type="checkbox"> Thanh toán bằng thẻ ghi nợ</label>
					</span>
					<input style="margin-left: 30px" type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
			</div>
			</form>
</section>

@endsection