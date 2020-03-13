<?php

namespace Sally\Dashboard\Domain\Statistic\Type;

abstract class AbstractType 
{
    /**
     * @var string
     */
    protected $name;

    public function __construct(string $name) 
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
