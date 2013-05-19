﻿<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="/css/bootstrap.css" rel="stylesheet">
<head>
<script type="text/javascript" src="/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="/xhEditor/xheditor.min.js"></script>
<script type="text/javascript" src="/xhEditor/xheditor_lang/zh-cn.js"></script>
<?php
	include 'inc/conn.php';

	extract($_POST);
	extract($_GET);
	unset($_POST,$_GET);
	if (isset($act))
	{
		if (empty($iReason) || empty($iPurpose) ||empty($iScheme) ||empty($iFailrate) ||empty($vContent) || empty($iOwner) 
			|| empty($iStatus)){
			echo "<script>alert('Some content must be filled in data!!');</script>";
			die("Some content must be filled in data!");
		}
		if ($act == 'add')
		{	
			date_default_timezone_set('Asia/Shanghai');
			$dt = date("Y-m-d H:i:s");
			$db = new mysql();
			$sql="INSERT INTO `validate_issues` (`val_reason`, `val_purpose`, `val_scheme`, `val_failrate`, `val_content`, 
				`val_owner`, `val_date`, `val_status`) values('".htmlspecialchars($iReason)."', '".htmlspecialchars($iPurpose)."', 
					'".htmlspecialchars($iScheme)."', '".htmlspecialchars($iFailrate)."', '"
				.htmlspecialchars($vContent)."', '".htmlspecialchars($iOwner)."', '".$dt."', '".htmlspecialchars($iStatus)."')";
			$db->query($sql);
			echo "<script>alert('Data added!');</script>";
		}
	}
?>
<title>Add validate Issue</title>
</head>
<body class="background">
<div class="container white-background pagecontent">

<form action="add_issue.php?act=add", method="post">
<div align="center" class="page-header alert text-warning">添加验证相关信息</div>
<div>
验证原因:<textarea name="iReason" type="text" style="width: 866px; height: 25px;"></textarea><br />
</div>
<div>
验证目的:<textarea name="iPurpose" type="text" style="width: 866px; height: 25px;"></textarea><br />
</div>
<div>
验证手法:<textarea name="iScheme" type="text" style="width: 866px; height: 25px;"></textarea><br />
</div>
<div>
不良状况:<input name="iFailrate" type="text"></textarea><br />
</div>
<div>
验证人员:<input name="iOwner" type="text">
</div>
<div>
验证状态:<select name="iStatus" id="iStatus">
	<option value="Open">Open</option>
	<option value="Tracking">Tracking</option>
	<option value="Close">Close</option>

</select>
</div>
<div>
验证步骤:<br />
<textarea name="vContent" rows="12" cols="80" class="xheditor {tools:'full',skin:'default', upImgUrl:'upload.php?immediate=1'}" style="width:940px;height:280px;">
</textarea>
</div>
<div><input class="btn btn-success btn-primary" name="submit" value="Submit" type="submit"><input class="btn btn-danger" name="reset" value="Reset" type="reset"></div>
</form>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.js"></script>
</body>
<html>
