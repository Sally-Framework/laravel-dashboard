<?php

namespace Sally\Dashboard\Controller;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Sally\Dashboard\Domain\Statistic;
use Sally\Dashboard\Helpers\ConfigHelper;

class StatisticController extends Controller
{
	/**
	 * @var Statistic\AbstractStatisticFiller
	 */
	private $filler;

	public function __construct(
		Statistic\Interfaces\CompositeInterface $composite,
		Statistic\Interfaces\Type\FactoryInterface $factory
	) {
		$this->filler = $this->getFiller($composite, $factory);
	}

	public function index(): View
    {
        $items = $this->filler->getFilled();
        return view('dashboard::statistic', compact('items'));
    }

    public function newDesign(): View
    {
        $items = $this->filler->getFilled();
        return view('dashboard::new-design', compact('items'));
    }

    private function getFiller(
    	Statistic\Interfaces\CompositeInterface $composite,
	    Statistic\Interfaces\Type\FactoryInterface $factory
    ): Statistic\AbstractStatisticFiller {
        $statisticHandlerClassName = ConfigHelper::getStatisticHandler();
        return new $statisticHandlerClassName($composite, $factory);
    }
}
