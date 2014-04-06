<?php
require_once('includes/config.inc');
require_once('includes/cors.inc');
require_once('library/simple_html_dom.php');

// create HTML DOM
$html 		= file_get_html(SCRAP_URL);

$rowCount 	= 0;

foreach($html->find('table.tbldata14 tr') as $row) {
	$rowCount++;

	//Avoid Table Headers
	if($rowCount == 1) { 
		continue;
	}
	
	$companyName 	= trim(str_replace(array("Add to Watchlist", "Add to Portfolio","\r\n", "\r", "\n", "\t"), "", $row->find('td', 0)->plaintext));
	$percentChange 	= trim($row->find('td', 2)->plaintext);
	
	if(!empty($companyName) && !empty($percentChange)) {
		$insertQuery = "INSERT INTO ws_data (company_name, percent_change) VALUES ('{$companyName}', '{$percentChange}')";
		$mysql->query($insertQuery) or die(mysqli_error());
	}
}

// clean up memory
$html->clear();
unset($html);

echo "Done";