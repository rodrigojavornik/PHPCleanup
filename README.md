# PHP Cleanup
#### A powerful sanitization library for PHP and Laravel.

### Installation
```sh
composer require rodrigojavornik/php-cleanup
```

### Usage
```php
use PHPCleanup\Sanitize;

Sanitize::input()->sanitize(' <h1>Hello World</h1> ');//Hello World
Sanitize::trim()->captalize()->sanitize(' string    ');//String
Sanitize::trim()->lowercase()->sanitize(' MY name IS    ');//my name is
Sanitize::onlyNumbers()->sanitize(' abc1234');//1234
```

### Available filters
| Filter | Description | Params | 
| ------ | ------ | ------ |
| captalize | Capitalize a string | |
| dateTime| Transform a string in DateTime object | A expected format. Ex.: Y-m-y h:i:s |
| email | Removes all characters not allowed in an email address | |
| formatNumber | Format a number with grouped thousands | $decimalPlace = 2 / $decimalSeparator = '.' / $thousandsSeparator = null |
| input | Strip whitespace from the beginning and end of a string and remove any HTML and PHP tags | |
| lowercase | Make a string lowercase |  |
| onlyAlpha | Removes any non-alphabetic characters | $additionalChars (add characters that will not be removed. You can use regex.) |
| onlyLatinAlpha | Removes all non-Latin characters | $additionalChars (add characters that will not be removed. You can use regex.) |
| onlyNumbers | Removes all non-numeric characters |  |
| trim | Strip whitespace from the beginning and end of a string |  |
| uppercase | Make a string uppercase |  |