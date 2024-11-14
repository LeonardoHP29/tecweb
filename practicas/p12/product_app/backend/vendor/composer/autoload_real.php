<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit86648a2a1135c7fb861ac15185d660da
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit86648a2a1135c7fb861ac15185d660da', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit86648a2a1135c7fb861ac15185d660da', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit86648a2a1135c7fb861ac15185d660da::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}