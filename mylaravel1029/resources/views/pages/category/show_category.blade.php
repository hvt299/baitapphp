@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <div class="fb-share-button" datahref="http://localhost/tutorial_youtube/shopbanhanglaravel" datalayout="button_count" data-size="small">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a>
    </div>
    <div class="fb-like" data-href="" data-width="" datalayout="button_count" data-action="like" data-size="small" datashare="false"></div>
    @foreach($category_name as $key => $name)
        <h2 class="title text-center">{{$name->category_name}}</h2>
    @endforeach
    @if (count($category_by_id) == 0)
        <p class="text-center">Chưa có sản phẩm nào</p>
    @else
    @foreach($category_by_id as $key => $product)
        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                            <h2>{{number_format($product->product_price).''.'VNĐ'}}</h2>
                            <p>{{$product->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    @endif
</div><!--features_items-->
<div class="fb-comments" data-href="" data-width="" datanumposts="20"></div>
<div class="fb-page" datahref="https://www.facebook.com/webextrasite/" data-tabs="message" datawidth="" data-height="" data-small-header="false" data-adapt-containerwidth="true" data-hide-cover="false" data-show-facepile="true">
    <blockquote cite="https://www.facebook.com/webextrasite/" class="fb-xfbml-parse-ignore">
        <a href="https://www.facebook.com/webextrasite/">Webextrasite - Công Ty Thiết Kế Website - Đào tạo tin học Online</a>
    </blockquote>
</div>
<!--/recommended_items-->
@endsection