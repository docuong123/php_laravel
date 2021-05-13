@extends('admin_layout')

@section('admin_content')

    <form action="{{URL::to('/save-lohang')}}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
             <header class="panel-heading">
                            Thêm lô hàng
                        </header>
            </div>
            <div class="panel-body">
        <div class="col-lg-7">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Ký hiệu</label>
                <input class="form-control" name="txtLHSignt" value="{!! old('txtLHSignt') !!}" placeholder="Ký hiệu..." />
                <div>
                    {!! $errors->first('txtLHSignt') !!}
                </div>  
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Hạn sử dụng</label>
                <input class="form-control" name="txtLHShelf" value="{!! old('txtLHShelf') !!}" placeholder="Nhập số ngày.." />
                <div>
                    {!! $errors->first('txtLHShelf') !!}
                </div>  
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Số lượng</label>
                <input class="form-control" name="txtLHQuant" value="{!! old('txtLHQuant') !!}" placeholder="Số lượng..." />
                <div>
                    {!! $errors->first('txtLHQuant') !!}
                </div> 
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Giá mua vào</label>
                <input class="form-control" name="txtLHBuyPrice" value="{!! old('txtLHBuyPrice') !!}" placeholder="Giá mua vào..." />
                <div>
                    {!! $errors->first('txtLHBuyPrice') !!}
                </div>  
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Giá bán ra</label>
                <input class="form-control" name="txtLHSalePrice" value="{!! old('txtLHSalePrice') !!}" placeholder="Giá bán ra..." />
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
                            @foreach($sanpham as $key =>$val)
                                <option value="{{$val->id}}">{{$val->sanpham_ten}}</option>
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
                             @foreach($nhacungcap as $key =>$val)
                                <option value="{{$val->id}}">{{$val->nhacungcap_ten}}</option>
                             @endforeach
                    </select>
                </div>
                <div>
                    {!! $errors->first('txtLHVendor') !!}
                </div> 
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="exampleInputFile"> Hiển thị</label>
               <select name="lohang_status" class="form-control input-sm m-bot15">
                   <option value="0">Ẩn </option>
                   <option value="1">Hiển thị</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href=""><i class="btn btn-default">Hủy</i></a>
            </div>
         </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </form>

@endsection