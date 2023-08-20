<?php


namespace Core;


class Container
{
    protected $bindings = [];

    public function bind($key, $resolver)
    {
        if (isset($this->bindings[$key])) {
            throw new \Exception("A binding with the key \"{$key}\" already exists");
        } else {
            $this->bindings[$key] = $resolver;
        }
    }

    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for \"{$key}\"");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}