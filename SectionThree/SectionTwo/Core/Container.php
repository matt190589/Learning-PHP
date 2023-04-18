<?php

namespace Core;

class Container
{
    protected $bindings = [];
    public function bind($key, $resolver) //This adds things to the container
    {
        $this->bindings[$key] = $resolver;
    }
    public function resolve($key) //This removes things/ grabs things out from the container
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for {$key}");
        }
        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}
