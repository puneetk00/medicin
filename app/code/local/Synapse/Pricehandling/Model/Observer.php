<?php
class Synapse_Pricehandling_Model_Observer
{

			public function priceupdate(Varien_Event_Observer $observer)
			{
				//Mage::dispatchEvent('admin_session_user_login_success', array('user'=>$user));
				//$user = $observer->getEvent()->getUser();
				//$user->doSomething();
				$products = $observer->getCollection();

				foreach( $products as $product )
				{
				
				// Get custom freight charge
				$charge = Mage::getModel("pricehandling/charge")->freint_charge($product);
				// Get custom freight charge
				$profit_charge = (Mage::getModel("pricehandling/charge")->profit_charge($product)/100) * $product->getFinalPrice();
				// Adding freight charge and profit
				$priceincfriegt = $product->getFinalPrice() + $profit_charge + $charge;
				$product->setFinalPrice($priceincfriegt); // set the product final price
				$product->setMinimalPrice($priceincfriegt);
				$product->setPrice($priceincfriegt); // set the product final price
				}
				return $this;
			}
		
			public function getfinalpriceupdate(Varien_Event_Observer $observer)
			{
				
				$event = $observer->getEvent();
				$product = $event->getProduct();				
				
				
				// Get custom freight charge
				$charge = Mage::getModel("pricehandling/charge")->freint_charge($product);
				// Get custom freight charge
				$profit_charge = (Mage::getModel("pricehandling/charge")->profit_charge($product)/100) * $product->getFinalPrice();
				
				
				// Adding freight charge and profit
				$priceincfriegt = $product->getFinalPrice() + $profit_charge + $charge;
				
				// ADD LOGIC HERE to get price added by customer
				$product->setFinalPrice($priceincfriegt); // set the product final price
				$product->setPrice($priceincfriegt); // set the product final price
				
				return $this;
			}
		
}
