<?php
/** Country Popup Adminhtml Edit
 * Author: Isaac Kim
 * Date: 12-18-2017
 */
class Incase_Countrypopup_Block_Adminhtml_Index_Edit
	extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		$this->_objectId = 'id';
		$this->_blockGroup = 'incase_countrypopup';
		$this->_controller = 'adminhtml_index';
		$this->_headerText = Mage::helper('incase_countrypopup')->__('Country Popup Manager');

		parent::__construct();

		$this->_updateButton('save', 'label', Mage::helper('incase_countrypopup')->__('Save Country'));
		$this->_updateButton('delete', 'label', Mage::helper('incase_countrypopup')->__('Delete Country'));
	}

	public function getHeaderText()
	{
		if (Mage::registry('incase_countrypopup_data') && Mage::registry('incase_countrypopup_data')->getId()) {
			return Mage::helper('incase_countrypopup')->__('Edit Country');
		} else {
			return Mage::helper('incase_countrypopup')->__('New Country');
		}
	}
}