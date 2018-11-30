<?php
class Synapse_Pricehandling_Block_Adminhtml_Decorationadd_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("pricehandling_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("pricehandling")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("pricehandling")->__("Item Information"),
				"title" => Mage::helper("pricehandling")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("pricehandling/adminhtml_pricehandling_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
