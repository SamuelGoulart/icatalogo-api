<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita03aa5ae20de0b12827c7a03573c3db5
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita03aa5ae20de0b12827c7a03573c3db5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita03aa5ae20de0b12827c7a03573c3db5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita03aa5ae20de0b12827c7a03573c3db5::$classMap;

        }, null, ClassLoader::class);
    }
}