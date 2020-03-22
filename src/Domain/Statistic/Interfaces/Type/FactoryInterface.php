<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Interfaces\Type;

interface FactoryInterface
{
	public function createCommon(): Common\FactoryInterface;
	public function createDiagram(): Diagram\FactoryInterface;
}