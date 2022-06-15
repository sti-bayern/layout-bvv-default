<?php

namespace Sti\LayoutBvvDefault;

use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Sti\LayoutBvvDefault\Commands\LayoutBvvDefaultCommand;

class LayoutBvvDefaultServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('layout-bvv-default')
            // ->hasConfigFile()
            ->hasViews()
            // ->hasMigration('create_layout-bvv-default_table')
            // ->hasCommand(LayoutBvvDefaultCommand::class)
            ;
    }

    

    public function boot()
    {
        $this->bootingPackage();

        if ($this->package->hasTranslations) {
            $langPath = 'vendor/' . $this->package->shortName();

            $langPath = (function_exists('lang_path'))
                ? lang_path($langPath)
                : resource_path('lang/' . $langPath);
        }

        if ($this->app->runningInConsole()) {
            foreach ($this->package->configFileNames as $configFileName) {
                $this->publishes([
                    $this->package->basePath("/../config/{$configFileName}.php") => config_path("{$configFileName}.php"),
                ], "{$this->package->shortName()}-config");
            }

            if ($this->package->hasViews) {
                $this->publishes([
                    $this->package->basePath('/../resources/views') => base_path("resources/views/vendor/{$this->package->shortName()}"),
                ], "{$this->package->shortName()}-views");
            }

            $now = Carbon::now();
            foreach ($this->package->migrationFileNames as $migrationFileName) {
                $filePath = $this->package->basePath("/../database/migrations/{$migrationFileName}.php");
                if (! file_exists($filePath)) {
                    // Support for the .stub file extension
                    $filePath .= '.stub';
                }

                $this->publishes([
                    $filePath => $this->generateMigrationName(
                        $migrationFileName,
                        $now->addSecond()
                    ), ], "{$this->package->shortName()}-migrations");
            }

            if ($this->package->hasTranslations) {
                $this->publishes([
                    $this->package->basePath('/../resources/lang') => $langPath,
                ], "{$this->package->shortName()}-translations");
            }

            if ($this->package->hasAssets) {
                $this->publishes([
                    $this->package->basePath('/../resources/dist') => public_path("vendor/{$this->package->shortName()}"),
                ], "{$this->package->shortName()}-assets");
            }
        }

        if (! empty($this->package->commands)) {
            $this->commands($this->package->commands);
        }

        if ($this->package->hasTranslations) {
            $this->loadTranslationsFrom(
                $this->package->basePath('/../resources/lang/'),
                $this->package->shortName()
            );

            $this->loadJsonTranslationsFrom($this->package->basePath('/../resources/lang/'));

            $this->loadJsonTranslationsFrom($langPath);
        }

        if ($this->package->hasViews) {
            $this->loadViewsFrom($this->package->basePath('/../resources/views'), $this->package->viewNamespace());
        }

        foreach ($this->package->viewComponents as $componentClass => $prefix) {
            $this->loadViewComponentsAs($prefix, [$componentClass]);
        }

        if (count($this->package->viewComponents)) {
            $this->publishes([
                $this->package->basePath('/../Components') => base_path("app/View/Components/vendor/{$this->package->shortName()}"),
            ], "{$this->package->name}-components");
        }


        foreach ($this->package->routeFileNames as $routeFileName) {
            $this->loadRoutesFrom("{$this->package->basePath('/../routes/')}{$routeFileName}.php");
        }

        foreach ($this->package->sharedViewData as $name => $value) {
            View::share($name, $value);
        }

        foreach ($this->package->viewComposers as $viewName => $viewComposer) {
            View::composer($viewName, $viewComposer);
        }

        $this->packageBooted();

        return $this;
    }
}
