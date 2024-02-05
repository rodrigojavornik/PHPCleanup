
# PHP Cleanup
#### A powerful sanitization library for PHP and Laravel. No dependencies

## Installation
```sh
composer require rodrigojavornik/php-cleanup
```

## Usage
```php
use PHPCleanup\Sanitize;

Sanitize::input()->sanitize(' <h1>Hello World</h1> ');//Hello World
Sanitize::trim()->captalize()->sanitize(' string    ');//String
Sanitize::trim()->lowercase()->sanitize(' MY name IS    ');//my name is
Sanitize::onlyNumbers()->sanitize(' abc1234');//1234
```

## Available filters

 - [captalize](#captalize): Capitalize a string;
 - [captalizeAll](#captalizeall): Capitalize all string;
 - [dateTime](#datetime): Transform a string in DateTime object;
 - [email](#email): Removes all characters not allowed in an email address;
 - [escape](#escape): Applies htmlspecialchars to value;
 - [formatNumber](#formatnumber): Format a number with grouped thousands;
 - [input](#input): Strip one whitespace from the beginning and end of a string and remove any HTML and PHP tags;
 - [keys](#keys):  applies sanitaze to elements of an array;
 - [lowercase](#lowercase): Make a string lowercase;
 - [money](#money): Formats a number as a monetary value;
 - [onlyAlpha](#onlyalpha): Removes any non-alphabetic characters;
 - [onlyLatinAlpha](#onlylatinalpha): Removes all non-Latin characters;
 - [onlyNumbers](#onlynumbers): Removes all non-numeric characters;
 - [removeAccentedCharacters](#removeaccentedcharacters): Replaces accented characters with non-accented ones;
 - [stripTags](striptags): Applies strip_tags to value;
 - [trim](#trim): Strip whitespace from the beginning and end of a string;
 - [upperCase](#uppercase): Make a string uppercase;

#### captalize
Capitalize a string
**Return**: Sanitize object
```php
Sanitize::capitalize()->sanitaze('is wednesday my dudes');
//output: Is wednesday my dudes
```
#### captalizeAll
Capitalize all string
**Return**: Sanitaze object
```php
Sanitize::captalizeAll()->sanitize('is wednesday my dudes');
//output: Is Wednesday My Dudes
```
#### dateTime
Transform a string in DateTime object
**Params**: $dateFormat = 'Y-m-d H:i:s'
**Return**: DateTime object or false
```php
Sanitize::dateTime()->sanitize('2023-08-10 10:15:00')->getTimestamp();
Sanitize::dateTime()->sanitize('2023-08-10 10:15:00asfasdfdsf')->getTimestamp();
Sanitize::dateTime()->sanitize('2023-08-10 10:15:00 ')->getTimestamp();
Sanitize::dateTime('d/m/Y H:i:s')->sanitize(' 10/08/2023 10:15:00')->getTimestamp();
//output: DateTime object 
```
#### email
Removes all characters not allowed in an email address
**Return**: Sanitize object
```php
Sanitize::email()->sanitize('email#1@domain.com ');
//output: email#1@domain.com

Sanitize::email()->sanitize('username@email.org');
//output: username@email.org

Sanitize::email()->sanitize('email1@domain().com');
//output: email1@domain.com
```
#### escape
Applies htmlspecialchars to value
**Return**: Sanitize object
```php
Sanitize::escape()->sanitize('<script>is wednesday my dudes &</script>')
//output: &lt;script&gt;is wednesday my dudes &amp;&lt;/script&gt;
```
#### formatNumber
Formats a number with thousands grouped
**Params**: $decimalPlace = 2 , $decimalSeparator = '.' , $thousandsSeparator = ''
**Return**: Sanitize object
> **Note:** The [onlyNumber](#onlynumber) filter is applied.
```php
Sanitize::formatNumber(2, '.')->sanitize('123321123sdfasdf');
//output:123321123.00
Sanitize::formatNumber(2, ',')->sanitize('123321123sdfasdf');
//output:123321123,00
Sanitize::formatNumber(2, ',', '.')->sanitize('123321123sdfasdf');
//output:123.321.123,00
Sanitize::formatNumber(2, '.', ',')->sanitize('123321123sdfasdf');
//output:123,321,123.00
Sanitize::formatNumber(3, '.', ',')->sanitize('1987.7')
//output:1,987.700
```
#### input
Strip one whitespace from the beginning and end of a string and remove any HTML and PHP tags
**Return**: Sanitize object
```php
Sanitize::input()->sanitize(' <script>hello world &</script> ');
//output: hello world &
```
#### keys
 Apply sanitaze to elements of an array
 **Params**: array
**Return**: Sanitize object
```php
$list = [
	'name' => ' carlos alberto ',
	'age' => '23r',
	'email' => ' ¨teste@teste.com '
];

$result = Sanitize::keys([
	'name' => Sanitize::input()->uppercase(),
	'age' => Sanitize::input()->onlyNumbers(),
	'email' => Sanitize::input()->email()
])->sanitize($list);
/* output:
array(3) {
  ["name"]=>
  string(14) "CARLOS ALBERTO"
  ["age"]=>
  string(2) "23"
  ["email"]=>
  string(15) "teste@teste.com"
}*/ 
```
#### lowercase
Strip one whitespace from the beginning and end of a string and remove any HTML and PHP tags
**Return**: Sanitize object
```php
Sanitize::lowercase()->sanitize('THE LIBRARY OF ALEXANDRIA');
//output: the library of alexandria
```
#### Money
Formats a number as a monetary value
**Params**: $locale = 'en-US'
**Return**: Sanitize object
> **Note:** The [onlyNumber](#onlynumber) filter is applied.
>  You can check a complete list of currenty locale [here](https://community.lansweeper.com/t5/customizing-the-web-console/list-of-currency-culture-codes/ta-p/64431).
```php
Sanitize::money()->sanitize('123456');
//output: $123,654.00

Sanitize::money('pt_br')->sanitize('1236.54');
//output: R$ 1.236,54
```
#### onlyAlpha
Removes any non-alphabetic characters;
**Params**: $additionalChars
**Return**: Sanitize object
```php
Sanitize::onlyAlpha()->sanitize('Home ç 1@#$%¨(873469');
//output: Home

Sanitize::onlyAlpha('ç', '1', ' ')->sanitize('Home ç 123456');
//output: Home ç 1
```

#### onlyLatinAlpha
Removes any non-alphabetic characters;
**Params**: $additionalChars
**Return**: Sanitize object
```php
Sanitize::onlyLatinAlpha()->sanitize('Home ç 1@#$%¨(873469');
//output: Home ç ¨

Sanitize::onlyLatinAlpha()->sanitize('Home ç 123456');
//output: Home ç 
```
#### onlyNumbers
Removes all non-numeric characters
**Return**: Sanitize object
```php
Sanitize::onlyNumbers()->sanitize('Home ç 1@#$%¨(873469');
//output: 1873469

Sanitize::onlyNumbers()->sanitize('Home ç 123456');
//output: 123456 
```
#### removeAccentedCharacters
Replaces accented characters with non-accented ones
**Return**: Sanitize object
```php
Sanitize::removeAccentedCharacters()->sanitize("Qu'á çà, qu'á là, mon ami?");
//output: Qu'a ca, qu'a la, mon ami?

Sanitize::removeAccentedCharacters()->sanitize("Águas passadas não movem moinhos.")
//output: Aguas passadas nao movem moinhos.
```
#### stripTags
 Applies strip_tags to value
 **Params**: $allowableTags
**Return**: Sanitize object
```php
Sanitize::stripTags()->sanitize('<html><h1>welcome</h1></html>');
//output: welcome

Sanitize::stripTags('<h1>')->sanitize('<html><h1>welcome</h1></html>')
//output: <h1>welcome</h1>
```
#### trim
Strip whitespace from the beginning and end of a string
**Return**: Sanitize object
```php
Sanitize::trim()->sanitize(' blablabla ');
//output: blablabla
```
#### trim
Make a string uppercase
**Return**: Sanitize object
```php
Sanitize::uppercase()->sanitize('home');
//output: HOME
```
