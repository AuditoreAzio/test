<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title><?php echo iconv("GB2312","UTF-8",'�����˻�') ?></title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "8278349";
$dbname = "myDB";
$email = $pword = "";
$conn=mysqli_connect($servername, $username, $password, $dbname);
// �������
if (mysqli_connect_errno())
{
    echo "����ʧ��: " . mysqli_connect_error();
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
    echo iconv("GB2312","UTF-8",'�޸ĳɹ�')."<br>";
    echo '<a href="http://localhost/userlogin/login.php">'.iconv("GB2312","UTF-8",'���µ�¼').'</a>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
<p><?php echo iconv("GB2312","UTF-8",'�û�����').$_COOKIE["user"] ?></p>
<p><?php echo iconv("GB2312","UTF-8",'�޸�����') ?></p>
<form action="update.php" method="post">
<p><?php echo iconv("GB2312","UTF-8",'ԭ���룺').$pword ?></p>
<?php echo iconv("GB2312","UTF-8",'�����룺') ?> <input type="text" name="pword">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'ȷ���޸�') ?>>
</form>
<p><?php echo iconv("GB2312","UTF-8",'�޸�����') ?></p>
<form action="update.php" method="post">
<p><?php echo iconv("GB2312","UTF-8",'ԭ���䣺').$email ?></p>
<?php echo iconv("GB2312","UTF-8",'�����䣺') ?> <input type="text" name="email">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'ȷ���޸�') ?>>
</form>
<form action="delete.php" method="post">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'ɾ���˻�') ?>>
</form>


</body>

</html>