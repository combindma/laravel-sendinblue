<?php

namespace Combindma\Sendinblue;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SendinblueServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-sendinblue')
            ->hasConfigFile('sendinblue');
    }

    public function packageRegistered()
    {
        $this->app->singleton('laravel-sendinblue', function () {
            return new Sendinblue();
        });
    }
}
