<?php
/** Country Popup Adminhtml Grid
 * Author: Isaac Kim
 * Date: 12-15-2017
 */
class Incase_CountryPopup_Block_Adminhtml_Index_Grid
	extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('countryPopupGrid');
		$this->setDefaultSort('id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
	}

	protected function _getCollectionClass()
	{
		return 'incase_countrypopup/country_collection';
	}

	protected function _prepareCollection()
	{
		$collection = Mage::getModel('incase_countrypopup/country')->getCollection();

		$this->setCollection($collection);
		parent::_prepareCollection();
		return $this;
	}

	protected function _prepareColumns()
	{
		$this->addColumn('id',
			array(
				'header'=> Mage::helper('incase_countrypopup')->__('ID'),
				'align'	=> 'right',
				'width'	=> '50px',
				'type'	=> 'number',
				'index'	=> 'id',
		));
		$this->addColumn('code',
			array(
				'header'=> Mage::helper('incase_countrypopup')->__('Code'),
				'width'	=> '50px',
				'index'	=> 'code',
		));
		$this->addColumn('country',
			array(
				'header'=> Mage::helper('incase_countrypopup')->__('Country'),
				'width'	=> '200px',
				'index'	=> 'country',
		));
		$this->addColumn('description',
			array(
				'header'=> Mage::helper('incase_countrypopup')->__('Description'),
				'width'	=> '200px',
				'index'	=> 'description',
		));
		$this->addColumn('url',
			array(
				'header'=> Mage::helper('incase_countrypopup')->__('Url'),
				'width'	=> '300px',
				'index'	=> 'url',
		));
		$this->addColumn('created_at',
			array(
				'header'=> Mage::helper('incase_countrypopup')->__('Created At'),
				'width'	=> '200px',
				'index'	=> 'created_at',
		));
		return parent::_prepareColumns();
	}

	public function getGridUrl()
	{
		return $this->getUrl('*/*/grid', array('_current'=>true));
	}

	public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}