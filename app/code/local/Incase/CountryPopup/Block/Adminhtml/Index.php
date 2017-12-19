<?php
/** Country Popup Adminhtml
 * Author: Isaac Kim
 * Date: 12-15-2017
 */

class Incase_CountryPopup_Block_Adminhtml_Index
	extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = 'adminhtml_index';
		$this->_blockGroup = 'incase_countrypopup';
		$this->_headerText = Mage::helper('incase_countrypopup')->__('Country Popup Manager');
		$this->_addButtonLabel = Mage::helper('incase_countrypopup')->__('Add Country');
		parent::__construct();
	}

	public function getGridHtml()
	{
		return parent::getGridHtml();
	}
}