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
		if (empty($iReason) || empty($iPurpose) ||empty($iScheme) ||empty($iFailrate) ||empty($vContent) || empty($iOwner) 
			|| empty($iStatus)){
			echo "<script>alert('Some content must be filled in data!!');window.history.go(-1);</script>";
			die("Some content must be filled in data!");
		}
	
		if ($act == 'mod')
		{	
			date_default_timezone_set('Asia/Shanghai');
			$dt = date("Y-m-d H:i:s");
			$db = new mysql();
			$table = "validate_issues";
			$condition = "id=".$id;
			$mod_content="val_reason=\"".htmlspecialchars($iReason)."\", val_purpose=\"".htmlspecialchars($iPurpose)."\", 
			val_scheme=\"".htmlspecialchars($iScheme)."\", val_failrate=\"".htmlspecialchars($iFailrate).
			"\", val_content=\"".htmlspecialchars($vContent)."\", val_owner=\"".htmlspecialchars($iOwner)."\", 
			val_status=\"".htmlspecialchars($iStatus)."\", reserved1=\"".$dt."\"";	
			
			$db->update($table, $mod_content, $condition);
			echo "<script>alert('Data changed!');window.location='admin8.php'</script>";
			$db->close();
		}
	}
	
	if (!isset($id))
	{
		echo "<script>alert('ID is empty!');</script>";
		die("ID is empty!");
	}
	$db = new mysql();
	$sql = "select * from validate_issues where id=".$id;
	$db->query($sql);
	$num = $db->db_num_rows();
	if ($num == 0)
		die("No data was found!");
	$row = $db->fetch_assoc();
?>
<title>修改 "<? echo htmlspecialchars_decode($row['val_reason']); ?>" 详细信息</title>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container white-background pagecontent">

<form action="mod_issue.php?id=<? echo $id; ?>&act=mod", method="post" enctype="application/x-www-form-urlencoded">
<div align="center" class="page-header alert text-warning">修改 "<? echo htmlspecialchars_decode($row['val_reason']); ?>" 详细信息</div>
<div>
问题描述:<textarea name="iReason" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['val_reason']); ?></textarea><br />
</div>
<div>
短期对策:<textarea name="iPurpose" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['val_purpose']); ?></textarea><br />
</div>
<div>
长期对策:<textarea name="iScheme" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['val_scheme']); ?></textarea><br />
</div>
<div>
不良状况:<input name="iFailrate" type="text" value="<? echo htmlspecialchars_decode($row['val_failrate']); ?>"><br />
</div>
<div>
分析人员:<input name="iOwner" type="text" value="<? echo htmlspecialchars_decode($row['val_owner']); ?>">
</div>
<div>
问题状态:<select name="iStatus" id="iStatus">
<? 
	if ($row['val_status'] == "Open") 
		echo '<option value="Open" selected="selected">Open</option>';
	else
		echo '<option value="Open">Open</option>';
		
	if ($row['val_status'] == "Tracking") 
		echo '<option value="Tracking" selected="selected">Tracking</option>';
	else
		echo '<option value="Tracking">Tracking</option>';
	
	if ($row['val_status'] == "Close") 
		echo '<option value="Close" selected="selected">Close</option>';
	else
		echo '<option value="Close">Close</option>';	
?>
</select>
</div>
<div>
分析步骤:<br />
<textarea name="vContent" class="xheditor {tools:'full',skin:'default', upImgUrl:'upload.php?immediate=1'}" style="width:940px;height:280px; display:none;">
<?
	echo htmlspecialchars_decode($row['val_content']);
?>
</textarea>
</div>
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
