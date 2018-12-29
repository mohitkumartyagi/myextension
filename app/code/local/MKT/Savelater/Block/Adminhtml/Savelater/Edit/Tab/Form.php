<?php

class MKT_Savelater_Block_Adminhtml_Savelater_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('savelater_form', array('legend'=>Mage::helper('savelater')->__('Item information')));
     
      $fieldset->addField('customer_id', 'text', array(
          'label'     => Mage::helper('savelater')->__('Customer ID'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_id',
      ));
      $fieldset->addField('product_id', 'text', array(
          'label'     => Mage::helper('savelater')->__('Product ID'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'product_id',
      ));
      $fieldset->addField('store_id', 'text', array(
          'label'     => Mage::helper('savelater')->__('Store ID'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'store_id',
      ));
      $fieldset->addField('qty', 'text', array(
          'label'     => Mage::helper('savelater')->__('Qty'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'qty',
      ));

      
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('savelater')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('savelater')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('savelater')->__('Disabled'),
              ),
          ),
      ));
     
      
      if ( Mage::getSingleton('adminhtml/session')->getSavelaterData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getSavelaterData());
          Mage::getSingleton('adminhtml/session')->setSavelaterData(null);
      } elseif ( Mage::registry('savelater_data') ) {
          $form->setValues(Mage::registry('savelater_data')->getData());
      }
      return parent::_prepareForm();
  }
}