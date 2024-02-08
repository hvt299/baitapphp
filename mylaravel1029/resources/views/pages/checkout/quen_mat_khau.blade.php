@extends('layout')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Nhập địa chỉ email</h2>
                    <form action="{{URL::to('/send-email-customer')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" name="email_account" placeholder="email" />
                        <button type="submit" class="btn btn-default">Gửi mật khẩu đến email</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection