<?php	include 'inc/conn.php';//	require_once('class-excel-xml.inc.php');
/*
	$db = new mysql();	$sql = "select * from validate_issues";	$db->query($sql);	$num = $db->db_num_rows();	if ($num == 0)		die("No data was found!");*/include_once("xlsxwriter.class.php");$data = array(    array('year','month','amount'),    array('2004','1','220'),    array('2004','2','153.5'),);$writer = new XLSXWriter();$writer->writeSheet($data);$writer->writeToFile('output.xlsx');

/*	for($i=0; $i<$num; $i++){		$row = $db->fetch_assoc();		$doc[] = array (  	htmlspecialchars_decode($row['id']),							htmlspecialchars_decode($row['val_reason']),							htmlspecialchars_decode($row['val_content']),							htmlspecialchars_decode($row['val_purpose']),							htmlspecialchars_decode($row['val_scheme']),							htmlspecialchars_decode($row['val_failrate']),							htmlspecialchars_decode($row['val_owner']),							htmlspecialchars_decode($row['val_date']),							$row['val_status']);

		echo htmlspecialchars_decode($row['id'])."\t";
		echo htmlspecialchars_decode($row['val_reason'])."\t";
		echo htmlspecialchars_decode($row['val_content'])."\t";
		echo htmlspecialchars_decode($row['val_purpose'])."\t";
		echo htmlspecialchars_decode($row['val_scheme'])."\t";
		echo htmlspecialchars_decode($row['val_failrate'])."\t";
		echo htmlspecialchars_decode($row['val_owner'])."\t";
		echo htmlspecialchars_decode($row['val_date'])."\t";
		echo htmlspecialchars_decode($row['val_status'])."\t";
		echo "\n";
	}		$xls = new Excel;	$xls->addArray($doc);	$xls->generateXML("ITS-HISTORY"); */?>