<?php

class Synapse_Pricehandling_Model_Charge extends Mage_Core_Model_Abstract
{
	protected $_exitcatids = 398;
	
    public function freint_charge($_product, $qty = 1){
	
		foreach($_product->getCategoryIds() as $category){
			$category = Mage::getModel("catalog/category")->load($category);
			$path = $category->getPath();
			$path = explode("/",$path);
			$parent_cat[] = $path[2];
		}
		
		Mage::log($this->_exitcatids, null, "charge.log");
		if(in_array($this->_exitcatids, $parent_cat))
		return;
		
		// highest charge will be return 
		$model = Mage::getModel("pricehandling/pricehandling")
		->getCollection()
		->addFieldToSelect("qty_from","qty_to")
		->addFieldToFilter("qty_from" , array("lteq"=>$qty))
		->addFieldToFilter("qty_to" , array("gteq"=>$qty));
		$model->getSelect()->joinRight(array("oos"=>"product_charge_freight_charge"), "main_table.id = oos.charge_id", array("category_id","charge"));
		$model->addFieldToFilter("category_id" , array("in"=> $parent_cat))->setOrder('charge', 'DESC');
		
		return $model->getFirstItem()->getCharge();
	}
	
	public function profit_charge($_product, $qty = 1){
	
		foreach($_product->getCategoryIds() as $category){
			$category = Mage::getModel("catalog/category")->load($category);
			$path = $category->getPath();
			$path = explode("/",$path);
			$parent_cat[] = $path[2];
		}
		if(in_array($this->_exitcatids, $parent_cat))
		return;
		
		// highest charge will be return 
		$model = Mage::getModel("pricehandling/pricehandling")
		->getCollection()
		->addFieldToSelect("qty_from","qty_to")
		->addFieldToFilter("qty_from" , array("lteq"=>$qty))
		->addFieldToFilter("qty_to" , array("gteq"=>$qty));
		$model->getSelect()->joinRight(array("oos"=>"product_charge_profit"), "main_table.id = oos.charge_id", array("category_id","charge"));
		$model->addFieldToFilter("category_id" , array("in"=> $parent_cat))->setOrder('charge', 'DESC');
		
		return $model->getFirstItem()->getCharge();
	}

}
	 