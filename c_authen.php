<?php
//ตรวจสอบว่าต้องมีการป้อน login/password จริงๆ Front end ในฟอร์มตรวจสอบแล้วแต่ Back end ก็ต้องตรวจสอบอีกครั้ง
if (empty($_REQUEST['frmLogin']) || empty($_REQUEST['frmPwd'])) {
    echo "Please fill Login name and Password";
    echo " <a href=\"./login.html\">Back to Login</a>";
    exit;
} else {
    //รับค่าจากฟอร์มมาใส่ตัวแปร และทำงานต่อ
    $userLogin = $_REQUEST['frmLogin'];
    $pwdInput = $_REQUEST['frmPwd'];
    //Database connection
    include("./mysql.php");
    $query = "select * from users where ulogin= :bp_login";
    /* Execute the query */
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':bp_login', $userLogin);
        $stmt->execute();
        $rowCnt = $stmt->rowCount();
        switch ($rowCnt) {
            case 0: {
                    echo "User information not found<BR>";
                    echo "<a href=\"./login.html\">Login again</a>";
                    break;
                } //end case 0 (No data found)
            case 1: {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $uname = $row["fname"];
                    $lname = $row["lname"];
                    $pwd = $row["passwd"];
                    if (password_verify($pwdInput, $pwd)) {
                        //ฟังก์ชัน password_verify() ใช้กับข้อมูลที่ถูกเข้ารหัสด้วยฟังก์ชัน password_hash() เท่านั้น
                        // ย้อนกลับไปดูตัวอย่างการใช้ password_hash() ที่ source code register.php
                        $counter = 1;
                        setcookie("login", $userLogin, time() + 3600);
                        setcookie("uname", $uname, time() + 3600);
                        setcookie("counter", $counter, time() + 3600);
                        include_once('nav.html');
                    } else {
                        echo "<b>Password is incorrect<b><br>";
                        echo "<a href=\"./login.html\">Login again</a>";
                    } //end password_verify
                    break;
                } // end case 1
            default: { //ถ้ามีการออกแบบทั้งฐานข้อมูล และแอพพลิเคชั่นดี กรณีนี้ไม่ควรเกิดขึ้น
                    echo "Have an account <b> $userLogin <b> More than 1 account, please inform the administrator to check the information.<br>";
                    echo "<a href=\"./login.html\">Login again</a>";
                    break;
                } // end case default
        } // end switch
    } catch (PDOException $e) {
        echo 'Sorry, data from database could not be retrieved.<br>';
        echo $e->getMessage();
        echo "<a href=\"./login.html\">Login again</a>";
    }
    $conn = null;
}
?>