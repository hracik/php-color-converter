# Color converter

Converts color between HEX, RGB and HSL.

## Getting Started

These instructions will get you a copy of the project up and running

### Installing

Install with Composer

```
composer require hracik/php-color-converter
```
### Usage

```PHP
use Hracik\ColorConverter;

//$hex in format #ffffff
$hsl = ColorConverter::hex2hsl($hex);
$rgb = ColorConverter::hex2rgb($hex);

//$rgb as array like [0, 99, 255] each value between 0-255
$hex = ColorConverter::rgb2hex($rgb);
$hsl = ColorConverter::rgb2hsl($rgb);

//$hsl as array like [0.542, 1.0, 0.5]
$rgb = ColorConverter::hsl2rgb($hsl);
$hex = ColorConverter::hsl2hex($hsl);
```

## Running the tests

Run
```
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```   
For Windows platforms
```
./vendor/bin/phpunit.bat --bootstrap vendor/autoload.php tests
```

## Built With

* [PHPUnit](https://phpunit.de/) - The PHP Testing Framework

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/hracik/php-color-converter/tags). 

## Authors

* **Andrej Lahucky** - *Initial work* - [Hracik](https://github.com/hracik)

See also the list of [contributors](https://github.com/hracik/php-color-converter/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## Acknowledgments

* PurpleBooth

