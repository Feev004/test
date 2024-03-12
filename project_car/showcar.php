<!-- showcar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showcar</title>
</head>
<body>
<?php
session_start();

if (isset($_SESSION['Username'])) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car";

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $dbname);

    $Username = $_SESSION['Username'];
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Carsale
    echo "<h1>Carsale</h1>";

    // User
    $sqltxt = "SELECT * FROM users where usersID = '$Username'";
    $result = $conn->query($sqltxt);

    // Check if the query was successful
    if ($result) {
        $rs = $result->fetch_assoc();
        echo "{$rs['usersID']}ติดต่อ";
    } else {
        echo "Error: " . $sqltxt . "<br>" . $conn->error;
    }

    // Showcar
    $id = $_GET['carName'];
    
    //car
    $sqlcar = "SELECT * FROM car WHERE carName = ?";
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
        
        //while($i = mysqli_fetch_assoc($stmtbrand) ){
        //    echo "<tr>".$i["statusName"]."</tr><br>";
        //}
        echo "</table>";
        echo '<br><a href="buy.php?carName='.$data["carID"].'">Buy</a>';
        // echo '<td><a href="showcar.php?carName='.$rs[1].'">'.$rs[1].'</a></td><br>';
        echo "<br><a href='home.php'>Click here to show car</a>";
    } else {
        echo "Car not found.";
        echo "<br><a href='home.php'>Click here to show car</a>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "You are not logged in.";
    echo "<br><a href='login.php'>Click here to login</a>";
}
?>

</body>
</html>
