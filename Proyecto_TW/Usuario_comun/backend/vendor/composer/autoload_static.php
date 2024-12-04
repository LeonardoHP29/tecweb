<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7a764a1e5976b98b1172b868ce0956b7
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TECWEB\\MYAPI\\READ\\' => 18,
            'TECWEB\\MYAPI\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TECWEB\\MYAPI\\READ\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi/Read',
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit7a764a1e5976b98b1172b868ce0956b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7a764a1e5976b98b1172b868ce0956b7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7a764a1e5976b98b1172b868ce0956b7::$classMap;

        }, null, ClassLoader::class);
    }
}
