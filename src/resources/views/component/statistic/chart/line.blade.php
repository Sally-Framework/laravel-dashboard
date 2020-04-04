<?php
/** @var string $name */
/** @var array $data */
/** @var string $colorType */

$generatedViewId = uniqid();
?>

@component('dashboard::component.card', ['header' => $name])
    @slot('body')
        @component('dashboard::component.statistic.chart.diagram-quantity-group', [
            'diagramType' => 'line',
            'data'        => $data,
            'colorType'   => $colorType,
        ])
        @endcomponent
    @endslot
@endcomponent
