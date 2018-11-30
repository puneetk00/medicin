<?php
class Synapse_Pricehandling_Block_Adminhtml_Pricehandling_Edit_Tab_Decoration extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{
			$form = new Varien_Data_Form();
			$this->setForm($form);
			//$form->setUseContainer(true);

			$helper = Mage::helper('pricehandling');
			
			$fieldset = $form->addFieldset('decoration-fieldset', array(
			'legend' => $helper->__('Decoration Chages'),
			'class' => 'decoration-fieldset-wide'
			));
			
			//$fieldset->addType('customtype', 'synapse_pricehandling_block_adminhtml_pricehandling_edit_tab_selecttype_select');
			
			 $field = $fieldset->addField('decoration', 'text', array(
			 'label' => $helper->__('Decoration Charge'),
			 'name' => 'decoration'
			 ));
			 
			$field->setRenderer($this->getLayout()->createBlock('synapse_pricehandling_block_adminhtml_pricehandling_edit_tab_selecttype_decoration'));
			
			
			if (Mage::getSingleton("adminhtml/session")->getPricehandlingData())
			{
				$form->setValues(Mage::getSingleton("adminhtml/session")->getPricehandlingData());
				Mage::getSingleton("adminhtml/session")->setPricehandlingData(null);
			} 
			elseif(Mage::registry("pricehandling_data")) {
				$form->setValues(Mage::registry("pricehandling_data")->getData());
			}
			
			// if (Mage::registry('turnkeye_adminform')) {
			// $form->setValues(array(1,2,3));
			// }

			return parent::_prepareForm();
		}
}
