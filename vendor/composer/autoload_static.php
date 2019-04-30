<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit025f702cfa499632692f14d282d526ab
{
    public static $files = array (
        '24583d3588ebda5228dd453cfaa070da' => __DIR__ . '/..' . '/ayecode/wp-font-awesome-settings/wp-font-awesome-settings.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit025f702cfa499632692f14d282d526ab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit025f702cfa499632692f14d282d526ab::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}