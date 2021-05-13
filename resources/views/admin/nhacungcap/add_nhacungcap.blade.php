@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/save-nhacungcap')}}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-green">
                    <div class="panel-heading" style="height:60px">
                          <header class="panel-heading">
                            Thêm nhà cung cấp
                        </header>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-7">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control" name="txtNCCName" value="{!! old('txtNCCName') !!}" placeholder="Tên..." />
                                    <div>
                                        {!! $errors->first('txNCCName') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input class="form-control" name="txtNCCPhone" value="{!! old('txtNCCPhone') !!}" placeholder="Số điện thoại..." />
                                    <div>
                                        {!! $errors->first('txNCCPhone') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <textarea class="form-control" rows="3" name="txtNCCAdress" placeholder="Địa chỉ..." >{!! old('txtNCCAdress') !!}</textarea>
                                    <script type="text/javascript">CKEDITOR.replace('txtNCCAdress'); </script>
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