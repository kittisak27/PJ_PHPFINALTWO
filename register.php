<?php
include("./mysql.php");
// create the SQL statement
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$userLogin = $_REQUEST['login'];
$hashedPwd = password_hash($_REQUEST['Passwd'], PASSWORD_DEFAULT);
//echo "Hashed password: " . $hashedPwd . "<br>"; ถ้าอยากทราบค่าให้ลอง echo ดูค่ะ
$sql = "INSERT INTO users(ulogin,fname, lname,passwd)
values(:bp_login, :bp_fname, :bp_lname, :bp_passwd)";
try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':bp_login', $userLogin);
    $stmt->bindParam(':bp_fname', $fname);
    $stmt->bindParam(':bp_lname', $lname);
    $stmt->bindParam(':bp_passwd', $hashedPwd);
    $stmt->execute();
    echo $stmt->rowCount() . " records INSERTED";
    Header("Location: login.html");
} catch (PDOException $e) {
    echo "Insertion failed: ";
    if ($e->errorInfo[0] == 23000) {
        echo "User is not already a member";
        echo " <a href=\"./login.html\">Back to Login</a>";
    } else {
        echo "Insertion failed: ";
    }
}
?>