<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax - Danh sách lớp</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<style>
    body {
        font-size: 11pt;
    }
    div {
        padding: 3px 5px;
        font: normal 13pt Arial;
    }
    table {
        background-color: #eaeaea;
    }
    td {
        font: normal 11pt Arial;
    }
    .hd {
        background-color: navy;
        color: white;
    }
</style>
<script>
    function sendajax(){
        lop = document.getElementById("lop").value;
        objds = document.getElementById("ds");
        xml = new XMLHttpRequest();
        xml.onreadystatechange = function(){
            if (xml.readyState == 4){
                objds.innerHTML = xml.responseText;
            }
        }
        url = "ds.php?lop="+lop;
        xml.open("GET", url, "false");
        xml.send();
    }
</script>
<body>
    <h3>In danh sách theo từng lớp</h3>
    <?php
        include ("inc/connect.inc");
        function initClass($conn){
            $sql = "SELECT DISTINCT lop FROM sinhvien";
            $rs = mysqli_query($conn, $sql);
            $str = "Chọn lớp: <select id = lop onChange='sendajax();'>";
            while ($row = mysqli_fetch_array($rs)){
                $str .= "<option value = {$row['lop']}>{$row['lop']}</option>";
            }
            $str .= "</select>";
            echo $str;
        }
        initClass($con);
    ?>
    <hr>
    <div id="ds">Danh sách</div>
</body>
</html>