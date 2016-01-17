<?php
use Raml\ApiDefinition\Collection\SecuritySchemesCollection;
use Raml\ApiDefinition\Definition;
use Raml\Parser;

/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 14.01.16
 * Time: 13:15
 */
class ParserTest extends PHPUnit_Framework_TestCase
{
    public function testBasicParse()
    {
        $parser = new Parser();
        $definition = $parser->parse(__DIR__ . '/../raml/basic.raml');
        $this->assertInstanceOf(Definition::class, $definition);
        $this->assertInternalType('string', $definition->title());
        $this->assertInternalType('string', $definition->version());
        $this->assertInternalType('string', $definition->baseUri());
        $this->assertInternalType('string', $definition->mediaType());
        $this->assertInstanceOf(SecuritySchemesCollection::class, $definition->securitySchemes());
    }

    public function testSecuritySchemesParse()
    {
        $parser = new Parser();
        $definition = $parser->parse(__DIR__ . '/../raml/security-schemes.raml');
        $this->assertInstanceOf(Definition::class, $definition);
        $this->assertInstanceOf(SecuritySchemesCollection::class, $definition->securitySchemes());
        print_r($definition);
    }
}
