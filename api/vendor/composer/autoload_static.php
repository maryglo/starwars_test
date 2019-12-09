<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8423377d64ffb1c2d8a8be4c16d140b9
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Starwars_Test\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Starwars_Test\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8423377d64ffb1c2d8a8be4c16d140b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8423377d64ffb1c2d8a8be4c16d140b9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}