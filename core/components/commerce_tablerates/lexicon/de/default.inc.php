<?php

$_lang['commerce_tablerates'] = 'Tabellenbasierte Versandmethode';
$_lang['commerce_tablerates.module_description'] = 'Wenn dieses Modul aktiviert wird, wird eine neue Versandmethode namens "Tabellenbasierte Versandmethode" unter Commerce > Konfiguration > Versandmethoden verfügbar. Diese tabellenbasierte Versandmethode unterstützt die Komma-separierte Versandart, wie sie auch in Magento verwendet wird, um dynamische Versandarten bereitzustellen. Kompatibel mit der tablerates.csv Datei aus Magento.';
$_lang['commerce_tablerates.section_title'] = 'Tabellenbasiert';
$_lang['commerce_tablerates.condition'] = 'Bedingung';
$_lang['commerce_tablerates.condition.weight'] = 'Gewicht gegen Ziel';
$_lang['commerce_tablerates.condition.price'] = 'Preis gegen Ziel';
$_lang['commerce_tablerates.condition.items'] = 'Produktanzahl gegen Ziel';
$_lang['commerce_tablerates.csvdata'] = 'Komma-separierte Daten';
$_lang['commerce_tablerates.csvdata.description'] = 'Die Komma-separierten Daten, die Ihre Regeln bezüglich Ziel, Bedingung (Gewicht oder Entfernung) und Preis beinhalten. Pro Zeile sollten folgende Angaben gemacht werden: Länderkürzel (2-stellig präferiert, 3-stellig wird auch unterstützt), Region/Bundesland, PLZ, Wert der gewählten Bedingung, und der Preis als Dezimalstelle. Beispiel für Gewicht (in Gramm) gegen Ziel: <code>DE,*,*,300,2.50</code>';

// Some lexicons are automatically called by the commerce core, based on the product class name, so add those.
$_lang['commerce.TableRatesShippingMethod'] = 'Tabellenbasierte Versandmethode';
$_lang['commerce.add_TableRatesShippingMethod'] = 'Tabellenbasierte Versandmethode hinzufügen';
