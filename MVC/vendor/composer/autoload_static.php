<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1a64f2a8502f6eb0438d2c6084ac8bf9
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cakes\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cakes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1a64f2a8502f6eb0438d2c6084ac8bf9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1a64f2a8502f6eb0438d2c6084ac8bf9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1a64f2a8502f6eb0438d2c6084ac8bf9::$classMap;

        }, null, ClassLoader::class);
    }
}
