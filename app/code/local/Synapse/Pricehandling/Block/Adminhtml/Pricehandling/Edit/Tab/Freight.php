<?php
class Synapse_Pricehandling_Block_Adminhtml_Pricehandling_Edit_Tab_Freight extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		
		//print_r($html); die("here i am ");
	
		$form = new Varien_Data_Form();
		$this->setForm($form);

		$helper = Mage::helper('pricehandling');
		
		$fieldset = $form->addFieldset('freight-fieldset', array('legend' => $helper->__('Freight Charges'),'class' => 'freight-fieldset-wide'));
		
		//$fieldset->addType('customtype', 'synapse_pricehandling_block_adminhtml_pricehandling_edit_tab_selecttype_select');
		
		 $field = $fieldset->addField('freight', 'text', array(
		 'label' => $helper->__('Field label'),
		 'name' => 'freight'
		 ));
		$field->setRenderer($this->getLayout()->createBlock('synapse_pricehandling_block_adminhtml_pricehandling_edit_tab_selecttype_freight'));
		
		if (Mage::registry('turnkeye_adminform')) {
		$form->setValues(array(1,2,3));
		}

		return parent::_prepareForm();
	}

}
