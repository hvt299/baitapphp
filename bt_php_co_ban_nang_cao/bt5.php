<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Giải phương trình bậc 2</title>
</head>
<body>
<?php
	function giai_pt_bac_1($a, $b){
		if ($a == 0){
			if ($b == 0){
				$nghiem = "Phương trình có vô số nghiệm";
			}else{
				$nghiem = "Phương trình vô nghiệm";
			}
		}else{
			$nghiem = "x = ".round(-($b/$a), 2);
		}
		return $nghiem;
	}
	function giai_pt_bac_2($a, $b, $c){
		if ($a == 0){
			$nghiem = giai_pt_bac_1($b, $c);
		}else{
			$delta = pow($b,2) - 4*$a*$c;
			if ($delta < 0){
				$nghiem = "Phương trình vô nghiệm";
			}else if ($delta == 0){
				$nghiem = "Phương trình có nghiệm kép: x1 = x2 = ".-($b/2*$a);
			}else{
				$can=sqrt($delta);
				$x1=(-$b+$can)/(2*$a);
				$x2=(-$b-$can)/(2*$a);
				$nghiem = "Phương trình có 2 nghiệm phân biệt: x1 = ".round($x1, 2).", x2 = ".round($x2, 2);
			}
		}
		return $nghiem;
	}
	if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])){
		$nghiem = giai_pt_bac_2($_POST['a'], $_POST['b'], $_POST['c']);
	}
?>
<form action="bt5.php" method="post" >
<table width="806" border="1">
<tr>
<td colspan="4" bgcolor="#336699"><strong>Giải phương trình bậc 2</strong></td>
</tr>
<tr>
<td width="83">Phương trình </td>
<td width="236">
<input name="a" type="text" />
 X^2 + </td>
<td width="218"><label for="textfield3"></label>
<input type="text" name="b" id="textfield3" />
 X+</td>
<td width="241"><label for="textfield"></label>
<input type="text" name="c" id="textfield" />
 =0</td>
</tr>
<tr>
<td colspan="4">
 Nghiệm 
<label for="textfield2"></label>
<input name="textfield" type="text" id="textfield2" width="400" value="<?php if (isset($nghiem)) echo $nghiem ?>" /></tr>
<tr>
<td colspan="4" align="center" valign="middle"><input type="submit" name="chao" 
id="chao" value="Xuất" /></td>
</tr>
</table>
</form>
</body>
</html>