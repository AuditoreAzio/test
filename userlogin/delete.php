<?php
$servername = "localhost";
$username = "root";
$password = "8278349";
$dbname = "myDB";

$conn=mysqli_connect($servername, $username, $password, $dbname);
// �������
if (mysqli_connect_errno())
{
    echo "����ʧ��: " . mysqli_connect_error();
}
if(isset($_COOKIE["user"])){
$sql= "DELETE FROM MyGuests WHERE username='".$_COOKIE["user"]."'";

if (mysqli_query($conn, $sql)) {
    echo iconv("GB2312","UTF-8",'ɾ���ɹ�')."<br>";
    echo '<a href="http://localhost/userlogin/main.html">'.iconv("GB2312","UTF-8",'������ҳ').'</a>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
elseif (isset($_COOKIE["suser"])){
    $sql= "DELETE FROM MyGuests WHERE username='".$_COOKIE["suser"]."'";
    
    if (mysqli_query($conn, $sql)) {
        echo iconv("GB2312","UTF-8",'ɾ���ɹ�')."<br>";
        echo '<a href="http://localhost/userlogin/adminmanage.php">'.iconv("GB2312","UTF-8",'����').'</a>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else 
    echo iconv("GB2312","UTF-8",'ɾ��ʧ��')."<br>";
mysqli_close($conn);
?>