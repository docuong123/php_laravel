@extends('admin_layout')

@section('admin_content')

    <form action="{{URL::to('/postEdit/'.$nhacungcap->id)}}" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <header class="panel-heading">
                                    Chỉnh sửa nhà cung cấp 
                      </header>
            </div>
            <div class="panel-body">
            <div class="col-lg-7">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="txtNCCName" value="{!! $nhacungcap->nhacungcap_ten !!}" placeholder="Tên..." />
                <div>
                    {!! $errors->first('txtNCCName') !!}
                </div>
            </div>
        </div>
         <div class="col-lg-12">
            <div class="form-group">
                <label>SDT</label>
                <input class="form-control" name="txtNCCPhone" value="{!! $nhacungcap->nhacungcap_sdt !!}" placeholder="sdt..." />
                <div>
                    {!! $errors->first('txtNCCPhone') !!}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Địa chỉ</label>
                <textarea class="form-control" rows="3" name="txtNCCAdress" placeholder="Địa chỉ ...">{!! $nhacungcap->nhacungcap_diachi !!}</textarea>
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