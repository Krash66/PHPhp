<?php

$fileName = $_GET["filePath"];  //$_SERVER["DOCUMENT_ROOT"].

if (file_exists($fileName)) {
	header("Pragma: public"); // required
	header("Expires: 0");
	header("Cache-Control: must-revalidate");   //, post-check=0, pre-check=0
	header("Content-Description: File Transfer");
	header("Content-Type: application/force-download");
	header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".filesize($fileName));
	//readfile($fileName);
	$fp = fopen($fileName, 'rb');
	fpassthru($fp);
	fclose($fp);
	exit;
}

?> 