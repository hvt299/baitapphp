<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chức năng Live Search bằng PHP và AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    /* CSS cho search box */
    .search-box {
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"] {
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result {
        position: absolute;
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result {
        width: 100%;
        box-sizing: border-box;
    }
    /* CSS cho kết quả */
    .result p {
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover {
        background: #f2f2f2;
    }
</style>
<script>
    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Lấy giá trị đầu vào khi có thay đổi */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if (inputVal.length){
                $.get("backend-search.php", {term: inputVal}).done(function(data){
                    // Hiển thị dữ liệu trả về trong trình duyệt
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });
        // Thiết lập giá trị đầu vào khi click vào result
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
</script>
<body>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search tên học phần..."/>
        <div class="result"></div>
    </div>
</body>
</html>