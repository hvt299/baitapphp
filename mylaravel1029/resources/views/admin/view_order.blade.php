@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin đăng nhập
        </div>
        <div class="table-responsive">
            <?php
                use Illuminate\Support\Facades\Session;

                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message', null);
                }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin vận chuyển hàng
        </div>
        <div class="table-responsive">
            <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message', null);
                }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên người vận chuyển</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                        <th>Hình thức thanh toán</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$shipping->shipping_name}}</td>
                        <td>{{$shipping->shipping_address}}</td>
                        <td>{{$shipping->shipping_phone}}</td>
                        <td>{{$shipping->shipping_email}}</td>
                        <td>{{$shipping->shipping_notes}}</td>
                        <td>@if($shipping->shipping_method==0) Chuyển khoản @else Tiền mặt
                            @endif</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê chi tiết đơn hàng
        </div>
        <div class="table-responsive">
            <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message', null);
                }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                        $total = 0;
                    @endphp
                    @foreach($order_details as $key => $details)
                    @php
                        $i++;
                        $subtotal = $details->product_price*$details->product_sales_quantity;
                        $total+=$subtotal;
                    @endphp
                    <tr>
                        <td><i>{{$i}}</i></td>
                        <td>{{$details->product_name}}</td>
                        <td>{{$details->product_sales_quantity}}</td>
                        <td>{{number_format($details->product_price ,0,',','.')}}đ</td>
                        <td>{{number_format($subtotal ,0,',','.')}}đ</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">
                            Thanh toán: {{number_format($total,0,',','.')}}đ
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <form role="form" action="{{URL::to(('/update-order/'.$details->order_id))}}" method="post" enctype="multipart/form-data">
            <div class="form-group col-sm-6">
                {{ csrf_field() }}
                @foreach($order as $key => $or)
                <select name="select_status" class="form-control">
                    @if($or->order_status==1)
                    <option value="">----Chọn hình thức đơn hàng-----</option>
                    <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>
                    <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
                    <option id="{{$or->order_id}}" value="3">Hủy đơn hàng-tạm giữ</option>
                    @elseif($or->order_status==2)
                    <option value="">----Chọn hình thức đơn hàng-----</option>
                    <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                    <option id="{{$or->order_id}}" selected value="2">Đã xử lý-Đã giao hàng</option>
                    <option id="{{$or->order_id}}" value="3">Hủy đơn hàng-tạm giữ</option>
                    @else
                    <option value="">----Chọn hình thức đơn hàng-----</option>
                    <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                    <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
                    <option id="{{$or->order_id}}" selected value="3">Hủy đơn hàng-tạm giữ</option>
                    @endif
                </select>
                @endforeach
            </div>
            <div class="form-group col-sm-6">
                <button type="submit" name="update_order" class="btn btn-info form-control">Cập nhật đơn hàng</button>
            </div>
        </form>
    </div>
    <a target="_blank" href="{{url('/print-order/'.$details->order_id)}}">In đơn hàng</a>
</div>
@endsection