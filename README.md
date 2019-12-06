php-sentiment - Sentiment Analysis in PHP
---------

### Installation
```bash
composer require dmitry-udod/php-sentiment
```

### Usage
```php
use PHPInsight\Sentiment;
#....
$analyzer = new Sentiment();
$analyzer->categorise($string); #return text category, positive, negative or neutral
$scores = $analyzer->score($string);

#Returns text scores, for example
#(
#    [neg] => 0.865
#    [neu] => 0.108
#    [pos] => 0.027
#    [neg_word] => ['horrible', 'boring', 'expensive']
#)
```

### Demo
Run
```bash
composer demo
```

### Generate dictionaries
Run
```bash
composer generate-dictionaries
```

### Tests
```bash
composer install
phpunit
```

### Source
Forked from https://github.com/JWHennessey/phpInsight 