<?php
class Product_Createform_Block_Adminhtml_Createform extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_createform';
    $this->_blockGroup = 'createform';
    $this->_headerText = Mage::helper('createform')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('createform')->__('Add Item');
    parent::__construct();
  }
}