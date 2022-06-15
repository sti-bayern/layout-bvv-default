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
            ->hasAssets()
            // ->hasMigration('create_layout-bvv-default_table')
            // ->hasCommand(LayoutBvvDefaultCommand::class)
            ;
    }

}
