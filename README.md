# PHP Weight Conversions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jacobfitzp/weight-conversions.svg?style=flat-square)](https://packagist.org/packages/jacobfitzp/weight-conversions)
[![Tests](https://img.shields.io/github/actions/workflow/status/jacobfitzp/weight-conversions/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jacobfitzp/weight-conversions/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/jacobfitzp/weight-conversions.svg?style=flat-square)](https://packagist.org/packages/jacobfitzp/weight-conversions)

Simple PHP package to convert between different units of weight measurement.

## Installation

You can install the package via composer:

```bash
composer require jacobfitzp/weight-conversions
```

## Usage

```php
// Create a new measurement unit
$kilograms = new Kilogram();

// Set weight amount
// Can also be passed to the constructor
$kilograms->setAmount(5.75);

// Convert to a different unit type
$ounce = $kilograms->to(Ounce::class);

// Get weight amount
$ounce->getAmount();
```

Supported measurement units:

```php
// Gram
\JacobFitzp\WeightConversions\Units\Gram::class;

// Kilogram
\JacobFitzp\WeightConversions\Units\Kilogram::class;

// Milligram
\JacobFitzp\WeightConversions\Units\Milligram::class;

// Ounce
\JacobFitzp\WeightConversions\Units\Ounce::class;

// Pound
\JacobFitzp\WeightConversions\Units\Pound::class;

// Stone
\JacobFitzp\WeightConversions\Units\Stone::class;

// Ton
\JacobFitzp\WeightConversions\Units\Ton::class;
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jacob Fitzpatrick](https://github.com/JacobFitzp)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
