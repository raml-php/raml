<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 08:18
 */
namespace Raml\Hydrator;

use ArrayObject;
use Raml\Resources;
use Raml\Resource;
use Raml\Strategy\ResourcesHydratorStrategy;
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
        $this->strategies = new ArrayObject();
        $this->addStrategy('securitySchemes', new SecuritySchemesHydratorStrategy(new SecuritySchemeHydrator()));
        $this->addStrategy('resource', new ResourcesHydratorStrategy(new ResourceHydrator()));
    }

    /**
     * Extract values from an object
     *
     * @param  object $object
     * @return array
     */
    public function extract($object)
    {
        $result = [];
        foreach (self::getReflProperties($object) as $property) {
            $propertyName = $this->extractName($property->getName(), $object);
            if (!$this->filterComposite->filter($propertyName)) {
                continue;
            }
            $value = $property->getValue($object);
            $result[$propertyName] = $this->extractValue($propertyName, $value, $object);
        }
        return $result;
    }
    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        $reflProperties = self::getReflProperties($object);
        foreach ($data as $key => $value) {
            if (strpos($key, '/') === 0) {
                $resource = new Resource();

                $hydrator = new Reflection();
                $hydrator->hydrate($value, $resource);

                /** @var Resources $resources */
                $resources = $reflProperties['resources']->getValue($object);
                $resources->attach($resource, $key);

//                $resources->attach($this->hydrateValue('resource', $value, $data));
//                $reflProperties['resources']->setValue($object, $resources);
            } else {
                $name = $this->hydrateName($key, $data);
                if (isset($reflProperties[$name])) {
                    $reflProperties[$name]->setValue($object, $this->hydrateValue($name, $value, $data));
                }
            }
        }
        return $object;
    }
}
