<?php

namespace Sally\Dashboard\Controller;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Sally\Dashboard\Domain\Statistic;

class DashboardController extends Controller
{
	/**
	 * @var Statistic\AbstractStatisticFiller
	 */
	private $filler;

	public function __construct(Statistic\AbstractStatisticFiller $filler) {
		$this->filler = $filler;
	}

	public function index(): View
    {
        $this->filler->fill();
        $items = $this->filler->getStatisticItems();
        return view('dashboard::dashboard', compact('items'));
    }
}
