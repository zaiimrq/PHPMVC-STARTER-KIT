<?php

namespace zaiimrq\Models;

trait setUp
{
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {

            $this->$property = $value;
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $name;
        }
    }
}
