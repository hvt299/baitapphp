<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class NewsController extends Controller
    {
        // Tạo các hàm tính toán ở đây
        public function goiview(){
            return view('about');
        }

        public function index(){
            return view('tintuc');
        }
    }
?>