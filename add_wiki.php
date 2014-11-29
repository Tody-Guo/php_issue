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
	if (isset($act))
	{
		if (empty($iTitle) || empty($iWritor) ||empty($vContent)){
			echo "<script>alert('Some content must be filled in data!!');window.history.go(-1);</script>";
			die("Some content must be filled in data!");
		}
		if ($act == 'add')
		{	
			date_default_timezone_set('Asia/Shanghai');
			$dt = date("Y-m-d H:i:s");
			$db = new mysql();
			$sql="INSERT INTO `te_wiki_table` (`wiki_title`, `wiki_body`, `wiki_writor`, `wiki_build_date`) 
					values('".htmlspecialchars($iTitle)."', '".htmlspecialchars($vContent)."', 
					'".htmlspecialchars($iWritor)."', '".$dt."')";
			$db->query($sql);
			echo "<script>alert('Data added!');window.location='tewiki.php';</script>";
		}
	}
?>
<title>添加维基内容</title>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container white-background pagecontent">

<form action="add_wiki.php?act=add", method="post">
<div align="center" class="page-header alert text-warning">添加维基内容</div>
<div>
标题:<textarea name="iTitle" type="text" style="width: 866px; height: 25px;"></textarea><br />
</div>
<div>
作者:<textarea name="iWritor" type="text" style="width: 866px; height: 25px;"></textarea><br />
</div>
<div>
维基内容:<br />
<textarea name="vContent" rows="12" cols="80" class="xheditor {tools:'mfull',skin:'default', upImgUrl:'upload.php?immediate=1'}" style="width:940px;height:280px; no-repeat right bottom fixed">
</textarea>
</div>
<div><input class="btn btn-success btn-primary" name="submit" value="Submit" type="submit"><input class="btn btn-danger" name="reset" value="Reset" type="reset"></div>
</form>
</div>
<?
include 'bottom.php';
?>
</body>
<html>
