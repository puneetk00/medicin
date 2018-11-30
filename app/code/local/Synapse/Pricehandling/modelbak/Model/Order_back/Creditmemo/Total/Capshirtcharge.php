<?php
class Synapse_Pricehandling_Model_Order_Creditmemo_Total_Capshirtcharge 
extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {

		return $this;

        $order = $creditmemo->getOrder();
        $orderCapshirtchargeTotal        = $order->getCapshirtchargeTotal();

        if ($orderCapshirtchargeTotal) {
			$creditmemo->setGrandTotal($creditmemo->getGrandTotal()+$orderCapshirtchargeTotal);
			$creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal()+$orderCapshirtchargeTotal);
        }

        return $this;
    }
}