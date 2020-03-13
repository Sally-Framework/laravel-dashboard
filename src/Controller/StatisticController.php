<?php

namespace Sally\Dashboard\Controller;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Sally\Dashboard\Domain\Statistic\AbstractHandler;
use Sally\Dashboard\Helpers\Config;

class StatisticController extends Controller
{
    public function index(): View
    {
        $handler = $this->getHandler();
        $items = $handler->getStatistic()->getItems();
        return view('dashboard::statistic', compact('items'));
    }

    private function getHandler(): AbstractHandler
    {
        $statisticHandlerClassName = Config::getStatisticHandler();
        return new $statisticHandlerClassName;
    }
}
