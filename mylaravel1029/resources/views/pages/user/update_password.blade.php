@extends('layout')
@section('content')
<div>
    <div class="mainmenu pull-left">
        <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="{{URL::to('/taikhoan')}}">Quản lý đơn hàng</a></li>
            <li><a href="{{URL::to('/cap-nhat-user')}}" class="active">Sửa thông tin tài khoản</a></li>
        </ul>
    </div>
    <br />
    <br />
</div>
<?php
    use Illuminate\Support\Facades\Session;

    $message = Session::get('message');
    if ($message) {
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message', null);
    }
?>
<form action="{{URL::to('/update_pass_save')}}" method="POST">
    {{csrf_field()}}
    <div class="col-lg-12" style="margin-top: 50px">
        <div class="grid">
            <p class="grid-header" style="font-size: 18px;">Cập nhật mật khẩu</p>
            <div class="grid-body">
                <div class="item-wrapper">
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <div class="pass">
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType13">Mật khẩu cũ</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="password" class="form-control" id="inputType3" name="old_password" placeholder="********">
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType13">Mật khẩu mới</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="password" class="form-control" id="inputType3" name="new_password" placeholder="********">
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType13">Nhập lại mật khẩu</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="password" class="form-control" id="inputType3" name="confirm_password" placeholder="********">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success" style="margin-left: 188px; margin-top: 20px;">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection