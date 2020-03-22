<?php

namespace Sally\Dashboard\Domain\Statistic\Type\Common;

use Sally\Dashboard\Domain\Statistic\Type\AbstractType;

class Text extends AbstractType
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $name, string $value) 
    {
        parent::__construct($name);
        $this->value = $value;
    }

    public function getValue(): string 
    {
        return $this->value;
    }

}
