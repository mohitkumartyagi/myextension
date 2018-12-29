<?php

class MKT_Favorite_Model_Mysql4_Favorite extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the favorite_id refers to the key field in your database table.
        $this->_init('favorite/favorite', 'favorite_id');
    }
}