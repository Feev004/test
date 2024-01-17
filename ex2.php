<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="ex2.php">
        salary
        <input type="text" name="salary" size="10" value=""><br>
        Receive a small discount/year
        <input type="text" name="discount" size="10" value=""><br>
        Receive expenses/year
        <input type="text" name="expenses" size="10" value=""><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    $salary = isset($_GET['salary']) ? $_GET['salary'] : 0;
    $discount = isset($_GET['discount']) ? $_GET['discount'] : 0;
    $expenses = isset($_GET['expenses']) ? $_GET['expenses'] : 0;
    $taxM = 0;

    function tax($salary, $discount, $expenses) {
        $income = ($salary * 12) - $discount - $expenses;
        $taxM = 0;

        if ($income > 0 && $income <= 150000) {
            $taxM = 0;
        } elseif ($income > 150000 && $income <= 300000) {
            $taxM = 5;
        } elseif ($income > 300000 && $income <= 500000) {
            $taxM = 10;
        } elseif ($income > 500000 && $income <= 750000) {
            $taxM = 15;
        } elseif ($income > 750000 && $income <= 1000000) {
            $taxM = 20;
        } elseif ($income > 1000000 && $income <= 2000000) {
            $taxM = 25;
        } elseif ($income > 2000000 && $income <= 5000000) {
            $taxM = 30;
        } elseif ($income > 5000000) {
            $taxM = 35;
        }

        echo "Income: $income<br>Tax: $taxM %<br>";
        $income = ($income * $taxM) / 100;
        echo "All taxes: $income";
    }

    echo "ผลลัพธ์ของการรันโปรแกรม<br>";
    tax($salary, $discount, $expenses);
    ?>
</body>
</html>