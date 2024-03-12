<?php
session_start();
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "car";
$conn = mysqli_connect( $hostname, $username, $password );
if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้");
mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล session ได้" );
$sqltxt = "SELECT * FROM users where usersName = '$Username'";
$result = mysqli_query ( $conn, $sqltxt );
$rs = mysqli_fetch_array ( $result );
if ( $rs ) {
if ($rs['password'] == $Password) {
$_SESSION['Username']=$Username;
header("Location: home.php?Username=$Username");
}
else {
echo "<br>Password not match.";
echo "<br><a href='index.php'>คลิก กลับไปเพื่อ login</a>";
}
}
else {
echo "Not found Username " . $Username;
echo "<br><a href='index.php'>คลิก กลับไปเพื่อ login </a>";
}
?>