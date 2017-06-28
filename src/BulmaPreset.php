<?php

namespace Ridrog\Bulma;

use Illuminate\Filesystem\Filesystem;

class BulmaPreset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::checkFolder();
        static::updatePackages();
        static::updateSass();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        unset(
            $packages['bootstrap-sass']
        );

        return [
                'bulma' => '^0.4.2',
                'font-awesome' => '^4.7.0',
            ] + $packages;
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        copy(base_path('/../stubs/Assets/sass/_variables.scss'), resource_path('assets/sass/_variables.scss'));
        copy(base_path('/../stubs/Assets/sass/app.scss'), resource_path('assets/sass/app.scss'));
    }

    protected static function updatePackages()
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages['devDependencies'] = static::updatePackageArray(
            $packages['devDependencies']
        );

        ksort($packages['devDependencies']);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    /**
     * Remove the installed Node modules.
     *
     * @return void
     */
    protected static function removeNodeModules()
    {
        tap(new Filesystem, function ($files) {
            $files->deleteDirectory(base_path('node_modules'));

            $files->delete(base_path('yarn.lock'));
        });
    }

    protected static function checkFolder()
    {
        if (! is_dir(base_path('resources\assets/sass'))) {
            mkdir(base_path('resources\assets/sass/_'), 0755, true);
        }
    }
}