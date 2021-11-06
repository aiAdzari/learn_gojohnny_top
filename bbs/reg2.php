<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户注册</title>
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
    <script type="text/javascript">
        function checkinput()
        {
            if(myform.username.value=="")
            {
                alert("请输入你的账号");
                myform.username.focus();
                return false;
            }
            if (myform.password.value=="")
            {
                alert("请输入密码");
                myform.password.focus();
                return false;
            }
            if(myform.password.value != myform.password1.value){
                alert("你输入的两次密码不一致，请重新输入！");
                myform.password.focus();
                return false;
            }
        }
    </script>
</head>

<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  onsubmit=" return checkinput();" name="myform">
    <table width="400px" border="1" cellpadding="12" cellspacing="1" align="center">
        <tr>
            <td colspan="2" class="title">用户注册<span class="spa">[<a style="color: white"  href="../index.php">返回首页]</a></span></td>
        </tr>
        <tr>
            <td width="110px">用  户  名</td>
            <td><input type="text" name="username" autocomplete="off"></td>
        </tr>
        <tr>
            <td width="110px">密　　码</td>
            <td><input type="password" name="password" autocomplete="off"></td>
        </tr>
        <tr>
            <td width="110px">确认密码</td>
            <td><input type="password" name="password1"></td>
        </tr>
        <tr>
            <td width="110px">邮　　箱</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button class="but" style="text-align: center">立即注册</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
require('conn.php');// 链接数据库

$login = false;
$_SESSION['login'] = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") //检测是否POST表单
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$email=trim($_POST['email']);
	$log_time=date("Y-m-d H:i:s");

	$sql1="SELECT * from member where username='$username'";
	$que=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array($que);

	if($row){
    	echo"<script>alert('用户名已经被注册');location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
	}else{
		$sql="INSERT into member(username,password,email,log_time)VALUES
    ('$username','$password','$email','$log_time')";
		$que=mysqli_query($conn,$sql);
		if (!$que) {
			printf("Error: %s\n", mysqli_error($conn));
		exit();}
    	echo "<script>alert('注册成功');location.href='login.php';</script>";
	}
}
?>