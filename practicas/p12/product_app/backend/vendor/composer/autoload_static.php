<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit86648a2a1135c7fb861ac15185d660da
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TECWEB\\MYAPI\\UPDATE\\' => 20,
            'TECWEB\\MYAPI\\READ\\' => 18,
            'TECWEB\\MYAPI\\DELETE\\' => 20,
            'TECWEB\\MYAPI\\CREATE\\' => 20,
            'TECWEB\\MYAPI\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TECWEB\\MYAPI\\UPDATE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi/Update',
        ),
        'TECWEB\\MYAPI\\READ\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi/Read',
        ),
        'TECWEB\\MYAPI\\DELETE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi/Delete',
        ),
        'TECWEB\\MYAPI\\CREATE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi/Create',
        ),
        'TECWEB\\MYAPI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit86648a2a1135c7fb861ac15185d660da::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit86648a2a1135c7fb861ac15185d660da::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit86648a2a1135c7fb861ac15185d660da::$classMap;

        }, null, ClassLoader::class);
    }
}
