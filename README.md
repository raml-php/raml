RAML 1.0 for PHP
================

RAML 1.0 Parser and Dumper for PHP 7 based on YAML extension (version 2).

## Get started

### Install:

```bash
composer require raml-php/raml
```

### Requires:

- composer (see [https://getcomposer.org](https://getcomposer.org))
 
```bash
composer install --dev
./vendor/bin/phpunit test
```

```php
$parser = new \Raml\Parser();
$definition = $parser->parse($filename, true);

$title = $definition->getTitle();
$baseUri = $definition->getBaseUri();
$mediaType = $definition->getMediaType();
$version = $definition->getVersion();

$dumper = new \Raml\Dumper();
$dumper->dump($definition, $filename);
```

## TODO

Implement various RAML elements:

- [ ] BasicSecurityScheme Information
- [ ] Data Types
- [ ] Resources
- [ ] Methods
- [ ] Responses
- [ ] Resource Types and Traits
- [ ] Security
- [ ] Annotations
- [ ] Includes, Libraries, Overlays, and Extensions

## Contributing

```bash
composer install --dev
bin/parallel-lint --exclude app --exclude vendor .
bin/phpcs --colors -wp src --report=summary --standard=PSR2,phpcs.xml
bin/phpunit --coverage-php tests/coverage/phpunit.cov tests
bin/phpspec run --format=pretty --no-code-generation
```

## License

The MIT License (MIT)

Copyright (c) 2016 Michał Brzuchalski and Dariusz Gafka

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
