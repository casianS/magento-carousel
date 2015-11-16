<?php

class Casian_Uploader_Model_Mysql4_Uploader extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {  
        $this->_init('uploader/uploader', 'uploader_id');
    }
} 

