@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
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
                                <form role="form" action="{{URL::to('/save-sanpham')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="required" data-validation-error-msg="Vui lòng không để trống
                                    !!!" name="txtSPName" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="txtSPAnh" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea class="form-control" name="txtSPIntro" id="ckeditor" placeholder="Mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Đơn vị tính</label>
                                    <select class="form-control input-sm m-bot15" name="txtSPDVT">
                                        @foreach($dvt as $key =>$val)
                                        <option value="{{$val->id}}">{{$val->donvitinh_ten}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Loại sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="txtSPLoai">
                                        @foreach($loaisp as $key =>$val)
                                        <option value="{{$val->id}}">{{$val->loaisanpham_ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <a href=""><i class="btn btn-default">Hủy</i></a>
                                </div>

                            </form>
                            </div>

                        </div>
                    </section>

            </div>

            </div>
@endsection