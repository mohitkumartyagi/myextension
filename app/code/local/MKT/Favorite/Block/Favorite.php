<?php
class MKT_Favorite_Block_Favorite extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getFavorite()     
     { 
        if (!$this->hasData('favorite')) {
            $this->setData('favorite', Mage::registry('favorite'));
        }
        return $this->getData('favorite');
        
    }
}