@extends('layout')
@section('content')
 <div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="{{URL::to('/save-thongtinnhanhang')}}">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                
                <div class="container" style="width: 550px;">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin nhận hàng</div>
                        <div class="panel-body">
                            
                            <div class="form-group">
                               <div class="col-md-12"><strong>Người nhận</strong></div>
                               <div class="col-md-12">
                                 <input type="text" name="txt_nguoinhan" class="form-control" value="">
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12"><input type="text" name="txt_sodienthoai" class="form-control" value="" /></div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12"><input type="text" name="txt_diachi" class="form-control" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12"><input type="email" name="txt_email" class="form-control" value="" /></div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <strong>Ghi chú</strong>
                                <textarea name="txt_ghichu" rows="4" class="form-control"></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Xác nhận thông tin</button>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>

@endsection