<?php

use modmore\Commerce\Admin\Widgets\Form\NumberField;
use modmore\Commerce\Admin\Widgets\Form\SelectField;
use modmore\Commerce\Admin\Widgets\Form\Tab;
use modmore\Commerce\Admin\Widgets\Form\TextareaField;
use modmore\Commerce\Admin\Widgets\Form\WeightUnitField;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

/**
 * TableRates extension for Commerce
 *
 * Copyright 2018 by Mark Hamstra <mark@modmore.com>
 *
 * This file is meant to be used with Commerce by modmore. A valid Commerce license is required.
 *
 * @package commerce_tablerates
 * @author Mark Hamstra <mark@modmore.com>
 * @license See core/components/commerce_tablerates/docs/license.txt
 */
class TableRatesShippingMethod extends comShippingMethod
{
    static protected $countryCodeThreeToTwo = [
        'BGD' => 'BD',
        'BEL' => 'BE',
        'BFA' => 'BF',
        'BGR' => 'BG',
        'BIH' => 'BA',
        'BRB' => 'BB',
        'WLF' => 'WF',
        'BLM' => 'BL',
        'BMU' => 'BM',
        'BRN' => 'BN',
        'BOL' => 'BO',
        'BHR' => 'BH',
        'BDI' => 'BI',
        'BEN' => 'BJ',
        'BTN' => 'BT',
        'JAM' => 'JM',
        'BVT' => 'BV',
        'BWA' => 'BW',
        'WSM' => 'WS',
        'BES' => 'BQ',
        'BRA' => 'BR',
        'BHS' => 'BS',
        'JEY' => 'JE',
        'BLR' => 'BY',
        'BLZ' => 'BZ',
        'RUS' => 'RU',
        'RWA' => 'RW',
        'SRB' => 'RS',
        'TLS' => 'TL',
        'REU' => 'RE',
        'TKM' => 'TM',
        'TJK' => 'TJ',
        'ROU' => 'RO',
        'TKL' => 'TK',
        'GNB' => 'GW',
        'GUM' => 'GU',
        'GTM' => 'GT',
        'SGS' => 'GS',
        'GRC' => 'GR',
        'GNQ' => 'GQ',
        'GLP' => 'GP',
        'JPN' => 'JP',
        'GUY' => 'GY',
        'GGY' => 'GG',
        'GUF' => 'GF',
        'GEO' => 'GE',
        'GRD' => 'GD',
        'GBR' => 'GB',
        'GAB' => 'GA',
        'SLV' => 'SV',
        'GIN' => 'GN',
        'GMB' => 'GM',
        'GRL' => 'GL',
        'GIB' => 'GI',
        'GHA' => 'GH',
        'OMN' => 'OM',
        'TUN' => 'TN',
        'JOR' => 'JO',
        'HRV' => 'HR',
        'HTI' => 'HT',
        'HUN' => 'HU',
        'HKG' => 'HK',
        'HND' => 'HN',
        'HMD' => 'HM',
        'VEN' => 'VE',
        'PRI' => 'PR',
        'PSE' => 'PS',
        'PLW' => 'PW',
        'PRT' => 'PT',
        'SJM' => 'SJ',
        'PRY' => 'PY',
        'IRQ' => 'IQ',
        'PAN' => 'PA',
        'PYF' => 'PF',
        'PNG' => 'PG',
        'PER' => 'PE',
        'PAK' => 'PK',
        'PHL' => 'PH',
        'PCN' => 'PN',
        'POL' => 'PL',
        'SPM' => 'PM',
        'ZMB' => 'ZM',
        'ESH' => 'EH',
        'EST' => 'EE',
        'EGY' => 'EG',
        'ZAF' => 'ZA',
        'ECU' => 'EC',
        'ITA' => 'IT',
        'VNM' => 'VN',
        'SLB' => 'SB',
        'ETH' => 'ET',
        'SOM' => 'SO',
        'ZWE' => 'ZW',
        'SAU' => 'SA',
        'ESP' => 'ES',
        'ERI' => 'ER',
        'MNE' => 'ME',
        'MDA' => 'MD',
        'MDG' => 'MG',
        'MAF' => 'MF',
        'MAR' => 'MA',
        'MCO' => 'MC',
        'UZB' => 'UZ',
        'MMR' => 'MM',
        'MLI' => 'ML',
        'MAC' => 'MO',
        'MNG' => 'MN',
        'MHL' => 'MH',
        'MKD' => 'MK',
        'MUS' => 'MU',
        'MLT' => 'MT',
        'MWI' => 'MW',
        'MDV' => 'MV',
        'MTQ' => 'MQ',
        'MNP' => 'MP',
        'MSR' => 'MS',
        'MRT' => 'MR',
        'IMN' => 'IM',
        'UGA' => 'UG',
        'TZA' => 'TZ',
        'MYS' => 'MY',
        'MEX' => 'MX',
        'ISR' => 'IL',
        'FRA' => 'FR',
        'IOT' => 'IO',
        'SHN' => 'SH',
        'FIN' => 'FI',
        'FJI' => 'FJ',
        'FLK' => 'FK',
        'FSM' => 'FM',
        'FRO' => 'FO',
        'NIC' => 'NI',
        'NLD' => 'NL',
        'NOR' => 'NO',
        'NAM' => 'NA',
        'VUT' => 'VU',
        'NCL' => 'NC',
        'NER' => 'NE',
        'NFK' => 'NF',
        'NGA' => 'NG',
        'NZL' => 'NZ',
        'NPL' => 'NP',
        'NRU' => 'NR',
        'NIU' => 'NU',
        'COK' => 'CK',
        'XKX' => 'XK',
        'CIV' => 'CI',
        'CHE' => 'CH',
        'COL' => 'CO',
        'CHN' => 'CN',
        'CMR' => 'CM',
        'CHL' => 'CL',
        'CCK' => 'CC',
        'CAN' => 'CA',
        'COG' => 'CG',
        'CAF' => 'CF',
        'COD' => 'CD',
        'CZE' => 'CZ',
        'CYP' => 'CY',
        'CXR' => 'CX',
        'CRI' => 'CR',
        'CUW' => 'CW',
        'CPV' => 'CV',
        'CUB' => 'CU',
        'SWZ' => 'SZ',
        'SYR' => 'SY',
        'SXM' => 'SX',
        'KGZ' => 'KG',
        'KEN' => 'KE',
        'SSD' => 'SS',
        'SUR' => 'SR',
        'KIR' => 'KI',
        'KHM' => 'KH',
        'KNA' => 'KN',
        'COM' => 'KM',
        'STP' => 'ST',
        'SVK' => 'SK',
        'KOR' => 'KR',
        'SVN' => 'SI',
        'PRK' => 'KP',
        'KWT' => 'KW',
        'SEN' => 'SN',
        'SMR' => 'SM',
        'SLE' => 'SL',
        'SYC' => 'SC',
        'KAZ' => 'KZ',
        'CYM' => 'KY',
        'SGP' => 'SG',
        'SWE' => 'SE',
        'SDN' => 'SD',
        'DOM' => 'DO',
        'DMA' => 'DM',
        'DJI' => 'DJ',
        'DNK' => 'DK',
        'VGB' => 'VG',
        'DEU' => 'DE',
        'YEM' => 'YE',
        'DZA' => 'DZ',
        'USA' => 'US',
        'URY' => 'UY',
        'MYT' => 'YT',
        'UMI' => 'UM',
        'LBN' => 'LB',
        'LCA' => 'LC',
        'LAO' => 'LA',
        'TUV' => 'TV',
        'TWN' => 'TW',
        'TTO' => 'TT',
        'TUR' => 'TR',
        'LKA' => 'LK',
        'LIE' => 'LI',
        'LVA' => 'LV',
        'TON' => 'TO',
        'LTU' => 'LT',
        'LUX' => 'LU',
        'LBR' => 'LR',
        'LSO' => 'LS',
        'THA' => 'TH',
        'ATF' => 'TF',
        'TGO' => 'TG',
        'TCD' => 'TD',
        'TCA' => 'TC',
        'LBY' => 'LY',
        'VAT' => 'VA',
        'VCT' => 'VC',
        'ARE' => 'AE',
        'AND' => 'AD',
        'ATG' => 'AG',
        'AFG' => 'AF',
        'AIA' => 'AI',
        'VIR' => 'VI',
        'ISL' => 'IS',
        'IRN' => 'IR',
        'ARM' => 'AM',
        'ALB' => 'AL',
        'AGO' => 'AO',
        'ATA' => 'AQ',
        'ASM' => 'AS',
        'ARG' => 'AR',
        'AUS' => 'AU',
        'AUT' => 'AT',
        'ABW' => 'AW',
        'IND' => 'IN',
        'ALA' => 'AX',
        'AZE' => 'AZ',
        'IRL' => 'IE',
        'IDN' => 'ID',
        'UKR' => 'UA',
        'QAT' => 'QA',
        'MOZ' => 'MZ',
    ];

    /**
     * Adds the fields for managing the table rates
     *
     * @return array
     */
    public function getModelFields()
    {
        $fields = [];

        $fields[] = new Tab($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_tablerates.section_title')
        ]);
        $fields[] = new SelectField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_tablerates.condition'),
            'name' => 'properties[condition]',
            'value' => $this->getProperty('condition', 'weight'),
            'options' => [
                [
                    'label' => $this->adapter->lexicon('commerce_tablerates.condition.weight'),
                    'value' => 'weight',
                ],
//                [
//                    'label' => $this->adapter->lexicon('commerce_tablerates.condition.price'),
//                    'value' => 'price',
//                ],
//                [
//                    'label' => $this->adapter->lexicon('commerce_tablerates.condition.items'),
//                    'value' => 'items',
//                ]
            ]
        ]);
        $fields[] = new WeightUnitField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce.weight_unit'),
            'name' => 'properties[weight_unit]',
            'value' => $this->getProperty('weight_unit', 'g')
        ]);
        $fields[] = new TextareaField($this->commerce, [
            'label' => $this->adapter->lexicon('commerce_tablerates.csvdata'),
            'description' => $this->adapter->lexicon('commerce_tablerates.csvdata.description'),
            'name' => 'properties[csvdata]',
            'value' => $this->getProperty('csvdata', ''),
        ]);

        $fields[] = new NumberField($this->commerce, [
            'name' => 'properties[min_weight]',
            'label' => $this->adapter->lexicon('commerce.min_weight'),
            'value' => $this->getProperty('min_weight', 0),
        ]);

        $fields[] = new NumberField($this->commerce, [
            'name' => 'properties[max_weight]',
            'label' => $this->adapter->lexicon('commerce.max_weight'),
            'value' => $this->getProperty('max_weight', 0),
        ]);

        return $fields;
    }

    /**
     * Grabs the right price from the table rates for the provided order shipment.
     *
     * This will look through the options first for the destination, and then for the matching condition.
     *
     * @param comOrderShipment $shipment
     * @return int
     */
    public function getPriceForShipment(comOrderShipment $shipment)
    {
        // Grab the order and shipping address.
        $order = $shipment->getOrder();
        if (!$order) {
            return parent::getPriceForShipment($shipment);
        }

        $options = $this->getFilteredOptions($shipment);
        if (count($options)) {
            return $this->getPriceFromOptions($options);
        }

        return parent::getPriceForShipment($shipment);
    }

    /**
     * Out of a filtered list of $options available for the destination, this will
     * choose the option that matches a weight condition.
     *
     * @param array $options
     * @param Mass $weight
     * @return int
     */
    public function getMatchForWeight(array $options, Mass $weight)
    {
        $price = 0;
        foreach ($options as $option) {
            try {
                $optWeight = new Mass((float)$option['condition'], $this->getProperty('weight_unit', 'g'));
                if ($weight->subtract($optWeight)->toUnit($this->getProperty('weight_unit', 'g')) > 0) {
                    $price = (int)((float)$option['price'] * 100);
                }
            } catch (Exception $e) {
            }
        }

        return $price;
    }

    /**
     * Build list of options for a shipment based on the destination and matching conditions
     *
     * @param comOrderShipment $shipment
     *
     * @return array
     */
    public function getFilteredOptions(comOrderShipment $shipment): array
    {
        // Grab the order and shipping address.
        $order = $shipment->getOrder();
        if (!$order) {
            return [];
        }
        $address = $order->getShippingAddress();
        if (!$address) {
            $address = $order->getExpectedAddress();
        }
        if (!$address) {
            return [];
        }

        $data = $this->getProperty('csvdata');
        $country = $address->get('country');
        $state = $address->get('state');
        $zip = $address->get('zip');
        $options = $this->getMatchingOptions($data, $country, $state, $zip);

        switch ($this->getProperty('condition', 'weight')) {
            case 'weight':
                return $this->filterWeightOptions($options, $shipment->getWeight());
//            case 'price':
//                return $this->filterPriceOptions($options, $shipment->getWeight());
//            case 'items':
//                return $this->filterItemOptions($options, $shipment->getWeight());
        }

        return $options;
    }

    /**
     * Filters the raw CSV $data to only return options that match the current destination.
     *
     * @param string $data The data as CSV
     * @param string $actualCountry
     * @param string $actualState
     * @param string $actualZip
     * @return array
     */
    public function getMatchingOptions($data, $actualCountry, $actualState, $actualZip)
    {
        $options = [];
        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            [$countryCode, $state, $zip, $condition, $price] = array_map('trim', explode(',', $line));
            if (strlen($countryCode) === 3) {
                $countryCode = $this->convertCountryThreeToTwo($countryCode);
            }

            // Check all the fields in order. * represents any value is accepted.
            if ($countryCode !== $actualCountry && $countryCode !== '*') {
                continue;
            }
            if ($state !== $actualState && $state !== '*') {
                continue;
            }
            // explode by |, check for * suffix
            $zipCodes = array_map('trim', explode('|', $zip));
            $hasZipMatch = false;
            foreach ($zipCodes as $zipCode) {
                if ($zipCode === $actualZip || $zipCode === '*') {
                    $hasZipMatch = true;
                } elseif (substr($zipCode, -1) === '*') {
                    $firstPart = substr($actualZip, 0, strlen($zipCode) - 1);
                    if (strpos($zipCode, $firstPart) === 0) {
                        $hasZipMatch = true;
                    }
                }
            }
            if (!$hasZipMatch) {
                continue;
            }
            // Add to the return array
            $options[] = [
                'country' => $countryCode,
                'state' => $state,
                'zip' => $zip,
                'condition' => $condition,
                'price' => $price
            ];
        }

        return $options;
    }

    /**
     * Filter a set of options by the weight condition; options should already have been filtered down by destination.
     *
     * @param array $options
     * @param Mass $weight
     *
     * @return array
     */
    private function filterWeightOptions(array $options, Mass $weight): array
    {
        $validOptions = [];
        foreach ($options as $option) {
            try {
                $optWeight = new Mass((float)$option['condition'], $this->getProperty('weight_unit', 'g'));
                if ($weight->subtract($optWeight)->toUnit($this->getProperty('weight_unit', 'g')) >= 0) {
                    $validOptions[] = $option;
                }
            } catch (Exception $e) {
            }
        }

        return $validOptions;
    }

    /**
     * Get the price value (in int form) from a set of available options
     *
     * @param array $options
     *
     * @return int
     */
    private function getPriceFromOptions(array $options): int
    {
        $price = 0;
        // TableRates expects to use the last option, so just get that
        if (count($options)) {
            $option = $options[array_key_last($options)];
            $price = (int)((float)$option['price'] * 100);
        }

        return $price;
    }


    /**
     * Utility to convert 3 character country codes to the 2 character country codes
     * that are used in Commerce.
     *
     * @param string $countryCode
     * @return string
     */
    public function convertCountryThreeToTwo(string $countryCode): string
    {
        if (array_key_exists($countryCode, self::$countryCodeThreeToTwo)) {
            return self::$countryCodeThreeToTwo[$countryCode];
        }

        return $countryCode;
    }

    public function isAvailableForShipment(comOrderShipment $shipment): bool
    {
        if (!parent::isAvailableForShipment($shipment)) {
            return false;
        }

        $unit = $this->getProperty('weight_unit', 'kg');
        $totalWeight = $shipment->getWeight();
        $totalWeightValue = $totalWeight->toUnit($unit);

        $min = $this->getProperty('min_weight');
        if ($min > $totalWeightValue) {
            return false;
        }

        $max = $this->getProperty('max_weight');
        if ($max > 0 && $totalWeightValue >= $max) {
            return false;
        }

        $options = $this->getFilteredOptions($shipment);

        return count($options);
    }
}
