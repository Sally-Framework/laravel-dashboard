<?php

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * @var Type\AbstractType[] $items
 */

?>

@extends('dashboard::layouts.app')

{{-- Библиотека Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0-alpha/dist/Chart.min.js"></script>

@section('content')
    <div class="container">

        {{-- Начало секции текстовых карточек --}}
        <div class="row justify-content-center pb-5">
            @foreach($items as $item)
                @if ($item instanceof Type\Common\Text)
                    <?php /** @var Type\Common\Text $item */ ?>
                    @component(
                        'dashboard::component.statistic.card-text',
                        [
                            'name'  => $item->getName(),
                            'value' => $item->getValue()
                        ]
                    )
                    @endcomponent
                @endif
            @endforeach
        </div>
        {{-- Конец секции текстовых карточек --}}

        {{-- Начало секции таблиц --}}
        @foreach($items as $item)
            @if ($item instanceof Type\Common\Table)
                <div class="table-responsive">
                    <div class="pb-5">
                    <?php /** @var Type\Common\Table $item */ ?>
                    @component(
                        'dashboard::component.statistic.table',
                        [
                            'name'    => $item->getName(),
                            'headers' => $item->getHeaders(),
                            'rows'    => $item->getRows(),
                        ]
                    )
                    @endcomponent
                    </div>
                </div>
            @endif
        @endforeach
        {{-- Конец секции таблиц --}}

        {{-- Начало секции pie chart'ов --}}
        <div class="row justify-content-center pb-5">
            @foreach($items as $diagram)
                @if ($diagram instanceof Type\Diagram\Pie)
                    <?php
                    /** @var Type\Diagram\Pie $diagram */
                    /** @var Type\Diagram\Item\Quantity[] $diagramItems */
                    $diagramItems = $diagram->getItems();
                    $values = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                        return $diagramItem->getValue();
                    });
                    $labels = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                        return $diagramItem->getName();
                    });
                    ?>
                    <div class="col-md-6 mb-5">
                        @component(
                            'dashboard::component.statistic.pie-chart',
                            [
                                'name'   => $diagram->getName(),
                                'labels' => $labels,
                                'values' => $values,
                            ]
                        )
                        @endcomponent
                    </div>
                @endif
            @endforeach
        </div>
        {{-- Конец секции pie chart'ов --}}

        {{-- Начало секции doughnut chart'ов --}}
        <div class="row justify-content-center pb-5">
            @foreach($items as $diagram)
                @if ($diagram instanceof Type\Diagram\Doughnut)
                    <?php
                    /** @var Type\Diagram\Doughnut $diagram */
                    /** @var Type\Diagram\Item\Quantity[] $diagramItems */
                    $diagramItems = $diagram->getItems();
                    $values = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                        return $diagramItem->getValue();
                    });
                    $labels = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                        return $diagramItem->getName();
                    });
                    ?>
                    <div class="col-md-6 mb-5">
                        @component(
                            'dashboard::component.statistic.doughnut-chart',
                            [
                                'name'   => $diagram->getName(),
                                'labels' => $labels,
                                'values' => $values,
                            ]
                        )
                        @endcomponent
                    </div>
                @endif
            @endforeach
        </div>
        {{-- Конец секции doughnut chart'ов --}}

        {{-- Начало секции line chart'ов --}}
        <div class="row justify-content-center pb-5">
            @foreach($items as $diagram)
                @if ($diagram instanceof Type\Diagram\Line)
                    <?php
                    /** @var Type\Diagram\Line $diagram */
                    /** @var Type\Diagram\Item\QuantityGroup[] $diagramItems */
                    $diagramItems = $diagram->getItems();
                    $data = [];
                    foreach ($diagramItems as $diagramItem) {
                        $data[$diagramItem->getIndicator()][$diagramItem->getName()] = $diagramItem->getValue();
                    }
                    ?>
                    @component(
                        'dashboard::component.statistic.line-chart',
                        [
                            'name' => $diagram->getName(),
                            'data' => $data,
                        ]
                    )
                    @endcomponent
                @endif
            @endforeach
        </div>
        {{-- Конец секции line chart'ов --}}

    </div>
@endsection
