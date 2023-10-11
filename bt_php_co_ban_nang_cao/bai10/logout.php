<?php
    session_start();
    session_destroy();
    setcookie('username','', time() -1);
    setcookie('password','', time() -1);
    echo "<script>alert('Logout Successful.'); location.href='dangnhap.php';</script>";
?>
