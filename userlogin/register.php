
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
// ���������Ĭ������Ϊ��ֵ
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
        $nameErr = "�����Ǳ����";
    }
    else
    {
        $name = test_input($_POST["name"]);
        // ��������Ƿ�ֻ������ĸ���ո�
        if (!preg_match("/^[a-zA-Z ]*[0-9]*$/",$name))
        {
            $nameErr = "ֻ������ĸ������"; 
        }
    }
    if (empty($_POST["pword"]))
    {
        $pwordErr = "�����Ǳ����";
    }
    else
    {
        $pword=$_POST["pword"];
    }
    if (empty($_POST["email"]))
    {
      $emailErr = "�����Ǳ����";
    }
    else
    {
        $email = test_input($_POST["email"]);
        // ��������Ƿ�Ϸ�
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
        {
            $emailErr = "�Ƿ������ʽ"; 
        }
    }
    if($emailErr==""&&$nameErr==""&&$pwordErr=="")
    {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // �������
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO MyGuests (username, pword, email)
VALUES ('".$name."', '".$pword."', '".$email."')";
        
        if (mysqli_query($conn, $sql)) {
            echo iconv("GB2312","UTF-8",'ע��ɹ�')."<br>";
            echo '<a href="http://localhost/userlogin/login.php">'.iconv("GB2312","UTF-8",'��¼').'</a>';
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

<h2><?php echo iconv("GB2312","UTF-8",'ע��');?></h2>
<p><span class="error"><?php echo iconv("GB2312","UTF-8",'*����ѡ��');?></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   <?php echo iconv("GB2312","UTF-8",'�û���');?>: <input type="text" name="name" >
   <span class="error">* <?php echo iconv("GB2312","UTF-8",$nameErr);?></span>
   <br><br>
   <?php echo iconv("GB2312","UTF-8",'����');?>: <input type="text" name="pword" >
   <span class="error">* <?php echo iconv("GB2312","UTF-8",$pwordErr);?></span>
   <br><br>
  E-mail: <input type="text" name="email" >
   <span class="error">* <?php echo iconv("GB2312","UTF-8",$emailErr);?></span>
   <br><br>

   <input type="submit" name="submit" value="Submit"> 
</form>



</body>
</html>
