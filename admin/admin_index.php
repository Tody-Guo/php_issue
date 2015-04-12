<?php
	session_start();
	extract($_POST);
	extract($_GET);
	unset($_POST,$_GET);
	
	if (isset($passwd) && $passwd == "666666"){
		$_SESSION['user']=1;
	}
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
	include "admin_top.php";
?>
<div class="container">
		<div class="row-fluid">
			<div class="span1">
				<?
					switch($name){
						case "issue":
							include "admin8.php";
							break;
						case "version":
							include "admin_ver.php";
							break;
						case "wiki":
							include "admin_wiki.php";
							break;
						default:
							echo "<div>欢迎您来到管理页面！请点击上面的相应内容进行管理，谢谢合作~</div>";
					} 
				?>
			</div>
    	</div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<?
	include '../bottom.php';
?>
</body>
<html>
<?  
	$db->close();
?>
