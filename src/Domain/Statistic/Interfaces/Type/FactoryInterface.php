<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Interfaces\Type;

interface FactoryInterface
{
	public function getCommonFactory(): Common\FactoryInterface;
	public function getDiagramFactory(): Diagram\FactoryInterface;
	public function getDiagramItemFactory(): Diagram\Item\FactoryInterface;
}
