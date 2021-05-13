@extends('admin_layout')

@section('admin_content')

    <form action="{{URL::to('/update-lohang/'.$lohang->id)}}" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
                <header class="panel-heading">
                    Chỉnh sửa lô hàng
                </header>
            </div>
        <div class="panel-body">
       <div class="col-lg-7">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Ký hiệu</label>
                    <input class="form-control" name="txtLHSignt" value="{!! $lohang->lohang_kyhieu !!}" placeholder="Ký hiệu..." />
                    <div>
                        {!! $errors->first('txtLHSignt') !!}
                    </div>  
                </div>
            </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Hạn sử dụng</label>
                <input class="form-control" name="txtLHShelf" value="{!! $lohang->lohang_hansudung !!}" placeholder="Nhập số ngày.." />
                <div>
                    {!! $errors->first('txtLHShelf') !!}
                </div>  
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Số lượng</label>
                <input class="form-control" name="txtLHQuant" value="{!! $lohang->lohang_soluongsp !!}" placeholder="Số lượng..." />
                <div>
                    {!! $errors->first('txtLHQuant') !!}
                </div> 
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Giá mua vào</label>
                <input class="form-control" name="txtLHBuyPrice" value="{!! $lohang->lohang_giamuavao !!}" placeholder="Giá mua vào..." />
                <div>
                    {!! $errors->first('txtLHBuyPrice') !!}
                </div>  
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Giá bán ra</label>
                <input class="form-control" name="txtLHSalePrice" value="{!! $lohang->lohang_giabanra !!}" placeholder="Giá bán ra..." />
                <div>
                    {!! $errors->first('txtLHSalePrice') !!}
                </div>  
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input" >Sản phẩm</label>
                <div>
                    <select id="input" name="txtLHProduct"  class="form-control">
                            <option value="">--Chọn sản phẩm--</option>
                            @foreach($sanpham as $key => $val)
                                      @if($val->id == $lohang->sanpham_id)
                                         <option selected value="{{$val->id}}">{{$val->sanpham_ten}}</option>
                                      @else
                                        <option value="{{$val->id}}">{{$val->sanpham_ten}}</option>
                                      @endif
                            @endforeach
                    </select>
                </div>
                <div>
                    {!! $errors->first('txtLHProduct') !!}
                </div> 
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input" >Nhà cung cấp</label>
                <div>
                    <select id="input" name="txtLHVendor"  class="form-control">
                        <option value="">--Chọn nhà cung cấp--</option>
                          @foreach($nhacungcap as $key => $val)
                                  @if($val->id == $lohang->nhacungcap_id)
                                     <option selected value="{{$val->id}}">{{$val->nhacungcap_ten}}</option>
                                  @else
                                    <option value="{{$val->id}}">{{$val->nhacungcap_ten}}</option>
                                  @endif
                        @endforeach
                    </select>
                </div>
             </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="exampleInputPassword1">Hiển thị</label>
                <select class="form-control input-sm m-bot15" name="lohang_status">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiển thị</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">   
           <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{URL::to('/all-lohang')}}"><i class="btn btn-default">Hủy</i></a>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </form>

@endsection