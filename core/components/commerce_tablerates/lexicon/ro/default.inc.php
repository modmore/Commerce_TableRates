<?php

$_lang['commerce_tablerates'] = 'TableRates Shipping Method';
$_lang['commerce_tablerates.module_description'] = 'When the module is enabled, a new TableRates shipping method becomes available in Commerce > Configuration > Shipping Methods. This shipping method supports managing shipping rates with comma separated data that is compatible with Magento\'s TableRates system for managing dynamic shipping rates.';
$_lang['commerce_tablerates.section_title'] = 'TableRates';
$_lang['commerce_tablerates.condition'] = 'Condition';
$_lang['commerce_tablerates.condition.weight'] = 'Weight to destination';
$_lang['commerce_tablerates.condition.price'] = 'Price to destination';
$_lang['commerce_tablerates.condition.items'] = 'Number of items to destination';
$_lang['commerce_tablerates.csvdata'] = 'Comma-separated data';
$_lang['commerce_tablerates.csvdata.description'] = 'The comma separated data that contains your rules for destinations and the associated condition, and shipping price. Per row, this should contain: country code (2 character prefered, 3 character supported), region/state, zipcode, the value for the selected condition, and the shipping price as decimal.';

// Some lexicons are automatically called by the commerce core, based on the product class name, so add those.
$_lang['commerce.TableRatesShippingMethod'] = 'TableRates Shipping Method';
$_lang['commerce.add_TableRatesShippingMethod'] = 'Add TableRates Shipping Method';
