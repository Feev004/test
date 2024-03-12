<!-- home.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="./css/1.css">

</head>
<body>
    <?php
session_start();
if (isset($_SESSION['Username'])) {
    $Username = $_SESSION['Username'];
    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car";
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    echo "<header>";
        
        
        
        
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Carsale
    echo "<div class = 'h1'>Carsale</div>";

    // User
    $sqltxt = "SELECT * FROM users where usersName = '$Username'";
    $result = mysqli_query($conn, $sqltxt);

    // Check if the query was successful
    if ($result) {
        $rs = mysqli_fetch_array($result);
        echo "<div class = 'h2'>{$rs['usersName']}</div>";
        echo "<div class = 'h3'>ติดต่อ</div>";
        echo "<div class = 'h4'><a href='index.php'>logout</a></div>";

        
    } else {
        echo "Error: " . $sqltxt . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "You are not logged in.";
    echo "<br><a href='index.php'>Click here to login</a>";
}
echo "</header>";
// ค้นหา
echo "<form action='checkinsert.php' method='post'>";
echo "<br>ค้นหา<input type='text'name='carin' size='100'><td colspan='2' align='center'>";
echo "</form>";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>
<?php
// showcar
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "car";
$conn = mysqli_connect($hostname, $username, $password);
if (!$conn)
die("ไม่สามารถติดต่อกับ MySQL ได้");
mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล car

ได้");

mysqli_query($conn,"set character_set_connection=utf8mb4");
mysqli_query($conn,"set character_set_client=utf8mb4");
mysqli_query($conn,"set character_set_results=utf8mb4");
$sql = "select * from car order by carID";
$result = mysqli_query ($conn, $sql);

while ($rs = mysqli_fetch_array($result))
{
    echo "<div class = 'T'>";
if (!empty($rs[11])) {
    // กำหนด Path ของรูปภาพ
    $imagePath = "./pictures/{$rs[11]}"; // เปลี่ยนเส้นทางตามโครงสร้างของโปรเจคของคุณ

    // แสดงรูปภาพ 
    //<a href="showcarimage.php?carImage=' . $imagePath . '">
    echo '<br><td><img src="' . $imagePath . '" alt="Car Image"></a></td><br>';
} else {
    echo "No image available<br>";
}
// echo '<td>'.$rs[7].'$</td><br>';
echo '<td>'.$rs[7].'บาท</a></td><br>';
echo '<td><a href="showcar.php?carName='.$rs[1].'">'.$rs[1].'</a></td><br>';
}
echo '</table>';
echo "</div>";
mysqli_close ( $conn );
?>
</body>
</html>