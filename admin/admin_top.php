<div class="container">
<?php
	session_start();

	extract($_POST);
	extract($_GET);
	unset($_POST,$_GET);
	if (isset($logout) && $logout == 1)
	{
		unset($_SESSION['user']);
		$_SESSION=array();
		unset($_SESSION);
		setcookie(session_name(),"",time()-1);
		echo "<script>alert('logout successfully!!!');window.location='../index.php';</script>";
	}		
?>
		<div class="well"> 
			<div style="float:left">
<?
	echo "【<a href='admin_index.php?name=issue'>ISSUES HOME</a>】";
	if ($_SESSION['user']==1)
		echo " | <a href=\"add_issue.php\">Add issue</a>";
	
	echo "【<a href='admin_index.php?name=version'>VERSION HOME</a>】";
		if ($_SESSION['user']==1)
		echo " | <a href=\"add_verlist.php\">Add Version</a>";
	
	echo "【<a href='admin_index.php?name=wiki'>Wiki</a>】";
		if ($_SESSION['user']==1)
		echo " | <a href=\"add_wiki.php\">Add Wiki</a>"; 
	if ($_SESSION['user']==1)
		echo " | <a href=\"admin_top.php?logout=1\">Logout</a>";
?>
			</div>
		</div>
</div>