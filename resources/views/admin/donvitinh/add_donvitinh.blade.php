@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/save-donvitinh')}}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-green">
                    <div class="panel-heading" style="height:60px">
                          <header class="panel-heading">
                            Thêm đơn vị tính
                        </header>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-7">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control" name="txtDVTName" value="{!! old('txtDVTName') !!}" placeholder="Tên..." />
                                    <div>
                                        {!! $errors->first('txtDVTName') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="form-control" rows="3" name="txtDVTIntro" placeholder="Mô tả..." >{!! old('txtDVTIntro') !!}</textarea>
                                    <script type="text/javascript">CKEDITOR.replace('txtDVTIntro'); </script>
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