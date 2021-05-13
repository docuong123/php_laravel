<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/furniture/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:01:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title> FRESH FOOD</title>
<!-- Favicons Icon -->
{{-- <link rel="icon" href="//theme.hstatic.net/1000026716/1000440777/14/favicon.png?v=11736" type="image/x-icon" /> --}}
{{-- <link rel="shortcut icon" href="//theme.hstatic.net/1000026716/1000440777/14/favicon.png?v=11736" type="image/x-icon" /> --}}
<!-- Mobile Specific -->
  <link rel="icon" href="/public/frontend/images/fanxybox/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS Style -->

<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/revslider.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/owl.theme.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}" type="text/css">
<!-- Google Fonts -->
<link href="{{asset('public/frontend/css/1.css')}}" rel='stylesheet' type='text/css'>
<script src="{{asset('public/frontend/js/1.js')}}"></script>
</head>
<body class="cms-index-index">
<div class="page"> 
  <!-- Header -->
  <header class="header-container">
 
    <div class="header-top">
      <div class="container">
        <div class="row"> 
          <!-- Header Language -->
          <div class="col-xs-6">
            
            <!-- End Header Language --> 
            <!-- Header Currency -->
            
            <!-- End Header Currency -->
            <marquee class="welcome-msg hidden-xs"><div style="color: green"> HCM: 78-80-82 HOÀNG HOA THÁM, Q.TÂN BÌNH | HN: 37 NGÕ 121 THÁI HÀ, Q.ĐỐNG ĐA  </div></marquee>
          </div>
          <div class="col-xs-6"> 
            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">
                <div class=""><i class='fas fa-envelope'></i> docuongutc@gmail.com</div>
                <div style="margin-left: 10px" class=""><i class='fas fa-phone-square-alt'></i> 1800 6866</div>
              </div>
            </div>
            <!-- End Header Top Links --> 
          </div>
        </div>
      </div>
    </div>
    <div class="header container">
      <div class="row">
        <div class="col-lg-2 col-sm-3 col-md-2 col-xs-12"> 
          <!-- Header Logo --> 
          <a class="logo" title="" href="{{URL::to('/trang-chu')}}"><img alt="" src="{{asset('public/frontend/images/logo5.png')}}"></a> 
          <!-- End Header Logo --> 
        </div>
        <div class="col-lg-7 col-sm-4 col-md-6 col-xs-12"> 
          <!-- Search-col -->
          <div class="search-box" style="width: 365px;">
            <form action="{{URL::to('/tim-kiem')}}" method="POST" id="search_mini_form" name="Categories">
                {{csrf_field()}}
              <input style="width: 250px" type="text" value="" maxlength="70" class="" name="keywords_submit" placeholder="Tìm kiếm" id="search">
              <input type="submit" id="submit-button" name="search_items" value="Tìm Kiếm" class="search-btn-bg">
            </form>
          </div>
          <!-- End Search-col --> 
        </div>
        <!-- Top Cart -->
          <div class="col-lg-3 col-sm-5 col-md-4 col-xs-12">
          <div class="top-cart-contain">
            <div class="mini-cart">
              <div class="basket dropdown-toggle">
           <!--  <?php 
                if (Cart::count()==NULL) {
                ?>
                <a href="{{URL::to('/trang-chu')}}">
                 <i class="icon-cart"></i>
                <div class="cart-box"><span class="title">Giỏ Hàng</span><span id="cart-total"> <?php $cart = Cart::count(); echo ($cart)?></span>
                </div>
                </a>
                <?php
                }elseif (Cart::count()!=NULL) {
                ?>
                <a href="{{URL::to('/show-cart')}}"> <i class="icon-cart"></i>
                <div class="cart-box"><span class="title">Giỏ Hàng</span><span id="cart-total"> <?php $cart = Cart::count(); echo ($cart)?></span>
                </div>
                </a>
                <?php
                }
                ?> -->
                
               <a href="{{URL::to('/show-cart')}}"> <i class="icon-cart"></i>
                <div class="cart-box"><span class="title">Giỏ Hàng</span><span id="cart-total"> <?php $cart = Cart::count(); echo ($cart)?></span></div>
                </a>
              </div>
            </div>
            <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
              <input value="" type="hidden">
              <input id="enable_module" value="1" type="hidden">
              <input class="effect_to_cart" value="1" type="hidden">
              <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
            </div>
          </div>
          <span class="or">|</span>
          <?php
                $customer_id = Session::get('id');
                if($customer_id!=NULL){
                ?>
                <div class="login"><a title="Login" href="{{URL::to('/logout-checkout')}}"><span>Đăng Xuất</span></a></div>
                <?php
                }else{
                ?>
                <div class="login"><a title="Login" href="{{URL::to('/login-checkout')}}"><span>Đăng Nhập</span></a></div>
                <?php
                }
                ?>
        </div>
        <!-- End Top Cart --> 
      </div>
    </div>
  </header>
  <!-- end header --> 
  <!-- Navbar -->
  <nav>
    <div class="container">
      <div class="nav-inner"> 
        <ul id="nav" class="hidden-xs">
          <li class="level0 parent drop-menu"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
            <?php 
              $nhom =  DB::table('nhoms')->get();
             ?>
            @foreach ($nhom as $menu_1)
            <li class="level0 parent drop-menu" style="margin-left: 20px;"><a href="" >{!! $menu_1->nhom_ten !!}</a>
              <?php 
                  $loaisp = DB::table('loaisanphams')->where('nhom_id',$menu_1->id)->get();
               ?>
              <ul class="level1">
              @foreach ($loaisp as $menu_2)
                 <li class="level1 firs"><a href="{{URL::to('/danh-muc-san-pham/'.$menu_2->id)}}">{!! $menu_2->loaisanpham_ten !!}</a></li>
            @endforeach                             
              </ul>
            </li>
    @endforeach
    <?php
    $customer_id = Session::get('id');
    $nhanhang_id = Session::get('id');
    if($customer_id !=NULL && $nhanhang_id == NULL){
      ?>
       <li class="level0 parent drop-menu" style="margin-left: 20px;"><a href="{{URL::to('/checkout')}}" >Thanh toán</a></li>
      <?php
    }elseif($customer_id !=NULL && $nhanhang_id !=NULL){
      ?>
      <li class="level10 parent drop-menu" style="margin-left: 20px"><a href="{{URL::to('/payment')}}">Thanh toán</a></li>
      <?php
    }
    else{
      ?>
       <li class="level0 parent drop-menu" style="margin-left: 20px;"><a href="{{URL::to('/login-checkout')}}" >Thanh toán</a></li>
      <?php
    }
    ?>            
    <li class="level0 parent drop-menu" style="margin-left: 20px;"><a href="" >Liên hệ</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end nav --> 
  <!-- Slider -->
  <div id="magik-slideshow" class="magik-slideshow">
    <div class="wow">
      <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
          <ul>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb="{{asset('public/frontend/images/img1.png')}}">
                <img src="{{asset('public/frontend/images/img1.png')}}" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb="{{asset('public/frontend/images/img2.png')}}" class="black-text">
                <img src="{{asset('public/frontend/images/img2.png')}}"  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb="{{asset('public/upload/sanpham/slide/img2.jpg')}}" class="black-text">
                <img src="{{asset('public/upload/sanpham/slide/img2.jpg')}}"  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb="{{asset('public/upload/sanpham/slide/img6.jpg')}}" class="black-text">
                <img src="{{asset('public/upload/sanpham/slide/img6.jpg')}}"  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
         

          </ul>
          <div class="tp-bannertimer"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- end Slider --> 
  <!-- header service -->
  <div class="header-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-truck">&nbsp;</div>
            <span><strong>FREE SHIPPING</strong> on order over $99</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-support">&nbsp;</div>
            <span><strong>Customer Support</strong> Service</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-money">&nbsp;</div>
            <span><strong>3 days Money Back</strong> Guarantee</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-dis">&nbsp;</div>
            <span><strong class="orange">5% discount</strong> on order over $199</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- end header service --> 

  <!-- recommend slider -->
  <section class="recommend container">
    @yield('content')
  </section>
  <!-- End Recommend slider --> 
  <!-- Footer -->
  <footer class="footer">
    <div class="footer-middle container">
      <div class="col-md-3 col-sm-4">
        <div class="footer-logo"><a href="index.html" title="Logo"><img src="{{asset('public/frontend/images/footer-logo5.png')}}" alt="logo"></a></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu. </p>
        <div class="payment-accept">
          <div>
            <img src="{{asset('public/frontend/images/payment-2.png')}}" alt="payment"> 
            <img src="{{asset('public/frontend/images/payment-2.png')}}" alt="payment"> 
            <img src="{{asset('public/frontend/images/payment-3.png')}}" alt="payment"> 
            <img src="{{asset('public/frontend/images/payment-4.png')}}" alt="payment">
        </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-4">
        <h4>HƯỚNG DẪN MUA SẮM</h4>
        <ul class="links">
          <li class="first"><a href="#" title="How to buy">How to buy</a></li>
          <li><a href="#" title="FAQs">FAQs</a></li>
          <li><a href="#" title="Payment">Payment</a></li>
          <li><a href="#" title="Shipment&lt;/a&gt;">Shipment</a></li>
          <li><a href="#" title="delivery">Delivery</a></li>
          <li class="last"><a href="#" title="Return policy">Return policy</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-4">
        <h4>Style Advisor</h4>
        <ul class="links">
          <li class="first"><a title="Your Account" href="#">Your Account</a></li>
          <li><a title="Information" href="#">Information</a></li>
          <li><a title="Addresses" href="#">Addresses</a></li>
          <li><a title="Addresses" href="#">Discount</a></li>
          <li><a title="Orders History" href="#">Orders History</a></li>
          <li class="last"><a title=" Additional Information" href="#">Additional Information</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-4">
        <h4>Information</h4>
        <ul class="links">
          <li class="first"><a href="#" title="Site Map">Site Map</a></li>
          <li><a href="#" title="Search Terms">Search Terms</a></li>
          <li><a href="#" title="Advanced Search">Advanced Search</a></li>
          <li><a href="#" title="Contact Us">Contact Us</a></li>
          <li><a href="#" title="Suppliers">Suppliers</a></li>
          <li class=" last"><a href="#" title="Our stores" class="link-rss">Our stores</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-4">
        <h4>Contact us</h4>
        <div class="contacts-info">
          <address>
          <i class="add-icon">&nbsp;</i>123 Main Street, Anytown, <br>
          &nbsp;CA 12345  USA
          </address>
          <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +1 800 123 1234</div>
          <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="mailto:support@magikcommerce.com">support@magikcommerce.com</a> </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom container">
      <div class="col-sm-5 col-xs-12 coppyright"> &copy; 2015 Magikcommerce. All Rights Reserved.</div>
      <div class="col-sm-7 col-xs-12 company-links">
        <ul class="links">
          <li><a href="#" title="Magento Themes">Magento Themes</a></li>
          <li><a href="#" title="Premium Themes">Premium Themes</a></li>
          <li><a href="#" title="Responsive Themes">Responsive Themes</a></li>
          <li class="last"><a href="#" title="Magento Extensions">Magento Extensions</a></li>
        </ul>
      </div>
    </div>
  </footer>
  <!-- End Footer --> 
</div>
<!-- <div class="social">
  <ul>
    <li class="fb"><a href="#"></a></li>
    <li class="tw"><a href="#"></a></li>
    <li class="googleplus"><a href="#"></a></li>
    <li class="rss"><a href="#"></a></li>
    <li class="pintrest"><a href="#"></a></li>
    <li class="linkedin"><a href="#"></a></li>
    <li class="youtube"><a href="#"></a></li>
  </ul>
</div> -->

<!-- JavaScript --> 
<script type="text/javascript" src="{{asset('public/frontend/js/jquery.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script> 
 
<script type="text/javascript" src="{{asset('public/frontend/js/common.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/frontend/js/revslider.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

<script type='text/javascript'>

jQuery(document).ready(function(){
jQuery('#rev_slider_4').show().revolution({
dottedOverlay: 'none',
delay: 5000,
startwidth: 1170,
startheight: 580,

hideThumbs: 200,
thumbWidth: 200,
thumbHeight: 50,
thumbAmount: 2,

navigationType: 'thumb',
navigationArrows: 'solo',
navigationStyle: 'round',

touchenabled: 'on',
onHoverStop: 'on',

swipe_velocity: 0.7,
swipe_min_touches: 1,
swipe_max_touches: 1,
drag_block_vertical: false,

spinner: 'spinner0',
keyboardNavigation: 'off',

navigationHAlign: 'center',
navigationVAlign: 'bottom',
navigationHOffset: 0,
navigationVOffset: 20,

soloArrowLeftHalign: 'left',
soloArrowLeftValign: 'center',
soloArrowLeftHOffset: 20,
soloArrowLeftVOffset: 0,

soloArrowRightHalign: 'right',
soloArrowRightValign: 'center',
soloArrowRightHOffset: 20,
soloArrowRightVOffset: 0,

shadow: 0,
fullWidth: 'on',
fullScreen: 'off',

stopLoop: 'off',
stopAfterLoops: -1,
stopAtSlide: -1,

shuffle: 'off',

autoHeight: 'off',
forceFullWidth: 'on',
fullScreenAlignForce: 'off',
minFullScreenHeight: 0,
hideNavDelayOnMobile: 1500,

hideThumbsOnMobile: 'off',
hideBulletsOnMobile: 'off',
hideArrowsOnMobile: 'off',
hideThumbsUnderResolution: 0,

hideSliderAtLimit: 0,
hideCaptionAtLimit: 0,
hideAllCaptionAtLilmit: 0,
startWithSlide: 0,
fullScreenOffsetContainer: ''
});
});
</script>

</body>

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/furniture/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:03:59 GMT -->
</html>
