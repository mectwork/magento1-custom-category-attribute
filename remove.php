<?php
/**
 * REMOVE custom category attribute.
 * Env: Magento 1.9.* 
 */

require_once "app/Mage.php";

Mage::app()->setCurrentStore(Mage::getModel('core/store')->load(Mage_Core_Model_App::ADMIN_STORE_ID));

$installer = new Mage_Sales_Model_Mysql4_Setup;

$installer->startSetup();

//Change this to the field name_id you want to remove from the category.
$attribute_name_id = "custom_attribute";

try {
    if ($installer->getAttribute('catalog_category', $attribute_name_id)) {

        $installer->removeAttribute('catalog_category', $attribute_name_id);
        
		$installer->endSetup();
     	echo "Custom attribute removed succefully";       

    } 
    else {echo "Your are trying to remove an attribute that doesn't exist. Please check that ;)";}

} catch (Exception $e) {
    echo "Opps, something went wrong running the script. Sorry.";
}
