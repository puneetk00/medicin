<?php

class Synapse_Pricehandling_Adminhtml_AdddecorationController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('pricehandling/pricehandling');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("pricehandling/adddecoration")->_addBreadcrumb(Mage::helper("adminhtml")->__("Pricehandling  Manager"),Mage::helper("adminhtml")->__("Pricehandling Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Pricehandling"));
			    $this->_title($this->__("Manager Pricehandling"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Pricehandling"));
				$this->_title($this->__("Pricehandling"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("pricehandling/pricehandling")->load($id);
				if ($model->getId()) {
					Mage::register("pricehandling_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("pricehandling/pricehandling");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Pricehandling Manager"), Mage::helper("adminhtml")->__("Pricehandling Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Pricehandling Description"), Mage::helper("adminhtml")->__("Pricehandling Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("pricehandling/adminhtml_pricehandling_edit"))->_addLeft($this->getLayout()->createBlock("pricehandling/adminhtml_pricehandling_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("pricehandling")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Pricehandling"));
		$this->_title($this->__("Pricehandling"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("pricehandling/pricehandling")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("pricehandling_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("pricehandling/pricehandling");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Pricehandling Manager"), Mage::helper("adminhtml")->__("Pricehandling Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Pricehandling Description"), Mage::helper("adminhtml")->__("Pricehandling Description"));


		$this->_addContent($this->getLayout()->createBlock("pricehandling/adminhtml_pricehandling_edit"))->_addLeft($this->getLayout()->createBlock("pricehandling/adminhtml_pricehandling_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data			=	$this->getRequest()->getPost();
			$percentage_data	=	$this->getRequest()->getPost("percentage");
			$freight_data 		=	$this->getRequest()->getPost("freight");
			$decoration_data	=	$this->getRequest()->getPost("decoration");
			$id					= 	$this->getRequest()->getParam("id");
			//print_r($percentage_data); die;
			if ($post_data) {
			
			try {
					$model = Mage::getModel("pricehandling/pricehandling")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						// Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Pricehandling was successfully saved"));
						// Mage::getSingleton("adminhtml/session")->setPricehandlingData(false);

						// if ($this->getRequest()->getParam("back")) {
							// $this->_redirect("*/*/edit", array("id" => $model->getId()));
							// return;
						// }
						// $this->_redirect("*/*/");
						// return;
					} 
					catch (Exception $e) {
						print_r($e->getMessage()); die;
					}

				}
				
				// product profit percentage save data
				if($percentage_data){
				try {
						foreach($percentage_data as $key => $value){
							
							
							if($deleteid = $value["delete"]){
								Mage::getModel('pricehandling/profit')->load($deleteid)->delete();
								continue;
							}
						
							if($savepercentage = Mage::getModel('pricehandling/profit')->load($value["entity_id"])){
								$savepercentage = $savepercentage;
							}else{
								$savepercentage = Mage::getModel('pricehandling/profit');
							}
							
							$savepercentage
							->setChargeId($id)
							->setCategoryId($value["cust_group"])
							->setCharge($value["price"])
							->save();
						}
					} 
					catch (Exception $e) {
						print_r($e->getMessage()); die;
					}
				}
				
				
				
				
				
				
				// Decoration charges save data
				// if($decoration_data){
				// try {
						// // $model = Mage::getModel("pricehandling/decoration")
						// // ->addData($post_data)
						// // ->setId($this->getRequest()->getParam("id"))
						// // ->save();
					// } 
					// catch (Exception $e) {
						// Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						// Mage::getSingleton("adminhtml/session")->setPricehandlingData($this->getRequest()->getPost());
						// $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					// return;
					// }
				// }
				
				// Freight charges save data
				if($freight_data){
				try {
						foreach($freight_data as $key => $value){
							
							
							if($deleteid = $value["delete"]){
								Mage::getModel('pricehandling/freight')->load($deleteid)->delete();
								continue;
							}
						
							if($savepercentage = Mage::getModel('pricehandling/freight')->load($value["entity_id"])){
								$savepercentage = $savepercentage;
							}else{
								$savepercentage = Mage::getModel('pricehandling/freight');
							}
							
							$savepercentage
							->setChargeId($id)
							->setCategoryId($value["cust_group"])
							->setCharge($value["price"])
							->save();
						}
					} 
					catch (Exception $e) {
						print_r($e->getMessage()); die;
					}
				}
				
				
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Pricehandling was successfully saved"));
				Mage::getSingleton("adminhtml/session")->setPricehandlingData(false);
				
				if ($this->getRequest()->getParam("back")) {
					$this->_redirect("*/*/edit", array("id" => $id));
					return;
				}
				
				$this->_redirect("*/*/");
				return;
				
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("pricehandling/pricehandling");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("pricehandling/pricehandling");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'pricehandling.csv';
			$grid       = $this->getLayout()->createBlock('pricehandling/adminhtml_pricehandling_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'pricehandling.xml';
			$grid       = $this->getLayout()->createBlock('pricehandling/adminhtml_pricehandling_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
