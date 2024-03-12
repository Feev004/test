<!-- ceartuser.php -->
<html>
<head><title>สมัครสมาชิก</title></head>
<body >
<?php
$hostname = "localhost";
$username = "root";

$password = "";
$dbName = "car";
$conn = mysqli_connect($hostname, $username, $password);
if (!$conn)
die("ไม่สามารถติดต่อกับ mySQL ได้");
mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล bookStore ได้");
mysqli_query($conn, "set character_set_connection=utf8mb4");
mysqli_query($conn, "set character_set_client=utf8mb4");
mysqli_query($conn, "set character_set_results=utf8mb4");
?>
<form enctype="multipart/form-data" name="save" method="post" action="createuserinsql.php">
<center>
<br><br><table width="700" border="1" bgcolor="#ffffff">
<tr>
<th colspan="2" bgcolor="" height="21">สมัครสมาชิก</th>
</tr>
<tr>
<td width="200">usersID : </td>
<td width="400"><input type="text" name="usersID"size="10" maxlength="9"></td>
</tr>
<tr >
<td width="200" >usersName : </td>
<td><input type="text" name="usersName" size="50"maxlength="50"> </td></tr>
<tr>
<td width="200">email : </td>
<td><input type="text" name = "email" size="50"maxlength="40"></select></td></tr>
<tr>
<td width="200">tel : </td>
<td><input type="text" name="tel" size="15"maxlength="10"></td></tr>
<tr>
<td width="200">credit : </td>

<td><input type="text" name="credit" maxlength="13"size="20"></td></tr>
<tr>
<td width="200">adress : </td>
<td ><input type="text" name="adress" maxlength="100"size="20"></td></tr>
<tr>
<td width="200">password : </td>
<td><input type="text" name="password" size="20"maxlength="50"></td></tr>
</table>
<br><input type="submit" name="submit" value="บันทึกข้อมูล"style="cursor:hand;">

<input type="reset" name="reset" value="ยกเลิก" style="cursor:hand;">
</form>
<br><br><a href="index.php">กลับหน้า login</a>
</center>
</body>
</html>