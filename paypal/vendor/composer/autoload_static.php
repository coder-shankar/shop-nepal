<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteec6f3ed7cc5cc0925abf31fa5c694fe
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PayPal' => 
            array (
                0 => __DIR__ . '/..' . '/paypal/rest-api-sdk-php/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteec6f3ed7cc5cc0925abf31fa5c694fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteec6f3ed7cc5cc0925abf31fa5c694fe::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticIniteec6f3ed7cc5cc0925abf31fa5c694fe::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}