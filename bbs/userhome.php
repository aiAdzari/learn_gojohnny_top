<?php
$login = false;
session_start(); //链接session
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户中心</title>
<style>
        table,td,tr{
            border: 1px solid #8FBC8F;
        }
        .btn{
            background-color: #CF772B;
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
		.leftitle {
            text-align:center;
		}
</style>
</head>

<body>
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
	?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table width="600px" cellspacing="0" cellpadding="8" align="center">
        <tr  id="title">
            <td colspan="2" style="background-color: #8FBC8F">
                   用户中心 <span class="right">[<a href="index.php">返回BBS首页</a> ]
				[<a style="color: white;" href='un_login.php'>退出账号</a>]
				<a style="color: white;float:right">
			<?php
			if(check_login() > 0)
			{
				echo "欢迎！" . $_SESSION['username'];
			}?>
				</a>
				   </span>
            </td>
        </tr>
        <tr>
            <td width="25%"><strong>您目前的用户组：
				</strong></td>
            <td width="75%"><?php
				if(check_login() == 1)
			{
				echo "<b>普通用户</b><br>您可自由发帖评论，喜喜。";
			}
				if(check_login() == 2)
			{
				echo "<b>管理员</b><br>您拥有所有权限！大概吧！喜喜。";
			}
				if(check_login() == 3)
			{
				echo "<b>弧矢七</b><br>网站还没做完，您在干嘛呢？苦苦";
			}
				?>
			</td>
        </tr>
        <tr>
            <td width="25%"><strong>您的头衔：</strong></td>
            <td width="75%">
				<?php
				if ($row['title'])
				{
					echo "<b>[" . $row["title"] . "]</b>";
				}
				else
				{
					echo "您没有拥有任何一个头衔";
				}
				?>
			</td>
        </tr>
        <tr>
            <td rowspan="2" class="leftitle"><strong>个人简介</strong></td>
            <td height="40px">
				<?php
				if(empty($row['user_description']))
				{
					echo "暂无签名，快在下方添加一个8~";
				}
				else
				{
					echo $row['user_description'];
				}
				?>
                </td>
 
        </tr>
        <tr>
            <td>
                <textarea name="user_description" cols="40" rows="2" ></textarea>
				<input type="submit" name="submit" class="btn" value="添加">
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") //检测是否POST表单
		{
			if(empty($_POST['user_description']))
			{
				echo "<script>alert('未输入不要点好不好= =');location.href='';</script>";
			}
			else
			{
				$user_description = $_POST['user_description'];
				$sql="UPDATE member SET `user_description` = '$user_description' WHERE username = '$username'";
    			$que=mysqli_query($conn,$sql);
				if (!$que) {
				printf("Error: %s\n", mysqli_error($conn));
				exit();}
    			echo "<script>alert('添加签名成功！');location.href='';</script>";
			}
		}
				?>
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