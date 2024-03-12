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
    $id = $_GET['carImage'];

    $sql = "SELECT * FROM car WHERE picture = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        $Path = "pictures/"; // Specify the path of the image files stored on the server
        $image = "<img src='$Path{$data['picture']}' valign='middle' align='center'>";

        echo "<table border='1'>";
        echo "<br><tr>" . $image . "</tr><br>";
        echo "<tr>" . $data["carID"] . "</tr><br>";
        echo "<tr>" . $data["carName"] . "</tr><br>";
        echo "<tr>" . $data["brandID"] . "</tr><br>";
        echo "<tr>" . $data["typeCarID"] . "</tr><br>";
        echo "<tr>" . $data["produceYear"] . "</tr><br>";
        echo "<tr>" . $data["color"] . "</tr><br>";
        echo "<tr>" . $data["distance"] . "</tr><br>";
        echo "<tr>" . $data["price"] . "</tr><br>";
        echo "<tr>" . $data["tankID"] . "</tr><br>";
        echo "<tr>" . $data["engineID"] . "</tr><br>";
        echo "<tr>" . $data["moreInfo"] . "</tr><br>";
        
        echo "<tr>" . $data["vehicleID"] . "</tr><br>";
        echo "<tr>" . $data["statusID"] . "</tr><br>";
        echo "</table>";
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
