<?php

namespace Sally\Dashboard\Domain\Statistic;

abstract class AbstractHandler
{
    /**
     * @var Composite
     */
    private $statistic;

    /**
     * @var Type\Factory
     */
    private $factory;

    public function __construct()
    {
        $this->statistic = new Composite();
        $this->factory   = new Type\Factory();
        $this->handle($this->statistic, $this->factory);
    }

    public function getStatistic(): Composite
    {
        return $this->statistic;
    }

    abstract protected function handle(Composite $statistic, Type\Factory $factory): void;
}
