<?php
require_once ('/usr/home/c2commerce/trademark/trademark_class.php');

$file = "xml/apc120527.xml";
$xml = simplexml_load_file($file);
$applications = $xml->{'application-information'}->{'file-segments'}->{'action-keys'};
$json_array = array();
foreach($applications->{'case-file'} as $case) {
	$trademark = new Trademark_Class();
	//Set Business Information
	$trademark->setRegistrant($case->{'case-file-owners'}->{'case-file-owner'}->{'party-name'});
	$trademark->setStreetAddress($case->{'case-file-owners'}->{'case-file-owner'}->{'address-1'});
	$trademark->setCity($case->{'case-file-owners'}->{'case-file-owner'}->{'city'});
	$trademark->setState($case->{'case-file-owners'}->{'case-file-owner'}->{'state'});
	$trademark->SetCountry($case->{'case-file-owners'}->{'case-file-owner'}->{'country'});
	$trademark->setPostCode($case->{'case-file-owners'}->{'case-file-owner'}->{'postcode'});

	//Set Trademark Information
	$trademark->setMarkIdentification($case->{'case-file-header'}->{'mark-identification'});
	$trademark->setSerialNumber($case->{'serial-number'});
	$trademark->setRegistrationNumber($case->{'registration-number'});
	$trademark->setTransactionDate($case->{'transaction-date'});
	$trademark->setFilingDate($case->{'case-file-header'}->{'filing-date'});
	$trademark->setLastStatusUpdate($case->{'case-file-header'}->{'status-date'});
	$trademark->setDescription($case->{'case-file-statements'}->{'case-file-statement'}->{'text'});

	//Set Address Information
	$trademark->setCorrespondentAddress(
		$case->{'correspondent'}->{'address-1'} . " " .
		$case->{'correspondent'}->{'address-2'} . " " .
		$case->{'correspondent'}->{'address-3'} . " " .
		$case->{'correspondent'}->{'address-4'});
	array_push($json_array, $trademark->buildJSONOutput());
}
echo json_encode($json_array);