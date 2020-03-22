<?php

namespace Sally\Dashboard\Domain\Statistic;

use Sally\Dashboard\Domain\Statistic\Interfaces;
use Sally\Dashboard\Domain\Statistic\Type;

abstract class AbstractStatisticFiller
{
    /**
     * @var Interfaces\CompositeInterface
     */
    private $statistic;

    /**
     * @var Interfaces\Type\FactoryInterface
     */
    private $factory;

    public function __construct(
	    Interfaces\CompositeInterface $statistic,
	    Interfaces\Type\FactoryInterface $typeFactory
    ) {
	    $this->statistic = $statistic;
	    $this->factory   = $typeFactory;
    }

	/**
	 * @return Type\AbstractType[]
	 */
    public function getFilled(): array
    {
    	$this->fill();
        return $this->statistic->getItems();
    }

    protected function addStatistic(Type\AbstractType $statistic): void
    {
    	$this->statistic->add($statistic);
    }

	protected function getFactory(): Interfaces\Type\FactoryInterface
	{
		return $this->factory;
	}

	abstract protected function fill(): void;
}
