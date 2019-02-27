<html>
<head>
<meta charset="utf-8">
<title>AdminLogin</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "8278349";
$dbname = "myDB";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

$sql = "SELECT * FROM MyGuests WHERE username= '".$_POST["uname"]."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    
    while($row = mysqli_fetch_assoc($result)) {
        if($row["admin"]==1)
        {
        if($row["pword"]==$_POST["pword"]){
           echo iconv("GB2312","UTF-8",'登录成功')."<br>";
           setcookie("admin",$_POST["uname"],time()+3600);
           echo '<a href="http://localhost/userlogin/adminmanage.php">'.iconv("GB2312","UTF-8",'管理账户').'</a>';
        }
       else
           echo iconv("GB2312","UTF-8",'登陆失败，密码错误');
        }else{
            echo iconv("GB2312","UTF-8",'您不是管理员，请使用普通登录')."<br>";
            echo '<a href="http://localhost/userlogin/main.html">'.iconv("GB2312","UTF-8",'返回主页').'</a>';
        }
    } 
}else {
    echo iconv("GB2312","UTF-8",'未注册');
    echo '<a href="http://localhost/userlogin/register.php">'.iconv("GB2312","UTF-8",'注册账户').'</a>';
}

mysqli_close($conn);
}
?>
<form action="adminlogin.php" method="post">
<?php echo iconv("GB2312","UTF-8",'用户名：')?> <input type="text" name="uname">
<?php echo iconv("GB2312","UTF-8",'密码：')?> <input type="text" name="pword">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'登录')?>>
</form>


</body>

</html>