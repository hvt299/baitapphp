<!DOCTYPE html>
<html>
<head>
<title>PHÁT SINH MẢNG VÀ TÍNH TOÁN</title>
<meta charset="utf-8">
<style>
*{
 font-family: Tahoma;
}
table{
 width: 400px;
 margin: 100px auto;
}
table th{
 background: #66CCFF;
 padding: 10px;
 font-size: 18px;
}
</style>
</head>
<body>
<?php
	if (isset($_POST["btn_goi"])){
		if (is_numeric($_POST["so_phan_tu"])) $n = $_POST["so_phan_tu"];
		else $n = 0;
		$mang_so = array($n);
		for($i = 0; $i < $n; $i++){
			$mang_so[$i] = mt_rand(0, 20);
		}
	}
	function xuat_mang($mang_so){
		echo implode(" ", $mang_so);
	}
	function tim_min($mang_so){
		if (isset($mang_so[0])){
			$min = $mang_so[0];
			$n = count($mang_so);
			for($i = 1; $i < $n; $i++){
				if ($mang_so[$i] < $min){
					$min = $mang_so[$i];
				}
			}
			echo $min;
		}
	}
	function tim_max($mang_so){
		if (isset($mang_so[0])){
			$max = $mang_so[0];
			$n = count($mang_so);
			for($i = 1; $i < $n; $i++){
				if ($mang_so[$i] > $max){
					$max = $mang_so[$i];
				}
			}
			echo $max;
		}
	}
	function tinh_tong($mang_so){
		$tong_so = 0;
		$n = count($mang_so);
		for($i = 0; $i < $n; $i++){
			$tong_so += $mang_so[$i];
		}
		echo $tong_so;
	}
?>
<form action="bt6_2.php" method="POST">
<table>
<thead>
<tr>
<th colspan="2">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
</tr>
</thead>
<tbody>
<tr>
<td>Nhập số phần tử:</td>
<td><input type="text" name="so_phan_tu" 
width="100%" ></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="btn_goi" value="Phát sinh và tính 
toán"></td>
</tr>
<tr>
<td>Mảng: </td>
<td><input type="text" name="mang_so" 
disabled="disabled" value="<?php xuat_mang($mang_so); ?>"></td>
</tr>
<tr>
<td>GTLN ( MAX ) trong mảng: </td>
<td><input type="text" name="gtln" disabled="disabled" 
value="<?php tim_max($mang_so); ?>"></td>
</tr>
<tr>
<td>GTNN ( MIN ) trong mảng: </td>
<td><input type="text" name="ttnn" disabled="disabled" 
value="<?php tim_min($mang_so); ?>"></td>
</tr>
<tr>
<td>Tổng mảng: </td>
<td><input type="text" name="tong" disabled="disabled" 
value="<?php tinh_tong($mang_so); ?>"></td>
</tr>
</tbody>
</table>
</form>
</body>
</html>