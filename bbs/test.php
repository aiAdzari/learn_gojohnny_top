<?php
$login = false;
session_start(); //链接session
$_SESSION['login'] = null;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>测试</title>
</head>
<?php
	require('conn.php');
	$username = $_SESSION['username'];
	$sql="select * from member where username= '$username'";      

//从数据库查询信息
$que=mysqli_query($conn,$sql);
if (!$que) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
}
$row=mysqli_fetch_array($que);
	echo($row['username']);
	echo "<br>" . $row['password'];
	echo($row['level']);
	echo($row['title']);
	?>
<body>
</body>
</html>