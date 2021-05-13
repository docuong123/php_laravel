@extends('admin_layout')
@section('admin_content')  
        <h3 class="page-header ">
        Lô hàng / 
            <a href="{{URL::to('/add-lohang')}}"  style="margin-top:-8px;" class="btn btn-info">Thêm mới</a>
        </h3>               
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách lo hàng</i></b>
</div>
<?php
        $message = Session::get('message');
        if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
        }
      ?>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Ký hiệu</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Ngày mua vào</th>
                <th>HSD</th>
                <th>Giá mua vào</th>
                <th>Giá bán ra</th>
                <th>Xóa</th>
                <th>Sửa</th>
                <th>Ẩn/Hiện thị</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($data as $item)
            <tr class="odd gradeX">
                    <?php 
                    // date("Y-m-d H:i", strtotime("$now -$days day"));
                        $today  = date("Y-m-d"); // Năm/Tháng/Ngày
                        
                        $ngaybd =  date("Y-m-d", strtotime("$item->created_at")); // Năm/Tháng/Ngày
                        
                        // strtotime(date("Y-m-d", $ngaybd,"+ "+$item->khuyenmai_thoi_gian +" days"));
                        $ngaykt = date("Y-m-d",strtotime($ngaybd . "+ $item->lohang_hansudung  day"));
                        // echo $ngaykt;
                        if ((strtotime($today) >= strtotime($ngaybd))&& (strtotime($today) <= strtotime($ngaykt)))
                        {

                        }else{
                        DB::table('lohangs')
                            ->where('id',$item->id)
                            ->update([
                                'lohang_tinhtrang' => 1,
                                ]);
                        }
                        
                     ?>
               
                <td>{!! $item->lohang_kyhieu !!}</td>
                <td>
                    <?php $sanpham = DB::table('sanphams')->where('id',$item->sanpham_id)->first(); ?>
                    @if (!empty($sanpham->sanpham_ten))
                        {!! $sanpham->sanpham_ten !!}
                    @else
                        {!! NULL !!}
                    @endif
                </td>
                <td>{!! $item->lohang_soluongsp !!}</td>
                <td>{!! date("d-m-Y",strtotime($ngaybd)) !!}</td>
                <td>{!! date("d-m-Y",strtotime($ngaykt)) !!}</td>
                <td>{!! number_format("$item->lohang_giamuavao",0,",",".")  !!} vnđ</td>
                <td>{!! number_format("$item->lohang_giabanra",0,",",".") !!} vnđ
                </td>
                
                
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="{{URL::to('/delete-lohang/'.$item->id)}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                <td class="center">
                <a href="{{URL::to('/edit-lohang/'.$item->id)}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                </td>
                <td><span class="text-ellipsis">

              <?php
              if ($item->lohang_tinhtrang==1) {
              ?>
                <a href="{{URL::to('/unactive-lohang/'.$item->id)}}">
                  <span class="fa-thumb-styling fa fa-thumbs-up"></span>
                </a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-lohang/'.$item->id)}}">
                  <span class="fa-thumb-styling fa fa-thumbs-down"></span>
                </a>
                <?php
              }
              ?>

            </span></td>
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



