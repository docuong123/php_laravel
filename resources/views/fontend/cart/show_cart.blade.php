@extends('layout')
@section('content')


  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart wow">
          <div class="page-title">
            <h2>Giỏ hàng</h2>
          </div>
          <div class="table-responsive">
           
             
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">

          <?php
            $content = Cart::content();

          ?>
                  <thead>
                    <tr class="first last">
                      {{-- <th rowspan="1">&nbsp;</th> --}}
                      <th rowspan="1" style="margin-left:20px"> Hình ảnh</th>
                      <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                     
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
                      <td class="image"><a class="product-image" title="Sample Product" href="#women-s-u-tank-top/"><img src="{{URL::to('public/upload/sanpham/'.$v_content->image)}}" width="100px" alt="" /></a></td>
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
                  $tong = $v_content->price * $v_content->qty;
                  echo number_format($tong);
                  ?> VNĐ
                      </span> </span></td>
                      <td class="a-center last"><a class="button remove-item" title="Remove item" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><span><span>Remove item</span></span></a></td>
                    </tr>
                    @endforeach()
                  </tbody>
                </table>
              </fieldset>
           
          </div>
          <!-- BEGIN CART COLLATERALS -->
          <div class="cart-collaterals row">
            <div class="totals col-sm-4">
              <h3> Thanh toán </h3>
              <div class="inner">
                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                  <colgroup>
                  <col>
                  <col width="1">
                  </colgroup>
                  <tfoot>
                    <tr>
                      <td colspan="1" class="a-left" style=""><strong>Thành tiền</strong></td>
                      <td class="a-right" style=""><strong><span class="price">{{Cart::subtotal(000)}} VNĐ </span></strong></td>
                    </tr>

                  </tfoot>
                  <tbody>
                    <tr>
                      <td colspan="1" class="a-left" style=""> Tổng tiền </td>
                      <td class="a-right" style=""><span class="price">{{Cart::subtotal(000)}} VNĐ </span></td>
                  </tr>
                  <tr>
                     <td colspan="1" class="a-left" style=""> Phí vận chuyển </td>
                      <td class="a-right" style=""><strong><span class="price" >Free</span></td>
                  </tr>
                  </tbody>
                </table>
                <ul class="checkout">
                     <?php
                        $customer_id = Session::get('id');
                        $nhanhang_id = Session::get('id');
                        if($customer_id != NULL && $nhanhang_id ==NULL){
                        ?>
                              <li>
                                <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span><a href="{{URL::to('/checkout')}}">Thanh toán </a></span></button>
                              </li>
                        <?php
                        }elseif($customer_id !=NULL && $nhanhang_id !=NULL){
                          ?>
                          <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span><a href="{{URL::to('/payment')}}">Thanh toán </a></span></button>
                          <?php
                        }
                        else{
                        ?>
                              <li>
                                <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span><a href="{{URL::to('/login-checkout')}}">Thanh toán </a></span></button>
                              </li>
                        <?php
                        }
                      ?>
                  <!-- <li>
                    <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span><a href="{{URL::to('/payment')}}">Thanh toán </a></span></button>
                  </li> -->
                  <br>
                 
                  <br>
                </ul>
              </div>
              <!--inner--> 
              
            </div>
          </div>
          
          <!--cart-collaterals--> 
          
        </div>
      </div>
    </div>
  </section>

@endsection