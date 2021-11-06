<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>弧矢七的PHP学习页面</title>
	<style>
		.font {
			
		}
	</style>
</head>

<body>
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
<div id="container" style="width:;height:auto;">
 
		<div id="header" style="background-color:#8FBC8F;height:100px">
		  <h1 style="text-align: center;padding: 25px;">欢迎访问我的PHP学习界面！！</strong></h1>
	</div>
 
		<div id="menu" style="background-color:#DCDCDC;height:700px;width:20%;float:left;text-align: center;">
		<a href="index.php"><h4 style="color:#B20EB7">主页</h4></a>
		<a href="weibo.php"><h4 style="color:#B51212">微博系统测试</h4></a>
		<a href="bbs\index.php"><h4 style="color:#0787C5">BBS系统</h4></a>
		<a href="https://www.gojohnny.top" ><h4 style="color:#E37718">gojohnny</h4></a>
		<a href="hello, world.php"><h4 style="color:#12C55E">Hello, World!</h4></a>
	</div>
 
		<div id="content" style="background-color:#EEEEEE;height:700px;width:65%;float:left;text-align: center;">
		<h2>目前任务安排节点</h2>
			<ul style="font-family:'仿宋';font-size: 23px">
			<li>BBS系统大致完成中！权限及功能后台需编写。</li>
			<li>BBS界面、适配改善。</li>
			<li>数据库继续学习！</li>
			<li>CSS样式表学习。</li>
			<li>项目模板确定与更改。</li>
			</ul>
	</div>
	<div id="information" style="background-color:#DCDCDC;height:700px;width:15%;float:left;text-align: center;">
		这个页面已被访问:<h2><?php echo($content); ?>次！</h2>
	</div>
 
		<div id="footer" style="background-color:#2F4F4F;clear:both;text-align:center;color: aliceblue">
		来自 aiAdzari || 本页面代码为第三版</div>
 
</div> 
</body>
</html>