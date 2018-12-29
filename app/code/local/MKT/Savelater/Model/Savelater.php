<?php

class MKT_Savelater_Model_Savelater extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('savelater/savelater');
    }
}