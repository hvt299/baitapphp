<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
	echo "Chào bạn ".$_SESSION['name']." có tuổi là: ".$_SESSION['age'];
?>
<br/>
<a href="huy_session.php">Hủy session</a>
</body>
</html>