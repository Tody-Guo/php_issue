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
		echo "<script>alert('logout successfully!!!');window.location='index.php';</script>";
	}
?>
		<div class="well"> 
			<div style="float:left">
<?
	echo "【<a href='index.php'>ISSUES HOME</a>】";
	echo "【<a href=\"versionlist.php\">VERSION HOME</a>";
	echo " | <a href=\"export.php\">Export</a>】";
	echo "【<a href=\"tewiki.php\">Wiki</a>】";
	
	if ($_SESSION['user']==1)
		echo " | <a href=\"top.php?logout=1\">Logout</a>";
?>
			</div>
		</div>
</div>