<?php
class Dao{
	private $con;	

	function __construct($user,$pass,$db)
	{
		$host=$_SERVER['SERVER_NAME'];
		$this->con=mysqli_connect($host,$user,$pass,$db);
	}

	public function query($sql){
		mysqli_query($this->con,"set names 'utf8'");
		$rs=mysqli_query($this->con,$sql);
		return $rs;
	}

	function table($sql,$header){
		$rs=$this->query($sql);

		/* Truy xuất các fields name 
		$fieldinfo là mảng các object chứa thông tin
		về các fields đã select */

		$fieldinfo=mysqli_fetch_fields($rs);

		/* Tạo tiêu đề table */
		$str="<table><tr>";
		foreach ($fieldinfo as $val){
			$name=$val->name;
			$str.="<th>".$name."</th>";
	    }
		$str.="</tr>";

		/* Đưa dữ liệu trong recordset vào table */
		while($r=mysqli_fetch_array($rs)){
			$str.="<tr>";
			foreach ($fieldinfo as $val){
				$name=$val->name;
				$str.="<td>".$r[$name]."</td>";
			}
			$str.="</tr>";
		}
		$str.="</table>";
		echo "<h3>{$header}</h3>";
		echo $str;
	}
}
?>