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
$email = $pword = $upword = $uemail = "";
$conn=mysqli_connect($servername, $username, $password, $dbname);
// �������
if (mysqli_connect_errno())
{
    echo "����ʧ��: " . mysqli_connect_error();
}
$sql="SELECT * FROM MyGuests WHERE username='".$_COOKIE["admin"]."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$pword=$row["pword"];
$email=$row["email"];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

if(isset($_POST["pword"]))
{
    $sql= "UPDATE MyGuests SET pword='".$_POST["pword"]."' WHERE username='".$_COOKIE["admin"]."'";
    if (mysqli_query($conn, $sql)) {
        echo iconv("GB2312","UTF-8",'�޸ĳɹ�')."<br>";
        echo '<a href="http://localhost/userlogin/login.php">'.iconv("GB2312","UTF-8",'���µ�¼').'</a>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else if(isset($_POST["email"]))
{
    $sql= "UPDATE MyGuests SET email='".$_POST["email"]."' WHERE username='".$_COOKIE["admin"]."'";
    if (mysqli_query($conn, $sql)) {
        echo iconv("GB2312","UTF-8",'�޸ĳɹ�')."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}



if (isset($_POST["uname"]))
{
    setcookie("suser",$_POST["uname"],time()+3600);
    $sql="SELECT * FROM MyGuests WHERE username='".$_POST["uname"]."'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        $upword=$row["pword"];
        $uemail=$row["email"];
    }
    else {
        echo iconv("GB2312","UTF-8",'���û�������')."<br>";
    }
}

if(isset($_COOKIE["suser"]))
{
if(isset($_POST["upword"]))
{
    $sql= "UPDATE MyGuests SET pword='".$_POST["upword"]."' WHERE username='".$_COOKIE["suser"]."'";
    if (mysqli_query($conn, $sql)) {
        echo iconv("GB2312","UTF-8",'�޸ĳɹ�')."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else if(isset($_POST["uemail"]))
{
    $sql= "UPDATE MyGuests SET email='".$_POST["uemail"]."' WHERE username='".$_COOKIE["suser"]."'";
    if (mysqli_query($conn, $sql)) {
        echo iconv("GB2312","UTF-8",'�޸ĳɹ�')."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}
else echo iconv("GB2312","UTF-8",'δָ���û�')."<br>";
}
mysqli_close($conn);
?>
<p><?php echo iconv("GB2312","UTF-8",'����Ա��').$_COOKIE["admin"] ?></p>
<p><?php echo iconv("GB2312","UTF-8",'�޸�����') ?></p>
<form action="adminmanage.php" method="post">
<p><?php echo iconv("GB2312","UTF-8",'ԭ���룺').$pword ?></p>
<?php echo iconv("GB2312","UTF-8",'�����룺') ?> <input type="text" name="pword">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'ȷ���޸�') ?>>
</form>
<p><?php echo iconv("GB2312","UTF-8",'�޸�����') ?></p>
<form action="adminmanage.php" method="post">
<p><?php echo iconv("GB2312","UTF-8",'ԭ���䣺').$email ?></p>
<?php echo iconv("GB2312","UTF-8",'�����䣺') ?> <input type="text" name="email">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'ȷ���޸�') ?>>
</form>
<p><?php echo iconv("GB2312","UTF-8",'���������û�') ?></p>
<form action="adminmanage.php" method="post">
<?php echo iconv("GB2312","UTF-8",'�û�����') ?> <input type="text" name="uname">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'��ѯ�˻�') ?>>
</form>
<p><?php echo $_COOKIE["suser"]?></p>
<form action="adminmanage.php" method="post">
<p><?php echo iconv("GB2312","UTF-8",'ԭ���룺').$upword ?></p>
<?php echo iconv("GB2312","UTF-8",'�����룺') ?> <input type="text" name="upword">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'ȷ���޸�') ?>>
</form>
<p><?php echo iconv("GB2312","UTF-8",'�޸�����') ?></p>
<form action="adminmanage.php" method="post">
<p><?php echo iconv("GB2312","UTF-8",'ԭ���䣺').$uemail ?></p>
<?php echo iconv("GB2312","UTF-8",'�����䣺') ?> <input type="text" name="uemail">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'ȷ���޸�') ?>>
</form>
<form action="delete.php" method="post">
<input type="submit" value=<?php echo iconv("GB2312","UTF-8",'ɾ�����˻�') ?>>
</form>
</body>

</html>