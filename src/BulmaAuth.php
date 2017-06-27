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
        static::copyLogo();
        static::copyController();
        static::copyRoutes();
        static::copyJS();
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
        foreach (self::views as $key => $value) {
            copy(
                __DIR__.'/../stubs/Views/'.$key,
                base_path('resources/views/'.$value)
            );
        }
    }

    protected static function copyLogo()
    {
        copy(
            __DIR__.'/../stubs/Assets/logo/bulma.png',
            base_path('public/img/logo/bulma.png')
        );
    }

    protected static function copyRoutes()
    {
        copy(
            __DIR__.'/../stubs/Routes/web.php',
            base_path('routes/web.php')
        );
    }

    protected static function copyController()
    {
        copy(
            __DIR__.'/../stubs/Controller/HomeController.php',
            base_path('app/Http/Controllers/HomeController.php')
        );

        copy(
            __DIR__.'/../stubs/Controller/WelcomeController.php',
            base_path('app/Http/Controllers/WelcomeController.php')
        );
    }

    protected static function copySass()
    {
        copy(
            __DIR__.'/../stubs/Assets/sass/app.scss',
            base_path('resources/assets/sass/app.scss')
        );

        copy(
            __DIR__.'/../stubs/Assets/sass/_variables.scss',
            base_path('resources/assets/sass/_variables.scss')
        );

    }

    protected static function copyJS()
    {
        copy(
            __DIR__.'/../stubs/Assets/js/bootstrap.js',
            base_path('resources/assets/js/bootstrap.js')
        );

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
        'layouts\app.blade.php' => 'layouts/app.blade.php',
        'layouts\app\footer.blade.php' => 'layouts/app/footer.blade.php',
        'layouts\app\navbar.blade.php' => 'layouts/app/navbar.blade.php',

        'layouts\shared\csrf.blade.php' => 'layouts/shared/csrf.blade.php',
        'layouts\shared\globalmeta.blade.php' => 'layouts/shared/globalmeta.blade.php',

        'home.blade.php' => 'home.blade.php',
        'welcome.blade.php' => 'welcome.blade.php',

        'auth\login.blade.php' => 'auth/login.blade.php',
        'auth\register.blade.php' => 'auth/register.blade.php',
        'auth\passwords\email.blade.php' => 'auth/passwords\email.blade.php',
        'auth\passwords\reset.blade.php' => 'auth/passwords\reset.blade.php',

        'pagination\default.blade.php' => 'vendor/pagination/default.blade.php',

    ];

}