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
<section id="cart_items">
    <div class="container">
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin gửi hàng</p>
                        <div class="form-one">
                            <form action="{{URL::to('/update-user')}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="customer_name" value="{{$customer->customer_name}}" placeholder="Họ và tên">
                                <input type="text" name="customer_phone" value="{{$customer->customer_phone}}" placeholder="Phone">
                                <input type="text" name="customer_email" value="{{$customer->customer_email}}" placeholder="Email">
                        <?php
                            use Illuminate\Support\Facades\Session;

                            $message = Session::get('message');
                            if ($message) {
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message', null);
                            }
                        ?>
                                <input type="submit" value="Cập nhật" name="cap_nhat_user" class="btn btn-primary btn-sm">
                            </form>
                            <a href="{{URL::to('/cap-nhat-pass')}}">Bạn muốn thay Đổi mật khẩu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection