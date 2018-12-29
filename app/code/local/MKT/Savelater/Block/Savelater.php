<?php
class MKT_Savelater_Block_Savelater extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSavelater()     
     { 
        if (!$this->hasData('savelater')) {
            $this->setData('savelater', Mage::registry('savelater'));
        }
        return $this->getData('savelater');
        
    }
}