<?php
$login = false;
session_start(); //链接session

if(check_login()<=1)
{
	echo "<script>alert('同学，这里不是你该来的地方= =');location.href='index.php';</script>"; 
}
?>
<!doctype html>
<html>
<head>
	<style>
        table,td,tr{
            border: 1px solid #8FBC8F;
        }
        .btn{
            background-color: #8FBC8F;
            width: 90px;
            height: 40px;
            font-size: 15px;
            color: white;
            border: none;
        }
        #title{
            color: White;
        }
        .input{
            border: 1px solid black;
            width: 200px;
            height: 20px;
        }
        a{
            color: White;
        }
        .right{
            margin-left: 10px;
        }
		.error {
            width: 200px;
            height: 20px;
			color: #FF0000;
		}
    </style>
<meta charset="utf-8">
<title>板块管理</title>
</head>
<body>
	
<?php
	require('conn.php'); //连接数据库
	
	$forum_name = $forum_description = $Subject = $time = ''; 
	$SubjectErr = $nameErr = '';
	$Errsum = 0;
	//初始化变量
	if ($_SERVER["REQUEST_METHOD"] == "POST") //检测是否POST表单
	{
		//表单数据接收
		if (empty($_POST["forum_name"]))
    	{
			$nameErr = "未输入名称";
			$Errsum++;
		}
		else
		{
			$forum_name = test_input($_POST["forum_name"]);
		}
		if (empty($_POST["forum_description"]))
    	{
			$forum_description = "None";
		}
		else
		{
			$forum_description = test_input($_POST["forum_description"]);
		}
		if (empty($_POST["Subject"]))
    	{
			$SubjectErr = "宁输入了马？";
			$Errsum++;
		}
		else
		{
			$Subject = test_input($_POST["Subject"]);
		}
		date_default_timezone_set("PRC");
		$time = date("Y-m-d H:i:s");
		if (!$Errsum)
		{
			$sql="insert into forums (forum_name,forum_description,subject,last_post_time) VALUES ('$forum_name','$forum_description','$Subject','$time')";
			$que = mysqli_query($conn, $sql); //添加到数据库
	
			if($que) //提示
			{
				echo "<script>alert('添加成功');location.href='index.php';</script>";
			}
			else
			{
    			echo "<script>alert('添加失败，请稍后再试');location.href='add_forum.php';</script>";
			}
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
	
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table width="450px" cellspacing="0" cellpadding="8" align="center">
        <tr  id="title">
            <td colspan="2" style="background-color: #8FBC8F">
                   板块管理 <span class="right">[<a href="index.php">返回BBS首页</a> ]</span>
            </td>
        </tr>
        <tr>
            <td width="23%"><strong>板块名称</strong></td>
            <td width="77%"><input name="forum_name" type="text" class="input" value="<?php echo $forum_name;?>">
			<span class="error">* <?php echo $nameErr;?></span></td>
        </tr>
        <tr>
            <td width="23%"><strong>板块主题</strong></td>
            <td width="77%"><input name="Subject" type="text"  class="input" value="<?php echo $Subject;?>">
			<span class="error">* <?php echo $SubjectErr;?></span>
			</td>
        </tr>
        <tr>
            <td><strong>板块简介</strong></td>
            <td><textarea name="forum_description" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" class="btn" value="添加">
                <input type="reset" name="submit2" class="btn" value="清空输入">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
function check_login()
{
	if (isset($_SESSION['login']) && $_SESSION['login'] === true)
		return $_SESSION['level'];
	else
		return false;
}
?>