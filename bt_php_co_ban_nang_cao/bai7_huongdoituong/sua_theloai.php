<?php
    include 'config.php';
    include 'class/class.db.theloai.php';

    if (isset($_GET['id'])){
        $db_theloai = new DB_TheLoai();
        $theloai_arr = $db_theloai->get_theloai($_GET['id']);
        $ten_theloai = $theloai_arr[0]['TenTL'];
        $thu_tu = $theloai_arr[0]['ThuTu'];
        $an_hien = $theloai_arr[0]['AnHien'];

        if (isset($_POST['submit'])){
            $id = (isset($_POST['id']))? $_POST['id'] : -1;
            $ten_theloai = (isset($_POST['ten_theloai']))? $_POST['ten_theloai'] : "";
            $thu_tu = (isset($_POST['thu_tu']))? $_POST['thu_tu'] : 0;
            $an_hien = (isset($_POST['an_hien']))? $_POST['an_hien'] : "";
            $result = $db_theloai->sua_theloai($id, $ten_theloai, $thu_tu, $an_hien);
            if ($result){
                echo '<script>alert("Cập nhật thành công!");
                window.location="theloai.php";</script>';
            }else{
                echo '<script>alert("Cập nhật không thành công!");
                window.location="theloai.php";</script>';
            }
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
        <h1>Cập nhật thể loại</h1>
        <form name="sua_theloai" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <table width="100%">
                <tr>
                    <td>Tên thể loại: </td>
                    <td><input type="text" name="ten_theloai" value="<?php echo $ten_theloai; ?>"></td>
                </tr>
                <tr>
                    <td>Thứ tự: </td>
                    <td><input type="text" name="thu_tu" value="<?php echo $thu_tu; ?>"></td>
                </tr>
                <tr>
                    <td>Ẩn/Hiện: </td>
                    <td>
                        <select name="an_hien">
                            <option value="1">Hiện</option>
                            <option value="0" <?php echo ($an_hien == 0)? 'selected="selected"':''; ?>>Ẩn</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Cập nhật thể loại" name="submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>