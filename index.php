<?php
	include 'inc/conn.php';
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<head>
<title>问题解决方案(Issue Tracking System)</title>
<?
	$view=0;  /*default is list*/
	
	extract($_POST);
	extract($_GET);
	unset($_POST,$_GET);
	if (isset($view))
	{
		if ($view == "1"){
			$view=1;
		}else{
			$view=0;
		}
	}

?>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container">
	<div class="page-header alert text-warning"><li><h4>问题点汇总表(Issue Tracking System)</h4></li></div>
	<div class="well"> 
		<div style="float:left">
			<form class="form-search">
				问题点搜索：<input type="text" class="input-medium search-query" name="search"><button type="submit" class="btn">Search</button>
			</form>
		</div>
		<div style="float:right">视图：<a href="index.php?view=0">列表</a> | <a href="index.php?view=1">详细</a></div>
	</div>
	
	<div>
		<table border=1 cellpadding=0 class="table table-hover">
<? 		if ($view == 1){ 
			echo '<tr><th>Item</th><th>问题点</th><th>详细状况</th><th>发现时间</th><th>状态</th></tr>';
		}else{
			echo '<tr><th>Item</th><th>问题点</th><th>分析人员</th><th>发现时间</th><th>状态</th></tr>';
		}
		$db = new mysql();
		if (isset($search))
		{
			$db->query("select * from validate_issues where val_reason like '%$search%' ORDER BY val_date DESC");		
		}else
			$db->query("select * from validate_issues ORDER BY val_date DESC");
		$num = $db->db_num_rows();
		for($i=0; $i<$num; $i++){
			$row = $db->fetch_assoc();
			$item = $i + 1;
			echo "<tr>";
			echo "<td>$item</td>";
			echo "<td><a href=\"review_issue.php?id=".$row['id']."\">".htmlspecialchars_decode($row['val_reason'])."</a></td>";
			if ($view == 1){
				echo "<td>".htmlspecialchars_decode($row['val_content'])."</td>";
			}else{
				echo "<td>".$row['val_owner']."</td>";
			}
			echo "<td>".$row['val_date']."</td>";
			if ($row['val_status']=="Open")
				echo "<td><font color=\"red\">".$row['val_status']."</font></td>";
			else if ($row['val_status']=="Tracking")
				echo "<td><font color=\"BLUE\">".$row['val_status']."</font></td>";
			else
				echo "<td>".$row['val_status']."</td>";
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
