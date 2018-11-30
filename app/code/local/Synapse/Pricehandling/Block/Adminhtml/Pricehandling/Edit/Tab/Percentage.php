<?php
class Synapse_Pricehandling_Block_Adminhtml_Pricehandling_Edit_Tab_Percentage extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
			
			//$form->setUseContainer(true);
			$this->setForm($form);

			$helper = Mage::helper('pricehandling');
			$fieldset = $form->addFieldset('display', array(
			'legend' => $helper->__('Product Profit Percentage'),
			'class' => 'percentage-fieldset-wide'
			));
			
			//$fieldset->addType('customtype', 'synapse_pricehandling_block_adminhtml_pricehandling_edit_tab_selecttype_select');
			
			 $field = $fieldset->addField('percentage', 'text', array(
			 'label' => $helper->__('Product profit percentage'),
			 'name' => 'percentage'
			 ));
			 
			$field->setRenderer($this->getLayout()->createBlock('synapse_pricehandling_block_adminhtml_pricehandling_edit_tab_selecttype_percentage'));
			
			if (Mage::registry('turnkeye_adminform')) {
			$form->setValues(array(1,2,3));
			}

			return parent::_prepareForm();
		}
}
