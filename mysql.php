<?php
$host = "localhost";
$user = "root";
$passwd = "";
$dbname = "hr";
try {
      $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $passwd);
      //echo "Connected successfully";

} catch(PDOException $e) {
	//echo "Connection failed: " . $e->getMessage();
}

?>