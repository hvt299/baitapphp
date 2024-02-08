@extends('admin_layout')
@section('admin_content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <h1>
                <?php
                    use Illuminate\Support\Facades\Session;
                    
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
            </h1>
            <div class="col-sm-12 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Nhập địa chỉ email</h2>
                    <form action="{{URL::to('/send-mail')}}" method="GET">
                        {{csrf_field()}}
                        <input type="text" name="email_account1" style="margin-top:0;color:#666;width: 400px;" placeholder="email" />
                        <input type="text" name="email_account2" style="margin-top:0;color:#666;width: 400px;" placeholder="email" />
                        <button type="submit" class="btn btn-default">Gửi thư đến email</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection