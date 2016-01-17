<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 08:18
 */
namespace Raml\Hydrator;

use Raml\Strategy\SecuritySchemesHydratorStrategy;
use Zend\Hydrator\Reflection;

/**
 * Class BasicSecurityScheme
 * @package Raml\Hydrator
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
class DefinitionHydrator extends Reflection
{
    public function __construct()
    {
        $this->addStrategy('securitySchemes', new SecuritySchemesHydratorStrategy(new SecuritySchemeHydrator()));
    }
}
