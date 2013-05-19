<?php
	include 'inc/conn.php';
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<head>
<title>验证问题解决方案 管理单</title>
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
			echo "<script>alert('Data has deleted!!!');window.location='admin8.php';</script>";
		}
	}
?>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container">
	<div class="page-header alert text-warning"><li><h4>验证问题汇总表 管理</h4></li></div>
	<div>
		<table border=1 cellpadding=0 class="table table-hover">
		<tr><th>Item</th><th>客户问题点</th><th>详细状况</th><th>发现时间</th><th>Admin</th></tr>
<?
		$db = new mysql();
		$db->query("select * from validate_issues");
		$num = $db->db_num_rows();
		for($i=0; $i<$num; $i++){
			$row = $db->fetch_assoc();
			$item = $i + 1;
			echo "<tr>";
			echo "<td>$item</td>";
			echo "<td><a href=\"review_issue.php?id=".$row['id']."\">".htmlspecialchars_decode($row['val_reason'])."</a></td>";
			echo "<td>".htmlspecialchars_decode($row['val_content'])."</td>";
			echo "<td>".$row['val_date']."</td>";
			echo "<td><a href=\"mod_issue.php?id=".$row['id']."\">改</a>|<a href=\"admin8.php?id=".$row['id']."&act=del\">删</a></td>";
			echo "</tr>\n";
		}
?>
		</table>
	</div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<?
include 'bottom.php';
?>
</body>
<html>
<?  
	$db->close();
?>
