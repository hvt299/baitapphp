<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm thể loại</title>
</head>
<body>
<form action="theloai_them_xl.php" method="post" enctype="multipart/form-data" 
name="form1">
<table align="left" width="400">
<tr>
<td align="right">
Tên Thể Loại
</td>
<td>
<input type="text" name="TenTL" value="" />
</td>
</tr>
<tr>
<td align="right">
Thứ Tự
</td>
<td>
<input type="text" name="ThuTu" value="" />
</td>
</tr>
<tr>
<td align="right">
Ẩn Hiện
</td>
<td>
<select name="AnHien">
<option value="0">Ẩn</option>
<option value="1">Hiện</option>
</select>
</td>
</tr>
<tr>
 <td align="right">Icon</td>
 <td>
 <input type="file" name="image" id="anh" />
 
 </td>
</tr>
<tr>
<td align="right">
<input type="submit" name="Them" value="Thêm" />
</td>
<td>
<input type="reset" name="Huy" value="Hủy" />
</td>
</tr>
</table>
</form>
</body>
</html>