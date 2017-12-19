<?php
/** Country Popup Model
 * Author: Isaac Kim
 * Date: 12-15-2017
 */
class Incase_CountryPopup_Model_Resource_Country 
	extends Mage_Core_Model_Resource_Db_Abstract
{
	protected function _construct()
	{
		$this->_init('incase_countrypopup/country', 'id');
	}
}