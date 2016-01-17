<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 13:44
 */
namespace Raml;

/**
 * Class RescourcesCollection
 * @package Raml\Collection
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
class Resources extends Collection
{
    public function attach(Resource $object, $data = null)
    {
        $this->storage->attach($object, $data);
    }

    public function detach(Resource $object)
    {
        $this->storage->detach($object);
    }

    public function contains(Resource $object) : bool
    {
        return $this->storage->contains($object);
    }

    public function current() : Resource
    {
        return $this->storage->current();
    }
}
