<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tổng for</title>
</head>
<body>
<?php
	if (isset($_POST['so_dau']) && isset($_POST['so_cuoi'])){
		$so_dau = $_POST['so_dau'];
		$so_cuoi = $_POST['so_cuoi'];
		$tong = 0;
		$tich = 1;
		$tong_chan = 0;
		$tong_le = 0;
		for ($i=$so_dau; $i<=$so_cuoi; $i++){
			$tong += $i;
		}
		for ($i=$so_dau; $i<=$so_cuoi; $i++){
			$tich *= $i;
		}
		for ($i=$so_dau; $i<=$so_cuoi; $i++){
			if ($i % 2 == 0) $tong_chan += $i;
			else $tong_le += $i;
		}
	}
?>
<form action="bt4.php" method="post" >
<table width="728" border="1">
<tr>
<td width="122">&nbsp;</td>
<td width="76">Số bắt đầu</td>
<td width="169"><label for="textfield"></label>
<input type="text" name="so_dau" id="textfield" value=""/></td>
<td width="152">Số kết thúc</td>
<td width="175"><label for="textfield2"></label>
<input type="text" name="so_cuoi" id="textfield2" value=""/></td>
</tr>
<tr>
<td colspan="5">Kết quả
<label for="textfield3"></label></td>
</tr>
<tr>
<td>Tổng các số</td>
<td colspan="4"><label for="textfield4"></label>
<input type="text" name="tong" id="textfield4" value="<?php if (isset($tong)) echo $tong ?>"/></td>
</tr>
<tr>
<td>Tích các số</td>
<td colspan="4"><label for="textfield5"></label>
<input type="text" name="tich" id="textfield5" value="<?php if (isset($tich)) echo $tich ?>"/></td>
</tr>
<tr>
<td>Tổng các số chẵn</td>
<td colspan="4"><label for="textfield6"></label>
<input type="text" name="tong_chan" id="textfield6" value="<?php if (isset($tong_chan)) echo $tong_chan ?>"/></td>
</tr>
<tr>
<td>Tổng các số lẻ</td>
<td colspan="4"><label for="textfield7"></label>
<input type="text" name="tong_le" id="textfield7" value="<?php if (isset($tong_le)) echo $tong_le ?>"/></td>
</tr>
<tr>
<td colspan="5"><input type="submit" name="button" id="button" value="Tính toán" /></td>
</tr>
</table>
</form>
</body>
</html>