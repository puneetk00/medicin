<?php

class Synapse_Pricehandling_Block_Adminhtml_Pricehandling_Edit_Tab_Selecttype_Decoration
extends Mage_Adminhtml_Block_Widget
implements Varien_Data_Form_Element_Renderer_Interface
{
	
	public function __construct()
    {
        $this->setTemplate('pricehandling/decoration.phtml');
    }
	
	public function isShowWebsiteColumn()
    {
        if ($this->isScopeGlobal() || Mage::app()->isSingleStoreMode()) {
            return false;
        }
        return true;
    }
	

	 public function isScopeGlobal()
    {
        return true;
    }
	
	public function isAllowChangeWebsite()
    {
        return false;
    }
	
	public function isMultiWebsites()
    {
        return !Mage::app()->isSingleStoreMode();
    }
	
	public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $this->setElement($element);
        return $this->toHtml();
    }
	
	public function getCategories(){
		$cat = Mage::getModel('catalog/category')->getCollection()->addAttributeToSelect("*")->addAttributeToFilter("is_active",1);
		return $cat;
	}

	/**
     * Prepare global layout
     * Add "Add tier" button to layout
     *
     * @return Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Price_Tier
     */
    protected function _prepareLayout()
    {
        $button = $this->getLayout()->createBlock('adminhtml/widget_button')
            ->setData(array(
                'label' => Mage::helper('catalog')->__('Add Coloum'),
                'onclick' => 'return tierPriceControl.addItem()',
                'class' => 'addcoloumbutton'
            ));
        $button->setName('addcoloum');

        $this->setChild('add_button', $button);
        return parent::_prepareLayout();
    }
	
	public function getValues()
    {
		 $filter = Mage::app()->getRequest()->getParam("id");
         $values = array();
         $data = Mage::getModel("pricehandling/decoration")->getCollection()->addFieldToSelect("*")->addFieldToFilter("charge_id", $filter);
		
		$i = 0;
		foreach($data as $value){
				$values[$i]["cust_group"] = $value->getCategoryId();
				$values[$i]["price"] = $value->getCharge();
				$values[$i]["entity_id"] = $value->getId();
				$i++;
		}
        
        return $values;
    }
	
	 
}
