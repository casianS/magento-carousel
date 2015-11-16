<?php

$installer = $this;
  
$installer->startSetup();
  
$installer->run("
  
DROP TABLE IF EXISTS {$this->getTable('uploader')};
CREATE TABLE {$this->getTable('uploader')} (
  `uploader_id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL default '',
  `ext` varchar(255) NOT NULL default '',
  `upload_time` datetime NULL,
  PRIMARY KEY (`uploader_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
    ");
  
$installer->endSetup(); 

