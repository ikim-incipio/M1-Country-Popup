<?php
/** Country Popup Adminhtml
 * Author: Isaac Kim
 * Date: 12-14-2017
 */

class Incase_CountryPopup_Adminhtml_IndexController 
	extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction()
	{
		$this->loadLayout()
			->_setActiveMenu('cms')
			->_title(Mage::helper('incase_countrypopup')->__('Country Popup'));
		return $this;
	}

	public function indexAction()
	{
		try {
			$this->_initAction();

			$this->_addContent($this->getLayout()->createBlock('incase_countrypopup/adminhtml_index'));
			$this->renderLayout();
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			$this->_redirect('adminhtml/dashboard');
			return;
		}
	}

	public function gridAction()
	{
		$this->loadLayout();
		$this->getResponse()->setBody(
			$this->getLayout()->createBlock('incase_countrypopup/adminhtml_index_grid')->toHtml()
		);
	}

	public function newAction()
	{
		$this->_forward('edit');
	}

	public function editAction()
	{
		try {
			$this->_initAction();

			$id = $this->getRequest()->getParam('id');

			$model = Mage::getModel('incase_countrypopup/country');
			if ($id){
				$model->load($id);
			}

			if (($model && $model->getId()) || $id == 0) {
				Mage::register('incase_countrypopup_data', $model);

				$this->_initAction();

				$this->_addContent($this->getLayout()->createBlock('incase_countrypopup/adminhtml_index_edit'));
				$this->renderLayout();
			}

		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			$this->_redirect('*/*/index', array('id' => $this->getRequest()->getParam('id')));
			return;
		}
	}

	public function saveAction()
	{
		if ($postData = $this->getRequest()->getPost()){
			try {
				$model = Mage::getModel('incase_countrypopup/country');
				$model->setId($this->getRequest()->getParam('id'))
					->setCode($postData['code'])
					->setCountry($postData['country'])
					->setDescription($postData['description'])
					->setUrl($postData['url'])
					->save();

				Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Item was successfully saved'));
				$this->_redirect('*/*/');
				return;
			} catch (Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/');
	}

	public function deleteAction()
	{
		$id = $this->getRequest()->getParam('id');
		if ($id && $id > 0) {
			try {
				$model = Mage::getModel('incase_countrypopup/country');
				$model->setId($id)->delete();

				Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Item was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $id));
			}
		}
		$this->_redirect('*/*/');
	}

	protected function _isAllowed()
	{
		return Mage::getSingleton('admin/session')->isAllowed('incase_countrypopup/adminhtml_index');
	}
}