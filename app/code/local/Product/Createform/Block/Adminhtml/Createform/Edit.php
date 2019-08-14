<?php

class Product_Createform_Block_Adminhtml_Createform_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'createform';
        $this->_controller = 'adminhtml_createform';
        
        $this->_updateButton('save', 'label', Mage::helper('createform')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('createform')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('createform_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'createform_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'createform_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('createform_data') && Mage::registry('createform_data')->getId() ) {
            return Mage::helper('createform')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('createform_data')->getTitle()));
        } else {
            return Mage::helper('createform')->__('Add Item');
        }
    }
}