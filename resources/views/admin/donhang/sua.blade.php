@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/post-editdonhang/'.$item->id)}}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="{!! URL::route('admin.donhang.list') !!}" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Quản lý đơn hàng</i></a>
                /Chi tiết đơn hàng số {{$donhang->id}}
              </h3>
            </div>
            <div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Thông tin khách hàng</h3>
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
                            <option >--Chọn tình trạng đơn hàng--</option>
                            <?php Select_Function($tinhtrang,$donhang->tinhtranghd_id); ?>
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Thông tin giao hàng</h3>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-hover">

                  <tbody>
                      <tr>
                          <td><b>Người nhận hàng</b></td>
                          <td>{!! $donhang->donhang_nguoinhan !!}</td>
                      </tr>
                      <tr>
                          <td><b>Số điện thoại</b></td>
                          <td>{!! $donhang->donhang_nguoinhansdt !!}</td>
                      </tr>
                      <tr>
                          <td><b>Email</b></td>
                          <td>{!! $donhang->donhang_nguoinhanemail !!}</td>
                      </tr>
                      <tr>
                          <td><b>Địa chỉ</b></td>
                          <td>{!! $donhang->donhang_nguoinhandiachi !!}</td>
                      </tr>
                      <tr>
                          <td><b>Ghi chú</b></td>
                          <td>
                          @if (!asset($donhang->donhang_ghichu))
                            {{ $donhang->donhang_ghichu }}
                          @else
                            Không có ghi chú
                          @endif
                            
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
            <h2 class="panel-title" ><b>Danh sách sản phẩm</b></h2>
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
                                            $sp = DB::table('sanpham')->where('id',$val->sanpham_id)->first();
                                            print_r($sp->sanpham_ten);
                                        ?>
                                    </td>
                                    <td>
                                    {!! number_format($val->chitietdonhang_thanhtien/$val->chitietdonhang_soluong,0,",",".") !!} vnđ 
                                    </td>
                                    <td>{!! $val->chitietdonhang_so_luong !!}</td>
                                    <td>{!! number_format("$val->chitietdonhang_thanhtien",0,",",".") !!} vnđ </td>
                                </tr>
                            @endforeach
                            <tr>
                            <td colspan="5">
                            <b>Tổng tiền : {!! number_format("$donhang->donhang_tongtien",0,",",".") !!} vnđ </b>
                                
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