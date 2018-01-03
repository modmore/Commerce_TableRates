<?php

$_lang['commerce_tablerates'] = 'Tarieventabel verzendmethode';
$_lang['commerce_tablerates.module_description'] = 'Als deze module is ingeschakeld is, zal een nieuwe tarieventabel verzendmethode beschikbaar zijn in Commerce > Configuratie > Verzendmethoden. Deze verzendmethode maakt het mogelijk om verzendtarieven te beheren met een kommagescheiden lijst van bestemmingen, gewicht, aantal producten, of subtotaal. Dit is compatibel met Magento\'s Table Rates systeem voor dynamische verzendtarieven.';
$_lang['commerce_tablerates.section_title'] = 'Tarieventabel';
$_lang['commerce_tablerates.condition'] = 'Voorwaarde';
$_lang['commerce_tablerates.condition.weight'] = 'Gewicht / bestemming';
$_lang['commerce_tablerates.condition.price'] = 'Prijs / bestemming';
$_lang['commerce_tablerates.condition.items'] = 'Aantal producten / bestemming';
$_lang['commerce_tablerates.csvdata'] = 'Kommagescheiden gegevens';
$_lang['commerce_tablerates.csvdata.description'] = 'De kommagescheiden regels voor bestemmingen en de bijbehorende voorwaarde en verzendprijs. Per rij moet dit het volgende bevatten: landcode (bij voorkeur 2 karakter code, 3 karakter code ook ondersteund), provincie/staat, postcode, de waarde voor de geselecteerde voorwaarde, en de verzendprijs als decimaal nummer.';

// Some lexicons are automatically called by the commerce core, based on the product class name, so add those.
$_lang['commerce.TableRatesShippingMethod'] = 'Tarieventabel verzendmethode';
$_lang['commerce.add_TableRatesShippingMethod'] = 'Tarieventabel verzendmethode toevoegen';
