<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7a5954f78abebf66012b3bfb5ca88dd1
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'eftec\\bladeone\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'eftec\\bladeone\\' => 
        array (
            0 => __DIR__ . '/..' . '/eftec/bladeone/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7a5954f78abebf66012b3bfb5ca88dd1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7a5954f78abebf66012b3bfb5ca88dd1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7a5954f78abebf66012b3bfb5ca88dd1::$classMap;

        }, null, ClassLoader::class);
    }
}
