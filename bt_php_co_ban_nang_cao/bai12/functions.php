<?php
    //Tạo một kết nối CSDL.
    $conn = mysqli_connect("localhost", "root", "", "rating") or die("Không thể kết nối tới CSDL");

    //Hàm lấy thông tin đánh giá. Hàm này dùng để lấy thông tin về đánh giá của 1 sản phẩm thông qua ID và trả về kết quả HTML.
    function getRatingInfo($id){
        global $conn;
        $query = "SELECT * FROM rating_info WHERE product_id=".$id;
        $result = mysqli_query($conn, $query);
        $return = 'Đánh giá<br /><ul id="rating-info">';
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $return .= "<li><strong>5</strong>: ".$row['rate_5']."</li>";
            $return .= "<li><strong>4</strong>: ".$row['rate_4']."</li>";
            $return .= "<li><strong>3</strong>: ".$row['rate_3']."</li>";
            $return .= "<li><strong>2</strong>: ".$row['rate_2']."</li>";
            $return .= "<li><strong>1</strong>: ".$row['rate_1']."</li>";
        }else{
            for($i = 1; $i < 6; $i++){
                $return .= "<li>".$i.": 0%</li>";
            }
        }
        $return .= "</ul>";
        return $return;
    }

    //Hàm cập nhật thông tin đánh giá. Khi người dùng check vào ô đánh giá điểm, thì chúng ta sẽ cập nhật số người đánh giá điểm số đó thêm 1 người như sau
    function setRatingInfo($id, $rate){
        global $conn;
        $query = "SELECT rate_".$rate." FROM rating_info WHERE product_id=".$id;
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        $i = $row['rate_'.$rate];
        $i++;
        $query = "UPDATE rating_info SET rate_".$rate."=".$i." WHERE product_id=".$id;
        $result = mysqli_query($conn,$query);
    }

    //Hàm lấy sản phẩm. Hàm này dùng để lấy thông tin của 1 sản phẩm thông qua ID và trả lại kết quả HTML.
    function getProduct($id){
        global $conn;
        $query = "SELECT * FROM products WHERE id=".$id;
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $rating_info = getRatingInfo($id);
        $return = '<div id="product-img">
        <img src="'.$row['img_url'].'" alt="" title="" />
        </div>'.$rating_info.'
        <div class="clear-fx"></div>
        <h2>'.$row['title'].'</h2>';
        return $return;
    }

    //Hàm lấy danh sách sản phẩm. Hàm này dùng để lấy tất cả các sản phẩm trong CSDL và trả về kết quả HTML.
    function listProduct(){
        global $conn;
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        $return = "";
        while($row = mysqli_fetch_array($result)){
            $rating_info = getRatingInfo($row['id']);
            $return .= '<div class="product-info">
            <div id="product-img">
            <img src="'.$row['img_url'].'" alt="" title="" />
            </div>'.$rating_info.'
            <div class="clear-fx"></div>
            <h2><a 
            href="bt12.php?id='.$row['id'].'">'.$row['title'].'</a></h2></div>';
        }
        return $return;
    }
?>