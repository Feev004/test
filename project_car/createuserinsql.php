<?php
$usersID = $_POST['usersID'];
$usersName = $_POST['usersName'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$credit = $_POST['credit'];
$adress = $_POST['adress'];
$Password = $_POST['password'];
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "car";
$conn = mysqli_connect($hostname, $username, $password);
echo '<center>';
if (!$conn)
die("ไม่สามารถติดต่อกับ mySQL ได้");
mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล car ได้");
mysqli_query($conn,"set character_set_connection=utf8mb4");
mysqli_query($conn,"set character_set_client=utf8mb4");
mysqli_query($conn,"set character_set_results=utf8mb4");
$sql = "insert into users(usersID, usersName, email, tel, credit, adress, password) values ('$usersID', '$usersName', '$email', '$tel', '$credit',
'$adress', '$Password')";
mysqli_query($conn, $sql) or die("insert ลงตาราง car มีข้อผิดพลาดเกิดขึ้น" .mysqli_error());
echo '<br><br><h2>บันทึกข้อมูลหนังสือรหัส '.$usersName.' เรียบร้อย</h2>';
echo '<br><br><a href="index.php">กลับหน้า login</a>';
mysqli_close($conn);
echo '</center>';
?>