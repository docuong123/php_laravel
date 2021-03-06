@extends('admin_layout')

@section('admin_content')
    <form action="{{URL::to('/save-nhom')}}" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-green">
                    <div class="panel-heading" style="height:60px;">
                      <header class="panel-heading">
                                    Thêm nhóm sản phẩm
                      </header>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-7">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" data-validation="required" data-validation-error-msg="Vui lòng không để trống
                                    !!!" name="txtNName" class="form-control" placeholder="Tên.....">
                                    <div>
                                        {!! $errors->first('txtNName') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="form-control" rows="3" name="txtNIntro" placeholder="Mô tả..." >{!! old('txtNIntro') !!}</textarea>
                                    <script type="text/javascript">CKEDITOR.replace('txtNIntro'); </script>
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