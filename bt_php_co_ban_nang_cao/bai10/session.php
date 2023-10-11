<?php
	session_start(); // khoi dong session
	if (!isset($_SESSION['name'])){
		$_SESSION['name'] = "hocweb.com.vn"; // khoi tao mot bien session voi ten la name va gia tri ban dau la 'abc'
		$_SESSION['age'] = 120;
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Session</title>
</head>
<body>
<?php
	echo "Tên bạn là: ".$_SESSION['name']."<br/>";
	echo "Số tuổi của bạn: ".$_SESSION['age']."<br/>";
?>
<a href="test_session.php">Click here!</a>
</body>
</html>