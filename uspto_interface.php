<?php
/**
 * The iPatent_office interface sets the contract for the member classes
 * that will interface with the USPTO's trademark xml files
 * that are retrieved from
 * Images: http://www.google.com/googlebooks/uspto-trademarks-application-images.html
 * Text: http://www.google.com/googlebooks/uspto-trademarks-recent-applications.html
 * @author     Aaron Harvey
 * @version    1.0
 *
 */
interface iPatent_office {
	public function setRegistrant($value);
	public function setStreetAddress($value);
	public function setCity($value);
	public function setState($value);
	public function setCountry($value);
	public function setPostcode($value);
	public function setMarkIdentification($value);
	public function setSerialNumber($value);
	public function setRegistrationNumber($value);
	public function setTransactionDate($value);
	public function setFilingDate($value);
	public function setLastStatusUpdate($value);
	public function setDescription($value);
	public function setCorrespondentAddress($value);
	
	public function getRegistrant();
	public function getStreetAddress();
	public function getCity();
	public function getState();
	public function getCountry();
	public function getPostcode();
	public function getMarkIdentification();
	public function getSerialNumber();
	public function getRegistrationNumber();
	public function getTransactionDate();
	public function getFilingDate();
	public function getLastStatusUpdate();
	public function getDescription();
	public function getCorrespondentAddress();
	public function buildJSONOutput();
}
