<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<head>
<title>管理单</title>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container">
	<div class="page-header alert text-warning"><li><h4>后台管理菜单</h4></li></div>
    <div class="container-fluid">
		<div class="row-fluid">
			<div class="span1">
				<div><a href="admin_index.php?admin=issue">问题管理</a></div>
				<div><a href="admin_index.php?admin=version">版本管理</a></div>
				<div><a href="admin_index.php?admin=wiki">维基管理</a></div>
				<div><a href="admin_index.php?admin=user">用户管理</a></div>
			</div>
			<div class="span10">
				
			</div>
    	</div>
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
