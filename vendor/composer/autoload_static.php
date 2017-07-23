<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd6e62cad641ae030bb7321895434147b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Finder\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd6e62cad641ae030bb7321895434147b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd6e62cad641ae030bb7321895434147b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}