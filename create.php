<?php
/**
 * CREATE custom category attribute.
 * Env: Magento 1.9.* 
 */

require_once "app/Mage.php";

Mage::app()->setCurrentStore(Mage::getModel('core/store')->load(Mage_Core_Model_App::ADMIN_STORE_ID));

$installer = new Mage_Sales_Model_Mysql4_Setup;

$installer->startSetup();

try{
    //ADD ATTRIBUTE
    $installer->addAttribute('catalog_category', 'custom_attribute', array(
        'sort_order' => 3, //Order of the attribute in the backend. Will be the lastone if not used.
        'group' => 'General Information', //Name of the tab where the attribute will be added.
        'input' => 'textarea',
        'type' => 'text',
        'label' => 'My Custom Attribute',
        'backend' => '',
        'visible' => true,
        'required' => false,
        'visible_on_front' => true,
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    ));

    $installer->endSetup();

}catch(Exception $e){
    echo "Opps, something went wrong running the script. Sorry.";
}



