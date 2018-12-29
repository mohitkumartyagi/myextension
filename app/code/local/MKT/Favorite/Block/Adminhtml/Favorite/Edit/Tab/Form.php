<?php

class MKT_Favorite_Block_Adminhtml_Favorite_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('favorite_form', array('legend'=>Mage::helper('favorite')->__('Item information')));
     
      $fieldset->addField('customer_id', 'text', array(
          'label'     => Mage::helper('favorite')->__('Customer ID'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_id',
      ));
      $fieldset->addField('product_id', 'text', array(
          'label'     => Mage::helper('favorite')->__('Product ID'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'product_id',
      ));
      $fieldset->addField('store_id', 'text', array(
          'label'     => Mage::helper('favorite')->__('Store ID'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'store_id',
      ));
      $fieldset->addField('qty', 'text', array(
          'label'     => Mage::helper('favorite')->__('Qty'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'qty',
      ));

      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('favorite')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('favorite')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('favorite')->__('Disabled'),
              ),
          ),
      ));
     
      
      if ( Mage::getSingleton('adminhtml/session')->getFavoriteData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getFavoriteData());
          Mage::getSingleton('adminhtml/session')->setFavoriteData(null);
      } elseif ( Mage::registry('favorite_data') ) {
          $form->setValues(Mage::registry('favorite_data')->getData());
      }
      return parent::_prepareForm();
  }
}