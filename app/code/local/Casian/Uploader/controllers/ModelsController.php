<?php

class Casian_Uploader_ModelsController extends Mage_Core_Controller_Front_Action
{
    public function storesAction ()
    {
        $stores = Mage::getResourceModel('core/store_collection');
        
        foreach ($stores as $store)
        {
            echo '<h1 style="color: red;">' .get_class($store).' '.$store->getRootCategoryId().'</h1>';
            echo '<h2>'.$store->getName ().'  '.$store->getCode() .'</h2>';
        }
    }
}