<?php

class MKT_Savelater_Block_Adminhtml_Savelater_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('savelater_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('savelater')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('savelater')->__('Item Information'),
          'title'     => Mage::helper('savelater')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('savelater/adminhtml_savelater_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}