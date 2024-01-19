<?php

namespace lukasccb\FilamentBalanceHeader;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentBalanceHeaderServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-balance-header';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews();
    }
}
