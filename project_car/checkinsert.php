<?php
session_start();
$Username = $_POST['carin'];
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "car";
$conn = mysqli_connect( $hostname, $username, $password );
if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้");
mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล session ได้" );
$sqltxt = "SELECT * FROM car WHERE carName LIKE '$Username'";
$result = mysqli_query ( $conn, $sqltxt );
$rs = mysqli_fetch_array ( $result );
if ($rs['carName'] == $Username) {
$_SESSION['carName']=$Username;
header("Location: showcar.php?carName=$Username");
}
else {
echo "<br>Password not match.";
echo "<br><a href='home.php'>คลิก กลับไปเพื่อ showcar</a>";
}
?>