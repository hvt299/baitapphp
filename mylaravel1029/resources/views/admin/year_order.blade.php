@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="section__content section__content--p30">
            <div class="container">
                <div class="viewport-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb has-arrow">
                            <li class="breadcrumb-item">
                                <a href="">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="">Thống kê</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Theo năm</li>
                        </ol>
                    </nav>
                </div>
                <div class="row" style="margin-bottom: 40px;">
                    <div class="col-md-12" style="display: flex">
                        <h2 class="title-1">Thống kê theo năm</h2>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 30px">
                    <div class="col-md-6">
                        <form class="form-inline" method="get" action="{{URL::to('/found-order-year')}}">
                            <div class="form-group" style="margin-left: 10px;margin-right: 10px;">
                                <select name="year" id="" class="form-control">
                                    <option value="">Chọn năm</option>
                                    @for ($i = 2018; $i <= 2030; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped b-t b-light">
                            <thead>
                                <tr>
                                    <th style="width:20px;">
                                        <label class="i-checks m-b-none">
                                            <input type="checkbox"><i></i>
                                        </label>
                                    </th>
                                    <th>Mã ID</th>
                                    <th>Tổng giá tiền</th>
                                    <th>Tình trạng</th>
                                    <th>Ngày tạo đơn</th>
                                    <th>Hiển thị</th>
                                    <th style="width:30px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($all_order))
                                @foreach($all_order as $key => $order)
                                <tr>
                                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->order_total }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <?php
                                            if ($order->order_status == 1) {
                                                echo 'Chưa xử lý';
                                            } else if ($order->order_status == 2) {
                                                echo 'Đã xử lý';
                                            } else {
                                                echo 'Hủy đơn hàng-tạm giữ';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                        <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng không?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-times text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection