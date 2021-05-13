@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>



                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            <div class="position-center">

                                @foreach($sanpham as $key=>$pro)
                                <form role="form" action="{{URL::to('/update-sanpham/'.$pro->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="required" data-validation-error-msg="Vui lòng không để trống
                                    !!!" name="txtSPName" class="form-control" id="exampleInputEmail1" value="{{$pro->sanpham_ten}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="txtSPAnh" class="form-control" id="exampleInputEmail1"><img src="{{URL::to('public/upload/sanpham/'.$pro->sanpham_anh)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea class="form-control" name="txtSPIntro" id="ckeditor2">
                                        {{$pro->sanpham_mota}}
                                    </textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Loại sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="txtSPLoai">
                                        @foreach($loaisp as $key => $cate)
                                          @if($cate->id ==$pro->loaisanpham_id)
                                             <option selected value="{{$cate->id}}">{{$cate->loaisanpham_ten}}</option>
                                          @else
                                            <option value="{{$cate->id}}">{{$cate->loaisanpham_ten}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Đơn vị tính</label>
                                    <select class="form-control input-sm m-bot15" name="txtSPDVT">
                                        @foreach($dvt as $key => $donvitinh)
                                          @if($donvitinh->id ==$pro->donvitinh_id)
                                             <option selected value="{{$donvitinh->id}}">{{$donvitinh->donvitinh_ten}}</option>
                                          @else
                                            <option value="{{$donvitinh->id}}">{{$donvitinh->donvitinh_ten}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info" name="add_product">Cập nhật sản phẩm</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>

            </div>
@endsection