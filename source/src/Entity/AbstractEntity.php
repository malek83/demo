<?php

declare(strict_types=1);

namespace App\Entity;

/**
 * Class AbstractEntity
 * @package App\Entity
 */
abstract class AbstractEntity
{
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->{$this->camelize($name)} = $value;
    }

    /**
     * @param string $string
     * @return string
     */
    private function camelize(string $string): string
    {
        return \lcfirst(\str_replace(' ', '', ucwords(preg_replace('/[^a-zA-Z0-9\x7f-\xff]++/', ' ', $string))));
    }
}
