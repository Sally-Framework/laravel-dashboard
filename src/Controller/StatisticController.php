<?php

namespace Sally\Dashboard\Controller;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Sally\Dashboard\Domain\Statistic\AbstractStatisticFiller;
use Sally\Dashboard\Domain\Statistic\Interfaces\CompositeInterface;
use Sally\Dashboard\Domain\Statistic\Interfaces\Type\FactoryInterface;
use Sally\Dashboard\Helpers\Config;

class StatisticController extends Controller
{
	/**
	 * @var AbstractStatisticFiller
	 */
	private $filler;

	public function __construct(CompositeInterface $composite, FactoryInterface $factory)
	{
		$this->filler = $this->getFiller($composite, $factory);
	}

	public function index(): View
    {
        $items = $this->filler->getFilled();
        return view('dashboard::statistic', compact('items'));
    }

    private function getFiller(CompositeInterface $composite, FactoryInterface $factory): AbstractStatisticFiller
    {
        $statisticHandlerClassName = Config::getStatisticHandler();
        return new $statisticHandlerClassName($composite, $factory);
    }
}
