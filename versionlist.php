<?php
	include 'inc/conn.php';
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<head>
<title>版本管控系统(Firmware Version Control System)</title>
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
	<div class="page-header alert text-warning"><li><h4>版本管控系统(Firmware Version Control System)</h4></li></div>
	<div class="well"> 
		<div style="float:left">
			<form class="form-search">
				机种搜索：<input type="text" class="input-medium search-query" name="search"><button type="submit" class="btn">Search</button>
			</form>
		</div>
		<div style="float:right">视图：<a href="versionlist.php?view=0">列表</a> | <a href="versionlist.php?view=0">详细</a></div>
	</div>
	
	<div>
		<table border=1 cellpadding=0 class="table table-hover">
<? 		if ($view == 0){ 
			echo '<tr><th>Item</th><th>机种</th><th>客户</th><th>OS版本</th><th>BIOS版本</th><th>EC版本</th><th>负责人</th><th>备注</th></tr>';
		}
		$db = new mysql();
		if (isset($search))
		{
			$db->query("select * from eng_version_control_table where model_name like '%$search%' ORDER BY build_date DESC");		
		}else
			$db->query("select * from eng_version_control_table ORDER BY build_date DESC");
		$num = $db->db_num_rows();
		for($i=0; $i<$num; $i++){
			$row = $db->fetch_assoc();
			$item = $i + 1;
			echo "<tr>";
			echo "<td>$item</td>";
			echo "<td><a href=\"review_verlist.php?id=".$row['ID']."\">".htmlspecialchars_decode($row['Model_name'])."</a></td>";
			echo "<td>".htmlspecialchars_decode($row['Customer'])."</td>";
			echo "<td>".htmlspecialchars_decode($row['System_type'])."</td>";
			echo "<td>".htmlspecialchars_decode($row['BIOS_version'])."</td>";
			echo "<td>".htmlspecialchars_decode($row['EC_version'])."</td>";
			echo "<td>".htmlspecialchars_decode($row['Owner'])."</td>";
			echo "<td><font color=\"red\">".$row['REMARK']."</font></td>";
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
