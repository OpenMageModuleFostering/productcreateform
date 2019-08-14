<?php

class Product_Createform_Block_Adminhtml_Createform_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('createform_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('createform')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('createform')->__('Item Information'),
          'title'     => Mage::helper('createform')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('createform/adminhtml_createform_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}