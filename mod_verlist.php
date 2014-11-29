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
		if (empty($modelname) || empty($customername) ||empty($systemver) ||empty($biosversion) ||empty($biosdate) || empty($vowner) ){
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
			$mod_content="Model_name=\"".htmlspecialchars($modelname)."\", Customer=\"".htmlspecialchars($customername)."\", 
			System_type=\"".htmlspecialchars($systemver)."\", BIOS_version=\"".htmlspecialchars($biosversion).
			"\", Bios_release_date=\"".htmlspecialchars($biosdate)."\", Owner=\"".htmlspecialchars($vowner).
			"\", EC_version=\"".htmlspecialchars($ecversion)."\", TSP_FW=\"".htmlspecialchars($tspfw).
			"\", 3G_FW=\"".htmlspecialchars($threegfw)."\", TV_FW=\"".htmlspecialchars($tvversion).
			"\", REMARK=\"".htmlspecialchars($vremark)."\", Update_Date=\"".$dt."\"";	
			
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
	$sql = "select * from eng_version_control_table where id=".$id;
	$db->query($sql);
	$num = $db->db_num_rows();
	if ($num == 0)
		die("No data was found!");
	$row = $db->fetch_assoc();
?>
<title>查看 "<? echo htmlspecialchars_decode($row['Customer']); ?>" 详细信息</title>
</head>
<body class="background">
<?
	include "top.php";
?>
<div class="container white-background pagecontent">

<form action="mod_verlist.php?id=<?echo $row['ID']?>&act=mod", method="post" enctype="application/x-www-form-urlencoded">
<div align="center" class="page-header alert text-warning">查看 "<? echo htmlspecialchars_decode($row['Customer']); ?>" 详细信息</div>
<div>
机种名称:<textarea name="modelname" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['Model_name']); ?></textarea><br />
</div>
<div>
客户名称:<textarea name="customername" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['Customer']); ?></textarea><br />
</div>
<div>
系统版本:<textarea name="systemver" type="text" style="width: 866px; height: 25px;"><? echo htmlspecialchars_decode($row['System_type']); ?></textarea><br />
</div>
<div>
BIOS版本:<input name="biosversion" type="text" value="<? echo htmlspecialchars_decode($row['BIOS_version']); ?>">
</div>
<div>
发行日期:<input name="biosdate" type="text" value="<? echo htmlspecialchars_decode($row['Bios_release_date']); ?>">
</div>
<div>
EC  版本:<input name="ecversion" type="text" value="<? echo htmlspecialchars_decode($row['EC_version']); ?>">
</div>
<div>
触屏版本:<input name="tspfw" type="text" value="<? echo htmlspecialchars_decode($row['TSP_FW']); ?>">
</div>
<div>
3G版本:<input name="threegfw" type="text" value="<? echo htmlspecialchars_decode($row['3G_FW']); ?>">
</div>
<div>
TV版本:<input name="tvversion" type="text" value="<? echo htmlspecialchars_decode($row['TV_FW']); ?>">
</div>
<div>
管控人员:<input name="vowner" type="text" value="<? echo htmlspecialchars_decode($row['Owner']); ?>">
</div>
<div>
备注:<br />
<textarea name="vremark" rows="12" cols="80" class="xheditor {tools:'mfull',skin:'default', upImgUrl:'upload.php?immediate=1'}" style="width:940px;height:280px; no-repeat right bottom fixed">
<? echo htmlspecialchars_decode($row['REMARK']); ?>
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
