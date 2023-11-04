<style type="text/css">
body{
 background: #ecf0f1;
}
a:link, a:visited{
 text-decoration: none;
}
a:hover{
 color: #f00;
}
.title, .pagination{
 width: 600px;
 margin: 0 auto;
 margin-bottom: 20px;
}
.title{
 background: #3498db;
 padding: 20px;
 line-height: 1.5;
}
.title a{
 color: #fff;
}
.title a:hover{
 color: #e67e22;
}
</style>
<?php
    $conn = mysqli_connect("localhost", "root", "", "phantrang");
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $limit = 10; // 10 title per page
    $start = ($page - 1) * $limit;
    $total_title = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tintuc"));
    if ($total_title%$limit == 0) $total_page = $total_title/$limit;
    else $total_page = $total_title/$limit+1;
    $query = "SELECT * FROM tintuc LIMIT ".$start.", ".$limit;
    $result = mysqli_query($conn, $query);
    echo "<div class=\"title\">";
    while($row = mysqli_fetch_array($result)){
        echo '<a href="#">'.$row['id'].'. '.$row['title'].'</a><br />';
    }
    echo "</div>";
    echo "<div class=\"pagination\">";
    for($i = 1; $i <= $total_page; $i++){
        echo '<a href="bt11.php?page='.$i.'">'.$i.'</a> | ';
    }
    echo "</div>";
?>