@extends('layout')
@section('content')
    <div class="new-pro-slider small-pr-slider" style="overflow:visible">
      <div class="slider-items-products">
        <div class="new_title center">
          @foreach($category_name as $key => $name)
          <h2>{{$name->loaisanpham_ten}}</h2>
          @endforeach()
        </div>
        <div id="recommend-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col3"> 
            <!-- Item -->
            @foreach($loai_sanpham_id as $key => $product)
            <div class="item">
              <div class="col-item">
                <div class="images-container" style="height: 150px;"> <a class="product-image" title="" href="{{URL::to('chi-tiet-san-pham/'.$product->sanpham_id)}}"> <img src="{{URL::to('public/upload/sanpham/'.$product->sanpham_anh)}}" class="img-responsive" alt="a" style="height: 100%;" /> </a>
                  <div class="qv-button-container"> <a href="{{URL::to('chi-tiet-san-pham/'.$product->sanpham_id)}}" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                </div>
                <form action="{{URL::to('/save-cart')}}" method="POST">
                  {{ csrf_field() }}
                <div class="info">
                  <div class="info-inner">
                    <div class="item-title"> <a title="" href="{{URL::to('chi-tiet-san-pham/'.$product->sanpham_id)}}">{{$product->sanpham_ten}}</a> </div>
                    <!--item-title-->
                    <div class="item-content">
                      <div class="price-box">
                        <p class="special-price"> <span class="price">{{number_format($product->lohang_giabanra)}} vnđ </span> </p>
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
@endsection