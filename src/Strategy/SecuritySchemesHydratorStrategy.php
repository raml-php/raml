<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 08:23
 */
namespace Raml\Parser\Strategy;

use Raml\ApiDefinition\Collection\SecuritySchemesCollection;
use Raml\ApiDefinition\SecurityScheme;
use Zend\Hydrator\Reflection;
use Zend\Hydrator\Strategy\StrategyInterface;

/**
 * Class SecuritySchemesStrategy
 * @package Raml\Parser\Strategy
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
class SecuritySchemesHydratorStrategy implements StrategyInterface
{
    private $securitySchemeHydrator;

    public function __construct(Reflection $hydrator)
    {
        $this->securitySchemeHydrator = $hydrator;
    }

    public function extract($securitySchemes)
    {return null;
        $data = [];
        foreach ($securitySchemes as $securityScheme) {
            $data[] = $this->securitySchemeHydrator->extract($securityScheme);
        }

        return $data;
    }

    public function hydrate($values)
    {
        $securitySchemesCollection = new SecuritySchemesCollection();
        foreach ($values as $value) {
            $securityScheme = new SecurityScheme();
            $securitySchemesCollection->attach($this->securitySchemeHydrator->hydrate(reset($value), $securityScheme), key($value));
        }

        return $securitySchemesCollection;
    }
}
