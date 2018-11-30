<?php

class Synapse_Pricehandling_Block_Adminhtml_Decorationadd_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("pricehandlingGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				///$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("pricehandling/pricehandling")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("pricehandling")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
				$this->addColumn("qty_from", array(
				"header" => Mage::helper("pricehandling")->__("Qty From"),
				"index" => "qty_from",
				));
				$this->addColumn("qty_to", array(
				"header" => Mage::helper("pricehandling")->__("Qty To"),
				"index" => "qty_to",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_pricehandling', array(
					 'label'=> Mage::helper('pricehandling')->__('Remove Pricehandling'),
					 'url'  => $this->getUrl('*/adminhtml_pricehandling/massRemove'),
					 'confirm' => Mage::helper('pricehandling')->__('Are you sure?')
				));
			return $this;
		}
		
		static public function getOptionArray0()
		{
            $data_array=array(); 
			$data_array[0]='1dsafd';
			$data_array[1]='2fdsa';
			$data_array[2]='3fdsa';
            return($data_array);
		}
		static public function getValueArray0()
		{
            $data_array=array();
			foreach(self::getOptionArray0() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
			

}