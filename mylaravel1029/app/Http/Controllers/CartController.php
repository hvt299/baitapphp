<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use DB;
// use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
//use App\Coupon;

session_start();

class CartController extends Controller
{
    //
    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $content = Cart::content();
        $kiemtra=false;
        foreach($content as $v_content){
           if($v_content->id == $productId){//kiểm tra id sản phẩm đúng sản phẩm cần kiểm kiểm tra
                if($request->qty > $product_info->product_num - $v_content->qty){
                    Session::put('message','Số lượng vượt quá số lượng trong kho');
                    return redirect::to('chi-tiet-san-pham/'.$productId);
                }else{
                    $kiemtra=true;
                }
            }
        }

        // so sanh so luong them vao gio va so luong trong kho
        if(($quantity <= $product_info->product_num) or ($kiemtra)){
            $data['id'] = $product_info->product_id;
            $data['qty'] = $quantity;
            $data['name'] = $product_info->product_name;
            $data['price'] = $product_info->product_price;
            $data['weight'] = $product_info->product_price;
            $data['options']['image'] = $product_info->product_image;
            Cart::add($data);
            // Cart::destroy();
            return Redirect::to('/show-cart');
        }else{   
            Session::put('message','Số lượng vượt quá số lượng trong kho');
            return redirect::to('chi-tiet-san-pham/'.$productId);
        }
        //Cart::destroy();
    }

    public function show_cart(Request $request){
        //seo
        $category_product_desc = "Giỏ hàng của bạn";
        $category_product_keywords = "Giỏ hàng";
        $category_product_title = "Giỏ hàng";
        $url_canonical = $request->url();
        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('category_product_desc',$category_product_desc)->with('category_product_keywords',$category_product_keywords)
        ->with('category_product_title',$category_product_title)->with('url_canonical',$url_canonical);
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;

        $content = Cart::content();
     
        foreach($content as $v_content){
            $product_info = DB::table('tbl_product')->where('product_id',$v_content->id)->first();              
            if($qty > $product_info->product_num){
                Session::put('message','Số lượng vượt quá số lượng trong kho');
                return Redirect::to('/show-cart');
            }else{
                Cart::update($rowId,$qty);
            }
        }
        return Redirect::to('/show-cart');
    }
}
