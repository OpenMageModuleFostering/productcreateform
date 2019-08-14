<?php
class Product_Createform_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
		$this->loadLayout();     
		$this->renderLayout();
    }
	
	 public function createAction()
    {
		$post = $this->getRequest()->getParams();
		$categoryid= Mage::getStoreConfig('createform/createform/category_id'); 
		$attributesetid = Mage::getStoreConfig('createform/createform/attribute_id');
		//print_r($post);
		//exit;
       	if($post){
       		$product = new Mage_Catalog_Model_Product();
			$product->setSku($post['name']."_new");
			$product->setAttributeSetId($attributesetid);
			$product->setTypeId('simple');
			$product->setName($post['name']);
			$product->setCategoryIds(array($categoryid)); # some cat id's, fill in backend
			$product->setWebsiteIDs(array(1)); # Website id, my is 1 (default frontend)
			$product->setDescription('Full description here');
			$product->setShortDescription('Short description here');
			$product->setPrice(39.99); # Set some price[put static temporary]
			
			//Default Magento attribute
			$product->setWeight(4.0000);
			$product->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_NOT_VISIBLE);
			$product->setStatus(1);
			$product->setTaxClassId(0); # My default tax class[static]
			$product->setStockData(array('is_in_stock' => 1,'qty' => 99999 ));
	    	
			$product->save();
         if($product->save()){
                Mage::getSingleton('customer/session')->addSuccess("Your product was submitted.Thank you");
                $this->_redirect('*/index');
                return;
         }else{
                Mage::getSingleton('customer/session')->addError("there are already product exist in our website");
                $this->_redirect('*/index');
                return;
            	}
        	}
       }
}