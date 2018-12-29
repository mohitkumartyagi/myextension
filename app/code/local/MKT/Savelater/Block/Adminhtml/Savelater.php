<?php
class MKT_Savelater_Block_Adminhtml_Savelater extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_savelater';
    $this->_blockGroup = 'savelater';
    $this->_headerText = Mage::helper('savelater')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('savelater')->__('Add Item');
    parent::__construct();
  }
}