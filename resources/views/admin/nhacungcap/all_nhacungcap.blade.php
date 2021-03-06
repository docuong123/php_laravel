@extends('admin_layout')
@section('admin_content')
    <h3 class="page-header">
        Nhà cung cấp/
        <a href="{{URL::to('/add-nhacungcap')}}" class="btn btn-info" style="margin-top:-8px;"> Thêm mới</a>
    </h3>              
    <div class="panel panel-default">
    <div class="panel-heading">
        <b><i>Danh sách nhà cung cấp</i></b>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr class="odd gradeX" align="center">
                    <th class="col-lg-1">ID</th>
                    <th class="col-lg-3">Tên</th>
                    <th class="col-lg-6">Địa chỉ</th>
                    <th class="col-lg-6">SĐT</th>
                    <th class="col-lg-1">Xóa</th>
                    <th class="col-lg-1">Sửa</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($data as $item)
                <tr class="odd gradeX">
                    <td class="col-lg-1">{!! $item->id !!}</td>
                    <td class="col-lg-3">{!! $item->nhacungcap_ten !!}</td>
                    <td class="col-lg-6">{!! $item->nhacungcap_diachi !!}</td>
                    <td class="col-lg-6">{!! $item->nhacungcap_sdt !!}</td>
                    <td class="center">
                    <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="{{URL::to('/delete-nhacungcap/'.$item->id)}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                    <td class="center"><a href="{{URL::to('/getEdit/'.$item->id)}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
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