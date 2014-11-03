# UTCDateTime

A small library that always uses UTC for your DateTime-Objects no matter what you input.

[![Build Status](https://travis-ci.org/heiglandreas/UTCDateTime.svg?branch=master)](https://travis-ci.org/heiglandreas/UTCDateTime)
[![Code Climate](https://codeclimate.com/github/heiglandreas/UTCDateTime/badges/gpa.svg)](https://codeclimate.com/github/heiglandreas/UTCDateTime)

## Installation

UTCDateTime is installed via composer. Call ```composer require utcdatetime/utcdatetime``` from the commandline in your project.

Alternatively you can include the following line in your ```composer.json``` inside the ```require```-section:

    "utcdatetime/utcdatetime" : "stable"


## Usage

Use the UTCDateTime- or UTCDateTimeImmutable-Object just like PHPs own DateTime-Objects. You do not have to rewrite any productive code. Just add ```use UTCDateTime/DateTime``` resp. ```use UTCDateTime\DateTimeimmutable``` to the ```use```-section of your PHP-file. That will cause PHP to use the UTCDateTime-Objects instead of the PHP-Internal DateTime-Objects.

Calls to ```setTimeZone``` will be ignored, all other calls will be executed just as before. The only difference will be, that no matter what you put into the DateTime-Objects, it will always contain the UTC-representation of your date. And there is no way to change that.

So any Datetime-data will always be correctly converted to UTC and you can then work with that like so:

    use UTCDateTime\DateTime;
    $date = new DateTime('2014-11-03 12:34:56', new DateTimeZone('Europe/Berlin'));
    echo $date->format(DateTime::RFC3339);
    // 2014-11-03T10:34:56+00:00

## Additional Constants

This package also introduce some more formating-constants.

Those include:

 * DateTime::RFC7231 for formatting date according to RFC 7231
 * DateTime::PDF for formatting dates for internal PDF-Storage

## Licence

This code is licensed under the MIT-License.

## Contributing

Contributions are always welcome. Fork the repo, do whatever you like and open a pull request!
