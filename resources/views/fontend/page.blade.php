@extends('layout')
@section('content')
    <div class="new-pro-slider small-pr-slider" style="overflow:visible">
      <div class="slider-items-products">
        <div class="new_title center">
          <h2>SẢN PHẨM MỚI</h2>
        </div>
        <div id="recommend-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col3"> 
            <!-- Item -->
            @foreach($sanpham as $key =>$product)
            <div class="item">
              <div class="col-item">
                <div class="images-container" style="height: 150px;"> <a class="product-image" title="" href="{{URL::to('chi-tiet-san-pham/'.$product->sanpham_id)}}"> <img src="{{URL::to('public/upload/sanpham/'.$product->sanpham_anh)}}" class="img-responsive" alt="a" style="height: 100%;" /> </a>
                  <div class="qv-button-container"> <a href="{{URL::to('chi-tiet-san-pham/'.$product->sanpham_id)}}" class="qv-e-button btn-quickview-1"><span><span>{{URL::to('/show-detail')}}</span></span></a> </div>
                </div>
                <form action="{{URL::to('/save-cart')}}" method="POST">
                  {{ csrf_field() }}
                <div class="info">
                  <div class="info-inner">
                    <div class="item-title"> <a title=" " href="{{URL::to('chi-tiet-san-pham/'.$product->sanpham_id)}}">{{$product->sanpham_ten}}</a> </div>
                    <!--item-title-->
                    <div class="item-content">
                      <div class="price-box">
                        <p class="special-price"> <span class="price"></span>{{number_format($product->lohang_giabanra)}} VNĐ  </p>
                      </div>
                    </div>
                    <input type="hidden" name="qty" value="1">
                    <input name="productid_hidden" type="hidden"  value="{{$product->sanpham_id}}" />
                    <!--item-content--> 
                  </div>
                  <!--info-inner-->
                  <div class="actions">
                    <button type="submit" title="Add to Cart" class="button btn-cart"><span>Thêm giỏ hàng</span></button>
                  </div>
                  <!--actions-->
                  <div class="clearfix"> </div>
                </div>
              </form>
              </div>
            </div>
            @endforeach
            <!-- End Item -->
          </div>
        </div>
      </div>
    </div>
    <br></br>
    <div class="features_items"><!--features_items-->
     
          <div class="new_title center">
            <h2>SẢN PHẨM</h2>
          </div>
          @foreach($sanpham1 as $key =>$product1)
          <a href="{{URL::to('chi-tiet-san-pham/'.$product1->sanpham_id)}}">
          <div class="col-sm-2" style="height: 280px">
              <div class="product-image-wrapper">
                  <div class="single-products">
                      <div class="productinfo text-center" style="margin-top: 15px;">
                        <img src="{{URL::to('public/upload/sanpham/'.$product1->sanpham_anh)}}" class="img-responsive" alt="a" style="height: 150px;"  />
                          <form action="{{URL::to('/save-cart')}}" method="POST">
                          {{ csrf_field() }}
                          <p class="special-price" style="margin-top: 5px;"> <span class="price"></span>{{number_format($product1->lohang_giabanra)}} VNĐ </p>
                          <div class="item-title" style="margin-top: 5px;"> <a title=" " href="{{URL::to('chi-tiet-san-pham/'.$product1->sanpham_id)}}">{{$product1->sanpham_ten}}</a> </div>
                          <input type="hidden" name="qty" value="1">
                          <input name="productid_hidden" type="hidden"  value="{{$product1->sanpham_id}}" />
                          
                          <button type="submit" title="Add to Cart" class="button btn-cart" style="margin-top: 5px;"><i class="fa fa-shopping-cart"></i><span>Thêm giỏ hàng</span></button>
                          </form>

                      </div>
                  </div>
              <div class="choose">
              </div>
              </div>
          </div>
          </a> 
          @endforeach 
    </div>
    
    
@endsection