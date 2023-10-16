<?php
    include 'config.php';
    include 'class/class.db.theloai.php';

    if (isset($_GET['id'])){
        $db_theloai = new DB_TheLoai();
        $id = $_GET['id'];
        
        $result = $db_theloai->xoa_theloai($id);
        if ($result){
            echo '<script>alert("Xóa thành công!");
            window.location="theloai.php";</script>';
        }else{
            echo '<script>alert("Xóa không thành công!");
            window.location="theloai.php";</script>';
        }
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
        <h1>Xóa thể loại</h1>
    </div>
</body>
</html>