<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>微博留言板</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// 定义变量并默认设置为空值
$nameErr = $emailErr = "";
$name = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
	//检测是否POST表单
{
    if (empty($_POST["name"]))
    {
        $nameErr = "未输入名称";
    }
	else
	{
		$name = test_input($_POST["name"]);
	}
    
    if (empty($_POST["email"]))
    {
      $emailErr = "邮箱是必需的";
    }
    else
    {
        $email = test_input($_POST["email"]);
        // 检测邮箱是否合法
        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "非法邮箱格式"; 
        }
    }
    
    if (empty($_POST["comment"]))
    {
        $comment = "";
    }
    else
    {
        $comment = test_input($_POST["comment"]);
    }
}

function test_input($data)
	//过滤用户输入的非法字符
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>微博</h2>
<form method="post" action=""> 
   请输入内容: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
   <br><br>
   名字: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
<p><span class="error">* 必需字段。</span></p>
<?php
echo "<h2>您输入的内容是:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $comment;
echo "<br>";
?>

</body>
</html>