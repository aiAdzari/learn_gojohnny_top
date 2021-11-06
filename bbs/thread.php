<?php
$login = false;
session_start(); //链接session

require('conn.php');

if (empty($_GET['id']))
{
	$id=!empty($_SESSION['id'])?$_SESSION['id']:1;
}
else
{
	$_SESSION['id']=$_GET['id'];
	$id=$_GET['id'];
}

$sql="select * from tiopic where id='$id'";
$que=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($que);

/*$sql_reply="select * from tiopic_reply where main_id='$id'";
$que_reply=mysqli_query($conn,$sql_reply);
$row_reply=mysqli_fetch_array($que_reply);*/
?>

<!doctype html>
<html>
<head>
<title>帖子详情</title>
    <style>
        .left{
            width: "15%";
			text-align: center;
        }
        .bg{
            background-color: #8FBC8F;
            color: white;
			text-align: center;
        }
        .fh{
            margin-left: 18px;
			float: right;
        }
        .spa{
            margin-left: 25px;
        }
        .ind{
            text-indent:2em;
			width: "";
        }
		.btn{
            background-color: #CF772B;
            width: 90px;
            height: 40px;
            font-size: 15px;
            color: white;
            border: none;
        }
	</style>
	<meta charset="utf-8"
></head>

<body>
<table width="45%" border="1" cellpadding="12" cellspacing="0" align="center">
    <tr>
        <td colspan="2" class="bg"><?php echo $row['title'] ?>
 <span class="fh"><a style="color: white" href="forums.php">[返回]</a></span>
		<span class="fh">
			<a style="color: white;float:right" href="userhome.php">
			<?php
			if(check_login() > 0)
			{
				echo "欢迎！" . $_SESSION['username'];
			}?>
			</a>
			<a style="color: white;float:right" href="login.php">
			<?php
			if(check_login() == false)
			{
				echo "[登录/注册]";
			}
			?>
			</a>
		</span>
        </td>
    </tr>
    <tr>
        <td rowspan="2" class="left">
            发帖人：<br>
 <?php
                    echo $row['author']
 ?>
 </td>
        <td>
              发帖时间：<?php echo $row['last_post_time']?>
        </td>
    </tr>
    <tr class="ind">
        <td><?php echo $row['content']?></td>
    </tr>
	<tr style='background: #8B8B8B'>
		<td colspan="2">
    <?php
	$perpage=5;//每页显示的数据个数
	$page= isset($_GET['page']) ?$_GET['page'] : 1 ;//接收页码
	$page= !empty($page) ? $page : 1;
	$total_sql="select count(*) from tiopic_reply where main_id = '$id'";
	$total_result =mysqli_query($conn,$total_sql);
	$total_row=mysqli_fetch_row($total_result);
	$total = $total_row[0];//获取最大页码数
	$total_page = ceil($total/$perpage);//向上取一个整数
	//临界点
	$page=$page>$total_page ? $total_page:$page;//当下一页数大于最大页数时的情况
	$page= $page ? $page : 1;
	//分页设置初始化
	$start=($page-1)*$perpage;
	//$start = 0;
	$sql_reply="select * from tiopic_reply where main_id = '$id' order by id asc limit $start ,$perpage";//获取帖子信息
	$que_reply=mysqli_query($conn,$sql_reply);
	$reply_num = mysqli_num_rows($que_reply);//回复个数		
   
	/*
	if($reply_num == 0){
 echo "<tr>
                 <td colspan='2'>还没有人回复楼主，笑晕了。</td>
             </tr>";
    }else{
 echo "<tr>
                <td>回复人:".$row_reply['author']. ".".$row_reply['last_post_time']."</td>
                <td>".$row_reply['content']."</td>
           </tr>";
    }*/

    if($reply_num>0) {
 while($row_reply=mysqli_fetch_array($que_reply)) {
 ?>
 <tr height="">
        <td class="left">回复人:<br><?php echo $row_reply['author'] . "<br>回复时间：<br>" . $row_reply['last_post_time'] ?></td>
        <td class="ind"><?php echo $row_reply['content']?></td>
    </tr>
                    <?php }
                   }
 else{
 echo "<tr>
                 <td colspan='2'>还没有人回复楼主，笑晕了。</td>
             </tr>";
                    } ?>
 </td>
            </tr>
    <tr>
        <td colspan="5">
            <div id="baner" style="margin-top: 20px">
                <a href="<?php
                echo "$_SERVER[PHP_SELF]?page=1"
 ?>">首页</a>
                &nbsp;&nbsp;<a href="<?php
                echo "$_SERVER[PHP_SELF]?page=".($page-1)
 ?>">上一页</a>
                <!--显示123456等页码按钮-->
 <?php
	if ($total_page <= 10)//总页小于10页时
	{
		for($i=1;$i<=$total_page;$i++)
		{
 			if($i==$page){//当前页为显示页时加背景颜色
 			echo "<a  style='padding: 5px 5px;background: #000;color: #FFF' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                    }
		else{
 		echo "<a  style='padding: 5px 5px' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                    }
          }
	}
	else
	{
		if ($page > 10)
		{
			for($i=$page-5;$i<=$page+5;$i++)
			{
 			if($i==$page){//当前页为显示页时加背景颜色
 			echo "<a  style='padding: 5px 5px;background: #000;color: #FFF' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                    }
			else{
 			echo "<a  style='padding: 5px 5px' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                    }
        	}
		}
		else
		{
			for($i=1;$i<=$total_page;$i++)
			{
 			if($i==$page){//当前页为显示页时加背景颜色
 			echo "<a  style='padding: 5px 5px;background: #000;color: #FFF' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                    }
		else{
 		echo "<a  style='padding: 5px 5px' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                    }
          	}
		}
	}
 ?>
 &nbsp;&nbsp;<a href="<?php
                echo "$_SERVER[PHP_SELF]?page=".($page+1)
 ?>">下一页</a>
                &nbsp;&nbsp;<a href="<?php
                echo "$_SERVER[PHP_SELF]?page={$total_page}"
 ?>">末页</a>
                &nbsp;&nbsp;<span>共<?php echo $total?>条</span>
            </div>
        </td>    </tr>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<tr>
            <td colspan="2">
				<span style="float: left">回复此帖子：<br></span>
                <div style="float: inherit"><span style="float: left"><textarea name="tiopic_reply" cols="45" rows="4"></textarea>
				<div><input type="submit" name="submit" class="btn" value="添加">
				<input type="reset" value="重置" class="btn"></div></div>
				</td>
	</tr>
	</form>
</table>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") //检测是否POST表单
{
	if (check_login()){
		if(empty($_POST['tiopic_reply']))
		{
			echo "<script>alert('笑晕了，未输入哦');location.href='';</script>";
		}
		else
		{
			$tiopic_reply = $_POST['tiopic_reply'];
			$author = $_SESSION['username'];
			$log_time=date("Y-m-d H:i:s");
			$sql_newreply="INSERT into tiopic_reply(main_id,author,content,last_post_time)VALUES
    ('$id','$author','$tiopic_reply','$log_time')";
    		$que_newreply=mysqli_query($conn,$sql_newreply);
			if (!$que_newreply) {
				printf("Error: %s\n", mysqli_error($conn));
			exit();}
    		echo "<script>alert('回复成功辣！');location.href='';</script>";
		}
	}
	else
	{
		echo "<script>alert('对不起，你还未登录！');location.href='';</script>";
	}
}

function check_login()
{
	if (isset($_SESSION['login']) && $_SESSION['login'] === true)
		return $_SESSION['level'];
	else
		return false;
}
?>