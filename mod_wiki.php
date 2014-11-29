<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<head>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/xhEditor/xheditor.min.js"></script>
<script type="text/javascript" src="/xhEditor/xheditor_lang/zh-cn.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<?php
	include 'inc/conn.php';

	extract($_POST);
	extract($_GET);
	unset($_POST,$_GET);
	if (isset($act) && isset($id))
	{
		if (empty($iTitle) || empty($iWritor) ||empty($vContent)){
			echo "<script>alert('Some content must be filled in data!!');window.history.go(-1);</script>";
			die("Some content must be filled in data!");
		}
		if ($act == 'mod')
		{	
			date_default_timezone_set('Asia/Shanghai');
			$dt = date("Y-m-d H:i:s");
			$db = new mysql();
			$table = "eng_version_control_table";
			$condition = "id=".$id;
			$mod_content="wiki_title=\"".htmlspecialchars($iTitle)."\", wiki_writor=\"".htmlspecialchars($iWritor)."\", 
			wiki_body=\"".htmlspecialchars($vContent)."\", wiki_update_date=\"".$dt."\"";	
			
			$db->update($table, $mod_content, $condition);
			echo "<script>alert('Data changed!');window.location='admin_ver.php'</script>";
			$db->close();
		}
	}
	
	if (!isset($id))
	{
		echo "<script>alert('ID is empty!');</script>";
		die("ID is empty!");
	}
	$db = new mysql();
	$sql = "select * from te_wiki_table where id=".$id;
	$db->query($sql);
	$num = $db->db_num_rows();
	if ($num == 0)
		die("No data was found!");
	$row = $db->fetch_assoc();
?>
<title>修改 "<? echo htmlspecialchars_decode($row['wiki_title']); ?>" 详细信息</title>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container white-background pagecontent">

<form action="mod_wiki.php?id=<?echo $row['ID']?>&act=mod", method="post" enctype="application/x-www-form-urlencoded">
<div align="center" class="page-header alert text-warning">修改 "<? echo htmlspecialchars_decode($row['wiki_title']); ?>" 详细信息</div>
<div>
标题:<textarea name="iTitle" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['wiki_title']); ?></textarea><br />
</div>
<div>
作者:<textarea name="iWritor" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['wiki_writor']); ?></textarea><br />
</div>
<div>
维基内容:<br />
<textarea name="vContent" rows="12" cols="80" class="xheditor {tools:'mfull',skin:'default', upImgUrl:'upload.php?immediate=1'" style="width:940px;height:280px; no-repeat right bottom fixed">
<? echo htmlspecialchars_decode($row['wiki_body']); ?>
</textarea>
<div><input class="btn btn-success btn-primary" name="submit" value="Change" type="submit"><input class="btn btn-danger" name="reset" value="Reset" type="reset"></div>
</form>
</div>
<?
include 'bottom.php';
?>
</body>
<html>
<?
	$db->close();
?>
