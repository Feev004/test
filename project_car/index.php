<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./css/1.css">
</head>
<body>
    <header>
        <div class = "h1">Carsale</div>
        <div class = "h2"><a href="index.php">login</a></div>
        <div class = "h3">ติดต่อ</div>
    </header>
    <hr width = 100%>
        <div class = "T">
            <div class = "talble1">
                <table border='1' width='300'>
                    <tr height = "60px"><td colspan='2' align='center'>เป็นสมาชิกหรือยัง?<br></td></tr>
                    <tr height = "60px"><td colspan='2' align='center'><a href="createuser.php"><input type="submit" value=" สมัครสมาชิก "></td></tr>
                </table>
            </div>
            <div class = "talble2">
                <form action="checklogin.php" method = "post">
                    <table border='1' width='300'>
                        <tr><td colspan='2' align='center'>login</td></tr>
                        <tr><td>Username :</td> <td><input type="text" name="Username"></td></td>
                        <tr><td>Password :</td> <td><input type="password" name="Password"></td></td>
                        <tr><td colspan='2' align='center'><input type="submit" value=" Submit ">
                        <br><a href="">ลืมรหัส?</a></td></tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>