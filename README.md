# UTCDateTime

A small library that always uses UTC for your DateTime-Objects.

[![Build Status](https://travis-ci.org/heiglandreas/UTCDateTime.svg?branch=master)](https://travis-ci.org/heiglandreas/UTCDateTime)

## Installation

UTCDateTime is installed via composer. Call ```composer require utcdatetime/utcdatetime``` from the commandline in your project.

Alternatively you can include the following line in your ```composer.json``` inside the ```require```-section:

    "utcdatetime/utcdatetime" : "stable"


## Usage

Use the UTCDateTime- or UTCDateTimeImmutable-Object just like PHPs own DateTime-Objects. You do not have to rewrite any productive code. Just add ```use UTCDateTime/DateTime``` resp. ```use UTCDateTime\DateTimeimmutable``` to the ```use```-section of your PHP-file. That will cause PHP to use the UTCDateTime-Objects instead of the PHP-Internal DateTime-Objects.

Calls to ```setTimeZone``` will be ignored, all other calls will be executed just as before. The only difference will be, that no matter what you put into the DateTime-Objects, it will always contain the UTC-representation of your date. And there is no way to change that.

## Licence

This code is licensed under the MIT-License.
