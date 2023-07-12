<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/confix_nav.css" />
    <title>Document</title>
</head>

<body>
    <nav>
        <button class="btn-hamburger">
            <i class="fas fa-bars"></i>
        </button>

        <h2>PROJECT PHP</h2>

        <ul>
            <li><a href="nav.html">Home</a></li>
            <li><a href="list_crud.php">Data</a></li>
            <li><a href="user_detail.php">Account</a></li>
            <li><a href="about.html">about</a></li>
            <li><a href="c_logout.php" class="btn-Logout">Logout</a></li>
        </ul>
    </nav>
    <div style="text-align: center;"><img src="images/user.png" width="250"></div>
    </div>
    <?php
    //ตรวจสอบว่าผ่าน login เข้าระบบมาหรือยังจาก cookies ที่เก็บในเครื่องของ user
    if (!isset($_COOKIE['login']) or !isset($_COOKIE['uname'])) {
        echo "<font color = 'red'><b>Error : You do not login to system<b></font> <br>";
        echo "Please <a href=\"c_index.php\"> Login </a><br>";
    } else {
        $Login = $_COOKIE['login'];
        $Username = $_COOKIE['uname'];
        include_once("./mysql.php");
        $query = "select lname from users where ulogin= :bp_login";
        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':bp_login', $Login);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $lname = $row['lname'];
            echo "<br>";
            echo "<br>";
            echo "<center><card><b>User details</card></center></b><br>";
            echo "<br>";
            echo "<br>";
            echo "<center><card>Name: $Username $lname</card></center><br>";
            echo "<br>";
            echo "<br>";
            echo "<center><card>Email: $Login</card></center><br>";
        } catch (PDOException $ex) {
            echo 'ขออภัยไม่สามารถดึงข้อมูลจากฐานข้อมูลได้<br>';
            echo $ex->getMessage();
        } // try sql execute
        $conn = null;
    }
    ?>
</body>

</html>