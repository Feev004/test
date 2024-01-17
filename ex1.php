
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "get" action = "ex1.php">
        Input row
        <input type = "text" name = "num1" size = "10" value = ""><br>
        <input type="submit" value="Submit">
    </form>
    <?php
        $number = $_GET['num1'];
    function printMountain($rows) {
        for ($i = 1; $i <= $rows; $i++) {
            echo "Row: $i ";
            echo '<span style ="color : green">' . str_repeat("*", $i) . '</span>';
            echo "<br>";
        }
    }
    //$rows = 6;
    echo "ผลลัพธ์ของการรันโปรแกรม<br>";
    printMountain($number);
    ?>
</body>
</html>