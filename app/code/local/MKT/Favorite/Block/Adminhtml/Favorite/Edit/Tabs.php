<?php

class MKT_Favorite_Block_Adminhtml_Favorite_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('favorite_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('favorite')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('favorite')->__('Item Information'),
          'title'     => Mage::helper('favorite')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('favorite/adminhtml_favorite_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}