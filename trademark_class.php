<?php
require_once('uspto_interface.php');
require_once('uspto_abstract.php');

/**
 * The Trademark_class extends the aUSPTO abstract class and implements the iPatent_office
 * interface in order to accept a list of trademarks, process them and ultimately
 * return an object that can be parsed by JSON
 *
 * @author     Aaron Harvey
 * @version    1.0
 *
 */
class Trademark_class extends aUSPTO implements iPatent_office {
	private static $_type = "trademark";	
	private static $_registrant, $_streetAddress, $_city, $_country, $_postCode, $_markIdentification;
	private static $_registrationNumber, $_description, $_transactionDate, $_filingDate, $_lastStatusUpdate;	
	private static $_serialNumber, $_correspondentAddress, $_state;
	
	/* Get the type of application (ex. Trademark, Patent, etc)
	 * 
	 * Get the type of application that will handle the type
	 * of pdf to output
	 * @author Aaron Harvey
	 * @return string = type of USPTO application
	 */
	public function getType() {
		return self::$_type;
	}

    /* Set the registrant
    *
    * Set the registrant that filed for the particular trademark
    * @author Aaron Harvey
    * @param varchar $value the registrant's name
    */
	public function setRegistrant($value) {
		self::$_registrant = $value;
	}
	
	/* Get the name of the USPTO registrant
	 * 
	 * Returns the name of the registrant associated
	 * with this particular USPTO filing
	 * @author Aaron Harvey
	 * @return string = name of registrant
	 */
	public function getRegistrant() {
		return self::$_registrant;
	}

    /* Set the registrant's street address
    *
    * Set the registrant's address that filed for the particular trademark
    * @author Aaron Harvey
    * @param varchar $value the registrant's street address
    */
	public function setStreetAddress($value) {
		self::$_streetAddress = $value;
	}
	/* Get the name of the registrant's street 
	 * 
	 * Returns the name of the registrant's street associated
	 * with this particular USPTO filing
	 * @author Aaron Harvey
	 * @return string = name of registrant's street
	 */
	public function getStreetAddress() {
		return self::$_streetAddress;
	}

    /* Set the registrant's city
    *
    * Set the registrant's city that filed for the particular trademark
    * @author Aaron Harvey
    * @param varchar $value the registrant's city
    */
	public function setCity($value) {
		self::$_city = $value;
	}
	/* Get the name of the registrant's city
	 * 
	 * Returns the name of the registrant's city associated
	 * with this particular USPTO filing
	 * @author Aaron Harvey
	 * @return string = name of registrant's city
	 */
	public function getCity() {
		return self::$_city;
	}

    /* Set the registrant's state
    *
    * Set the registrant's state that filed for the particular trademark
    * @author Aaron Harvey
    * @param varchar $value the registrant's state
    */
	public function setState($value) {
		self::$_state = $value;
	}
	/* Get the name of the registrant's state (if applicable) 
	 * 
	 * Returns the name of the registrant's state associated
	 * with this particular USPTO filing
	 * @author Aaron Harvey
	 * @return string = name of registrant's state
	 */
	public function getState() {
		return self::$_state;
	}

    /* Set the registrant's country
    *
    * Set the registrant's country that filed for the particular trademark
    * @author Aaron Harvey
    * @param varchar $value the registrant's country
    */
	public function setCountry($value) {
		self::$_country = $value;
	}
	/* Get the name of the registrant's country 
	 * 
	 * Returns the name of the registrant's country associated
	 * with this particular USPTO filing
	 * @author Aaron Harvey
	 * @return string = name of registrant's country
	 */
	public function getCountry() {
		return self::$_country;
	}

    /* Set the registrant's postcode
    *
    * Set the registrant's postal code that filed for the particular trademark
    * @author Aaron Harvey
    * @param varchar $value the registrant's postal code
    */
	public function setPostcode($value) {
		self::$_postCode = $value;
	}
	
	/* Get the name of the registrant's postal code 
	 * 
	 * Returns the name of the registrant's postalcode associated
	 * with this particular USPTO filing
	 * @author Aaron Harvey
	 * @return varchar = name of registrant's postal code
	 */
	public function getPostCode() {
		return self::$_postCode;
	}

    /* Set the registrant's mark identification
    *
    * Set the registrant's mark id that filed for the particular trademark
    * @author Aaron Harvey
    * @param integer $value the registrant's mark identification
    */
	public function setMarkIdentification($value) {
		self::$_markIdentification = $value;
	}
	
	/* Get the id of the trademark
	 * 
	 * Returns the id of the trademark identification
	 * ties to this particular USPTO filing
	 * @author Aaron Harvey
	 * @return integer = id of the trademark filing
	 */
	public function getMarkIdentification() {
		return self::$_markIdentification;
	}

    /* Set the registrant's serial number
    *
    * Set the registrant's serial number that filed for the particular trademark
    * @author Aaron Harvey
    * @param integer $value the registrant's serial number
    */
	public function setSerialNumber($value) {
		self::$_serialNumber = $value;
	}
	
	/* Get the serial number of the trademark
	 * 
	 * Returns the serial number of the trademark identification
	 * ties to this particular USPTO filing
	 * @author Aaron Harvey
	 * @return integer = serial number of the trademark filing
	 */
	public function getSerialNumber() {
		return self::$_serialNumber;
	}

    /* Set the registrant's registration number
    *
    * Set the registrant's registration number that filed for the particular trademark
    * @author Aaron Harvey
    * @param integer $value the registrant's registration number
    */
	public function setRegistrationNumber($value) {
		self::$_registrationNumber = $value;
	}
	
	/* Get the id of the registrant
	 * 
	 * Returns the id of the registrant's with
	 * ties to this particular USPTO filing
	 * @author Aaron Harvey
	 * @return integer = registrant id of the trademark filing
	 */
	public function getRegistrationNumber() {
		return self::$_registrationNumber;
	}

    /* Set the registrant's transaction date
    *
    * Set the registrant's transaction date that filed for the particular trademark
    * @author Aaron Harvey
    * @param date $value the registrant's transaction date
    */
	public function setTransactionDate($value) {
		self::$_transactionDate = $value;
	}
	
	/* Get the transaction date
	 * 
	 * Returns the date of the trademark transaction
	 * date for this particular USPTO filing
	 * @author Aaron Harvey
	 * @return varchar = date of the trademark transaction
	 */
	public function getTransactionDate() {
		return self::$_transactionDate;
	}

    /* Set the registrant's filing date
    *
    * Set the registrant's filing date that filed for the particular trademark
    * @author Aaron Harvey
    * @param date $value the registrant's filing date
    */
	public function setFilingDate($value) {
		$value = date('d-M-Y', strtotime($value));
		self::$_filingDate = $value;
	}
	
	/* Get the filing date
	 * 
	 * Returns the date of the trademark filing
	 * date for this particular USPTO filing
	 * @author Aaron Harvey
	 * @return varchar = date of the trademark filing
	 */
	public function getFilingDate() {
		return self::$_filingDate;
	}

    /* Set the trademark description
    *
    * Set the user submitted trademark's description
    * @author Aaron Harvey
    * @param varchar $value the trademark's description
    */
	public function setDescription($value) {
		if($value == "") { $value = "None"; }
		self::$_description = $value;
	}
	/* Get the trademark description
	 * 
	 * Returns the description the registrant
	 * used when filing for the trademark
	 * @author Aaron Harvey
	 * @return varchar = description of the trademark application
	 */
	public function getDescription() {
		return self::$_description;
	}

    /* Set the registrant's correspondent address
    *
    * Set the correspondent's address that filed for the particular trademark
    * @author Aaron Harvey
    * @param varchar $value the correspondent's address
    */
	public function setCorrespondentAddress($value) {
		self::$_correspondentAddress = $value;
	}
	
	/* Get the correspondent's address for the trademark
	 * 
	 * Returns the correspondent's (POC) 
	 * used when filing for the trademark
	 * @author Aaron Harvey
	 * @return varchar = address of the correspondent
	 */
	public function getCorrespondentAddress() {
		return self::$_correspondentAddress;
	}

    /* Set the trademark's last status update
    *
    * Set the trademark's last status update
    * @author Aaron Harvey
    * @param varchar $value the last status update
    */
	public function setLastStatusUpdate($value) {
		$value = date('d-M-Y', strtotime($value));
		self::$_lastStatusUpdate = $value;
	}
	
	/* Get the filing's last update date
	 * 
	 * Returns the last time that the filing
	 * was updated by the USPTO or correspondent
	 * @author Aaron Harvey
	 * @return varchar = date the last time the filing was updated
	 */
	public function getLastStatusUpdate() {
		return self::$_lastStatusUpdate;
	}

	/* Builds a trademark object for JSON
	 * 
	 * Returns an object that can be used to convert
	 * to JSON and apply to the front page
	 * @author Aaron Harvey
	 * @return object = a summary of the trademark object
	 */
	public function buildJSONOutput() {
		$json= new stdClass();
		$json->type = $this->getType();
		$json->registrant = $this->getRegistrant();
		$json->streetAddress = $this->getStreetAddress();
		if($this->getState() == "") {
			$json->state = $this->getCountry();
		} else {
			$json->state = $this->getState();
		}
		$json->city = $this->getCity();
		$json->country = $this->getCountry();
		$json->postCode = $this->getPostCode();
		$json->markIdentification = $this->getMarkIdentification();
		$json->serialNumber = $this->getSerialNumber();
		$json->registrationNumber = $this->getRegistrationNumber();
		$json->transactionDate = $this->getTransactionDate();
		$json->filingDate = $this->getFilingDate();
		$json->description = $this->getDescription();
		$json->correspondentAddress = $this->getCorrespondentAddress();
		$json->lastStatusUpdate = $this->getFilingDate();
		return $json;
	}
}
