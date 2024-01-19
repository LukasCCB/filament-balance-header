# Filament Header Balance

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lukasccb/filament-balance-header.svg?include_prereleases)](https://packagist.org/packages/lukasccb/filament-balance-header)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/lukasccb/filament-balance-header/code-style.yml?branch=main&label=Code%20style&style=flat-square)
[![Total Downloads](https://img.shields.io/packagist/dt/lukasccb/filament-balance-header.svg)](https://packagist.org/packages/lukasccb/filament-balance-header)

Show Balance from your API or any source, displaying directly in the Header of your Filament.

![Screenshot](./.github/resources/preview.jpg)

## Installation via Composer

| Plugin Version | Filament Version | PHP Version |
|----------------|-----------------|-------------|
| 1.x            | ^2.9.15   | \> 8.0      |
| 2.x            | 3.x             | \> 8.1      |

```bash
composer require lukasccb/filament-balance-header
```

## Usage

To use this plugin register it in your panel configuration:

```php
use lukasccb\FilamentBalanceHeader\ApiBalanceHeaderPlugin;

$panel
    ->plugins([
        ApiBalanceHeaderPlugin::make()->balance("R$ 0.00"),
    ]);
```

## Configuration

You can customize any behaviour via the plugin object.

### Customizing the view
Use `php artisan vendor:publish --tag="filament-balance-header-views"` to publish the view to the `resources/views/vendor/filament-balance-header` folder. After this you can customize it as you wish!

### Visibility

By default, the package checks whether you have Spatie permissions plugin installed and checks for a role called `super_admin`. You can further customize whether the indicators should be shown.

```php
use lukasccb\FilamentBalanceHeader\ApiBalanceHeaderPlugin;

$panel->plugins([
    ApiBalanceHeaderPlugin::make()->balance("R$ 0.00")
        ->visible(fn () => auth()->user()?->can('see_indicator'))
]);
```

Or with Roles

```php
use lukasccb\FilamentBalanceHeader\ApiBalanceHeaderPlugin;

$panel->plugins([
    ApiBalanceHeaderPlugin::make()->balance("R$ 0.00")
        ->visible(fn () => auth()->user()?->role('admin'))
]);
```

### Colors

You can overwrite the default colors if you want your own colors or need to add more. The `->color()`method accepts any Filament's Color object or a closure that returns a color object.

```php
use lukasccb\FilamentBalanceHeader\ApiBalanceHeaderPlugin;
use Filament\Support\Colors\Color;

$panel->plugins([
    ApiBalanceHeaderPlugin::make()
        ->color(fn () => match (app()->environment()) {
            'production' => null,
            'staging' => Color::Orange,
            default => Color::Blue,
        })
]);
```

### Indicators

By default, both are displayed. You can turn them off separately.

```php
use lukasccb\FilamentBalanceHeader\ApiBalanceHeaderPlugin;
use Filament\Support\Colors\Color;

$panel->plugins([
    ApiBalanceHeaderPlugin::make()
        ->showBadge(false)
        ->showBorder(true)            
]);
```
Now, run `composer update`.

## Credits by Plugin Base
- [Dennis Koch](https://github.com/pxlrbt)
