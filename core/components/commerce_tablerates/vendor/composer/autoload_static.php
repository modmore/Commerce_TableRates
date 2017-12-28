<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit09277f9d0ad65f5967501da69e2e6a27
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'modmore\\CommerceTableRates\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'modmore\\CommerceTableRates\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit09277f9d0ad65f5967501da69e2e6a27::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit09277f9d0ad65f5967501da69e2e6a27::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
