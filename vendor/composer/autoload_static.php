<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbee5f8915afe73ce2e0ffb9439403241
{
    public static $files = array (
        '22177d82d05723dff5b1903f4496520e' => __DIR__ . '/..' . '/alleyinteractive/wordpress-autoloader/src/class-autoloader.php',
        'd0b4d9ff2237dcc1a532ae9d039c0c2c' => __DIR__ . '/..' . '/alleyinteractive/composer-wordpress-autoloader/src/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Svg\\' => 4,
            'Sabberworm\\CSS\\' => 15,
        ),
        'M' => 
        array (
            'Masterminds\\' => 12,
        ),
        'F' => 
        array (
            'FontLib\\' => 8,
        ),
        'D' => 
        array (
            'Dompdf\\' => 7,
        ),
        'C' => 
        array (
            'ComposerWordPressAutoloader\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Svg\\' => 
        array (
            0 => __DIR__ . '/..' . '/phenx/php-svg-lib/src/Svg',
        ),
        'Sabberworm\\CSS\\' => 
        array (
            0 => __DIR__ . '/..' . '/sabberworm/php-css-parser/src',
        ),
        'Masterminds\\' => 
        array (
            0 => __DIR__ . '/..' . '/masterminds/html5/src',
        ),
        'FontLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phenx/php-font-lib/src/FontLib',
        ),
        'Dompdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/dompdf/dompdf/src',
        ),
        'ComposerWordPressAutoloader\\' => 
        array (
            0 => __DIR__ . '/..' . '/alleyinteractive/composer-wordpress-autoloader/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Dompdf\\Cpdf' => __DIR__ . '/..' . '/dompdf/dompdf/lib/Cpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbee5f8915afe73ce2e0ffb9439403241::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbee5f8915afe73ce2e0ffb9439403241::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbee5f8915afe73ce2e0ffb9439403241::$classMap;

        }, null, ClassLoader::class);
    }
}
