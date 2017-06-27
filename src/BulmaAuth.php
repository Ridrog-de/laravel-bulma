<?php

namespace Ridrog\Bulma;

use Illuminate\Filesystem\Filesystem;
use Ridrog\Bulma\BulmaPreset;

class BulmaAuth
{
    /**
     * Install the Bulma Auth
     *
     * @return void
     */
    public static function install()
    {
        BulmaPreset::install();

        static::createDirectories();
        static::exportViews();
        static::copyFiles();
        static::copyFonts();

    }

    protected static function createDirectories()
    {
        foreach (self::directories as $directory)
        {
            if (! is_dir(base_path($directory))) {
                mkdir(base_path($directory), 0755, true);
            }
        }
    }

    protected static function exportViews()
    {
        foreach (self::views as $view) {
            copy(
                __DIR__.'/../stubs/Views/'.$view,
                base_path('resources/views/'.$view)
            );
        }
    }

    protected static function copyFiles()
    {
        foreach (self::files as $source => $destination)
        {
            copy(
                __DIR__.'/../stubs/' . $source,
                base_path($destination)
            );
        }
    }

    protected static function copyFonts(){

        foreach (self::fonts as $font){
            copy(
                __DIR__.'/../stubs/Assets/fonts/'.$font,
                base_path('public/fonts/'.$font)
            );

        }
    }

    const directories = [
        'app/Http/Controllers',
        'public/fonts',
        'public/img/logo',
        'resources/assets/js',
        'resources/assets/sass',
        'resources/views/layouts/app',
        'resources/views/layouts/shared',
        'resources/views/auth/passwords',
        'resources/views/vendor/pagination',
        'routes',
    ];

    const files = [
        'Assets/logo/bulma.png' => 'public/img/logo/bulma.png',
        'Assets/js/bootstrap.js' => 'resources/assets/js/bootstrap.js',
        'Routes/web.php' => 'routes/web.php',
        'Controller/HomeController.php' => 'app/Http/Controllers/HomeController.php',
        'Controller/WelcomeController.php' => 'app/Http/Controllers/WelcomeController.php',

    ];

    /**
     * All the needed files for font-awesome
     *
     * ToDO Remove it and install / copy them a better way
     */
    const fonts = [
        'FontAwesome.otf',
        'fontawesome-webfont.eot',
        'fontawesome-webfont.svg',
        'fontawesome-webfont.ttf',
        'fontawesome-webfont.woff',
        'fontawesome-webfont.woff2',
    ];

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    const views = [
        'layouts/app.blade.php',
        'layouts/app/footer.blade.php',
        'layouts/app/navbar.blade.php',

        'layouts/shared/csrf.blade.php',
        'layouts/shared/globalmeta.blade.php',

        'home.blade.php',
        'welcome.blade.php',

        'auth/login.blade.php',
        'auth/register.blade.php',
        'auth/passwords\email.blade.php',
        'auth/passwords\reset.blade.php',

        'vendor/pagination/default.blade.php',
    ];

}