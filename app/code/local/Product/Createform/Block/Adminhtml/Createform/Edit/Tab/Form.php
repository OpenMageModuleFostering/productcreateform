<?php

class Product_Createform_Block_Adminhtml_Createform_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('createform_form', array('legend'=>Mage::helper('createform')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('createform')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('createform')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('createform')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('createform')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('createform')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('createform')->__('Content'),
          'title'     => Mage::helper('createform')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getCreateformData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getCreateformData());
          Mage::getSingleton('adminhtml/session')->setCreateformData(null);
      } elseif ( Mage::registry('createform_data') ) {
          $form->setValues(Mage::registry('createform_data')->getData());
      }
      return parent::_prepareForm();
  }
}