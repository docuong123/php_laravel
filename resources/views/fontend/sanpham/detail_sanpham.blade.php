@extends('layout')
@section('content')

  @foreach($sanpham_detail as $key => $value)
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
          <div class="product-view wow">
            <div class="product-essential">
              <form action="{{URL::to('/save-cart')}}" method="POST">
                              {{csrf_field()}}
                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                 
                <img style="height: 350px; width: 350px" src="{{URL::to('/public/upload/sanpham/'.$value->sanpham_anh)}}" alt="" />
                </div>
                
                <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                
                  <div class="product-name">
                    <h1>{{$value->sanpham_ten}}</h1>
                  </div>
             
                  <div class="price-block">
                    <div class="price-box">
                     
                      <p class="special-price"> <span class="price"> Giá: {{number_format($value->lohang_giabanra)}} VNĐ</span> </p>
                    </div>
                  </div>
                  <div class="short-description">
                   
                   <p><b>Tình trạng: </b>Còn {{$value->lohang_soluonghientai}} sản phẩm</p>
                   <p><b>Điều kiện: </b>Mới 100%</p>
                   <p><b>Loại sản phẩm: </b>{{$value->loaisanpham_ten}}</p> </p>
                   
                  </div>
                  <div class="add-to-box">
                    <div class="add-to-cart">
                      <label for="qty">Số lượng : 
                        <input style="width: 50px" name="qty" type="number" min="1"  value="1"/>
                        <input type="text" style="width: 50px" name="danhmuc" value="{{$value->donvitinh_ten}}">
                      </label>
                      <input name="productid_hidden" type="hidden"  value="{{$value->sanpham_id}}" />
                      <br>
                      <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="submit" ><span><i class="icon-basket"></i> Thêm giỏ hàng</span></button>
                    </div>
                    
                  </div>
              </form>

            </div>
            <div class="product-collateral">
              <div class="col-sm-12 wow">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                  
                  <li class="active"> <a href="#product_tabs_description" data-toggle="tab">Giới thiệu sản phẩm </a> </li>
                   <li> <a href="#product_tabs_custom1" data-toggle="tab">Mô tả</a> </li>
              
                </ul>
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                      <p>{!!$value->sanpham_mota!!}</p>
                     
                    </div>
                  </div>

                  <div class="tab-pane fade" id="product_tabs_custom1">
                    <div class="product-tabs-content-inner clearfix">
                      <p>{!!$value->sanpham_mota!!}</p>
                    </div>
                  </div>
                </div>
              </div>

              {{-- sản phẩm liên quan --}}
              <div class="col-sm-12">
                <div class="new-pro-slider small-pr-slider" style="overflow:visible">
      <div class="slider-items-products">
        <div class="new_title center">
          <h2> Sản phẩm tương tự</h2>
        </div>
        <div id="recommend-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col3"> 
            <!-- Item -->
            @foreach($relate as $key => $product)
            <div class="item">
              <div class="col-item">
                <div class="images-container">
                 <a class="product-image" title="" href="{{URL::to('chi-tiet-san-pham/'.$product->sanpham_id)}}"> <img src="{{URL::to('public/upload/sanpham/'.$product->sanpham_anh)}}" class="img-responsive" alt="a" style="height: 150px;" /> </a>
                  <div class="qv-button-container"> <a href="{{URL::to('chi-tiet-san-pham/'.$product->sanpham_id)}}" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                </div>
                <form action="{{URL::to('/save-cart')}}" method="POST">
                  {{ csrf_field() }}
                <div class="info">
                  <div class="info-inner">
                    <div class="item-title"> <a title=" Sample Product" href="{{URL::to('chi-tiet-san-pham/'.$product->sanpham_id)}}">{{$product->sanpham_ten}}</a> </div>
                    <!--item-title-->
                    <div class="item-content">
                      <div class="price-box">
                        <p class="special-price"> <span class="price">{{number_format($product->lohang_giabanra)}} VNĐ</span> </p>
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
 </div>

                        
 </div>
</div>
 </div>
 </div>
 </div>
  </section>
  <!--End main-container --> 
  @endforeach()
@endsection