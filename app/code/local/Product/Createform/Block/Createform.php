<?php
class Product_Createform_Block_Createform extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getCreateform()     
     { 
        if (!$this->hasData('createform')) {
            $this->setData('createform', Mage::registry('createform'));
        }
        return $this->getData('createform');
        
    }
}