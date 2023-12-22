<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>พื้นที่สี่เหลี่ยมคางหมู</title>
</head>
<body>
    <?php
    $SumOfParallelSides = 7;
    $height = 5;
    $sum = ($height * $SumOfParallelSides) / 2;
    ?>
    <table border="1" align="center" width="400">
        <tr>
        <td colspan="2" align="center">
        <big>Trapezoid area</big>
        </td>
        <tr>
        <tr>
        <td align="laft">Sum of parallel sides</td>
        <td align="laft"><?php echo $SumOfParallelSides ?></td>
        </tr>
        <td align="laft">height</td>
        <td align="laft"><?php echo $height ?></td>
        </tr>
        <td align="laft">Ans</td>
        <td align="laft"><?php echo $sum ?></td>
        </tr>
        <tr>
        <td colspan="2" align="center">
        <div><a href="calcurate.php">calcurate</a></div>
        </td>
        </tr>
        </table>
</body>
</html>
