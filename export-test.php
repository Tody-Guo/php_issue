<?php

	$db = new mysql();

/*	for($i=0; $i<$num; $i++){

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
	}