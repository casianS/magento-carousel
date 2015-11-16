<?php

class Casian_Uploader_Model_Mysql4_Uploader_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        //parent::__construct();
        $this->_init('uploader/uploader');
    }
} 

