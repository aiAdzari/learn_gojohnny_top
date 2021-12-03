<?php
	$host = 'localhost:3306';
	$username = 'root';
	$password = 'password';
	$dbname = 'bbs_gojohnny';
	
	$conn = mysqli_connect($host, $username, $password, $dbname);
	mysqli_set_charset($conn,'utf8'); 

	if ($conn == FALSE)
	{
		die('<p>数据库连接失败了小火汁</p>');
	}
?>

