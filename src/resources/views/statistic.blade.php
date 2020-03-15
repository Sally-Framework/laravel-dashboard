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
                @if ($item instanceof Type\Text)
                    <?php /** @var Type\Text $item */ ?>
                    @component(
                        'dashboard::component.statistic.card-text',
                        [
                            'name' => $item->getName(),
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
            @if ($item instanceof Type\Table)
                <div class="table-responsive">
                    <div class="pb-5">
                    <?php /** @var Type\Table $item */ ?>
                    @component(
                        'dashboard::component.statistic.table',
                        [
                            'name' => $item->getName(),
                            'headers' => $item->getHeaders(),
                            'rows' => $item->getRows(),
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
                @if ($diagram instanceof Type\DiagramPie)
                    <?php
                    /** @var Type\DiagramPie $diagram */
                    /** @var Type\DiagramItem\Quantity[] $diagramItems */
                    $diagramItems = $diagram->getItems();
                    $values = collect($diagramItems)->map(function (Type\DiagramItem\Quantity $diagramItem) {
                        return $diagramItem->getValue();
                    });
                    $labels = collect($diagramItems)->map(function (Type\DiagramItem\Quantity $diagramItem) {
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
        {{-- Конец секции таблиц --}}

    </div>
@endsection
