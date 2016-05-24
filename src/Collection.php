<?php declare(strict_types = 1);

namespace Venta\Collection;

/**
 * Class Collection
 *
 * @package Venta\Collection
 */
class Collection
{
    /**
     * Array of items
     *
     * @var array
     */
    protected $items = [];

    /**
     * Array of keys
     *
     * @var array
     */
    protected $keys = [];

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return count($this->keys);
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->keys = [];
        $this->items = [];
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($key, $value)
    {
        $this->keys[$key] = true;
        $this->items[$key] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($key)
    {
        if ($this->offsetExists($key)) {
            return $this->items[$key];
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($key)
    {
        return isset($this->keys[$key]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($key)
    {
        if ($this->offsetExists($key)) {
            unset($this->keys[$key], $this->items[$key]);
        }
    }
}