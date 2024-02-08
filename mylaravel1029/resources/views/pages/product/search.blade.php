@extends('layout')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Kết quả tìm kiếm
        </div>
    </div>
    <?php use Illuminate\Support\Facades\Session; ?>
    @if (count($search_product) == 0)
        <p class="text-center">Không tìm thấy sản phẩm nào</p>
    @else
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
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($search_product as $key => $products)
                    @php
                        $i++;
                    @endphp
                    <tr>
                        <td><i>{{$i}}</i></td>
                        <td><a href="{{URL::to('/chi-tiet-san-pham/'.$products->product_id)}}">{{$products->product_name}}</a></td>
                        <td>{{number_format($products->product_price ,0,',','.')}}đ</td>
                    </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection