<?php

class Product_Createform_Model_Createform extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('createform/createform');
    }
}