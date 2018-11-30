<?php
class Synapse_Pricehandling_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  
	  
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Titlename"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("titlename", array(
                "label" => $this->__("Titlename"),
                "title" => $this->__("Titlename")
		   ));

      $this->renderLayout(); 
	  
    }
	
	public function tAction(){
	echo "<pre>";

	$_product = Mage::getModel("catalog/product")->load(1423);
	$charge = Mage::getModel("pricehandling/charge")->freint_charge($_product, 15);
	
		
	print_r($charge);
	die("test");
	
	}
}