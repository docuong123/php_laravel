@extends('admin_layout')
@section('admin_content')
    <h3 class="page-header">Kho hàng</h3>
<!-- /.row -->
<div class="row">

    <div class="col-lg-6">

        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <!-- <i class="fa fa-comments fa-fw"></i> -->
                <b><i>Bán chạy nhất</i></b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên </th>
                            <th>Đã bán</th>
                            <th>Còn lại</th>
                            <th>Nhập hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($bannhieu as $item)
                            <tr>
                            <?php $sp = DB::table('sanphams')->where('id',$item->sanpham_id)->first(); ?>
                            <td>{!! $item->sanpham_id !!}</td>
                            <td>{!! $sp->sanpham_ten !!}</td>
                            <td><button type="button" class="btn btn-info btn-xs">{!! $item->ban !!}</button></td>
                            <td><button type="button" class="btn btn-warning btn-xs">{!! $item->ton !!}</button></td>
                            <td class="center">
                            <a href="" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nhập hàng"><i class="fa fa-plus"></i></a>
                            </td>
                            </tr>
                        @endforeach
                            
                        
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="input-group">
                    <span class="input-group-btn">
                         <a href="" class="btn btn-default" type="button">Xem chi tiết</a>
                    </span>
                </div>
            </div>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
    <!-- /.col-lg-6-->
    <div class="col-lg-6">

        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <!-- <i class="fa fa-comments fa-fw"></i> -->
                <b><i>Tồn nhiều nhất</i></b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên </th>
                            <th>Đã bán</th>
                            <th>Còn lại</th>
                            <th>Nhập hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($tonnhieu as $item)
                            <tr>
                            <?php $sp = DB::table('sanphams')->where('id',$item->sanpham_id)->first(); ?>
                            <td>{!! $item->sanpham_id !!}</td>
                            <td>{!! $sp->sanpham_ten !!}</td>
                            <td><button type="button" class="btn btn-info btn-xs">{!! $item->ban !!}</button></td>
                            <td><button type="button" class="btn btn-warning btn-xs">{!! $item->ton !!}</button></td>
                            <td class="center">
                            <a href="" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nhập hàng"><i class="fa fa-plus"></i></a>
                            </td>
                            </tr>
                        @endforeach
                            
                        
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="input-group">
                    <span class="input-group-btn">
                         <a href="" class="btn btn-default" type="button">Xem chi tiết</a>
                    </span>
                </div>
            </div>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
    <div class="col-lg-6">
        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <!-- <i class="fa fa-comments fa-fw"></i> -->
                <b><i>Sản phẩm hết hạn sử dụng</i></b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên </th>
                            <th>Đã bán</th>
                            <th>Còn lại</th>
                            <th>Nhập hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($hethan as $item)
                            <tr>
                            <?php $sp = DB::table('sanphams')->where('id',$item->sanpham_id)->first(); ?>
                            <td>{!! $item->sanpham_id !!}</td>
                            <td>{!! $sp->sanpham_ten !!}</td>
                            <td><button type="button" class="btn btn-info btn-xs">{!! $item->ban !!}</button></td>
                            <td><button type="button" class="btn btn-warning btn-xs">{!! $item->ton !!}</button></td>
                            <td class="center">
                            <a href="" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nhập hàng"><i class="fa fa-plus"></i></a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="input-group">
                    <span class="input-group-btn">
                         <a href="" class="btn btn-default" type="button">Xem chi tiết</a>
                    </span>
                </div>
            </div>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
    <div class="col-lg-6">
        <!-- /.panel -->
        <!-- /.panel -->
        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <!-- <i class="fa fa-comments fa-fw"></i> -->
                <b><i>Sản phẩm còn hạn sử dụng</i></b>
                
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên </th>
                            <th>Đã bán</th>
                            <th>Còn lại</th>
                            <th>Nhập hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conhan as $item)
                            <tr>
                            <?php $sp = DB::table('sanphams')->where('id',$item->sanpham_id)->first(); ?>
                            <td>{!! $item->sanpham_id !!}</td>
                            <td>{!! $sp->sanpham_ten !!}</td>
                            <td><button type="button" class="btn btn-info btn-xs">{!! $item->ban !!}</button></td>
                            <td><button type="button" class="btn btn-warning btn-xs">{!! $item->ton !!}</button></td>
                            <td class="center">
                            <a href="" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nhập hàng"><i class="fa fa-plus"></i></a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="input-group">
                    <span class="input-group-btn">
                         <a href="" class="btn btn-default" type="button">Xem chi tiết</a>
                    </span>
                </div>
            </div>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
</div>

@endsection
