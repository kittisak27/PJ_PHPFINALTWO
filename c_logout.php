<?php
//ตรวจสอบว่าผ่าน login เข้าระบบมาหรือยัง
if (isset($_COOKIE['login']) or isset($_COOKIE['uname'])) {
    setcookie("login", "", time() - 3600);
    setcookie("uname", "", time() - 3600);
    setcookie("counter", "", time() - 3600);
    echo "You have successfully logged out <br>";
    echo "<a href=\"./login.html\">Login again</a>";
} else {
    echo "No cookie value<br>";
    echo "You do not login to system<br>";
    echo "<a href=\"./login.html\">Login to system</a>";
}
?>