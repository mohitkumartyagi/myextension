<?php

class MKT_Savelater_Block_Adminhtml_Savelater_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'savelater';
        $this->_controller = 'adminhtml_savelater';
        
        $this->_updateButton('save', 'label', Mage::helper('savelater')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('savelater')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('savelater_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'savelater_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'savelater_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('savelater_data') && Mage::registry('savelater_data')->getId() ) {
            return Mage::helper('savelater')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('savelater_data')->getTitle()));
        } else {
            return Mage::helper('savelater')->__('Add Item');
        }
    }
}