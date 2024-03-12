<!-- showcar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showcar</title>
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

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // User
    $sqltxt = "SELECT * FROM users where usersID = '$Username'";
    $result = $conn->query($sqltxt);

    // Check if the query was successful
    if ($result) {
        echo "<header>";
        echo "<div class = 'h1'>Carsale</div>";
        $rs = $result->fetch_assoc();
        echo "<div class = 'h2'>{$rs['usersName']}</div>";
        echo "<div class = 'h3'>ติดต่อ</div>";
        echo "<div class = 'h4'><a href='index.php'>logout</a></div>";
        echo "</header>";
    } else {
        echo "Error: " . $sqltxt . "<br>" . $conn->error;
    }

    // Showcar
    $id = $_GET['carName'];
    
    //car
    $sqlcar = "SELECT * FROM car WHERE carID = ?";
    $stmt = $conn->prepare($sqlcar);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    //brand
    $CID = $data["carID"];
    $sqlbrand = "SELECT * FROM car JOIN brand ON car.brandID = brand.brandID JOIN typecar ON car.typeCarID = typecar.typeCarID JOIN status ON car.statusID = status.statusID WHERE car.carID = 001";
    $stmtbrand = $conn->query($sqlbrand);

    if ($data) {
        $Path = "pictures/"; // Specify the path of the image files stored on the server
        $image = "<img src='$Path{$data['picture']}' valign='middle' align='center'>";

        echo "<div class = 'T'>";
        echo "<table border='1'>";
        while($i = mysqli_fetch_assoc($stmtbrand) ){
            echo "<br><tr>" . $image . "</tr><br>";
            echo "<tr>" . $data["carID"] . "</tr><br>";
            echo "<tr>" . $data["carName"] . "</tr><br>";
            echo "<tr>".$i["brandName"]."</tr><br>";
            echo "<tr>".$i["typeCarName"]."</tr><br>";
            echo "<tr>" . $data["produceYear"] . "</tr><br>";
            echo "<tr>" . $data["color"] . "</tr><br>";
            echo "<tr>" . $data["distance"] . "</tr><br>";
            echo "<tr>" . $data["price"] . "</tr><br>";
            echo "<tr>" . $data["tankID"] . "</tr><br>";
            echo "<tr>" . $data["engineID"] . "</tr><br>";
            echo "<tr>" . $data["moreInfo"] . "</tr><br>";
            echo "<tr>" . $data["vehicleID"] . "</tr><br>";
            echo "<tr>".$i["statusName"]."</tr><br>";
        }
        echo "</table>";
        
        echo "<form action='#' method = 'post'>";
        echo "<table border='1'>";
        echo "<tr>คำนวนค่างวดรถ</tr><br>";
        echo "<tr>ราคารถ <input type='text' name='pricecar'value = " . $data["price"] . " hidden>" . $data["price"] . " บาท</tr><br>";
        echo "<tr>เงินดาวน์ <input type='text' name='down'> บาท</tr><br>";
        echo "<tr>อัตราดอกเบี้ย <input type='text' name='rate'> %</tr><br>";
        echo "<tr>จำนวน <input type='text' name='period'> งวด</tr><br>";
        echo "<button name = 'cal'>คำนวน</button>";
        if(isset($_POST['cal'])){
            $pricecar = $_POST['pricecar'];
            $down = $_POST['down'];
            $rate = $_POST['rate'];
            $period = $_POST['period'];
            $zerosum = ($pricecar-$down);
            $onesum = ($zerosum * $rate) / 100;
            $twosum = $onesum * 4;
            $threesum = $zerosum + $twosum;
            $sum = $threesum / $period;

            echo "<br>";
            echo "<br> วงเงินดาวน์ทั้งหมด :".$zerosum;
            echo "<br> ดอกเบี้ย ".$rate."% :".$onesum;
            echo "<br> 4 ปี :".$twosum;
            echo "<br> ยอดรวมที่จะต้องจ่ายทั้งหมด :".$threesum;
            echo "<br>ต้องจ่ายค่างวดทั้งหมดเดือนละ :".$sum;
            $usersID = $rs['usersName'];
            $carID = $data["carID"];
            $paymentID = 2;
            $month = $period;
            $salesID = rand(1, 9999);;
            $periodProce = $sum;
            $D = '13';
            $A = '3';
            $Y = 2024;
            $Y4 = 2024 + 4;
            $salesDay = $Y.'-'.$A.'-'.$D;
            $payDay = $Y4.'-'.$A.'-'.$D;
            echo "<br>".$salesDay;
            echo "<br>".$payDay;
            $conn = mysqli_connect($hostname, $username, $password);
            if (!$conn)
            die("ไม่สามารถติดต่อกับ mySQL ได้");
        mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล car ได้");
        mysqli_query($conn,"set character_set_connection=utf8mb4");
        mysqli_query($conn,"set character_set_client=utf8mb4");
        mysqli_query($conn,"set character_set_results=utf8mb4");
        $sql = "insert into sales(salesID, usersID, carID, paymentID,salesDay ,payDay , month, periodPrice) values ('$salesID', '$usersID', '$carID', '$paymentID','$salesDay' ,'$payDay' , '$month', '$periodProce')";
        mysqli_query($conn, $sql) or die("insert ลงตาราง car มีข้อผิดพลาดเกิดขึ้น" .mysqli_error());
        mysqli_close($conn);
    }
    echo "</table>";
    echo "</form>";
    echo "</div>";
        echo "<br><a href='Installment.php'>ผ่อยชำระ</a>";
        echo "<br><a href='Paycash.php'>จ่ายสด</a>";
        echo "<br><a href='home.php'>Click here to show car</a>";
        
    } else {
        echo "Car not found.";
        echo "<br><a href='home.php'>Click here to show car</a>";
    }

    $stmt->close();
} else {
    echo "You are not logged in.";
    echo "<br><a href='home.php'>Click here to showcar</a>";
}
?>
</body>
</html>