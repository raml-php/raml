<?php

use Raml\Parser;

require_once __DIR__ . '/../vendor/autoload.php';

$parser = new Parser();
$definition = $parser->parse(__DIR__ . '/raml/security-schemes.raml');
print_r($definition);
