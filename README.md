# PHP Weight Conversions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jacobfitzp/weight-conversions.svg?style=flat-square)](https://packagist.org/packages/jacobfitzp/weight-conversions)
[![Tests](https://img.shields.io/github/actions/workflow/status/jacobfitzp/weight-conversions/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jacobfitzp/weight-conversions/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/jacobfitzp/weight-conversions.svg?style=flat-square)](https://packagist.org/packages/jacobfitzp/weight-conversions)

Simple PHP package to convert between different units of weight measurement.

Supports gram, kilogram, milligram, ounce, pound, stone and ton... and can easily be extended to add additional units.

```php
echo (new Pound(27.8))
    ->to(Kilogram::class)
    ->round()
    ->formatted()

// 12.6kg
```

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
$ounce->amount();

// Round the amount
// Defaults to a precision of 1 decimal place
$ounce->round();

// Get a formatted human-readable version of the amount
// For example "2kgG", "12st 5" 
$ounce->formatted();
```

### Extending 

You can create your own units of measurement by extending the `AbstractUnit` class:

```php
class Hobnobs extends AbstractUnit
{
    public const RELATIVE_TO_KG = 50;
    
    public function formatted(string $format = '%s hobnobs'): string
    {
        return sprintf($format, $this->amount());
    }
}
```

Let's break down how this works... The main thing to be aware of is the `RELATIVE_TO_KG` constant, this represents the amount of the unit that is relative to 1kg - For exampe, above we are saying that 50 hobnobs = 1kg. This is used as the basis for all conversion calculations.

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
