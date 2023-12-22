<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>พื้นที่วงกลม</title>
</head>
<body>
    <?php
    $π = 3.14;
    $R = 3;
    $sum = $π * ($R * $R);
    ?>
    <table border="1" align="center" width="400">
        <tr>
        <td colspan="2" align="center">
        <big>Circle area</big>
        </td>
        <tr>
        <tr>
        <td align="laft">π</td>
        <td align="laft"><?php echo $π ?></td>
        </tr>
        <td align="laft">height</td>
        <td align="laft"><?php echo $R ?></td>
        </tr>
        <td align="laft">Ans</td>
        <td align="laft"><?php echo $sum ?></td>
        </tr>
        <tr>
        <td colspan="2" align="center">
        <div><a href="./calcurate.php">calcurate</a></div>
        </td>
        </tr>
        </table>
</body>
</html>