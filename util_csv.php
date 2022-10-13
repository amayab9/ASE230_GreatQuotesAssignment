<?php

#reads contents of CSV-formatted file into a PHP array.
function rFile($csvAuthor = "../data/authors.csv") {
	$csvArray = array();
	$file = fopen($csvAuthor, 'r');
	while ($line = fgetcsv($file)) {
	  $csvArray[] = $line;
	}
	return $csvArray;
	fclose($file);
}

#Reads contents of CSV-formatted file and returns specified row.
function rRow($index, $csvFile = "../data/authors.csv") {
	$counter = 0;
	$csvArray = array();
	$file = fopen($csvFile, 'r');
	while ($line = fgetcsv($file)) {
	  $csvArray[] = $line;
		if ($counter == $index) { $returnRow = $line; }
	  $counter++;
	}
	fclose($file);
	return $returnRow;
}

#adding a new record in a CSV-formatted file
function cRow($newData, $csvFile = '../data/quotes.csv') {
	$file = fopen($csvFile, 'a');
	fputcsv($file, $newData);
	fclose($file);
}

#modifying a specific row of a CSV-formatted file.
function modRow($index, $updatedData, $csvFile = '../data/quotes.csv') {
	$csvArray = array();
	$x = 0;
	$handle = fopen($csvFile, 'r');
	while (!feof($handle)) {
	  $line = fgetcsv($handle,1000,",");
	  //conditional checks if the current line is empty
	  if($line == "")
		  break;
	  $csvArray[] = $line;
	}
	fclose($handle);
	//Conditional statement used to modify data in csvArray
	if($index == 0){
		array_splice($csvArray[$index], 0, count($csvArray[$index]), $updatedData);
	} else {
		array_splice($csvArray[$index], 0, count($csvArray[$index]), $updatedData);
	}

	$handle2 = fopen($csvFile, 'w');
	for($i = 0; $i < count($csvArray); $i++){
		fputcsv($handle2, $csvArray[$i]);
	}
	fclose($handle2);
}

#deletes a line from the CSV file
function dRow($index, $csvFile = 'data/quotes.csv'){
	$handle = fopen($csvFile, 'r+');
	$temp = fopen('temp.csv', 'w+');
	$counter = 0;
	while (!feof($handle)){
		$line = fgets($handle);
		if($counter == $index){
			fputs($temp, "");
		} else {
			fputs($temp, $line);
		}
		$counter++;
	}
	fclose($handle);
	fclose($temp);
	rename('temp.csv',$csvFile);
}



#(Leaves an empty line)
function clRow($index, $csvFile = '../data/quotes.csv'){
	$handle = fopen($csvFile, 'r+');
	$temp = fopen('temp.csv', 'w+');
	$counter = 0;
	while (!feof($handle)){
		$line = fgets($handle);
		if($counter == $index){
			fputs($temp, PHP_EOL);
		} else {
			fputs($temp, $line);
		}
		$counter++;
	}
	fclose($handle);
	fclose($temp);
	rename('temp.csv',$csvFile);
}


#(Broken) modifying the record on a row of a CSV-formatted file.
function mRowBroken($index, $updatedData) {
	$csvArray = array();
	$counter = 0;
	$file = fopen('../data/quotes.csv', 'r+');
	while (($line = fgetcsv($file)) !== FALSE) {
	  $csvArray[] = $line;
	}
	rewind($file);
	foreach ($csvArray as $line) {
		if ($counter == $index) {
				fputcsv($file, $updatedData);
		}
		else {
			fputcsv($file, $line);
		}
		$counter++;
	}
	fclose($file);
}

#(Works only for quotes.csv) deletes an line from the CSV file
function sBrokenDeleteRow($index, $csvFile) {
	$updatedData = array();
	$csvArray = array();
	$x = 0;
	$handle = fopen($csvFile, 'r');
	while (!feof($handle)) {
	  $line = fgetcsv($handle,1000,",");
	  //conditional checks if the current line is empty
	  if($line == "")
		  break;
	  $csvArray[] = $line;
	}
	fclose($handle);
	$handle2 = fopen($csvFile, 'w');
	if($index == 0){
		array_splice($csvArray, $index, $index+1);
	} else {
		array_splice($csvArray, $index, $index);
	}

	for($i = 0; $i < count($csvArray); $i++){
		fputcsv($handle2, $csvArray[$i]);
	}
	fclose($handle2);
}

#(Doesn't Work) deleting an whole line from the CSV file
function dRowBroken($index) {
	$updatedData = array();
	$csvArray = array();
	$counter = 0;
	$file = fopen('../data/quotes.csv', 'r+');
	while (($line = fgetcsv($file)) !== FALSE) {
	  $csvArray[] = $line;
	}
	rewind($file);
	foreach ($csvArray as $line) {
		if ($counter == $index) {
				$counter++;
				continue;
		}
		else {
			fputcsv($file, $line);
		}
		$counter++;
	}
	fclose($file);
}

#(could work better) leaves an empty line
function outClearRow($index) {
	$csvArray = array();
	$counter = 0;
	$handle = fopen('../data/quotes.csv', 'r+');
	while (($line = fgets($handle)) !== FALSE) {
	  $csvArray[] = $line;
	}
	fclose($handle);
	foreach ($csvArray as $line) {
		if ($counter == $index) {
				$csvArray[$counter] = PHP_EOL;
		}
		$counter++;
	}
	$handle = fopen('../data/quotes.csv', 'w+');
	foreach ($csvArray as $line){
		fputs($handle, $line);
	}
	fclose($handle);
}
?>
