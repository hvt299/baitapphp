<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thể loại</title>
</head>
<body>
	<?php include_once('../connect.php'); ?>
<table align="center" border="1" width="600">
<tr align="center">
<td>Tên Thể Loại</td>
<td>Thứ Tự</td>
<td>Ẩn Hiện</td>
<td>Biểu Tượng</td>
<td colspan="2"><a href="theloai_them.php">Thêm</a></td>
</tr>
	<?php 
		$sql= "select * from theloai";
		$results = mysqli_query($connect,$sql);
		while( ($rows = mysqli_fetch_assoc($results))!= NULL )
		{
	?>
		<tr align="center">
		<td>
			<?php echo $rows['TenTL']; ?>
		</td>
		<td>
			<?php echo $rows['ThuTu']; ?>
		</td>
		<td>
			<?php
				if ($rows['AnHien'] == 1)
				{
					echo "Hien"; 
				}else{
					echo "An";
				}
			?>
		</td>
		<td><img src="../image/<?php echo $rows['icon'] ?>" width="40" height="40" /></td>
		<td>
		<a href="theloai_sua.php?idTL=<?php echo $rows['idTL'];?>">Sửa</a>
		</td>
		<td>
		<a href="theloai_xoa.php?idTL=<?php echo $rows['idTL'];?>" onclick="return 
		confirm('Ban co chac chan khong?');">Xóa</a>
		</td>
		</tr>
		<?php }
		mysqli_close($connect);
		?>
</table>
</body>
</html>