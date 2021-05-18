@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/post-editsuagiaohang/'.$nhanhang->id)}}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
     <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <header class="panel-heading" style="text-transform: uppercase" >
              <b>Quản lý đơn hàng
                /Cập nhật thông tin giao hàng đơn hàng số {{$donhang->id}}</b>
              </header>
            </div>
            <div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              <header class="panel-heading">
                Thông tin khách hàng
              </header>
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
        <div class="col-lg-12">
        <br>
            <div class="form-group">
                <label for="input" >Tình trạng đơn hàng</label>
                <div>
                    <?php
                    $t = DB::table('tinhtranghds')->where('id', $donhang->tinhtranghd_id)->first();  
                    ?>
                    <input class="form-control" name="txtLHQuant" value="{!! $t->tinhtranghd_ten !!}" disabled="true" />
                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              <header class="panel-heading">
                Thông tin giao hàng
              </header>
            </h3>
          </div>
          <div class="panel-body">
              <div class="col-lg-7">
            <div class="form-group">
                <label>Người nhận hàng</label>
                <input class="form-control" name="txtName" value="{!! $nhanhang->nguoinhan_ten !!}" placeholder="Ký hiệu..." />
               
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Số điện thoại</label>
                <input class="form-control" name="txtPhone" value="{!! $nhanhang->nguoinhan_sodienthoai !!}"/>
                  
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="txtEmail" value="{!! $nhanhang->nguoinhan_email !!}"/>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Địa chỉ</label>
                <textarea class="form-control" name="txtAddress" rows="2">{!! $nhanhang->nguoinhan_diachi !!}</textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Ghi chú</label>
                <textarea class="form-control" name="txtNote" rows="2" >{!! $nhanhang->nguoinhan_ghichu !!}</textarea>
            </div>
        </div>
          </div>
        </div> 
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default" >
          <div class="panel-heading">
            <h2 class="panel-title" >
              <header class="panel-heading">
                Danh sách sản phẩm
              </header>
            </h2>
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
  </form>
@endsection