<?php

namespace modmore\Commerce\Tests\Modules;

use modmore\CommerceTableRates\Modules\TableRates;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

class TableRatesTest extends \PHPUnit_Framework_TestCase
{
    protected static $csv = 'Land,Region/Bundesland,PLZ,"Gewicht (und darüber)",Versandpreis
AUT,*,*,0.0000,3.2000
AUT,*,*,389.0000,6.0000
AUT,*,*,889.0000,9.9000
BEL,*,*,0.0000,3.2000
BEL,*,*,389.0000,6.0000
BEL,*,*,889.0000,9.9000
CZE,*,*,0.0000,3.2000
CZE,*,*,389.0000,6.0000
CZE,*,*,889.0000,14.0000
DEU,*,*,0.0000,1.5000
DEU,*,*,389.0000,2.1000
DEU,*,*,889.0000,4.4000
DNK,*,*,0.0000,3.2000
DNK,*,*,389.0000,6.0000
DNK,*,*,889.0000,14.0000
ESP,*,*,0.0000,3.2000
ESP,*,*,389.0000,6.0000
ESP,*,*,889.0000,25.7000
FRA,*,*,0.0000,3.2000
FRA,*,*,389.0000,6.0000
FRA,*,*,889.0000,17.4000
GBR,*,*,0.0000,3.2000
GBR,*,*,389.0000,6.0000
GBR,*,*,889.0000,17.4000
HUN,*,*,0.0000,3.2000
HUN,*,*,389.0000,6.0000
HUN,*,*,889.0000,21.4000
IRL,*,*,0.0000,3.2000
IRL,*,*,389.0000,6.0000
IRL,*,*,889.0000,25.7000
ITA,*,*,0.0000,3.2000
ITA,Region,*,389.0000,6.0000
ITA,Other Region,*,889.0000,21.4000
LUX,*,*,0.0000,3.2000
LUX,*,*,389.0000,6.0000
LUX,*,*,889.0000,9.9000
MCO,*,*,0.0000,3.2000
MCO,*,*,389.0000,6.0000
MCO,*,*,889.0000,21.4000
NLD,*,*,0.0000,3.2000
NLD,Friesland,*,389.0000,6.0000
NLD,Friesland,8926PR,889.0000,9.9000
NLD,Friesland,892*|891*,0.0000,12.9000
POL,*,*,0.0000,3.2000
POL,*,*,389.0000,6.0000
POL,*,*,889.0000,21.4000
PRT,*,*,0.0000,3.2000
PRT,*,*,389.0000,6.0000
PRT,*,*,889.0000,25.7000
SVK,*,*,0.0000,3.2000
SVK,*,*,389.0000,6.0000
SVK,*,*,889.0000,21.4000
SVK,*,*,1651.0000,22.8000
SVN,*,*,0.0000,3.2000
SVN,*,*,389.0000,6.0000
SVN,*,*,889.0000,8.9000
SWE,*,*,0.0000,3.2000
SWE,*,*,389.0000,6.0000
SWE,*,*,889.0000,25.7000
SWE,*,*,1651.0000,27.0000';
    /** @var \Commerce $commerce */
    public $commerce;
    /** @var \modmore\Commerce\Adapter\AdapterInterface $adapter */
    public $adapter;
    /** @var TableRates $module */
    public $module;

    public function setUp()
    {
        global $commerce;
        $this->commerce = $commerce;
        $this->adapter = $this->commerce->adapter;

        $this->module = new TableRates($this->commerce);
        $this->module->initialize($this->commerce->dispatcher);
    }

    /**
     * @dataProvider providerThreeToTwo
     * @param $threeCode
     * @param $expected
     */
    public function testThreeToTwo($threeCode, $expected)
    {
        /** @var \TableRatesShippingMethod $method */
        $method = $this->adapter->newObject('TableRatesShippingMethod');
        self::assertEquals($expected, $method->convertCountryThreeToTwo($threeCode));
    }

    public function providerThreeToTwo()
    {
        return [
            ['NLD', 'NL'],
            ['LUX', 'LU'],
            ['USA', 'US'],
            ['ITA', 'IT'],
        ];
    }

    /**
     * @dataProvider providerGetMatchingOptions
     * @param $csv
     * @param $country
     * @param $state
     * @param $zip
     * @param $expected
     */
    public function testGetMatchingOptions($csv, $country, $state, $zip, $expected)
    {
        /** @var \TableRatesShippingMethod $method */
        $method = $this->adapter->newObject('TableRatesShippingMethod');
        $actual = $method->getDestinationOptions($csv, $country, $state, $zip);
        self::assertEquals($expected, $actual);
    }

    public function providerGetMatchingOptions()
    {
        return [
            [
                self::$csv, 'SE', 'Foo', '53234', [
                    [
                        'country' => 'SE',
                        'state' => '*',
                        'zip' => '*',
                        'condition' => '0.0000',
                        'price' => '3.2000'
                    ],
                    [
                        'country' => 'SE',
                        'state' => '*',
                        'zip' => '*',
                        'condition' => '389.0000',
                        'price' => '6.0000'
                    ],
                    [
                        'country' => 'SE',
                        'state' => '*',
                        'zip' => '*',
                        'condition' => '889.0000',
                        'price' => '25.7000'
                    ],
                    [
                        'country' => 'SE',
                        'state' => '*',
                        'zip' => '*',
                        'condition' => '1651.0000',
                        'price' => '27.0000'
                    ],
                ]
            ],[
                self::$csv, 'IT', 'Region', '123456', [
                    [
                        'country' => 'IT',
                        'state' => '*',
                        'zip' => '*',
                        'condition' => '0.0000',
                        'price' => '3.2000'
                    ],
                    [
                        'country' => 'IT',
                        'state' => 'Region',
                        'zip' => '*',
                        'condition' => '389.0000',
                        'price' => '6.0000'
                    ],
                ]
            ],[
                self::$csv, 'NL', 'Friesland', '8926PR', [
                    [
                        'country' => 'NL',
                        'state' => '*',
                        'zip' => '*',
                        'condition' => '0.0000',
                        'price' => '3.2000'
                    ],
                    [
                        'country' => 'NL',
                        'state' => 'Friesland',
                        'zip' => '*',
                        'condition' => '389.0000',
                        'price' => '6.0000'
                    ],
                    [
                        'country' => 'NL',
                        'state' => 'Friesland',
                        'zip' => '8926PR',
                        'condition' => '889.0000',
                        'price' => '9.9000'
                    ],
                    [
                        'country' => 'NL',
                        'state' => 'Friesland',
                        'zip' => '892*|891*',
                        'condition' => '0.0000',
                        'price' => '12.9000'
                    ],
                ]
            ],[
                self::$csv, 'NL', 'Friesland', '8921AB', [
                    [
                        'country' => 'NL',
                        'state' => '*',
                        'zip' => '*',
                        'condition' => '0.0000',
                        'price' => '3.2000'
                    ],
                    [
                        'country' => 'NL',
                        'state' => 'Friesland',
                        'zip' => '*',
                        'condition' => '389.0000',
                        'price' => '6.0000'
                    ],
                    [
                        'country' => 'NL',
                        'state' => 'Friesland',
                        'zip' => '892*|891*',
                        'condition' => '0.0000',
                        'price' => '12.9000'
                    ],
                ]
            ]
        ];
    }

    /**
     * @dataProvider providerMatchingWeightPrice
     * @param array $options
     * @param Mass $weight
     * @param $expected
     */
    public function testMatchingWeightPrice(array $options, Mass $weight, $expected)
    {
        /** @var \TableRatesShippingMethod $method */
        $method = $this->adapter->newObject('TableRatesShippingMethod');
        self::assertEquals($expected, $method->getMatchForWeight($options, $weight));
    }

    public function providerMatchingWeightPrice()
    {
        return [
            [
                [
                    ['condition' => '0.0000', 'price' => '3.2000'],
                    ['condition' => '389.0000', 'price' => '6.000'],
                    ['condition' => '889.0000', 'price' => '9.900'],
                ],
                new Mass(15, 'g'),
                320
            ],
            [
                [
                    ['condition' => '0.0000', 'price' => '3.2000'],
                    ['condition' => '389.0000', 'price' => '6.000'],
                    ['condition' => '889.0000', 'price' => '9.900'],
                ],
                new Mass(15, 'kg'),
                990
            ],
            [
                [
                    ['condition' => '0.0000', 'price' => '3.2000'],
                    ['condition' => '389.0000', 'price' => '6.000'],
                    ['condition' => '889.0000', 'price' => '9.900'],
                ],
                new Mass(3, 'lbs'),
                990
            ],
        ];
    }
}
