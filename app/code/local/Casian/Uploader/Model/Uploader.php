<?php


class Casian_Uploader_Model_Uploader extends Mage_Core_Model_Abstract
{
     public function _construct()
    {
        parent::_construct();
        $this->_init('uploader/uploader');
    }
}
