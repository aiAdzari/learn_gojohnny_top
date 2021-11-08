
<?php
$servername = "localhost:3306";
$username = "root";
$password = "UNC?we:0";
 
// 创建连接
$conn = new mysqli($servername, $username, $password);
mysqli_set_charset($conn, 'utf8');
// 检测连接
if ($conn->connect_error) {
    die("fail：" . $conn->connect_error);
} 
echo "连接成功！";
?>
