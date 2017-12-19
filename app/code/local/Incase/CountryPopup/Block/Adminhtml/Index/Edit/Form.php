<?php
/** Country Popup Adminhtml Edit
 * Author: Isaac Kim
 * Date: 12-18-2017
 */
class Incase_Countrypopup_Block_Adminhtml_Index_Edit_Form
	extends Mage_Adminhtml_Block_Widget_Form
{
	public function __construct()
	{
		parent::__construct();

		$this->setId('incase_countrypopup_index_form');
		$this->setTitle(Mage::helper('incase_countrypopup')->__('Country Information'));
	}

	protected function _prepareForm()
	{
		$model = Mage::registry('incase_countrypopup_data');

		$form = new Varien_Data_Form(
			array(
				'id'		=> 'edit_form',
				'action'	=> $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
				'method'	=> 'post'
			)
		);

		$fieldset = $form->addFieldset('incase_countrypopup_form', 
			array(
				'legend'	=> Mage::helper('incase_countrypopup')->__('Country Information'),
				'class'		=> 'fieldset-wide'
			)
		);

		if ($model && $model->getId()) {
			$fieldset->addField('id', 'hidden',
				array(
					'name'	=> 'id'
				)
			);
		}

		$fieldset->addField('code', 'text', 
			array(
				'name'		=> 'code',
				'label'		=> Mage::helper('incase_countrypopup')->__('Country Code'),
				'title'		=> Mage::helper('incase_countrypopup')->__('Country Code'),
				'required'	=> true,
				'after_element_html'	=> '<p class="note"><span>Enter 2 letter country code in uppercase</span></p>'
			)
		);

		$fieldset->addField('country', 'text', 
			array(
				'name'		=> 'country',
				'label'		=> Mage::helper('incase_countrypopup')->__('Country Name'),
				'title'		=> Mage::helper('incase_countrypopup')->__('Country Name'),
				'required'	=> true
			)
		);

		$fieldset->addField('description', 'text', 
			array(
				'name'		=> 'description',
				'label'		=> Mage::helper('incase_countrypopup')->__('Country Description'),
				'title'		=> Mage::helper('incase_countrypopup')->__('Country Description'),
				'required'	=> true,
				'after_element_html'	=> '<p class="note"><span>For example, for AU enter Australian and for CA enter Canadian</span></p>'
			)
		);

		$fieldset->addField('url', 'text', 
			array(
				'name'		=> 'url',
				'label'		=> Mage::helper('incase_countrypopup')->__('URL'),
				'title'		=> Mage::helper('incase_countrypopup')->__('URL'),
				'required'	=> true,
				'after_element_html'	=> '<p class="note"><span>Include http:// or https://</span></p>'
			)
		);

		if (Mage::registry('incase_countrypopup_data')){
			$form->setValues(Mage::registry('incase_countrypopup_data')->getData());
		}

		$form->setUseContainer(true);
		$this->setForm($form);
		return parent::_prepareForm();
	}
}