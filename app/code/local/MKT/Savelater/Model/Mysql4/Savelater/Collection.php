<?php

class MKT_Savelater_Model_Mysql4_Savelater_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('savelater/savelater');
    }
}