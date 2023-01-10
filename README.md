[![StandWithUkraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/badges/StandWithUkraine.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)
[![TYPO3 10](https://img.shields.io/badge/TYPO3-10-orange.svg)](https://get.typo3.org/version/10)
[![TYPO3 11](https://img.shields.io/badge/TYPO3-11-orange.svg)](https://get.typo3.org/version/11)
[![Latest Stable Version](http://poser.pugx.org/dskzpt/openinghours/v)](https://packagist.org/packages/dskzpt/openinghours) [![Total Downloads](http://poser.pugx.org/dskzpt/openinghours/downloads)](https://packagist.org/packages/dskzpt/openinghours) [![Latest Unstable Version](http://poser.pugx.org/dskzpt/openinghours/v/unstable)](https://packagist.org/packages/dskzpt/openinghours) [![License](http://poser.pugx.org/dskzpt/openinghours/license)](https://packagist.org/packages/dskzpt/openinghours) [![PHP Version Require](http://poser.pugx.org/dskzpt/openinghours/require/php)](https://packagist.org/packages/dskzpt/openinghours)

TYPO3 Extension "openinghours"
=================================

## What does it do?

Manage and display your business' opening hours.
This Extensions leverages [spatie/opening-hours](https://github.com/spatie/opening-hours) for
all of the business logic/handling of opening hours.

**Summary of features**

* Display your business' opening hours as a
    * Table: Full week or days with same opening times combined
    * String: e.g.: <code>"We're closed since Monday 19:00 o'clock, We will re-open at Tuesday 08:00 o'clock."</code>
* Show all your different/varying opening hours (e.g. special openings on
  certain dates)
* Display your regular schedule or schedules for contrete weeks with variing
  opening times
* Fully customize the output to your desire by overwriting Fluid templates
* Leverages [spatie/opening-hours](https://github.com/spatie/opening-hours)

## Installation

The recommended way to install the extension is by
using [Composer](https://getcomposer.org/). In your Composer based TYPO3 project
root, just run:
<pre>composer require dskzpt/openinghours</pre>

## Setup

1. Install extension via composer <code>composer require dskzpt/openinghours</code>
2. Include the static TypoScript
3. Create a "Schedule" entity and fill in your opening times and exceptions
4. Add a frontend plugin to a page to render your desired view.

## Recommendend

See [spatie/opening-hours](https://github.com/spatie/opening-hours) documentation to see what else you can do with your Opening Hours.

## Compatibility

| Version | TYPO3       | PHP       | Support/Development                  |
|---------|-------------|-----------|--------------------------------------|
| 1.x     | 10.4 - 11.5 | 7.4 - 8.0 | Features, Bugfixes, Security Updates |

## Contributing

Please refer to the [contributing](CONTRIBUTING.md) document included in this
repository.

## Testing

This Extension comes with a testsuite for coding styles and unit/functional
tests. To run the tests simply use the provided composer script:

<pre>composer ci:test</pre>
