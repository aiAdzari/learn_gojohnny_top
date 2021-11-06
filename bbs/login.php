<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>登陆界面</title>
    <style type="text/css">
        table{
            height: 300px;
        }
        input{
            width: 190px;
            height: 25px;
        }
        .title{
            background-color:#8FBC8F ;
            color: white;
            border: none;
        }
        .but{
            width: 140px;
            height: 43px;
        }
        .spa{
            margin-left: 10px;
        }
    </style>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" name="myform" >
    <table width="400px" border="1" cellpadding="12" cellspacing="1" align="center">
        <tr>
            <td colspan="2" class="title">登录<span class="spa">[<a style="color: white"  href="index.php">返回首页]</a></span>
				<span class="spa"><a style="color: white; float: right"  href="reg.html">[前往注册]</a></span></td>
        </tr>
        <tr>
            <td width="110px">用户名</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td width="110px">密码</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
				<input type="hidden" name="gourl" value="<?php echo $gourl ?>">
                <button class="but" style="text-align: center">立即登录</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
$login = false;
session_start(); //链接session
$_SESSION['login'] = null;

require('conn.php'); //链接数据库

if ($_SERVER["REQUEST_METHOD"] == "POST") //检测是否POST表单
{
	$username=$_POST['username'];
$password=md5($_POST['password']); //获取用户名与密码

if($username=='')
{
	echo "<script>console.log('请输入用户名');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
	exit();
}
if($password=='')
{
    echo "<script>console.log('请输入密码');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
    exit();
}
$sql="select id,username,password,level,title,log_time from member where username= '$username'";      

//从数据库查询信息
$que=mysqli_query($conn,$sql);
if (!$que) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
}
$row=mysqli_fetch_array($que);
if($row){
    if($password !=($row['password']) || $username !=$row['username']){
        //echo "<script>console.log('密码错误，请重新输入');location='login.html'</script>";
		echo "<script>alert('密码错误，请重新输入');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
        exit;
    }
    else{
        $_SESSION['username']=$row['username'];
        $_SESSION['id']=$row['id'];
		$_SESSION['login']=true;
		$_SESSION['level']=$row['level'];
		$_SESSION['title']=$row['title'];
		$_SESSION['log_time']=$row['log_time'];	
        echo "<script>console.log('登录成功');location.href='index.php';</script>";
		//echo "<script>alert('登录成功');location.href='index.php'".$_SERVER["HTTP_REFERER"]."';</script>";
    }
}else{
    echo "<script>alert('您输入的用户名不存在');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    exit;
}
}
?>