<?php

class Casian_Uploader_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {
        $target_dir = Mage::getBaseDir('skin') . "/frontend/rwd/default/images/carousel/";

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {

            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                self::table_uploader($_FILES["fileToUpload"]["name"]);
                $this->_redirect(Mage::getBaseUrl());
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function table_uploader($name = null) {
        $arr = explode('.', $name);
        $customer = Mage::getSingleton('customer/session')->getCustomer();
     
        $custID = $customer->getID();
        
        $time = Mage::getModel('core/date')->date('Y-m-d H:i:s');
        $data = array('user_id' => $custID, 'name' => $arr[0], 'ext' => $arr[1], 'upload_time' => $time);
        $model = Mage::getModel('uploader/uploader')->setData($data);
        try {
            $insertId = $model->save()->getId();
            echo "Data successfully inserted. Insert ID: " . $insertId;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
