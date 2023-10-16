<?php
    include 'config.php';
    include 'class/class.db.theloai.php';

    $db_theloai = new DB_TheLoai();

    $theloai_arr = $db_theloai->get_theloai();

    $theloai_html = "";
    if (count($theloai_arr) == 0){
        $theloai_html = 'Không có thể loại
        <a href="theloai_them.php">THÊM THỂ LOẠI</a>';
    }else{
        $theloai_html = '<h1>Quản trị thể loại</h1>
        <table width="100%" id="bang_quantri" cellpadding="10" cellspacing="0">
        <tr><th>Tên thể loại</th><th>Thứ tự</th>
        <th>Ẩn hiện</th><th colspan="2">
        <a href="theloai_them.php">Thêm Thể Loại</a></th>
        </tr>';
        foreach($theloai_arr as $item){
            $theloai_html .= '<tr>';
            $theloai_html .= '<td>'.$item['TenTL'].'</td>';
            $theloai_html .= '<td>'.$item['ThuTu'].'</td>';
            $theloai_html .= '<td>'.$item['AnHien'].'</td>';
            $theloai_html .= '<td><a href="sua_theloai.php?id='.$item['idTL'].'">Sửa</a></td>';
            $theloai_html .= '<td><a href="delete.php?id='.$item['idTL'].'" onclick="return confirm(\'Bạn có thực sự muốn xóa\');">Xóa</a></td>';
            $theloai_html .= '</tr>';
        }
        $theloai_html .= '</table>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THỂ LOẠI | QUẢN TRỊ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="containter">
        <?php echo $theloai_html; ?>
    </div>
</body>
</html>