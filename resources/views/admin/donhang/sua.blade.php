@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/post-editdonhang/'.$donhang->id)}}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <header class="panel-heading" style="text-transform: uppercase" >
              <b>Quản lý đơn hàng
                /Chi tiết đơn hàng số {{$donhang->id}}</b>
              </header>
            </div>
            <div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3 class="panel-title">
            <header class="panel-heading">Thông tin khách hàng</header>
            
          </h3>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-hover">

                  <tbody>
                      <tr>
                          <td><b>Tên khách hàng</b></td>
                          <td>{!! $khachhang->khachhang_ten !!}</td>
                      </tr>
                      <tr>
                          <td><b>Số điện thoại</b></td>
                          <td>{!! $khachhang->khachhang_sdt !!}</td>
                      </tr>
                      <tr>
                          <td><b>Email</b></td>
                          <td>{!! $khachhang->khachhang_email !!}</td>
                      </tr>
                      <tr>
                          <td><b>Địa chỉ</b></td>
                          <td>{!! $khachhang->khachhang_diachi !!}</td>
                      </tr>
                  </tbody>
              </table>
          </div>    
        </div>
        </div>
        <div class="col-lg-10">
            <div class="form-group">
                <label for="input" >Tình trạng đơn hàng</label>
                <div>
                    <select id="input" name="selStatus"  class="form-control">
                            @foreach($tinhtrang as $key => $tt_dh)
                                          @if($tt_dh->id == $donhang->tinhtranghd_id)
                                             <option selected value="{{$tt_dh->id}}">{{$tt_dh->tinhtranghd_ten}}</option>
                                          @else
                                            <option value="{{$tt_dh->id}}">{{$tt_dh->tinhtranghd_ten}}</option>
                                          @endif
                             @endforeach
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
             <header class="panel-heading">Thông tin giao hàng</header>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-hover">

                  <tbody>
                      <tr>
                          <td><b>Người nhận hàng</b></td>
                          <td>{!! $nhanhang->nguoinhan_ten !!}</td>
                      </tr>
                      <tr>
                          <td><b>Số điện thoại</b></td>
                          <td>{!! $nhanhang->nguoinhan_sodienthoai !!}</td>
                      </tr>
                      <tr>
                          <td><b>Email</b></td>
                          <td>{!! $nhanhang->nguoinhan_email !!}</td>
                      </tr>
                      <tr>
                          <td><b>Địa chỉ</b></td>
                          <td>{!! $nhanhang->nguoinhan_diachi !!}</td>
                      </tr>
                      <tr>
                          <td><b>Ghi chú</b></td>
                          <td>
                          {!! $nhanhang->nguoinhan_ghichu !!}
                            
                          </td>
                        </tr>
                  </tbody>
              </table>
          </div>
          </div>
        </div> 
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default" >
          <div class="panel-heading">
            <header class="panel-heading">
              
                <b>Danh sách sản phẩm</b>
              
            </header>
          </div>
          <div class="panel-body">
            <div class="col-lg-12" >
                <div class="table-responsive">
                    <table class="table table-hovered" >
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0; ?>
                            @foreach ($chitiet as $val)
                                <tr>
                                    <td>{!! $count = $count + 1 !!}</td>
                                    <td>
                                        <?php  
                                            $sp = DB::table('sanphams')->where('id',$val->sanpham_id)->first();
                                            print_r($sp->sanpham_ten);
                                        ?>
                                    </td>
                                    <td>
                                    {!! number_format($val->chitietdonhang_thanhtien/$val->chitietdonhang_soluong,0,",",".") !!} vnđ 
                                    </td>
                                    <td>{!! $val->chitietdonhang_soluong !!}</td>
                                    <td>{!! number_format("$val->chitietdonhang_thanhtien",0,",",".") !!} vnđ </td>
                                </tr>
                            @endforeach
                            <tr>
                            <td colspan="5">
                            <b>Tổng tiền : {!! $donhang->donhang_tongtien !!} vnđ </b>                  
                            </td>   
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                 <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{URL::to('/all-donhang')}}" ><i class="btn btn-default" >Hủy</i></a>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
@endsection