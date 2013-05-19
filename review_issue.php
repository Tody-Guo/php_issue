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
	/*	if (isset($act) && isset($id))
	{
		if (empty($iReason) || empty($iPurpose) ||empty($iScheme) ||empty($iFailrate) ||empty($vContent) || empty($iOwner) 
			|| empty($iStatus)){
			echo "<script>alert('Some content must be filled in data!!');</script>";
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
			echo "<script>alert('Data changed!');</script>";
			$db->close();
		}
	
	}
	*/
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
<title>查看 "<? echo htmlspecialchars_decode($row['val_reason']); ?>" 详细信息</title>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container white-background pagecontent">

<form action="#", method="post" enctype="application/x-www-form-urlencoded">
<div align="center" class="page-header alert text-warning">查看 "<? echo htmlspecialchars_decode($row['val_reason']); ?>" 详细信息</div>
<div>
验证原因:<textarea name="iReason" type="text" readonly="readonly" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['val_reason']); ?></textarea><br />
</div>
<div>
验证目的:<textarea name="iPurpose" type="text" readonly="readonly" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['val_purpose']); ?></textarea><br />
</div>
<div>
验证手法:<textarea name="iScheme" type="text" readonly="readonly" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['val_scheme']); ?></textarea><br />
</div>
<div>
不良状况:<input name="iFailrate" type="text" readonly="readonly" value="<? echo htmlspecialchars_decode($row['val_failrate']); ?>"><br />
</div>
<div>
验证人员:<input name="iOwner" type="text" readonly="readonly" value="<? echo htmlspecialchars_decode($row['val_owner']); ?>">
</div>
<div>
验证状态:<select name="iStatus" id="iStatus" disabled="disabled" >
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
发现日期:<input name="iOwner" type="text" readonly="readonly" value="<? echo htmlspecialchars_decode($row['val_date']); ?>">
</div>
<div>
更新日期:<input name="iOwner" type="text" readonly="readonly" value="<? echo htmlspecialchars_decode($row['reserved1']); ?>">
</div>
<div>
验证步骤:<br />
<textarea name="vContent"  readonly="readonly" class="xheditor {tools:'mini'}" style="width:940px;height:280px;">
<?
	echo htmlspecialchars_decode($row['val_content']);
?>
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
