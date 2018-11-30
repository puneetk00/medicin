<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute("quote_address", "capshirtcharge_total", array("type"=>"varchar"));
$installer->addAttribute("order", "capshirtcharge_total", array("type"=>"varchar"));
$installer->endSetup();
	 