@extends('admin_layout')
@section('admin_content')  
        <h3 class="page-header ">
        Sản phẩm / 
            <a href="{{URL::to('/add-sanpham')}}"  style="margin-top:-8px;" class="btn btn-info">Thêm mới</a>
        </h3>               
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách sản phẩm</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>ĐVT</th>
                <th>Mô tả</th>
                <th>Xóa</th>
                <th>Sửa</th>
                <th>Nhập hàng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="odd gradeX" align="left">
                <td>{!! $item->id !!}</td>

                <td>
                <img src="{!! asset('public/upload/sanpham/'.$item->sanpham_anh) !!}" class="img-responsive img-rounded" alt="Image" style="width: 70px; height: 40px;">
                </td>
                <td>{!! $item->sanpham_ten !!}</td>
                <td>
                    <?php $loaisanpham = DB::table('loaisanphams')->where('id',$item->loaisanpham_id)->first(); ?>
                    @if (!empty($loaisanpham->loaisanpham_ten))
                        {!! $loaisanpham->loaisanpham_ten !!}
                    @else
                        {!! NULL !!}
                    @endif
                </td>
                <td>
                    <?php $donvitinh = DB::table('donvitinhs')->where('id',$item->donvitinh_id)->first(); ?>
                    @if (!empty($donvitinh->donvitinh_ten))
                        {!! $donvitinh->donvitinh_ten !!}
                    @else
                        {!! NULL !!}
                    @endif
                </td>
                <td>{!! $item->sanpham_mota !!}</td>
                <td class="center">
                <a href="{{URL::to('/delete-sanpham/'.$item->id)}}" onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                <td class="center" > <a href="{{URL::to('/edit-sanpham/'.$item->id)}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a></td>
                <td class="center">
                <a href="{{URL::to('/add-nhaphang/'.$item->id)}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Nhập hàng"><i class="fa fa-plus"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    {{$data->links()}}
    </div>
   
    
    
    <!-- /.row -->
</div>
</div>
@endsection



