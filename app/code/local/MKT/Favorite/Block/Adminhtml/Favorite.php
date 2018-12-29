<?php
class MKT_Favorite_Block_Adminhtml_Favorite extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_favorite';
    $this->_blockGroup = 'favorite';
    $this->_headerText = Mage::helper('favorite')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('favorite')->__('Add Item');
    parent::__construct();
  }
}