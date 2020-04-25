<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Interfaces\Type;

class Factory implements Type\FactoryInterface
{
    /**
     * @var Type\Common\FactoryInterface
     */
    private $commonFactory;

    /**
     * @var Type\Diagram\FactoryInterface
     */
    private $diagramFactory;

    /**
     * @var Type\Diagram\Item\FactoryInterface
     */
    private $diagramItemFactory;

	public function getCommonFactory(): Type\Common\FactoryInterface
	{
	    if ($this->commonFactory === null) {
	        $this->commonFactory = new Common\Factory();
        }

		return $this->commonFactory;
	}

	public function getDiagramFactory(): Type\Diagram\FactoryInterface
	{
        if ($this->diagramFactory === null) {
            $this->diagramFactory = new Diagram\Factory($this->getDiagramItemFactory());
        }

        return $this->diagramFactory;
	}

    public function getDiagramItemFactory(): Type\Diagram\Item\FactoryInterface
    {
        if ($this->diagramItemFactory === null) {
            $this->diagramItemFactory = new Diagram\Item\Factory();
        }

        return $this->diagramItemFactory;
    }
}
