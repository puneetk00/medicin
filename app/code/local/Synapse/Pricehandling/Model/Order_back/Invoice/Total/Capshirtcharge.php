<?php
class Synapse_Pricehandling_Model_Order_Invoice_Total_Capshirtcharge
extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
		$order=$invoice->getOrder();
        $orderCapshirtchargeTotal = $order->getCapshirtchargeTotal();
        if ($orderCapshirtchargeTotal&&count($order->getInvoiceCollection())==0) {
            $invoice->setGrandTotal($invoice->getGrandTotal()+$orderCapshirtchargeTotal);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal()+$orderCapshirtchargeTotal);
        }
        return $this;
    }
}