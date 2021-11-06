<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>设置主页</title>

<?php 
	if (!is_file("count.txt"))
	{
		$count = fopen("count.txt", "w");
		fwrite($count, 1);
		fclose($count);
		return 0;
	}
	else
	{
		$count = fopen("count.txt", "r");
		$content = fread($count, 9);
		fclose($count);
		$count = fopen("count.txt", "w");
		$content++;
		fwrite($count, $content);
		fclose($count);
	}
	
	?>
</head>
<body>
	<form name="id" action="./shenhe.php" method="post">
		自定义学号：<input type="text" name="id"><br>
		自定义姓名：<input type="text" name="name"><br>
		<input type="submit" value="确认">
	</form>


<p>这个页面已被访问:<h2><?php echo($content); ?>次！</p>
</body>
</html>