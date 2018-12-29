<?php
$installer = $this;
$installer->startSetup();
$attribute  = array(
    'type' => 'varchar',
    'label'=> 'Category Sku',
    'input' => 'text',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'default' => "",
	'unique' => true,
    'group' => "General Information"
);
$installer->addAttribute('catalog_category', 'category_sku', $attribute);
$installer->endSetup();
?>