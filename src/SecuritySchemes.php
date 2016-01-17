<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 09:52
 */
namespace Raml;

/**
 * Class SecuritySchemesCollection
 * @package Raml\Collection
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
class SecuritySchemes extends Collection
{
    public function attach(SecurityScheme $object, $data = null)
    {
        $this->storage->attach($object, $data);
    }

    public function detach(SecurityScheme $object)
    {
        $this->storage->detach($object);
    }

    public function contains(SecurityScheme $object) : bool
    {
        return $this->storage->contains($object);
    }

    public function current() : SecurityScheme
    {
        return $this->storage->current();
    }
}
