<?php
	echo("starting...");
	
	$myTextFile = fopen("colors.txt", 'r');
	$myXMLFile = fopen("colors.xml", 'w');
	
	echo("<br>files opened...");
	
	fwrite($myXMLFile, "<?xml version=".chr(34)."1.0".chr(45)." ?> \r\n");
	fwrite($myXMLFile, "<palette> \r\n");
	
	echo("<br>generating colors...");
	
	while(!feof($myTextFile)){
		$currentLine = trim(fgets($myTextFile));
		fwrite($myXMLFile, chr(9)."<color name=".chr(34).$currentLine.chr(34)."> \r\n");
		
		$currentLine = trim(fgets($myTextFile));
		fwrite($myXMLFile, chr(9).chr(9)."<red>".$currentLine."</red> \r\n");
		
		$currentLine = trim(fgets($myTextFile));
		fwrite($myXMLFile, chr(9).chr(9)."<green>".$currentLine."</green> \r\n");
		
		$currentLine = trim(fgets($myTextFile));
		fwrite($myXMLFile, chr(9).chr(9)."<blue>".$currentLine."</blue> \r\n");
		
		fwrite($myXMLFile, chr(9)."</color> \r\n");
	}
	
	fwrite($myXMLFile, "</palette> \r\n");
	
	echo("<br>cleaning up...");
	
	fclose($myTextFile);
	fclose($myXMLFile);
	
	$myTextFile = NULL;
	$myXMLFile = NULL;
	$currentLine = NULL;
	
	echo("<br>finished!");
	
?>