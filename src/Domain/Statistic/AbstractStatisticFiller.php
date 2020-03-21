<?php

namespace Sally\Dashboard\Domain\Statistic;

use Sally\Dashboard\Domain\Statistic\Interfaces\CompositeInterface;
use Sally\Dashboard\Domain\Statistic\Interfaces\Type\FactoryInterface;
use Sally\Dashboard\Domain\Statistic\Type\AbstractType;

abstract class AbstractStatisticFiller
{
    /**
     * @var CompositeInterface
     */
    private $statistic;

    /**
     * @var FactoryInterface
     */
    private $factory;

    public function __construct(CompositeInterface $statistic, FactoryInterface $factory)
    {
	    $this->statistic = $statistic;
	    $this->factory   = $factory;
    }

	/**
	 * @return AbstractType[]
	 */
    public function getFilled(): array
    {
    	$this->fill($this->statistic, $this->factory);
        return $this->statistic->getItems();
    }

    abstract protected function fill(CompositeInterface $statistic, FactoryInterface $factory): void;
}
