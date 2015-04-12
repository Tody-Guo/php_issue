<?php
	include '../inc/conn.php';
	
	session_start();	
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<head>
<title>问题汇总方案 管理单</title>
<?
	extract($_POST);
	extract($_GET);
	unset($_POST,$_GET);
	if (isset($act) && isset($id))
	{
		if ($act == "del"){
			$db = new mysql();
			$db->delete('validate_issues', "id=".$id);
			$db->close();
			echo "<script>alert('Data has deleted!!!');window.location='admin_index.php?name=issue';</script>";
		}
	}
	if (isset($passwd) && $passwd == "666666"){
		$_SESSION['user']=1;
	}
?>
</head>
<body class="background">
<?
//	include "top.php";
?>
<div class="container">
<? if ($_SESSION['user'] != 1){  ?>

	<div class="page-header alert text-warning">
		<div class="well"> 
			<div style="float:left">
				<form class="form-search">
					密码：<input type="text" class="input-medium search-query" name="passwd"><button type="submit" class="btn">登录</button>
				</form>
			</div>
		</div>
	</div>	
<? } else {?>
	<div class="page-header alert text-warning"><li><h4>问题点汇总表 管理</h4></li></div>
	<div>
		<table border=1 cellpadding=0 class="table table-hover">
		<tr><th>Item</th><th>问题点</th><th>分析人员</th><th>发现时间</th><th>Admin</th></tr>
<?
		$db = new mysql();
		$db->query("select * from validate_issues ORDER BY val_date DESC");
		$num = $db->db_num_rows();
		for($i=0; $i<$num; $i++){
			$row = $db->fetch_assoc();
			$item = $i + 1;
			echo "<tr>";
			echo "<td>$item</td>";
			echo "<td><a href=\"../review_issue.php?id=".$row['id']."\">".htmlspecialchars_decode($row['val_reason'])."</a></td>";
			echo "<td>".htmlspecialchars_decode($row['val_owner'])."</td>";
			echo "<td>".$row['val_date']."</td>";
			echo "<td><a href=\"mod_issue.php?id=".$row['id']."\" rel='tooltip' title='修改问题点'>[改]</a>&nbsp;|&nbsp;<a href=\"admin8.php?id=".$row['id']."&act=del\" rel='tooltip' title='删除问题点，当心哦~~~'><font color='red'>删</font></a></td>";
			echo "</tr>\n";
		}
?>
		</table>
	</div>
</div>
<? }?>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<?
//	include 'bottom.php';
?>
</body>
<html>
<?  
	$db->close();
?>
