<?php
class Synapse_Pricehandling_Model_Mysql4_Freight extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("pricehandling/freight", "id");
    }
}