<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 08:23
 */
namespace Raml\Strategy;

use Raml\SecuritySchemes;
use Raml\SecurityScheme;
use Zend\Hydrator\Reflection;
use Zend\Hydrator\Strategy\StrategyInterface;

/**
 * Class SecuritySchemesStrategy
 * @package Raml\Strategy
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
class SecuritySchemesHydratorStrategy implements StrategyInterface
{
    private $securitySchemeHydrator;

    public function __construct(Reflection $hydrator)
    {
        $this->securitySchemeHydrator = $hydrator;
    }

    public function extract($resources)
    {
        if (!($resources instanceof SecuritySchemes)) {
            throw new \UnexpectedValueException("Unexpected value, expecting SecuritySchemesCollection");
        }
        foreach ($resources as $securityScheme => $info) {
            $data[] = array($info => $this->securitySchemeHydrator->extract($securityScheme));
        }

        return $data;
    }

    public function hydrate($values)
    {
        $securitySchemesCollection = new SecuritySchemes();
        foreach ($values as $value) {
            $securityScheme = new SecurityScheme();
            $securitySchemesCollection->attach($this->securitySchemeHydrator->hydrate(reset($value), $securityScheme), key($value));
        }

        return $securitySchemesCollection;
    }
}
