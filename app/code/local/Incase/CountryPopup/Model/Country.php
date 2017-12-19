<?php
/** Country Popup Model
 * Author: Isaac Kim
 * Date: 12-15-2017
 */
class Incase_CountryPopup_Model_Country 
	extends Mage_Core_Model_Abstract
{
	protected function _construct()
	{
		$this->_init('incase_countrypopup/country');
	}

	public function renderHtml()
	{
		$string = "<div class='inc-country-popup-holder'>".
			"<div class='inc-country-popup-title'>Looks like you might be in ".
			$this->getCountry().".</div>".
			"<div class='inc-country-popup-message'>Would you like to go to the ".
			$this->getDescription()." version of the site instead?</div>".
			"<a href='".$this->getUrl()."'>".
			"<div class='inc-country-popup-btn'>Take me there!</div></a></div>";
		return $string;
	}
}