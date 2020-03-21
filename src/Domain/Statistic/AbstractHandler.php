<?php

namespace Sally\Dashboard\Domain\Statistic;

use Sally\Dashboard\Domain\Statistic\Interfaces\CompositeInterface;
use Sally\Dashboard\Domain\Statistic\Interfaces\Type\FactoryInterface;

abstract class AbstractHandler
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
	 * @inheritDoc
	 */
    public function getItems(): array
    {
    	$this->handle($this->statistic, $this->factory);
        return $this->statistic->getItems();
    }

    abstract protected function handle(CompositeInterface $statistic, FactoryInterface $factory): void;
}
