@extends('admin_layout')
@section('admin_content') 
    <h3 class="page-header">
        Nhóm thực phẩm/
        <a href="{{URL::to('/add-nhom')}}" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách nhóm thực phẩm</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="odd gradeX" align="center">
                <th>ID</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($data as $item)
            <tr class="odd gradeX">
                <td>{!! $item->id !!}</td>
                <td>{!! $item->nhom_ten !!}</td>
                <td>{!! $item->nhom_mota !!}</td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="{{URL::to('/delete-nhom/'.$item->id)}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                <td class="center"><a href="{{URL::to('/getEdit-nhom/'.$item->id)}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- /.row -->
</div>
</div>
@endsection