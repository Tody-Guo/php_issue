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
<title>查看 "<? echo htmlspecialchars_decode($row['wiki_title']); ?>" 详细信息</title>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container white-background pagecontent">

<form action="#", method="post" enctype="application/x-www-form-urlencoded">
<div align="center" class="page-header alert text-warning">查看 "<? echo htmlspecialchars_decode($row['wiki_title']); ?>" 详细信息</div>
<div>
标题:<textarea name="iTitle" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['wiki_title']); ?></textarea><br />
</div>
<div>
作者:<textarea name="iWritor" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['wiki_writor']); ?></textarea><br />
</div>
<div>
维基内容:<br />
<textarea name="vContent" rows="12" cols="80" class="xheditor {tools:'mini'}" style="width:940px;height:280px; no-repeat right bottom fixed">
<? echo htmlspecialchars_decode($row['wiki_body']); ?>
</textarea>
</div>
<div><input class="btn btn-success btn-primary" name="submit" value="Ok" type="submit"><input class="btn btn-danger" name="reset" value="Reset" type="reset"></div>
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
