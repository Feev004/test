<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="ex3.php">
        Input first number
        <input type="text" name="first" size="10" value=""><br>
        Input last number
        <input type="text" name="last" size="10" value=""><br>
        <input type="submit" value="Submit">
    </form>
    <?php
        $first = isset($_GET['first']) ? $_GET['first'] : 0;
        $last = isset($_GET['last']) ? $_GET['last'] : 0;

        function findMax($first, $last) {
            $maxValue = $first;
            for ($i = $first + 1; $i <= $last; $i++) {
                if ($i % 12 == 0 && $i > $maxValue) {
                    $maxValue = $i;
                }
            }
            return $maxValue;
        }

        echo "ผลลัพธ์ของการรันโปรแกรม<br>";
        $result = findMax($first, $last);
        echo "result : $result<br>";
    ?>
</body>
</html>