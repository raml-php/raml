<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 17.01.16
 * Time: 10:15
 */
namespace Raml\Collection;

use Countable;
use Iterator;
use SplObjectStorage;

/**
 * Class AbstractCollection
 * @package Raml\Collection
 * @author Michał Brzuchalski <michal.brzuchalski@gmail.com>
 */
abstract class AbstractCollection implements Iterator, Countable
{
    /**
     * @var SplObjectStorage
     */
    protected $storage;

    /**
     * AbstractCollection constructor.
     */
    public function __construct()
    {
        $this->storage = new SplObjectStorage();
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return $this->storage->count();
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key() : int
    {
        return $this->storage->key();
    }
    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->storage->next();
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid() : bool
    {
        return $this->storage->valid();
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->storage->rewind();
    }
}
