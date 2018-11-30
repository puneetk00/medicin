<?php
class Synapse_Pricehandling_Model_Quote_Address_Total_Capshirtcharge 
extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
     public function __construct()
    {
         $this -> setCode('capshirtcharge_total');
         }
    /**
     * Collect totals information about capshirtcharge
     * 
     * @param Mage_Sales_Model_Quote_Address $address 
     * @return Mage_Sales_Model_Quote_Address_Total_Shipping 
     */
     public function collect(Mage_Sales_Model_Quote_Address $address)
    {
         parent :: collect($address);
         $items = $this->_getAddressItems($address);
         if (!count($items)) {
            return $this;
         }
         $quote= $address->getQuote();

		 //amount definition

         $capshirtchargeAmount = 333;

         //amount definition

         $capshirtchargeAmount = $quote -> getStore() -> roundPrice($capshirtchargeAmount);
         $this -> _setAmount($capshirtchargeAmount) -> _setBaseAmount($capshirtchargeAmount);
         $address->setData('capshirtcharge_total',$capshirtchargeAmount);

         return $this;
     }
    
    /**
     * Add capshirtcharge totals information to address object
     * 
     * @param Mage_Sales_Model_Quote_Address $address 
     * @return Mage_Sales_Model_Quote_Address_Total_Shipping 
     */
     public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
         parent :: fetch($address);
         $amount = $address -> getTotalAmount($this -> getCode());
         if ($amount != 0){
             $address -> addTotal(array(
                     'code' => $this -> getCode(),
                     'title' => $this -> getLabel(),
                     'value' => $amount
                    ));
         }
        
         return $this;
     }
    
    /**
     * Get label
     * 
     * @return string 
     */
     public function getLabel()
    {
         return Mage :: helper('pricehandling') -> __('Total charge with capshirt');
    }
}