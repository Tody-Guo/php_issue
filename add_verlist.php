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
		if (empty($modelname) || empty($customername) ||empty($systemver) ||empty($biosversion) ||empty($biosdate) || empty($vowner) ){
			echo "<script>alert('Some content must be filled in data!!');window.history.go(-1);</script>";
			die("Some content must be filled in data!");
		}
		if ($act == 'add')
		{	
			date_default_timezone_set('Asia/Shanghai');
			$dt = date("Y-m-d H:i:s");
			$db = new mysql();
			$sql="INSERT INTO `validate_issues` (`Model_name`, `Customer`, `System_type`, `BIOS_version`, `Bios_release_date`, 
				`Owner`, `Build_Date`, `val_status`) values('".htmlspecialchars($modelname)."', '".htmlspecialchars($customername)."', 
					'".htmlspecialchars($systemver)."', '".htmlspecialchars($biosversion)."', '"
				.htmlspecialchars($biosdate)."', '".htmlspecialchars($vowner)."', '".$dt."')";
			$db->query($sql);
			echo "<script>alert('Data added!');window.location='versionlist.php';</script>";
		}
	}
?>
<title>Add validate Issue</title>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container white-background pagecontent">

<form action="add_verlist.php?act=add", method="post">
<div align="center" class="page-header alert text-warning">添加管控内容</div>
<div>
机种名称:<textarea name="modelname" type="text" style="width: 866px; height: 25px;"></textarea><br />
</div>
<div>
客户名称:<textarea name="customername" type="text" style="width: 866px; height: 25px;"></textarea><br />
</div>
<div>
系统版本:<textarea name="systemver" type="text" style="width: 866px; height: 25px;"></textarea><br />
</div>
<div>
BIOS版本:<input name="biosversion" type="text"></textarea><br />
</div>
<div>
发行日期:<input name="biosdate" type="text">
</div>
<div>
EC  版本:<input name="ecversion" type="text"></textarea><br />
</div>
<div>
触屏版本:<input name="tspfw" type="text"></textarea><br />
</div>
<div>
3G版本:<input name="threegfw" type="text"></textarea><br />
</div>
<div>
TV版本:<input name="tvversion" type="text"></textarea><br />
</div>
<div>
管控人员:<input name="vowner" type="text"></textarea><br />
</div>
<div>
备注:<br />
<textarea name="vremark" rows="12" cols="80" class="xheditor {tools:'mfull',skin:'default', upImgUrl:'upload.php?immediate=1'}" style="width:940px;height:280px; no-repeat right bottom fixed">
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
