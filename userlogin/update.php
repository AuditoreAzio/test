<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title><?php echo iconv("GB2312","UTF-8",'管理账户') ?></title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "8278349";
$dbname = "myDB";
$email = $pword = "";
$conn=mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}
$sql="SELECT * FROM MyGuests WHERE username='".$_COOKIE["user"]."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$pword=$row["pword"];
$email=$row["email"];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

if(isset($_POST["pword"]))

    $sql= "UPDATE MyGuests SET pword='".$_POST["pword"]."' WHERE username='".$_COOKIE["user"]."'";

else if(isset($_POST["email"]))

    $sql= "UPDATE MyGuests SET email='".$_POST["email"]."' WHERE username='".$_COOKIE["user"]."'";


if (mysqli_query($conn, $sql)) {
    echo iconv("GB2312","UTF-8",'修改成功')."<br>";
    echo '<a href="http://localhost/userlogin/login.php">'.iconv("GB2312","UTF-8",'重新登录').'</a>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
<p><?php echo iconv("GB2312","UTF-8",'用户名：').$_COOKIE["user"] ?></p>
<p><?php echo iconv("GB2312","UTF-8",'修改密码') ?></p>
<form action="update.php" method="post">
<p><?php echo iconv("GB2312","UTF-8",'原密码：').$pword ?></p>
<?php echo iconv("GB2312","UTF-8",'新密码：') ?> <input type="text" name="pword">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'确认修改') ?>>
</form>
<p><?php echo iconv("GB2312","UTF-8",'修改邮箱') ?></p>
<form action="update.php" method="post">
<p><?php echo iconv("GB2312","UTF-8",'原邮箱：').$email ?></p>
<?php echo iconv("GB2312","UTF-8",'新邮箱：') ?> <input type="text" name="email">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'确认修改') ?>>
</form>
<form action="delete.php" method="post">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'删除账户') ?>>
</form>


</body>

</html>