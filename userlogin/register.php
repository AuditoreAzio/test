
<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>register</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// 定义变量并默认设置为空值
$servername = "localhost";
$username = "root";
$password = "8278349";
$dbname = "myDB";
$nameErr = $emailErr = $pwordErr = "";
$name = $email = $pword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"]))
    {
        $nameErr = "名字是必需的";
    }
    else
    {
        $name = test_input($_POST["name"]);
        // 检测名字是否只包含字母跟空格
        if (!preg_match("/^[a-zA-Z ]*[0-9]*$/",$name))
        {
            $nameErr = "只允许字母和数字"; 
        }
    }
    if (empty($_POST["pword"]))
    {
        $pwordErr = "密码是必需的";
    }
    else
    {
        $pword=$_POST["pword"];
    }
    if (empty($_POST["email"]))
    {
      $emailErr = "邮箱是必需的";
    }
    else
    {
        $email = test_input($_POST["email"]);
        // 检测邮箱是否合法
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
        {
            $emailErr = "非法邮箱格式"; 
        }
    }
    if($emailErr==""&&$nameErr==""&&$pwordErr=="")
    {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // 检测连接
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO MyGuests (username, pword, email)
VALUES ('".$name."', '".$pword."', '".$email."')";
        
        if (mysqli_query($conn, $sql)) {
            echo iconv("GB2312","UTF-8",'注册成功')."<br>";
            echo '<a href="http://localhost/userlogin/login.php">'.iconv("GB2312","UTF-8",'登录').'</a>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
   
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2><?php echo iconv("GB2312","UTF-8",'注册');?></h2>
<p><span class="error"><?php echo iconv("GB2312","UTF-8",'*必填选项');?></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   <?php echo iconv("GB2312","UTF-8",'用户名');?>: <input type="text" name="name" >
   <span class="error">* <?php echo iconv("GB2312","UTF-8",$nameErr);?></span>
   <br><br>
   <?php echo iconv("GB2312","UTF-8",'密码');?>: <input type="text" name="pword" >
   <span class="error">* <?php echo iconv("GB2312","UTF-8",$pwordErr);?></span>
   <br><br>
  E-mail: <input type="text" name="email" >
   <span class="error">* <?php echo iconv("GB2312","UTF-8",$emailErr);?></span>
   <br><br>

   <input type="submit" name="submit" value="Submit"> 
</form>



</body>
</html>
