<?php

class Product_Createform_Model_Mysql4_Createform extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the createform_id refers to the key field in your database table.
        $this->_init('createform/createform', 'createform_id');
    }
}