<?php
	include 'inc/conn.php';
	require_once('class-excel-xml.inc.php');

	$db = new mysql();
	$sql = "select * from eng_version_control_table";
	$db->query($sql);
	$num = $db->db_num_rows();
	if ($num == 0)
		die("No data was found!");

	for($i=0; $i<$num; $i++){
		$row = $db->fetch_assoc();
		$doc[] = array (  	htmlspecialchars_decode($row['Model_name']),
							htmlspecialchars_decode($row['Customer']),
							htmlspecialchars_decode($row['System_type']),
							htmlspecialchars_decode($row['BIOS_version']),
							htmlspecialchars_decode($row['Bios_release_date']),
							htmlspecialchars_decode($row['EC_version']),
							htmlspecialchars_decode($row['TSP_FW']),
							htmlspecialchars_decode($row['3G_FW']),
							htmlspecialchars_decode($row['TV_FW']),
							htmlspecialchars_decode($row['Owner']),
							htmlspecialchars_decode($row['REMARK']));
	}
	
	$xls = new Excel;
	$xls->addArray($doc);
	$xls->generateXML("ITS-version_control_table.xls"); 

?>