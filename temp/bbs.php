<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BBS_gojohnny</title>
	<style>
        table{
            width: 55%;
            margin-top: 10px;
        }
        .title{
            background-color: #B10707;
            font-size: 17px;
            color: white;
        }
        .right{
            margin-left: 120px;
        }
    </style>
</head>
<body>
<table border="1px" cellspacing="0" cellpadding="8"align="center">
    <tr class="title">
        <td COLSPAN="3">
            论坛列表<span class="right">[<a style="color: white" href="add_forum.php">添加</a> ]</span>
        </td>
    </tr>
    <tr>
        <td width="10%"><strong>主题</strong></td>
        <td width="40"><strong>论坛</strong></td>
        <td width="15"><strong>最后更新</strong></td>
    </tr>
<?php
	require('conn.php'); //连接数据库
	$sum = '';
	
	$sql = 'select * from forums';
	$que = mysqli_query($conn, $sql); //获取所有板块表内容
	
	if (!$que) {
	printf("Error: %s\n", mysqli_error($conn));
	exit(); //这一段代码救了我的命，拯救了我一晚上，在此留下记号。
		
	$sum = mysqli_num_rows($que);
}
	if ($sum == 0)
	{
		 echo "<tr><td colspan='3'>无，现在什么都无，苦苦</td></tr>";
	}
	else
	{
		$sum_forums = mysqli_num_rows($que); //计算板块表个数
		while ($row = mysqli_fetch_array($que))
		{?>
			<tr>
                <td><?php echo $row['subject'] ?></td>
                <td><?php echo "<div class=\"bold\"><a class=\"forum\" href=\"forums.php?F=" . $row['id'] . "\">" . $row["forum_name"] . "</a></div>"
 . $row["forum_description"] ?></td>
                <td>
                    <div><?php echo $row["last_post_time"]?></div>
                </td>
            </tr>
            <?php
 		}
	}
	?>
</body>
</html>