<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 14:11
 */
namespace Raml\Strategy;

use Raml\Resources;
use Raml\Hydrator\ResourceHydrator;
use Raml\Resource;
use Zend\Hydrator\Strategy\StrategyInterface;

class ResourcesHydratorStrategy implements StrategyInterface
{
    /**
     * @var ResourceHydrator
     */
    private $resourceHydrator;

    public function __construct(ResourceHydrator $resourceHydrator)
    {
        $this->resourceHydrator = $resourceHydrator;
    }

    public function extract($resources)
    {
        if (!($resources instanceof Resources)) {
            throw new \UnexpectedValueException("Unexpected value, expecting ResourcesCollection");
        }
        foreach ($resources as $resource => $info) {
            $data[] = array($info => $this->resourceHydrator->extract($resource));
        }

        return $data;
    }

    public function hydrate($values)
    {
        $resourcesCollection = new Resources();
        foreach ($values as $value) {
            $resource = new Resource();
            $resourcesCollection->attach($this->resourceHydrator->hydrate(reset($value), $resource), key($value));
        }

        return $resourcesCollection;
    }
}
