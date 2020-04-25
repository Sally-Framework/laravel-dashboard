<?php

use Sally\Dashboard\Domain\Statistic\Type;

/** @var Type\AbstractType[] $items */
/** @method array getItemsByClassName */

/**
 * @param Type\AbstractType[] $items
 * @param string $className
 * @return Type\AbstractType[]
 */
function getItemsByClassName(array $items, string $className): array
{
    return collect($items)->filter(function (Type\AbstractType $item) use ($className): bool {
        return (get_class($item) === $className);
    })->all();
}

?>

@extends('dashboard::layouts.app')

@section('content')
    <style>
        .dataTables_info, .dataTables_wrapper .dataTables_length label {
            float: left;
        }
    </style>
    {{-- Начало секции текстовых карточек --}}
    <div class="row justify-content-center pb-5">
        @foreach(getItemsByClassName($items, Type\Common\Text::class) as $item)
            <?php /** @var Type\Common\Text $item */ ?>
            <div class="col-lg-3">
                @component(
                    'dashboard::component.statistic.common.card-text',
                    [
                        'name'  => $item->getName(),
                        'value' => $item->getValue()
                    ]
                )
                @endcomponent
            </div>
        @endforeach
    </div>
    {{-- Конец секции текстовых карточек --}}

    <div class="container">
    {{-- Начало секции таблиц --}}
    <div class="pb-5">
        <?php
            $tables = getItemsByClassName($items, Type\Common\Table::class);
            $components = collect($tables)
                ->keyBy(function (Type\Common\Table $table) {
                    return $table->getName();
                })
                ->map(function (Type\Common\Table $table) {
                    return [
                        'name' => 'dashboard::component.statistic.common.table',
                        'data' => [
                            'name'    => $table->getName(),
                            'headers' => $table->getHeaders(),
                            'rows'    => $table->getRows(),
                        ]
                    ];
                });
        ?>
        @if (!$components->isEmpty())
            @component('dashboard::component.card-component-tab', compact('components'))
            @endcomponent
        @endif
    </div>
    {{-- Конец секции таблиц --}}

    <div class="row">
        {{-- Начало секции pie chart'ов --}}
        <?php
            $pies = getItemsByClassName($items, Type\Diagram\Pie::class);
            $components = collect($pies)->keyBy(function (Type\Diagram\Pie $diagram) {
                    return $diagram->getName();
            })->map(function (Type\Diagram\Pie $diagram) {
                $diagramItems = $diagram->getItems();
                $values = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                    return $diagramItem->getValue();
                });
                $labels = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                    return $diagramItem->getName();
                });
                return [
                    'name' => 'dashboard::component.statistic.chart.pie',
                    'data' => [
                        'name'   => $diagram->getName(),
                        'labels' => $labels,
                        'values' => $values,
                    ]
                ];
            });
        ?>
        @if (!$components->isEmpty())
            <div class="mt-3 mb-3 col-lg-6 col-xs-12">
                @component('dashboard::component.card-component-tab', compact('components'))
                @endcomponent
            </div>
        @endif
        {{-- Конец секции pie chart'ов --}}

        {{-- Начало секции doughnut chart'ов --}}
        <?php
            $doughnuts = getItemsByClassName($items, Type\Diagram\Doughnut::class);
            $components = collect($doughnuts)->keyBy(function (Type\Diagram\Doughnut $diagram) {
                    return $diagram->getName();
            })->map(function (Type\Diagram\Doughnut $diagram) {
                $diagramItems = $diagram->getItems();
                $values = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                    return $diagramItem->getValue();
                });
                $labels = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                    return $diagramItem->getName();
                });
                return [
                    'name' => 'dashboard::component.statistic.chart.doughnut',
                    'data' => [
                        'name'   => $diagram->getName(),
                        'labels' => $labels,
                        'values' => $values,
                    ]
                ];
            });
        ?>
        @if (!$components->isEmpty())
            <div class="mt-3 mb-3 col-lg-6 col-xs-12">
                @component('dashboard::component.card-component-tab', compact('components'))
                @endcomponent
            </div>
        @endif
        {{-- Конец секции doughnut chart'ов --}}
    </div>

    {{-- Начало секции line chart'ов --}}
    <?php
    $line = getItemsByClassName($items, Type\Diagram\Line::class);
    $components = collect($line)->keyBy(function (Type\Diagram\Line $diagram) {
        return $diagram->getName();
    })->map(function (Type\Diagram\Line $diagram) {
        /** @var Type\Diagram\Line $diagram */
        /** @var Type\Diagram\Item\QuantityGroup[] $diagramItems */
        $diagramItems = $diagram->getItems();
        $data = [];
        foreach ($diagramItems as $diagramItem) {
            $data[$diagramItem->getIndicator()][$diagramItem->getName()] = $diagramItem->getValue();
        }
        return [
            'name' => 'dashboard::component.statistic.chart.line',
            'data' => [
                'name'      => $diagram->getName(),
                'data'      => $data,
            ]
        ];
    });
    ?>
    @if (!$components->isEmpty())
        <div class="mt-3 mb-3 col-12">
            @component('dashboard::component.card-component-tab', compact('components'))
            @endcomponent
        </div>
    @endif
    {{-- Конец секции line chart'ов --}}

    {{-- Начало секции horizontal bar chart'ов --}}
    <?php
        $horizontalBar = getItemsByClassName($items, Type\Diagram\BarHorizontal::class);
        $components = collect($horizontalBar)->keyBy(function (Type\Diagram\BarHorizontal $diagram) {
            return $diagram->getName();
        })->map(function (Type\Diagram\BarHorizontal $diagram) {
            $diagramItems = $diagram->getItems();
            $values = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                return $diagramItem->getValue();
            });
            $labels = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                return $diagramItem->getName();
            });
            return [
                'name' => 'dashboard::component.statistic.chart.bar-horizontal',
                'data' => [
                    'name'   => $diagram->getName(),
                    'labels' => $labels,
                    'values' => $values,
                    'options' => [
                        'legend' => [
                            'display' => false,
                        ],
                    ],
                ]
            ];
        });
    ?>
    @if (!$components->isEmpty())
        <div class="mt-3 mb-3 col-12">
            @component('dashboard::component.card-component-tab', compact('components'))
            @endcomponent
        </div>
    @endif
    {{-- Конец секции horizontal bar chart'ов --}}

    {{-- Начало секции vertical bar chart'ов --}}
    <?php
        $verticalBar = getItemsByClassName($items, Type\Diagram\BarVertical::class);
        $components = collect($verticalBar)->keyBy(function (Type\Diagram\BarVertical $diagram) {
            return $diagram->getName();
        })->map(function (Type\Diagram\BarVertical $diagram) {
            $diagramItems = $diagram->getItems();
            $values = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                return $diagramItem->getValue();
            });
            $labels = collect($diagramItems)->map(function (Type\Diagram\Item\Quantity $diagramItem) {
                return $diagramItem->getName();
            });
            return [
                'name' => 'dashboard::component.statistic.chart.bar-vertical',
                'data' => [
                    'name'   => $diagram->getName(),
                    'labels' => $labels,
                    'values' => $values,
                    'options' => [
                        'legend' => [
                            'display' => false,
                        ],
                    ],
                ]
            ];
        });
    ?>
    @if (!$components->isEmpty())
        <div class="mt-3 mb-3 col-12">
            @component('dashboard::component.card-component-tab', compact('components'))
            @endcomponent
        </div>
    @endif
    {{-- Конец секции vertical bar chart'ов --}}

    {{-- Начало секции grouped bar chart'ов --}}
    <?php
        $groupedBar = getItemsByClassName($items, Type\Diagram\BarGrouped::class);
        $components = collect($groupedBar)->keyBy(function (Type\Diagram\BarGrouped $diagram) {
            return $diagram->getName();
        })->map(function (Type\Diagram\BarGrouped $diagram) {
            $diagramItems = $diagram->getItems();
            $data = [];
            foreach ($diagramItems as $diagramItem) {
                $data[$diagramItem->getIndicator()][$diagramItem->getName()] = $diagramItem->getValue();
            }
            return [
                'name' => 'dashboard::component.statistic.chart.bar-grouped',
                'data' => [
                    'name'      => $diagram->getName(),
                    'data'      => $data,
                ]
            ];
        });
    ?>
    @if (!$components->isEmpty())
        <div class="mt-3 mb-3 col-12">
            @component('dashboard::component.card-component-tab', compact('components'))
            @endcomponent
        </div>
    @endif
    {{-- Конец секции grouped bar chart'ов --}}
    </div>
@endsection
