<?php
class Synapse_Pricehandling_Block_Adminhtml_Decorationadd_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("pricehandling_form", array("legend"=>Mage::helper("pricehandling")->__("Item information")));

				
						$fieldset->addField("qty_from", "text", array(
						"label" => Mage::helper("pricehandling")->__("Qty From"),
						"name" => "qty_from",
						));
					
						$fieldset->addField("qty_to", "text", array(
						"label" => Mage::helper("pricehandling")->__("Qty To"),
						"name" => "qty_to",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getPricehandlingData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getPricehandlingData());
					Mage::getSingleton("adminhtml/session")->setPricehandlingData(null);
				} 
				elseif(Mage::registry("pricehandling_data")) {
				    $form->setValues(Mage::registry("pricehandling_data")->getData());
				}
				return parent::_prepareForm();
		}
}
