<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use DB;
// use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

session_start();

class CheckoutController extends Controller
{
    //
    public function login_checkout(Request $request){
        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/checkout');
    }

    public function checkout(Request $request){
        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        // $city = City::orderby('matp','ASC')->get();
        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        // ->with('city',$city);
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
        }
    }

    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_method'] = $request->shipping_method;
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        Session::put('shipping_email',$data['shipping_email']);
        return Redirect::to('/payment');
    }

    public function payment(Request $request){
        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function order_place(Request $request){
        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo
        
        //insert payment_method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 1;
        $order_id = DB::table('tbl_order')->insertGetId($order_data);
        $body_massage = 'Mã đơn hàng '.$order_id.', Tổng tiền: '.$order_data['order_total'];
        
        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }

        // trừ số lượng trong bảng tbl_product
        $datapro = array();
        $content = Cart::content();
        foreach($content as $v_content){
            $product_info = DB::table('tbl_product')->where('product_id',$v_content->id)->first(); 
            $datapro['product_num'] = $product_info->product_num - $v_content->qty;
            DB::table('tbl_product')->where('product_id',$v_content->id)->update($datapro);     
        }

        if($data['payment_method']==1){
            echo 'Thanh toán thẻ ATM';
        }else if($data['payment_method']==2){
            Cart::destroy();
            // gui email o
            $to_name = Session::get('customer_name');
            $to_email = Session::get('shipping_email');//send to this email
            $data = array("name"=>$body_massage,"body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php
            Mail::send('test_mail',$data,function($message) use ($to_name,$to_email){
                $message->to($to_email)->subject('Đơn hàng được gửi từ shop laravel');//send this mail with subject
                $message->from($to_email,$to_name);//send from this mail
            });
            return Redirect::to('/');
            // $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            // $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
            // return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product)
            // ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
            // ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        }else{
            echo 'Thẻ ghi nợ';
        }
        //return Redirect::to('/payment');
    }

    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function view_order($order_id){
        $order_details = DB::table('tbl_order_details')->where('order_id',$order_id)->get();
        $order = DB::table('tbl_order')->where('order_id',$order_id)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->first();
        $shipping = DB::table('tbl_shipping')->where('shipping_id',$shipping_id)->first();
        return view('admin.view_order')->with(compact('order_details','customer','shipping','order'));
    }

    public function user_setting(Request $request){
        $customer_id = Session::get('customer_id');
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $manager_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->where('tbl_order.customer_id',$customer_id)
        ->orderby('tbl_order.order_id','desc')->get();
        return view('pages.user.user_setting')->with('all_order', $manager_order)
        ->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function view_order_user(Request $request,$order_id){
        $customer_id = Session::get('customer_id');
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $meta_title = "Đăng nhập thanh toán";
        $url_canonical = $request->url();
        //--seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $order_details = DB::table('tbl_order_details')->where('order_id',$order_id)->get();
        $order = DB::table('tbl_order')->where('order_id',$order_id)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->first();
        $shipping = DB::table('tbl_shipping')->where('shipping_id',$shipping_id)->first();
        // $order_details_product = OrderDetails::with('product')->where('order_id',$order_id)->get();
        return view('pages.user.order_detail_user')
        ->with(compact('order_details','customer','shipping','order'))
        ->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('order_status',$order_status);
    }
}
