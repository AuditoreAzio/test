<html>
<head>
<meta charset="utf-8">
<title>Login</title>
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
// ��������
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("����ʧ��: " . mysqli_connect_error());
}

$sql = "SELECT pword FROM MyGuests WHERE username= '".$_POST["uname"]."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // �������
    while($row = mysqli_fetch_assoc($result)) {
        if($row["pword"]==$_POST["pword"]){
           echo iconv("GB2312","UTF-8",'��¼�ɹ�')."<br>";
           setcookie("user",$_POST["uname"],time()+3600);
           echo '<a href="http://localhost/userlogin/update.php">'.iconv("GB2312","UTF-8",'�����˻�').'</a>';
        }
       else
           echo iconv("GB2312","UTF-8",'��½ʧ�ܣ��������');
    }
} else {
    echo iconv("GB2312","UTF-8",'δע��');
    echo '<a href="http://localhost/userlogin/register.php">'.iconv("GB2312","UTF-8",'ע���˻�').'</a>';
}

mysqli_close($conn);
}
?>
<form action="login.php" method="post">
<?php echo iconv("GB2312","UTF-8",'�û�����')?> <input type="text" name="uname">
<?php echo iconv("GB2312","UTF-8",'���룺')?> <input type="text" name="pword">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'��¼')?>>
</form>


</body>

</html>
