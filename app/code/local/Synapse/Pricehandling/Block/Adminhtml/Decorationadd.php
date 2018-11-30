<?php


class Synapse_Pricehandling_Block_Adminhtml_Decorationadd extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_adddecoration";
	$this->_blockGroup = "decorationadd";
	$this->_headerText = Mage::helper("pricehandling")->__("Decoration color add");
	$this->_addButtonLabel = Mage::helper("pricehandling")->__("Add New Item");
	parent::__construct();
	
	}

}