<?php
/**
 * The aUSPTO abstract class is mostly a placeholder for future implementations
 * and currently contains a placeholder getter
 *
 * @author     Aaron Harvey
 * @version    1.0
 *
 */
abstract class aUSPTO {
	public function __get($property) {
		if(property_exists($this, $property)) {
			return $this->$property;
		}
	}   
}
?>