<?php
	include 'inc/conn.php';
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<head>
<title>工程知识库(Engineering Wiki System)</title>
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
	<div class="page-header alert text-warning"><li><h4>工程知识库(Engineering Wiki System)</h4></li></div>
	<div class="well"> 
		<div style="float:left">
			<form class="form-search">
				维基搜索：<input type="text" class="input-medium search-query" name="search"><button type="submit" class="btn">Search</button>
			</form>
		</div>
		<div style="float:right">视图：<a href="tewiki.php?view=0">列表</a> | <a href="tewiki.php?view=1">详细</a></div>
	</div>
	
	<div>	<?if ($view == 0){?>
		<table border=1 cellpadding=0 class="table table-hover">	<?	} ?>
<? 		if ($view == 0){ 
			echo '<tr><th>Item</th><th>标题</th><th>作者</th><th>发布时间</th><th>更新时间</th></tr>';
		}		
		$db = new mysql();
		if (isset($search))
		{
			$db->query("select * from te_wiki_table where wiki_title like '%$search%' ORDER BY wiki_build_date DESC");		
		}else
			$db->query("select * from te_wiki_table ORDER BY wiki_build_date DESC");
		$num = $db->db_num_rows();
		for($i=0; $i<$num; $i++){
			$row = $db->fetch_assoc();			if ($view == 0){
				$item = $i + 1;
				echo "<tr>";
				echo "<td>$item</td>";
				echo "<td><a href=\"review_wiki.php?id=".$row['ID']."\">".htmlspecialchars_decode($row['wiki_title'])."</a></td>";
				echo "<td>".$row['wiki_writor']."</td>";
				echo "<td>".$row['wiki_build_date']."</td>";
				echo "<td>".$row['wiki_update_date']."</td>";
				echo "</tr>\n";			}else{				echo "<div class='well'><h2>".htmlspecialchars_decode($row['wiki_title'])."</h2><strong>编写：</strong>".htmlspecialchars_decode($row['wiki_writor'])."&nbsp;&nbsp;&nbsp;&nbsp;<strong>编写日期：</strong>".htmlspecialchars_decode($row['wiki_build_date']);				echo "<div class='well'>".htmlspecialchars_decode($row['wiki_body'])."</div>";			}
		}	if ($view == 0)
		echo "</table>";?>
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
