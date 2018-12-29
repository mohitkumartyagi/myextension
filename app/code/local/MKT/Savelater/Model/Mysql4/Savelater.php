<?php

class MKT_Savelater_Model_Mysql4_Savelater extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the savelater_id refers to the key field in your database table.
        $this->_init('savelater/savelater', 'savelater_id');
    }
}