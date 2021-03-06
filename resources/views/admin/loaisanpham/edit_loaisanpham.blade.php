@extends('admin_layout')

@section('admin_content')

    <form action="{{URL::to('/update-loaisanpham/'.$loaisp->id)}}" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
            <header class="panel-heading">
                                    Chỉnh sửa loại sản phẩm
            </header>
            
            </div>
            <div class="panel-body">
        <div class="col-lg-7">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="txtLSPName" placeholder="Tên loại sản phẩm..." value="{!! $loaisp->loaisanpham_ten !!}" />
                <div>
                    {!! $errors->first('txtLSPName') !!}
                </div>
                
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input" >Nhóm</label>
                <div>
                    <select id="input" name="txtLSPNhom"  class="form-control">
                            <option value=""> Select Cate</option>
                             @foreach($data as $key => $val)
                                      @if($val->id == $loaisp->nhom_id)
                                         <option selected value="{{$val->id}}">{{$val->nhom_ten}}</option>
                                      @else
                                        <option value="{{$val->id}}">{{$val->nhom_ten}}</option>
                                      @endif
                            @endforeach
                    </select>
                </div>
                <div>
                    {!! $errors->first('txtLSPNhom') !!}
                </div> 
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="txtLSPIntro" placeholder="Mô tả...">{!! $loaisp->loaisanpham_mota !!}</textarea>
                <script type="text/javascript">CKEDITOR.replace('txtLSPIntro'); </script>
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