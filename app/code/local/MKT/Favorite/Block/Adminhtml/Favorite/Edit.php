<?php

class MKT_Favorite_Block_Adminhtml_Favorite_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'favorite';
        $this->_controller = 'adminhtml_favorite';
        
        $this->_updateButton('save', 'label', Mage::helper('favorite')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('favorite')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('favorite_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'favorite_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'favorite_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('favorite_data') && Mage::registry('favorite_data')->getId() ) {
            return Mage::helper('favorite')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('favorite_data')->getTitle()));
        } else {
            return Mage::helper('favorite')->__('Add Item');
        }
    }
}