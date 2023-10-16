<?php
    include 'config.php';
    include 'class/class.db.theloai.php';

    if (isset($_POST['submit'])){
        $db_theloai = new DB_TheLoai();
        $ten_theloai = (isset($_POST['ten_theloai']))? $_POST['ten_theloai'] : "";
        $thu_tu = (isset($_POST['thu_tu']))? $_POST['thu_tu'] : 0;
        $an_hien = (isset($_POST['an_hien']))? $_POST['an_hien'] : "";

        $result = $db_theloai->them_theloai($ten_theloai, $thu_tu, $an_hien);
        if ($result){
            echo '<script>alert("Thêm thành công!"); window.location="theloai.php";</script>';
        }else{
            echo '<script>alert("Thêm không thành công!"); window.location="theloai.php";</script>';
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
    <div class="container">
        <h1>Thêm thể loại</h1>
        <form name="them_theloai" method="POST">
            <table width="100%">
                <tr>
                    <td>Tên thể loại: </td>
                    <td><input type="text" name="ten_theloai"></td>
                </tr>
                <tr>
                    <td>Thứ tự: </td>
                    <td><input type="text" name="thu_tu" value="0"></td>
                </tr>
                <tr>
                    <td>Ẩn/Hiện: </td>
                    <td>
                        <select name="an_hien">
                            <option value="1" selected="selected">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Thêm thể loại" name="submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>