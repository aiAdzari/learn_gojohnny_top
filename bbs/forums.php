<?php
$login = false;
session_start();

$page= isset($_GET['page']) ?$_GET['page'] : 1 ;//接收页码
$page= !empty($page) ? $page : 1;
if (empty($_GET['F']))
{
	$F=!empty($_SESSION['F'])?$_SESSION['F']:1;
}
else
{
	$_SESSION['F']=$_GET['F'];
	$F=$_GET['F'];
}


// 创建连接
require('conn.php');

$table_name="tiopic";//查取表名设置
$perpage=5;//每页显示的数据个数
//最大页数和总记录数
$total_sql="select count(*) from $table_name";
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
$sql="select * from tiopic where main_id = '$F' order by id desc limit $start ,$perpage";//获取帖子信息
$que=mysqli_query($conn,$sql);
if (!$que) {
	printf("Error: %s\n", mysqli_error($conn));
	exit(); //这一段代码救了我的命，拯救了我一晚上，在此留下记号。
}
$sum=mysqli_num_rows($que);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>板块</title>
    <style>
        .cen {
            border: none;
            width: 50%;
            margin: 0 auto;
            height: 40px;
            background-color: rgba(34, 35, 62, 0.08);
        }

        .left {
            width: auto;
            float: left;
        }

        .right {
            width: 87px;
            height: 30px;
            background-color: #CF772B;
            float: right;
            margin-top: 8px;
        }

        .title {
            background-color: #8FBC8F;
            color: white;
        }

        .list {
            margin-left: 12px;
        }
    </style>
</head>

<body>
    <div class="cen">
        <div class="left">
            <?php
 $sql1="select forum_name from forums where id='$F'";
 $squ1=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($squ1);
 $forum_name=$row['forum_name'];
 echo "<a href=\"index.php\">BBS主页</a>-->>$forum_name";
 ?>
        </div>
        <div class="right"><a style="color: white" href="addnew.php">
                <?php
			if(check_login() > 0)
			{
				echo "发布新贴";
			}?>
            </a>
            <a style="color: white" href="login.php">
                <?php
			if(check_login() == false)
			{
				echo "[登录/注册]";
			}
			?>
            </a> </div>
    </div>
    <table width="50%" border="1" cellpadding="8" cellspacing="0" align="center">
        <tr class="title">
            <td colspan="3">帖子列表 <span class="list">[<a style="color: white" href="index.php">返回</a> ]</span>
                <span style="float: right"><a style="color: white" href="userhome.php">
                        <?php
			if(check_login() > 0)
			{
				echo "欢迎！" . $_SESSION['username'];
			}?>
                    </a></span>
            </td>
        </tr>
        <tr>
            <td width="50%">主题列表</td>
            <td width="30%">作者</td>
            <td width="20%">最后更新</td>
        </tr>
        <?php
    if($sum>0) {
 while($row=mysqli_fetch_array($que)) {
 ?>
        <tr height="83px">
            <td width="50%">
                <div><a href="thread.php?id=<?php echo $row['id']?>" </a><?php echo $row['title']?> </div> </td> <td
                        width="30%"><?php echo $row['author'] ?>
            </td>
            <td width="20%"><?php echo $row['last_post_time']?></td>
        </tr>
        <tr>
            <td colspan="3">
                <?php }
                   }
 else{
 echo "<tr><td colspan='5'>本版块没有帖子.....</td></tr>";
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
            </td>
        </tr>
    </table>
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