<?php


class Synapse_Pricehandling_Block_Adminhtml_Pricehandling extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_pricehandling";
	$this->_blockGroup = "pricehandling";
	$this->_headerText = Mage::helper("pricehandling")->__("Pricehandling Manager");
	$this->_addButtonLabel = Mage::helper("pricehandling")->__("Add New Item");
	parent::__construct();
	
	}

}