<?php
$login = false;
session_start(); //链接session

require('conn.php'); //连接数据库
if(!check_login())//验证登录状态
{
	echo "<script>alert('请登录后再进行发帖');location.href='index.php';</script>"; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") //检测是否POST表单
{
	$author=$_SESSION['username'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$last_post_time=date("Y-m-d H:i:s");//提取表单数据
	
	$F=$_SESSION['F'];//重要！获取当前论坛id
	
	$sql="insert into tiopic(main_id,author,title,content,last_post_time) values('$F','$author','$title','$content','$last_post_time')";
	$que=mysqli_query($conn,$sql);
	if($que){
    	echo "<script>alert('发布成功qaq');location.href='forums.php';</script>";
	}
	else{
    	echo "<script>alert('出错啦哈哈，有人又要忙了，笑晕了');location.href='addnew.php';</script>";
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>发布帖子</title>
<style>
        .title{
            background-color: #8FBC8F;
            color: white;
        }
        .sub{
            text-align: center;
        }
        .but{
            background-color: #CF772B;
            width: 90px;
            height: 40px;
            font-size: 15px;
            color: white;
            border: none;
        }
        input{
            width: 250px;
            height: 25px;
        }
        .right{
            margin-left: 10px;
        }
    </style>
</head>

<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table width="500px" border="1" cellpadding="8" cellspacing="0" align="center">
        <tr class="title">
            <td colspan="2">
                编辑帖子<span class="right">[<a style="color: white" href="forums.php">返回</a> ]</span>
				<span><a style="color: white;float:right" href="userhome.php">
			<?php
			if(check_login() > 0)
			{
				echo "想说些什么呢？" . $_SESSION['username'];
			}?>
				</a></span>
            </td>
        </tr>
        <tr>
            <td width="100px">标题</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td width="100px">内容</td>
            <td><textarea cols="43" rows="15" name="content">
            </textarea></td>
        </tr>
        <tr class="sub">
            <td colspan="2">
                <input type="submit" value="发布" class="but">
                <input type="reset" value="重置" class="but">
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