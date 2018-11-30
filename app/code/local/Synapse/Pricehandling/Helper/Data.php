<?php
class Synapse_Pricehandling_Helper_Data extends Mage_Core_Helper_Abstract
{
	
	public function getpricerule(){
			$data = array(
				0 => array("qty_from"=>1, "qty_to"=>11, "catagories_freight_charge"=>array(16=>12,17=>32,18=>63),"percentage_profit"=>array(16=>12,17=>32,18=>63),"decoration_chage"=>array(16=>12,17=>32,18=>63)),
				0 => array("qty_from"=>12, "qty_to"=>23, "catagories_freight_charge"=>array(16=>12,17=>32,18=>63),"percentage_profit"=>array(16=>12,17=>32,18=>63),"decoration_chage"=>array(16=>12,17=>32,18=>63)),
				0 => array("qty_from"=>24, "qty_to"=>35, "catagories_freight_charge"=>array(16=>12,17=>32,18=>63),"percentage_profit"=>array(16=>12,17=>32,18=>63),"decoration_chage"=>array(16=>12,17=>32,18=>63)),
			);
	}
	
}
	 